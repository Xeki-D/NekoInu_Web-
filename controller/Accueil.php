<?php
    

    class Accueil extends Controller {
        
        public function index($id=null){ 
        $variable['accueil']=array("titre"=>"L'accueil du site", "description"=>"Le texte de l'accueil");
        
        $this->set($variable); 
        $this->render("index");
        }


    }       
    
?>