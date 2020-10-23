<?php
    namespace App;

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

    }

?>