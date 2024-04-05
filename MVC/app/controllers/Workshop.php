<?php 

class Workshop{
    use Controller;
    public function index()
	{

		$this->view('workshop');
	}
}