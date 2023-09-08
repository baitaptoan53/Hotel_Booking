<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\City as ResourcesCity;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends BaseController
{
    public function index()
    {

        $data = City::paginate(10);
        $pagination = $data->toArray();
        $data = [
            'data' => ResourcesCity::collection($data),
            'links' => [
                'first' => $pagination['first_page_url'],
                'last' => $pagination['last_page_url'],
                'prev' => $pagination['prev_page_url'],
                'next' => $pagination['next_page_url'],
            ],
            'meta' => [
                'current_page' => $pagination['current_page'],
                'from' => $pagination['from'],
                'last_page' => $pagination['last_page'],
                'links' => $pagination['links'],
                'path' => $pagination['path'],
                'per_page' => $pagination['per_page'],
                'to' => $pagination['to'],
                'total' => $pagination['total'],
            ]
        ];
        return $this->sendResponse($data, 'Posts fetched.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'city_name' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'postal_code' => 'required',
            'country_id' => 'required',
        ]);
        $city = new City();
        $city->city_name = $request->input('city_name');
        $city->postal_code = $request->input('postal_code');
        if ($city->photo != null) {
            $file = $request->file('photo');
            $path = $file->store('public');
            $fileName = $file->hashName();
            $city->photo = $fileName;
        }
        $city->postal_code = $request->input('postal_code');
        $city->country_id = $request->input('country_id');
        $city->save();
        return $this->sendResponse(new ResourcesCity($city), 'City created.');
    }
    public function edit($id)
    {
        $city = City::find($id);
        if (is_null($city)) {
            return $this->sendError('City not found.');
        }
        return $this->sendResponse(new ResourcesCity($city), 'City fetched.');
    }
    public function update(Request $request, $id)
    {
        $city = City::find($id);
        if (is_null($city)) {
            return $this->sendError('City not found.');
        }
        $request->validate([
            'city_name' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'postal_code' => 'required',
            'country_id' => 'required',
        ]);
        $city->city_name = $request->input('city_name');
        $city->postal_code = $request->input('postal_code');
        if ($city->photo != null) {
            $file = $request->file('photo');
            $path = $file->store('public');
            $fileName = $file->hashName();
            $city->photo = $fileName;
        }
        $city->postal_code = $request->input('postal_code');
        $city->save();
        return $this->sendResponse(new ResourcesCity($city), 'City updated.');
    }
}
