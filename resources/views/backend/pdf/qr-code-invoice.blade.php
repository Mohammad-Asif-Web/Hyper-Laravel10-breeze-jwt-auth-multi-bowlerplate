<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qr Code Image | PDF</title>
</head>
<body>

    <img src=".{{ asset('frontend/images/logo.png') }}" alt="logo" style="text-align:center;margin: 0 auto;" />

    <center>
        {{-- <h3 >Tribute Tiles</h3>
        <p>Scan QR, Honor Legacy</p> --}}
        <h3 style="margin-top: 50px;color:#00A3FF;">Scan This QR Code</h3>
        <p style="color:#00A3FF;">To Create a Profile For Your Memorial One</p>

        <img src=".{{asset($qrCode->image_url)}}" alt="" height="320", width="300" style="margin-top: 200px;display:block">

        <p>{!! $qrCode->code !!}</p>
        {{-- {!!$qrCode->image_url!!} --}}

    </center>

</body>
</html>
