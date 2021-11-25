<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="shortcut icon" href="assets/img/favico.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <?php
        if($_SERVER['PHP_SELF'] == '/sajt/index.php'):
    ?>
    <title>Početna</title>
    <?php
        endif;
    ?>
    <?php
        if($_SERVER['PHP_SELF'] == '/sajt/login.php'):
    ?>
    <title>Prijava</title>
    <?php
        endif;
    ?>
    <?php
        if($_SERVER['PHP_SELF'] == '/sajt/register.php'):
    ?>
    <title>Registracija</title>
    <?php
        endif;
    ?>
    <?php
        if($_SERVER['PHP_SELF'] == '/sajt/onama.php'):
    ?>
    <title>O nama</title>
    <?php
        endif;
    ?>
    <?php
        if($_SERVER['PHP_SELF'] == '/sajt/kontakt.php'):
    ?>
    <title>Kontakt</title>
    <?php
        endif;
    ?>
    <?php
        if($_SERVER['PHP_SELF'] == '/sajt/autor.php'):
    ?>
    <title>Autor</title>
    <?php
        endif;
    ?>
    <?php
        if($_SERVER['PHP_SELF'] == '/sajt/panel.php'):
    ?>
    <title>Admin panel</title>
    <?php
        endif;
    ?>
    <?php
        if($_SERVER['PHP_SELF'] == '/sajt/anketa.php'):
    ?>
    <title>Anketa</title>
    <?php
        endif;
    ?>
</head>
<body>