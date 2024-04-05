<?php 

class HomeAdmin{
    use Controller;
    public function index()
	{

		$this->view('HomeAdmin');
	}
}