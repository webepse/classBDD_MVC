<?php
namespace App;
use \PDO;

class PostManager extends Manager{
    
    public function getPosts($limit)
    {
        if($limit == "")
        {
            $req = $this->dbConnect()->query("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y %Hh%imin%ss') AS date FROM posts ORDER BY creation_Date DESC");
        }
        else{
            $req = $this->dbConnect()->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y %Hh%imin%ss') AS date FROM posts ORDER BY creation_Date DESC LIMIT 0,:myLimit");
            $req->bindParam(':myLimit', $limit, PDO::PARAM_INT);
            $req->execute();
        }
        $datas = $req->fetchAll(PDO::FETCH_CLASS, 'App\Post');
        $req->closeCursor();
        return $datas;
    }

    public function getPost($postID)
    {
        $req = $this->dbConnect()->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y %Hh%imin%ss') AS date FROM posts WHERE id=?");
        $req->execute([$postID]);
        $datas = $req->fetch(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $datas;
    }
  

}


