<?php
    namespace App;

    require "model/Autoloader.php";
    Autoloader::register();

    class HomeController{
        public static function listPost()
        {
            $manager = new PostManager(); // création d'un objet
            $posts = $manager->getPosts(); // appal à la méthode de cet objet

            require("view/frontend/listPostView.php");
        }
    }

?>