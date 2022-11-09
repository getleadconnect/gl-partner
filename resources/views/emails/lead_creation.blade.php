
@component('mail::message')

# {{$verifiedUser['title'] }}

  Hii, New lead has been added via the partner portal !!!

  >**Name:** {{$verifiedUser['name']}}  
  >
  >**Email:** {{$verifiedUser['email']}}  


Thanks,<br>
GL-Partner
@endcomponent