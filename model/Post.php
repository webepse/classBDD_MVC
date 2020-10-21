<?php

namespace App;

class Post{

    public function getURL(){
        return 'index.php?action=post&id='.$this->id;
    }

    public function getExtrait(){
        $texte = strip_tags($this->content);
        if(preg_match('#(\w+\W+){20}\w+#s',$texte, $out)){
            $html = "<div>".$out[0]."...<a href='".$this->getURL()."'>Voir la suite</a></div>";
        }
        else{
            $html = "<div>".$texte."</div>";
        }

        return $html;

    }

}