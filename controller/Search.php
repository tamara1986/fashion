<?php

class Search extends Controller{
	public function index($page=1){
		if (isset($_REQUEST['submit']) && isset($_REQUEST['search'])) {
			$search=$_REQUEST['search'];
			$this->data['content']=ProizvodiDB::searchProizvodiPag($page,$search);
			$this->data['content2']=ProizvodiDB::searchPag($page,$search);	
			$this->show_view('search');
		}
	}
}