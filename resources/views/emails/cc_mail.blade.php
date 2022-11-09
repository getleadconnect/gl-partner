@component('mail::message')

# {{$verifiedUser['title'] }}

  Hii, New partner has been added to the partner program !!!

  >**Name:** {{$verifiedUser['name']}}  
  >
  >**Email:** {{$verifiedUser['email']}}  


Thanks,<br>
GL-Partner
@endcomponent