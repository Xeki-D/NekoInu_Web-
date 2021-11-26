<?php 

define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));

define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
require ROOT.'\core\Controller.php';
require ROOT.'\core\Model.php';

if(isset($_GET['p'])&&$_GET['p']!=''){
    $param=explode('/',$_GET['p']);
    $controller=ucfirst($param[0]);
    $action=isset($param[1])? $param[1] : 'index';
    $id=isset($param[2])? $param[2] : null;

}else{
    $controller="Accueil";
    $action='index';
    $id=null;
}   




require ROOT.'Controller/'.$controller.'.php';
$controllerspc = new $controller();
$controllerspc->$action($id);
?>
