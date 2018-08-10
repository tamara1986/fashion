<?php 

class Home extends Controller{
	public function index($page=1){
		$this->data['title'] = 'Home';
		$this->data['content']=ProizvodiDB::paginacija($page); //broj strana
		$this->data['content1']=ProizvodiDB::result_pagination($page); //paginacija
		$this->show_view('home');

	}
	
}