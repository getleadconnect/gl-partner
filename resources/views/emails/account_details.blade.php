@component('mail::message')

# {{$verifiedUser['title'] }}

    Welcome to Getlead Partnership Program. Please find your login details below.  


  >**Username:** {{$verifiedUser['user_name']}}  
  >
  >**Password:** {{$verifiedUser['password']}}  

@component('mail::button', ['url' => 'https://partner.getlead.co.uk/login'])

Click here to Login 
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent