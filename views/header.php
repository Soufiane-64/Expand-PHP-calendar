<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="calendar.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time();?>">
    <title><?= isset($title) ? h($title) : 'Kalendar'; ?></title>

</head>

<body>