<x-mail::message>
# Hepsi Trend Onaylanan Hizmet Faturasi

Merhaba {{$data['user_name']}}
<br>
<br>
Siparis Kodu : {{$data['order_id']}}
<br>
<br>
Urun Ismi : {{$data['product_name']}}
<br>
<br>
Adet : {{$data['quantity']}}
<br>
<br>
Fiyat : {{$data['price']}} TL
<br>
<br>
Toplam :{{$data['quantity'] * $data['price']}}  TL
<br>
<br>



Bizi tercih ettiğiniz için teşekkür ederiz.Unutmayin bizde hepsi trenddir,<br>
{{ config('app.name') }}
</x-mail::message>
