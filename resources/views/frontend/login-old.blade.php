 @extends('layouts.frontend')
@section('content')



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
            @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible">
                      <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error!</strong> {{ Session::get('error') }}
                    </div>
                    @endif
         <form class="kt-form kt-form--fit kt-form--label-right" action="{{ url('login') }}" method="post"  enctype="multipart/form-data">

                    <div class="form-group">


                                {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-3 rowq">
                                <label for="exampleInputEmail1" id="form-name">Email*</label>
                                <input type="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address" name="email" required>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-3 rowq">
                                <label for="exampleInputPassword1" id="form-name">Password*</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
                            </div>
                        </div>




                            <div class="col-lg-5 offset-sm-3">
                                <button type="submit" class="btn lbtn-danger ">Login</button>
                            </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
   @endsection
