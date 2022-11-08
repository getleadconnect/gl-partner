@extends('layouts.frontend')
@section('content')
 <section class="section2">
	@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message') }}
    </div>
@endif
        <div class="container">
            <div class="col-lg-6 offset-2">
                <h2 class="heading">Become a <br> <span class="heading2"> Channel Partner</span></h2>
            </div>
        </div>

        <div class="container">
            <div class="col-lg-7 offset-2">
                <p class="para">We would be privileged to have you as one of our partners. Join GetLead <br>family today and drive your business forward & increase your revenue. Let's grow together!</p>
            </div>
        </div>

    </section>

    <section class="section3">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <div class="rectangle">
                        <div class="arm-image">
                            <img src="{{asset('frontend/image/arm-wrestling 1.png')}}" class="arm">
                        </div>
                        <p class="arm-para">Join our <br> partner program</p>
                    </div>
                </div>

                <div class="col-lg-3 rect_1">
                    <div class="rectangle">
                        <div class="team-image">
                            <img src="{{asset('frontend/image/team 1.png')}}" class="team">
                        </div>
                        <p class="team-para">Start selling <br>  behalf of Getlead</p>
                    </div>
                </div>

                <div class="col-lg-3 rect_2">
                    <div class="rectangle">
                        <div class="growth-image">
                            <img src="{{asset('frontend/image/growth 1.png')}}" class="growth">
                        </div>
                        <p class="growth-para">Increase your <br> Income </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class=" text-center"><h3 class="register">Register now</h3></div>
            <div class="arrow text-center">
                <img src="{{asset('frontend/image/bi_arrow-down-circle-fill.png')}}" class="down-arrow">
            </div>
        </div>
    </section>

    <section class="section4">
        <div class="container">
            <div class="row ">
                <div class="col-lg-3"></div>
                <div class="col-lg-5 ml-5">
                    <img src="{{asset('frontend/image/Group 1.png')}}" class="group1">
                </div>
            </div>
        </div>



        <div class=" text-center">
            <h3 class="heading3">Channel Partner  <br> <span class="heading4"> Registration Form</span></h3>
            <p class="para2">We would be privileged to have you as one of our partners. Join GetLead family today and drive <br> your business forward & increase your revenue. Let's grow together!</p>
        </div>


    </section>

    <section class="section-4">
        <div class="container">
            <div class="col-lg-8 offset-sm-2">
                <div class="rectangle4">
                	 @if (count($errors) > 0)
         <div class = "alert alert-danger alert-dismissible">
         	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <form class="kt-form kt-form--fit kt-form--label-right" action="{{ url('business-registration-frontend') }}" method="post"  enctype="multipart/form-data">

                    <div class="form-group">


                                {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-3 rowq">
                                <label for="exampleInputEmail1" id="form-name">Name*</label>
                                <input type="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name" required>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-3 rowq">
                                <label for="exampleInputPassword1" id="form-name">Mobile Number*</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Mobile Number" name="mobile" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-3 rowq">
                                <label for="exampleInputEmail1" id="form-name">Company Name*</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Company Name" name="company_name" required>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-3 rowq">
                                <label for="exampleInputPassword1" id="form-name">Work Email*</label>
                                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="workmail@example.com" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-3 rowq">
                                <label for="exampleInputEmail1" id="form-name">Website*</label>
                                <input type="website" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="www.example.com" name="website" required>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-3 rowq">
                                <label for="exampleInputPassword1" id="form-name">Team Size</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Team size" name="team_size">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-3 rowq">
                                <label for="exampleInputEmail1" id="form-name">Country</label>

                                <select placeholder="Country" name="country" id="country">
                                    <option value="0" selected>Select Country</option>
                                    @foreach($countries as $key =>$countries)
                                      <option value="{{ $key }}">{{$countries}}</option>
                                      @endforeach

                                </select>
                               <input type="hidden" class="countrys" id="countrys" value="" name="countrys" >
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-3 rowq">
                                 <label for="exampleInputPassword1" id="form-name">State</label>
                                <select  placeholder="State" name="state" id="state">
                                    <option value="0" selected>Select State</option>
                                </select>


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-3 rowq">
                                <label for="exampleInputEmail1" id="form-name">City</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="City" name="city">
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-3 rowq">
                                <label for="exampleInputPassword1" id="form-name">Pin Code</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Pin code" name="pin_code">
                            </div>
                        </div>
                            <div class="col-lg-5 offset-sm-3">
                                <button type="submit" class="btn lbtn-danger ">Become a Partner</button>
                            </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>


        @push('scripts')


<script type="text/javascript">


$('#country').change(function(){
    var selectedText = $(this).find('option:selected').text();
    // alert(selectedText);

 $('#countrys').val(selectedText);
        var country = $('#country').val();
        // alert(country);
        $.ajax({
            type:"GET",
             url:"{{url('country')}}?country="+country,
            success : function(response){
                // console.log(response);
                if (response) {
                    $('#state').empty();
                                $.each( response, function( key, value ) {
                                    console.log( key + ": " + value );
                                    $("#state").append('<option value="'+value+'">'+value+'</option>');
                                });
                    // $.each(response,function(index){
                    //      $("#state").append('<option value="'+response+'">'+response+'</option>');
                    // });
                }
            }
        })
    });


</script>

@endpush
@endsection
