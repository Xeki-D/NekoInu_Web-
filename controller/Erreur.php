<?php 

class Erreur extends Controller
{

    public function error404()
    {
        $this->load->render("erreur/404");
    }
}
?>