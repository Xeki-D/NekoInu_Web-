<?php
     class Controller {
        protected $vars=array();
        protected $layout = "template";

        protected function set($id){
        $this->vars=array_merge($this->vars,$id);
        
        }
        protected function render($filename){
            extract($this->vars);
            ob_start();
            extract($this->vars);
            $chemin=ROOT."view/".strtolower(get_class($this))."/".
            $filename.".php";
            require($chemin);
            $content_for_layout=ob_get_clean();
            if($this->layout == false){
            echo $content_for_layout;
            }else{
            require(ROOT.'view/layout/'.$this->layout.'.php');
            }
           }
    }

    
?>