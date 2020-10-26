<?php
namespace App;

use Exception;

require('controller/HomeController.php');

try{
    if(isset($_GET['action'])){
        if($_GET['action']=='listPosts')
        {
            HomeController::listPosts(5);
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
        }elseif($_GET['action']=="addComment"){
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                if(!empty($_POST['author']) && !empty($_POST['comment'])){
                    HomeController::addComment($_GET['id'],$_POST['author'],$_POST['comment']);
                }else{
                    header("LOCATION:index.php?action=post&id=".$_GET['id']."&err=1");
                }

            }else{
                throw new Exception('Aucun identifiant d\'article est envoyé');
            }
        }elseif($_GET['action']=="viewComment"){
            if(isset($_GET['id']) && $_GET['id'] > 0){
                HomeController::showComment($_GET['id']);
            }else{
                throw new Exception('Aucun identifiant de commentaire est envoyé');
            }
        }elseif($_GET['action']=="upComment")
        {
            if(isset($_GET['id'])){
                if(!empty($_POST['comment']) && !empty($_POST['author'])){
                    HomeController::updateComment($_GET['id'],$_POST['author'],$_POST['comment'],$_POST['postId']);
                }else{
                    header("LOCATION:index.php?action=viewComment&id=".$_GET['id']."&err=1");
                }
            }else{
                throw new Exception('Aucun identifiant de commentaire est envoyé');
            }
        }
    }else{
        HomeController::listPosts(5);
    }

}catch(Exception $e){
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}