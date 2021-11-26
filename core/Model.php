<?php
Class Model{

    protected $table;
    public $id;
    protected static $pdo;

    public static function connexion(){
        $bd="nekoinu";
        $login="root";
        $mdp="";
        $pdo=new PDO("mysql:host=localhost;dbname=".$bd,$login,$mdp);
        $pdo->exec('SET NAMES utf8'); 
        return $pdo;
    }
    
    static function deconnexion(){ 
        $pdo=null;
    }

    public function readOne($pdo,$shield=null){
        if($shield == null){
        $shield="*";
        } 
        $sql="SELECT $shield FROM $this->table where id=".$this->id;
        var_dump($sql); 
        $requete = $pdo->prepare("$sql"); 
        $requete->execute();
        $resultats=$requete->fetchAll(PDO::FETCH_OBJ);
        var_dump($resultats); 
        return $resultats[0];
    }   
    
    public function update($pdo,$data){ 
        $sql="UPDATE $this->table SET ";
        foreach($data as $k=>$v){
        if($k != "id"){
        $sql.="$k=$v,";
        } 
        }
        $sql =substr($sql,0,-1);
        $sql .=" WHERE id=".(int)$this->id;
        var_dump($sql);
        $requete = $pdo->prepare($sql); 
        $requete->execute();
    }

    public function insert($pdo,$data){ 
        $sql="INSERT INTO $this->table (";
        foreach($data as $k=>$v){
        if($k != "id"){
        $sql.="$k,";
        } 
        }
        $sql =substr($sql,0,-1);
        $sql .=") VALUES(";
        foreach($data as $k=>$v){
            if($k != "id"){
            $sql.=':'.$k.',';
        } 
        }
        $sql =substr($sql,0,-1);
        $sql .=")";
        var_dump($sql);
         

        $requete = $pdo->prepare($sql);
        //Créer un tableau vide
        $tab=array();
        //Ajouter la valeur d'itération $v dans le tableau
        foreach($data as $k=>$v){
            $tab[":$k"]=$v;
        } 
        var_dump($tab);
        var_dump($requete->execute($tab));
        
    }

    public function delete($pdo){
        $sql="DELETE FROM $this->table where id=$this->id";
        $requete = $pdo->prepare($sql); 
        $requete->execute(); 
    }

    public function find($pdo, $data=array()){
        $condition="1=1";
        $champs="*";
        $limit="";
        $order="";
        $join=""; 
        
        if(isset($data['condition'])) 
       {$condition=$data['condition'];}
        if(isset($data['champs'])) {$champs=$data['champs'];}
        if(isset($data['limit'])) {$limit="LIMIT ".$data['limit'];}
        if(isset($data['order'])) {$order="ORDER BY ".
       $data['order'];}
        if(isset($data['join'])) {$join=$data['join'];}
        
        $sql="SELECT $champs FROM $this->table $join WHERE $condition
        $order $limit";
        var_dump($sql);
        $requete = $pdo->prepare($sql);
        $requete->execute();
        $resultats=$requete->fetchAll(PDO::FETCH_OBJ);
        return $resultats;
    }  

    public static function load($name){
        require(ROOT.'model/'.ucfirst($name).'.php');
        $monObjet= ucfirst($name);
        return new $monObjet(); 
    }

    

}

?>