<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @switch($role)
    @case('admin')
        <h1>You are an administrator.</h1>
         @break
         @case('penulis')
        <p>You are a writer.</p>
        @break
        @default
        <p>peran tidak dikenal</p>
        @endswitch
</body>
</html>