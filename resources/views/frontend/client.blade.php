@extends('layouts.frontend')
@section('content')
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
