<?php

class Mojprofil extends Controller{
	public function index($page=1){
		$this->data['title'] = 'Profil';
		$this->data['content']=ProizvodiDB::getMyProductsPag($page);
		$this->data['content1']=KorisniciDB::getMyData();
		$this->data['content2']=ProizvodiDB::brojDodatihPredmeta();
		$this->data['content3']=ProizvodiDB::MyProductsPag($page);
		$data=KorisniciDB::idUlogovanog();
		$this->data['utisci']=UtisciDB::suma_utisaka($data);
		$this->show_view('profil');

	}
	public function mojproizvod($id){
		$this->data['title'] = 'Proizvod';
		$this->data['content']=ProizvodiDB::getMyProduct($id);
		$this->data['content1']=ProizvodiDB::dodato_u_omiljene($id);
		$id_korisnika=intval($this->data['content'][0]['id_korisnika']);
		$this->data['id_korisnika']=$id_korisnika;
		$this->data['utisci']=UtisciDB::suma_utisaka($id_korisnika);
		$this->show_view('mojProizvod');
	}
	public function izbrisiProizvod($id){
		$this->data['title'] = 'Proizvod';
		$this->data['content']=ProizvodiDB::izbrisi_proizvod($id);
		header("Location:../index/1");
	}

		
		
		
	

}