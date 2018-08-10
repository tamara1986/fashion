<?php 
class Pracenje extends Controller{
	public function index($id){
		$this->data['title'] = 'Profil prodavca';
		$pracenje=PracenjeDB::da_li_vec_prati($id);
		if ($pracenje==0) {
			$this->data['content']=PracenjeDB::prati($id);
		}else{
			$this->data['content']=PracenjeDB::ne_prati_vise($id);
		}
		header("Location:../../ProfilProdavca/profil_prodavca/$id");
		
	}
	public function proizvodiZapracenih($page=1){
		$this->data['title'] = 'Praćenja';
		$this->data['content']=ProizvodiDB::proizvodiZapracenihProdavacaPag($page);
		$this->data['content2']=ProizvodiDB::zapraceniPag($page);
		$this->show_view('pracenje');
	}
}