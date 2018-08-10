<?php 

class Kategorije extends Controller{
	public function kategorijeProizvoda($id,$page=1){
		$this->data['title'] = 'Proizvodi';
		$this->data['content']=ProizvodiDB::dajPodkategorije($id);
		$this->data['content1']=ProizvodiDB::dajProizvodeKategorijePag($id,$page);
		$this->data['content2']=ProizvodiDB::KategorijePag($id,$page);
		$this->data['id']=$id;
		$this->show_view('kategorije');
	}
}