<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin: Add New</title>
    <style>

    </style>
</head>
<body>

<h1>Add New</h1>

<a href="/admin/add">Add new</a>

<form action="/admin/insert" method="post">

    <p><input type="text" name="title" placeholder="Article title"></p>
    <p>
		<textarea name="text" cols="30" rows="10" placeholder="Article text"></textarea>
    </p>
    <input type="submit">

</form>

</body>
</html>