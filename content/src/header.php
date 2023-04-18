<!DOCTYPE html>
<html lang="ru">
<?php 
require __DIR__ . '/../../auth/src/bootstrap.php'; ?>
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="АСИС, ASIS, Автоматические системы и сети">
        <meta name="description" content="Компания «Автоматические системы и сети» создана для повышения эффективности информационно-аналитической и управленческой деятельности любого предприятия. Компания создана в 2017 году, и по сей день автоматизирует деятельность предприятий на базе 1С, оказывала информационную поддержку.">
        <title>ООО АСиС</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/../../css/style.css">
        <link rel="stylesheet" href="/../../css/responsive.css">
        <link rel="icon" href="/../../img/icon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
        <body data-spy="scroll">   
            <nav class="navbar nabvar-fixed-top topnav navbar-default" role="navigation">
                <a class="navbar-brand" href="/index.php"><img src="/img/ASiSLogo.svg" alt="АСИС"></a></a>
                <div class="container-fluid navbar-contain">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Раскрыть меню навигации</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>  
                    <div class="collapse navbar-collapse navbar-left">
                        <ul class="nav navbar-nav">    
                            <li><a href="/index.php">О Компании</a></li>
                            <li><a href="/Shop.php">Магазин</a></li> 
                            <?php 
                                if (is_user_logged_in() && is_user_admin()) { ?><li><a href="/admin.php">Админка</a></li><?php }
                            ?>
                        </ul>
                    </div>
                    <?php  
                        if (!is_user_logged_in()) {
                            include __DIR__ . '/SignedOut.php';
                        }
                        else
                        {
                            include __DIR__ . '/SignedIn.php';
                        }
                    ?>
                </div>
            </nav>  