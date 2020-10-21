<?php
namespace App;

require('controller/HomeController.php');

    if(isset($_GET['action'])){

    }else{
        HomeController::listPost();
    }