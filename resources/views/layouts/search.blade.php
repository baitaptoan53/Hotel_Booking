<!-- Booking Start -->
<div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="bg-white shadow" style="padding: 35px;">
            <form method="get" action="{{ route('search') }}">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" placeholder="Check in"
                                        data-target="#date1" data-toggle="datetimepicker" name="check_in" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" placeholder="Check out"
                                        data-target="#date2" data-toggle="datetimepicker" name="check_out" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" id="search" name="city_name"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">Search</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Booking End -->