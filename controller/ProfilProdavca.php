<?php
class ProfilProdavca extends Controller{
	public function profil_prodavca($id,$page=1){
		
		$this->data['title'] = 'Profil';
		$data=KorisniciDB::idUlogovanog();
		if ($data==$id) {
			$this->data['content']=ProizvodiDB::proizvodiProdavcaPag($data,$page);
			$this->data['content1']=KorisniciDB::getMyData();
			$this->data['content2']=ProizvodiDB::brojDodatihPredmeta();
			$this->data['content3']=ProizvodiDB::ProizvodiPag($data,$page);

			$this->data['utisci']=UtisciDB::suma_utisaka($data);
			$this->show_view('profil');
		}else{
			$this->data['content']=ProizvodiDB::proizvodiProdavcaPag($id,$page);
			$this->data['content1']=KorisniciDB::podaciProdavca($id);
			$this->data['content2']=ProizvodiDB::brojDodatihPredmetaProdavca($id);
			$this->data['content3']=ProizvodiDB::ProizvodiPag($id,$page);
			$this->data['pracenje']=PracenjeDB::da_li_vec_prati($id);
			$id_korisnika=intval($this->data['content'][0]['id_korisnika']);
			$this->data['utisci']=UtisciDB::suma_utisaka($id_korisnika);
			$this->show_view('profilProdavca');
		}
	}
}	