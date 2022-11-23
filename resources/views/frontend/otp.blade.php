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
                     <form class="kt-form kt-form--fit kt-form--label-right" action="{{ url('otp-verfication') }}"
                         method="post" enctype="multipart/form-data">

                         <div class="form-group">


                             {{ csrf_field() }}
                             <div class="row">
                                 <div class="col-lg-1"></div>
                                 <div class="col-lg-11 rowq">
                                     <label for="exampleInputEmail1" id="form-name">Enter the mail otp*</label>
                                     <input type="text" style="width: 600px;" class="form-control"
                                         id="exampleInputEmail1" aria-describedby="emailHelp" name="otp" required>
                                 </div>

                             </div>




                             <div class="col-lg-5 offset-sm-3">
                                 <button type="submit" class="btn lbtn-danger ">Submit</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </section>

     @push('scripts')
         <script type="text/javascript">
             $('#country').change(function() {
                 var selectedText = $(this).find('option:selected').text();
                 alert(selectedText);

                 $('#countrys').val(selectedText);
                 var country = $('#country').val();
                 // alert(country);
                 $.ajax({
                     type: "GET",
                     url: "{{ url('country') }}?country=" + country,
                     success: function(response) {
                         // console.log(response);
                         if (response) {
                             $('#state').empty();
                             $.each(response, function(key, value) {
                                 console.log(key + ": " + value);
                                 $("#state").append('<option value="' + value + '">' + value +
                                     '</option>');
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
