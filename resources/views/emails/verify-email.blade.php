@component('mail::message')
@component('mail::button', ['url'=>$url])
Verrify Email
@endComponent
# Order Shipped
 
Your order has been shipped!
 

 
Thanks
{{ config('app.name') }}
@endComponent