<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Register</h1>
<form action="/register" method="post">
    @csrf
    <input type="name" placeholder="enter name" name="name" id="name" required><br>
    <input type="email" placeholder="enter email" name="email" id="email" required><br>
    <input type="password" placeholder="enter password" name="password" id="password" required><br>
    <button type="submit"> Отправить </button>
</form>
</body>
</html>
