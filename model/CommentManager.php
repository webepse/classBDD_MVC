<?php
    namespace App;
    use \PDO;

    class CommentManager extends Manager{

        public function getComments($postID){
            $comments = $this->dbConnect()->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %Hh%imin%ss") AS date FROM comments WHERE post_id=? ORDER BY comment_date DESC');
            $comments->execute([$postID]);
            $datas = $comments->fetchAll(PDO::FETCH_OBJ);
            $comments->closeCursor();
            return $datas;
        }

    }