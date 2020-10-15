<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f6f6f6;
        }
    </style>
</head>
<body>

<h1>Articles</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Article</th>
        <th colspan="2"><a href="/admin/add">+ Add new</a></th>
    </tr>

	<?php foreach ($items as  $item) : ?>

        <tr>
            <td><?php echo $item->id; ?></td>
            <td>
                <h3><?php echo $item->title; ?></h3>
	            <p><?php echo $item->text; ?></p>
            </td>
            <td><a href="/admin/edit?id=<?php echo $item->id; ?>">Edit</a></td>
            <td><a href="/admin/delete?id=<?php echo $item->id; ?>">Delete</a></td>
        </tr>

	<?php endforeach; ?>

</table>

</body>
</html>