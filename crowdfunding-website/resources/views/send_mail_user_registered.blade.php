<!doctype html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body style="font-family: sans-serif;">
    <div style="display: block; margin: auto; max-width: 600px;" class="main">
      <h1 style="font-size: 18px; font-weight: bold; margin-top: 20px">Selamat {{ $name }}, anda telah terdaftar di aplikasi kami.</h1>
      <p>Berikut OTP code anda:</p>

      <div style="background-color: orange">
        <div style="color: white; text-align: center; padding: 0.5em;">
            {{ $otp }}
        </div>
      </div>
      
      <p>Gunakan sebelum 5 menit dari sekarang</p>
      <p>Good luck! Hope it works.</p>
    </div>

    <style>
      .main { background-color: white; }
      a:hover { border-left-width: 1em; min-height: 2em; }
    </style>
  </body>
</html>