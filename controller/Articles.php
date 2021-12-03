<?php

        class Articles extends Controller{
            private $articles; //Pour l'exemple
            public function article($id=null){
                $laTable = Model::load('produit');
                $this->articles = $laTable->find(Model::connexion());
                $laTable->deconnexion();
                $laTable=null;
                $variable['articles']=$this->articles;
                $this->set($variable);
                $this->render("article");
            }
            public function findarticle(){
                if(isset($_POST['valider'])) {
                    $laTable = Model::load('produit');
                    $motEntree = htmlentities($_POST['recherche']);
                    $var='NOM_PRODUIT LIKE \'%'.$motEntree.'%\'';
                    $array=array('condition'=>$var);
                    $this->articles = $laTable->find(Model::connexion(),$array);
                    $variable['articles']=$this->articles;
                    $this->set($variable);
                    $this->render("article");
                    
                    //die();
                    
                    

            }
            
               
       
        }
    }

        ?>
