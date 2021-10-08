<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login </title>
</head>
<body>
<h1> Login </h1>
<br>
<form action="/login" method="post">
    @csrf
    <input type="email" placeholder="enter email" name="email" id="email" required><br>
    <input type="password" placeholder="enter password" name="password" id="password" required><br>
    <button type="submit"> Отправить </button>
</form>
@if ($errors->any())
    <ul class="errors">
        @foreach($errors->all() as $error)
            <li>{{  $error  }}</li>
        @endforeach
    </ul>
@endif
</body>
</html>
