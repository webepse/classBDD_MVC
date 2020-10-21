<?php
namespace App;

use Exception;

require('controller/HomeController.php');

try{
    if(isset($_GET['action'])){
        if($_GET['action']=='listPosts')
        {
            HomeController::listPosts();
        }
        elseif($_GET['action']=="post")
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                HomeController::getPost();
            }else{
                // erreur, on arrête tout et on envoie vers une page d'erreur
                throw new Exception('Aucun identifiant d\'article est envoyé');
            }
        }
    }else{
        HomeController::listPosts();
    }

}catch(Exception $e){
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}