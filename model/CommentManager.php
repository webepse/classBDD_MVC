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

        public function postComment($postID, $author, $comment)
        {
            $insert = $this->dbConnect()->prepare("INSERT INTO comments(post_id,author,comment,comment_date) VALUES(?,?,?,NOW())");
            $result = $insert->execute([$postID,$author,$comment]);
            return $result;  
        }

        public function getComment($commentID)
        {
            $comment = $this->dbConnect()->prepare('SELECT id, author, comment, post_id AS postId, DATE_FORMAT(comment_date, "%d/%m/%Y %Hh%imin%ss") AS date FROM comments WHERE id=?');
            $comment->execute([$commentID]);
            $datas = $comment->fetch(PDO::FETCH_OBJ);
            $comment->closeCursor();
            return $datas;
        }

        public function updateComment($commentID, $author, $comment)
        {
            $update = $this->dbConnect()->prepare("UPDATE comments SET author=:author, comment=:com WHERE id=:myId");
            $result = $update->execute([
                ":author"=>$author,
                ":com"=>$comment,
                ":myId"=>$commentID
            ]);
            return $result;
        }


    }