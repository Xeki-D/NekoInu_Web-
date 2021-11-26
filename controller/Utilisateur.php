<?php
class  Utilisateur extends Controller
{
    public function connexion ()
    {
        //var_dump($_POST);
        if(isset($_POST['Valider'])) {
            $table=Model::load('client');
            $utilisateur=$table->find(Model::connexion(),array("condition"=>"ADR_CLIENT='".$_POST['email']."' AND MDP_CLIENT='".$_POST['mdp']."'"));
            Model::deconnexion();
            $table=null;
            var_dump($utilisateur);

        }else{
            $this->render('connexion');
        }
        
        
    }

    public function inscription()
    {
        if(isset($_POST['Valider'])){
        $table=Model::load('client');
        $data=array("NOM_CLIENT"=> ($_POST['nom']),"PRENOM_CLIENT"=>($_POST['prenom']),"MDP_CLIENT"=>($_POST['mdp']),"ADR_CLIENT"=>($_POST['adr']),"VILLE_CLIENT"=>($_POST['ville']),"CP_CLIENT"=>($_POST['cp']));
        $resultat=$table->insert(Model::connexion(),$data);
    

        var_dump($resultat);
        }else{
            $this->render('inscription');
        }
    }

}