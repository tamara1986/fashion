<?php 

class Help extends Controller{
	public function index(){
		$this->data['title']='Pomoć';
		$this->show_view('help');
	}
}