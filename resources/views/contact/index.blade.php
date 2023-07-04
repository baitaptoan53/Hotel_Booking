@extends('layouts.master')
@section('title', 'Contact')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{__('messages.contact')}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{route('home.index')}}">{{__('messages.home')}}</a></li>

                    <li class="breadcrumb-item text-white active" aria-current="page">{{__('messages.contact')}}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Booking Start -->
@include('layouts.search')
<!-- Booking End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">{{__('messages.contact us')}}</h6>
            <h1 class="mb-5"><span class="text-primary text-uppercase">{{__('messages.contact')}}</span>
                {{__('messages.For Any Query')}}</h1>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <h6 class="section-title text-start text-primary text-uppercase">{{__('messages.BOOKING')}}</h6>
                        <p><i class="fa fa-envelope-open text-primary me-2"></i>book@example.com</p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="section-title text-start text-primary text-uppercase">{{__('messages.GENERAL')}}</h6>
                        <p><i class="fa fa-envelope-open text-primary me-2"></i>info@example.com</p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="section-title text-start text-primary text-uppercase">{{__('messages.TECHNICAL')}}
                        </h6>
                        <p><i class="fa fa-envelope-open text-primary me-2"></i>tech@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                    frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
            <div class="col-md-6">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form method="POST" action="{{route('contact.us.store')}}">
                        {{ csrf_field() }}
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name"
                                        name="name">
                                    <label for="name">Your Name</label>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email"
                                        name="email">
                                    <label for="email">Your Email</label>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject"
                                        name="subject">
                                    <label for="subject">Your Subject</label>
                                    @if ($errors->has('subject'))
                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="phone" placeholder="phone" name="phone">
                                    <label for="phone">Your Phone</label>
                                    @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 150px" name="message"></textarea>
                                    <label for="message">Message</label>
                                    @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">{{__('messages.Send
                                    message')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


<!-- Newsletter Start -->
<div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="row justify-content-center">
        <div class="col-lg-10 border rounded p-1">
            <div class="border rounded text-center p-1">
                <div class="bg-white rounded text-center p-5">
                    <h4 class="mb-4">{{__('messages.Subscribe to our')}} <span
                            class="text-primary text-uppercase">{{__('messages.newsletter')}}</span></h4>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                        <button type="button"
                            class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">{{__('messages.Submit')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Start -->
@endsection
@push('scripts')
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
  
    $('#search').select2({
        placeholder: '{{__('messages.Select an city')}}',
        tags: true,
        ajax: {
          url: path,
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.city_name,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });
</script>
@endpush