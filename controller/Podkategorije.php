<?php

class Podkategorije extends Controller{
	public function podkategorijeProizvoda($id,$page=1){
		$this->data['title'] = 'Proizvodi';
		$this->data['content']=ProizvodiDB::ProizvodiPodkategorijePag($id,$page);
		$this->data['content1']=ProizvodiDB::dajPodkategorije($id);
		$this->data['content2']=ProizvodiDB::PodkategorijePag($id,$page);
		$this->data['id']=$id;
		$this->show_view('podkategorije');
	}
}
?>