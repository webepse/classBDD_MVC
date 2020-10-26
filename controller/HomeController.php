<?php
    namespace App;

use Exception;

require "model/Autoloader.php";
    Autoloader::register();

    class HomeController{
        public static function listPosts($limit = "")
        {
            $manager = new PostManager(); // création d'un objet
            $posts = $manager->getPosts($limit); // appel à la méthode de cet objet

            require("view/frontend/listPostView.php");
        }

        public static function getPost()
        {
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            $id = htmlspecialchars($_GET['id']);
            $post = $postManager->getPost($id);
            $comments = $commentManager->getComments($id);

            require('view/frontend/postView.php');
        }

        public static function addComment($postID,$author,$comment)
        {
            $manager = new CommentManager();

            $results = $manager->postComment($postID,$author,$comment);

            if($results === false){
                throw new Exception('Impossible d\'ajouter le commentaire');
            }else{
                header("LOCATION:index.php?action=post&id=".$postID);
            }
        }

        public static function showComment($id)
        {
            $manager = new CommentManager();
            $comment = $manager->getComment($id);

            require("view/frontend/commentView.php");
        }

        public static function updateComment($commentID, $author, $comment, $postID){
            $manager = new CommentManager();
            $resultat = $manager->updateComment($commentID,$author,$comment);
            if($resultat === false){
                throw new Exception('Impossible de modifier le commentaire');
            }else{
                header("LOCATION:index.php?action=post&id=".$postID);
            }
        }


    }

?>