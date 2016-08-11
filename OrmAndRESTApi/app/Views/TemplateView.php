<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT']; ?> /css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Main</title>
</head>
<body>
    <div class="wrap">
        <header><h1>Magento REST API Panel</h1></header>
        <?php include 'app/Views/' . $contentView; ?>
        <!-- <footer>&copy; All rights reserved </footer> -->
    </div>
</body>
</html>
