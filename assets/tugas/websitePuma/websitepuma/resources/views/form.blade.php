<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css"href="{{url('assets/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <title>Form</title>
</head>
<body>
    <form action="/payment" method="GET">
        <h1>Data diri</h1>
        <div class="formcontainer">
        <hr/>
        <div class="container">
          <label for="uname"><strong>Nama</strong></label>
          <input type="text" placeholder="masukan nama" name="uname" required>
          <label for="email"><strong>Email</strong></label>
          <input type="text" placeholder="masukan Email" name="email" required>
          <label for="phone"><strong>Nomor telepon</strong></label>
          <input type="text" placeholder="masukan Nomor telepon" name="phone" required>
        </div>
        <button type="submit">Submit</button>
      </form>
      @if(session('alert-success'))
      <script>alert("{{session('alert-success')}}")</script>
      @elseif(session('alert-failed'))
      <script>alert("{{session('alert-failed')}}")</script>
      @endif
</body>
</html>