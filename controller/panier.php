<?php


class Panier extends Controller {
    
    function index(){
             
        $test="";
        if(isset($_SESSION['panier'])){
            $test="(";
            foreach($_SESSION['panier'] as $ligne =>$value){
                $test.=$ligne.",";
            }
            $test.="0)";
        }
        $tables = Model::load("produit");
        $tableRes['variable']=array("produit"=>$tables->find(Model::connexion(), array('condition'=>"id in $test")));
        Model::deconnexion();
        $this-> set($tableRes);
        //if(isset($_SESSION['panier'])) var_dump($_SESSION['panier']);
        $this->render('index');
    }

       
    function mettreaupanier($i){
        
        $_SESSION['test']=false;
        if (!isset($_SESSION['panier'])) 
        {             
            $_SESSION['panier'][$i]=1;   
            $_SESSION['totalpanier']=count($_SESSION['panier']);
            echo "<i class='badge badge-light' style='background-color:orangered;'> ".$_SESSION['totalpanier']."</i>";
           // echo "<script type='text/javascript'>session(".$_SESSION['totalpanier'].")</script>";
        } else {
            
            foreach($_SESSION['panier'] as $ligne => $value){
                //var_dump($ligne);
                if($ligne==$i){
                    
                    $_SESSION['test']=true;
                   
                }
            }
           // echo "test2";
          //  var_dump($_SESSION['test']);
            
            if($_SESSION['test']==true){  
              //  echo "tesst";
               // var_dump($_SESSION['test']);
               // echo "<script type='text/javascript'> window.alert('Vous avez d�j� ce produit!!');</script>";
            }else{
                $_SESSION['panier'][$i]=1;
            }
          //  var_dump($_SESSION['panier'][$i]);
            $_SESSION['totalpanier']=count($_SESSION['panier']);
            
            /*if($_SESSION['test']!=false) echo "false";
            else */ echo "<i class='badge badge-light' style='background-color:orangered;'> ".$_SESSION['totalpanier']."</i>";
        }
       // echo "<script type='text/javascript'>session(".$_SESSION['totalpanier'].");</script>";
        
    }
    
    function total(){
        //$tot=$_SESSION['totalpanier'];
       //echo $tot;
       echo "<i class='badge badge-light' style='background-color:orangered;'> ".$_SESSION['totalpanier']."</i>";
    }
   
     
    function supprimerdupanier($i){
        foreach($_SESSION['panier'] as $ligne => $value){
                if($ligne==$i){                    
                    unset($_SESSION['panier'][$ligne]);                    
                }        
        }
        $_SESSION['totalpanier']=count($_SESSION['panier']);
        echo "<i class='badge badge-light' style='background-color:orangered;'> ".$_SESSION['totalpanier']."</i>";
    }
    public function commander($i=null){
        if(isset($_POST['securite'])){
            $resultat=false;
            $variables['macommande']=array("titre"=>"Ma commande");
            $laTable1=Model::load('commande');
            $array=array("pseudo"=>"'".$_SESSION['utilisateur']['pseudo']."'");
            $resultat=$laTable1->insert($laTable1->connexion(),$array);
            if($resultat){
                $array=array("champs"=>"id","order"=>"id desc","limit"=>"1");
                $commande=$laTable1->find($laTable1->connexion(),$array);
                var_dump($commande);
                $laTable1->deconnexion();
                $laTable2=Model::load('lignecommande');                
                foreach($_SESSION['panier'] as $ligne =>$value){
                    $array=array('commande'=>$commande[0]->id,"son"=>$ligne);
                    $leslignes=$laTable2->insert($laTable2->connexion(),$array);
                    $this->supprimerdupanier($ligne);
                }
                $laTable2->deconnexion();         
            }    
            $variables['macommande']=array("titre"=>"Ma commande","autre"=>"La commande a bien été validée"); 
            unset($_SESSION['panier']); 
            
        
        }else{
            $variables['macommande']=array("titre"=>"Ma commande");
        }      
        
        $this-> set($variables);
        $this->render('commander');
    }
    

    public function __construct(){
        
    }
}
?>