
@component('mail::message')

# {{$verifiedUser['title'] }}

  Hii, New lead has been added via the partner portal !!!

  >**Partner:** {{$verifiedUser['partner_name']}}  
  >**Name:** {{$verifiedUser['name']}}  
  >**Email:** {{$verifiedUser['email']}}  
  >**Plan:** {{$verifiedUser['plan']}}  
  >**Mobile:** {{$verifiedUser['mobile']}}  


Thanks,<br>
GL-Partner
@endcomponent