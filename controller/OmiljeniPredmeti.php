<?php 
class OmiljeniPredmeti extends Controller{
	public function index($page=1){
		$this->data['title'] = 'Omiljeni predmeti';
		$this->data['content']=ProizvodiDB::prikaziOmiljenoPag($page);
		$this->data['content2']=ProizvodiDB::OmiljenoPag($page);
		$this->show_view('omiljeniPredmeti');
	}
	public function omiljeni_predmeti($id){
		$this->data['title'] = 'Proizvodi';
		$this->data['content1']=ProizvodiDB::dodaj_u_omiljeno($id);
		$this->data['content']=ProizvodiDB::getMyProduct($id);
		$this->data['content1']=ProizvodiDB::dodato_u_omiljene($id);
		
		$this->show_view('mojProizvod');
	}
	public function izbaci_iz_omiljenih($id){
		$this->data['title'] = 'Omiljeni predmeti';
		$this->data['content1']=ProizvodiDB::izbaci_omiljene($id);
		$this->data['content']=ProizvodiDB::prikaziOmiljeno();
		$this->show_view('omiljeniPredmeti');
	}
	
	
}