<?php

        class Articles extends Controller{
            private $articles; //Pour l'exemple
            public function index($id=null){
                $laTable = Model::load('produit');
                $this->articles = $laTable->find(Model::connexion());
                $laTable->deconnexion();
                $laTable=null;
                $variable['articles']=$this->articles;
                $this->set($variable);
                $this->render("index");
            }
            
               
       
        }

        ?>
