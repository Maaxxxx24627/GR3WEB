<?php 

class GestionEleve{
    use Controller;
    public function index()
	{

		$this->view('gestionEleve');
	}
}