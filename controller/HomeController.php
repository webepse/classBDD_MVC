<?php
    namespace App;

    require "model/Autoloader.php";
    Autoloader::register();

    class HomeController{
        public static function listPosts()
        {
            $manager = new PostManager(); // création d'un objet
            $posts = $manager->getPosts(); // appel à la méthode de cet objet

            require("view/frontend/listPostView.php");
        }

        public static function getPost()
        {
            $postManager = new PostManager();
            $id = htmlspecialchars($_GET['id']);
            $post = $postManager->getPost($id);

            require('view/frontend/postView.php');
        }

    }

?>