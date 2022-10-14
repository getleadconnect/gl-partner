<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>getlead</title>
       <link rel="stylesheet" type="text/css" href="{{ asset('frontend/style-main.css') }}" media="all" />
      <link rel="stylesheet"  type="text/css" href="{{ asset('frontend/style-main.css') }}">

    <link rel="stylesheet"  type="text/css" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.css') }}">

    <link rel="preconnect"   type="text/css" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('frontend/image/Frame.png')}}" alt="logo"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                  </li>
                </ul>
                <div class="ml-auto">
                  @if(Auth::User())
                    <a href="{{url('login')}}"><button type="button" class="btn btn-outline-danger">{{Auth::user()->name}}</button></a>
                  @else
                    <a href="{{url('login')}}"><button type="button" class="btn btn-outline-danger">Login</button></a>
                  @endif

                    {{-- <button type="button" class="btn btn-danger"><a href="{{url('/signup')}}">Sign Up</a></button> --}}
                </div>
              </div>
            </div>
          </nav>
    </section>

         @yield('content')

    <section class="footer">
        <div class="container">
            <div class="row">
                <h6 class="right">© 2022 Getlead. All rights reserved.</h6>
                <div class="col-lg-4"></div>
                <div class="">
                    <ul class="list-footer">
                       <a href="#"><li class="li-footer"><p>Terms</p></li></a>
                       <a href="#"><li class="li-footer"><p>Partner with Us</p></li></a>
                       <a href="#"><li class="li-footer"><p>Privacy policy</p></li></a>
                       <a href="#"> <li class="li-footer"><p>Login</p></li></a>
                       <a href="#"><li class="li-footer"><p>signup</p></li></a>
                      </ul>
                </div>
            </div>
        </div>
    </section>








    <script src="{{ asset('frontend/assets/jquery/jquery2.js') }}"></script>
    <script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.js') }}"></script>
       @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
  <style type="text/css">
    .swal2-icon .swal2-icon-content {
      font-size: 1.75em;
    }
    .swal2-icon {
      width: 3em !important;
      height: 3em !important;
    }
    .swal2-title {
      font-size: 1.6em !important;
    }
    .swal2-content, .swal2-html-container{
      font-size: 1.15em !important;
    }
    .swal2-icon.swal2-success [class^=swal2-success-line][class$=tip] {
      top: 1.9em;
      left: 0.3em;
      width: 1.1em;
    }
    .swal2-icon.swal2-success [class^=swal2-success-line][class$=long] {
      top: 1.475em;
      right: 0.3em;
      width: 1.7em;
    }
    .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left] {
      left: 0.4625em;
    }
    .swal2-icon.swal2-error [class^=swal2-x-mark-line] {
      top: 1.3125em;
      width: 2.1375em;
      height: 0.3125em;
    }
    .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right] {
      right: 0.4em;
    }
    .swal2-confirm.swal2-styled{
      background-color: #203D5B !important;
    }
    .inline_text_logo{
      margin-bottom: -1px;
    }

</style>
 @stack('scripts')
</body>
</html>
