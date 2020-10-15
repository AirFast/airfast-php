<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <style>

    </style>
</head>
<body>

<h1>Edit: <?php echo $item->title; ?></h1>

<a href="/admin/add">Add new</a>

<form action="/admin/update?id=<?php echo $item->id; ?>" method="post">

    <p><input type="text" name="title" value="<?php echo $item->title; ?>" placeholder="Article title"></p>
    <p>
		<textarea name="text" cols="30" rows="10" placeholder="Article text">
		    <?php echo $item->text; ?>
	    </textarea>
    </p>
    <input type="submit">

</form>

</body>
</html>