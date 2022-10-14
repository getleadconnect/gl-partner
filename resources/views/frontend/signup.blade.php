@extends('layouts.frontend')
@section('content')



    <section class="section-4">
        <div class="container">
            <div class="col-lg-8 offset-sm-2">
                <div class="rectangle4">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Error!</strong> {{ Session::get('error') }}
                        </div>
                    @endif
                    <form class="kt-form kt-form--fit kt-form--label-right"
                        action="{{ url('signup-frontend') }}" method="get" enctype="multipart/form-data">

                        <div class="form-group">


                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3 rowq">
                                    <label for="name" id="form-name">Name*</label>
                                    <input type="text" class="form-control" id="name" value="{{old('name')}}"
                                        aria-describedby="emailHelp" placeholder="Enter Name" name="name" required>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-3 rowq">
                                    <label for="mobile" id="form-name">Mobile Number*</label>
                                    <input type="number" class="form-control" id="mobile"
                                        placeholder="Mobile Number" name="mobile" value="{{old('mobile')}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3 rowq">
                                    <label for="company_name" id="form-name">Company Name*</label>
                                    <input type="text" class="form-control" id="company_name"
                                        aria-describedby="emailHelp" placeholder="Company Name" name="company_name"
                                        value="{{old('company_name')}}" required>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-3 rowq">
                                    <label for="email" id="form-name">Work Email*</label>
                                    <input type="email" class="form-control" id="email" value="{{old('email')}}"
                                        placeholder="workmail@example.com" name="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3 rowq">
                                    <label for="website" id="form-name">Website*</label>
                                    <input type="website" class="form-control" id="website" value="{{old('website')}}"
                                        aria-describedby="emailHelp" placeholder="www.example.com" name="website" required>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-3 rowq">
                                    <label for="team_size" id="form-name">Team Size</label>
                                    <input type="number" class="form-control" id="team_size"
                                        placeholder="Enter Team size" name="team_size" value="{{old('team_size')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3 rowq">
                                    <label for="exampleInputEmail1" id="form-name">Country</label>

                                    <select placeholder="Country" name="country" id="country">
                                        <option value="0" selected disabled>Select Country</option>
                                        @foreach($countries as $key =>$countries)
                                          <option value="{{ $key }}">{{$countries}}</option>
                                          @endforeach

                                    </select>
                                   <input type="hidden" class="countrys" id="countrys" value="" name="countrys" >
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-3 rowq">
                                    <label for="state" id="form-name">State</label>
                                    <select placeholder="State" name="state" id="state">
                                        <option value="0" selected disabled>Select State</option>
                                    </select>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3 rowq">
                                    <label for="city" id="form-name">City</label>
                                    <input type="text" class="form-control" id="city" value="{{old('city')}}"
                                        aria-describedby="city" placeholder="City" name="city">
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-3 rowq">
                                    <label for="pin_code" id="form-name">Pin Code</label>
                                    <input type="number" class="form-control" id="pin_code" value="{{old('pin_code')}}"
                                        placeholder="Pin code" name="pin_code">
                                </div>
                            </div>
                            <div class="col-lg-5 offset-sm-3">
                                <button type="submit" class="btn lbtn-danger ">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@push('scripts')
<script>
    $(document).ready(function(){
        var BaseUrl = location.origin;

        $('#country').on('change',function(){
            // $("#state").empty();
            var country = $('#country').val();
            $.ajax({
                url:BaseUrl + '/state/'+ country,
                success: function(data){
                    // console.log(data);
                    $.each(data.states, function(key, value) {
                        $('#state')
                            .append($("<option></option>").attr("value", key).text(value));
                    });
                }
            })
        })
    });
</script>
@endpush
@endsection
