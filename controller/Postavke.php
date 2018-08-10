<?php

class Postavke extends Controller{
	public function index(){
		$this->data['title'] = 'Postavke';
		$this->data['content']=ProizvodiDB::getMyProducts();
		$this->data['content1']=KorisniciDB::stariPodaci();
		$this->show_view('postavke');
	}
	public function izmeniPodatke(){
		$this->data['title'] = 'Postavke';
		$this->data['content1']=KorisniciDB::stariPodaci();
		$post=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		if (isset($_POST['submit']) && !empty($_POST['naslov_radnje']) && !empty($_POST['ime_i_prezime']) && !empty($_POST['grad']) && !empty($_POST['email']) && !empty($_POST['description']) && !empty($_FILES['profilna_slika'])) {
			$naslov_radnje=$post['naslov_radnje'];
			$ime_i_prezime=$post['ime_i_prezime'];
			$grad=$post['grad'];
			$email=$post['email'];
			$description=$post['description'];
			$profilna_slika=$_FILES['profilna_slika'];
		
		$this->data['content']=KorisniciDB::izmeniPodatke($naslov_radnje,$ime_i_prezime,$grad,$email,$description,$profilna_slika);
		}
		

		$this->show_view('postavke');
	
	}
}