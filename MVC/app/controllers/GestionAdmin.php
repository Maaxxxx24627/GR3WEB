<?php 

class GestionAdmin{
    use Controller;
    public function index()
	{

		$this->view('gestionAdmin');
	}
}