<?php 

class OstaviUtisak extends Controller{
	public function index($id){
		$this->data['title']='Ostavi utisak';
		$this->data['content']=UtisciDB::da_li_postoji_utisak($id);
		if ($this->data['content']==0) {
			$this->data['content1']=$id;
			$this->show_view('ostaviUtisak');
		}else{
			
			header("Location:../utisci/".$id);
		}
		// $this->data['content1']=ProizvodiDB::navPodkategorije($id);
	}
	public function ostavi_utisak($id){
		$this->data['title']='Ostavi utisak';
		if (isset($_POST['submit']) && isset($_POST['utisak']) && !empty($_POST['komentar'])) {
			$post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$utisak=$post['utisak'];
			$komentar=$post['komentar'];
			$this->data['content']=UtisciDB::ostavi_utisak($id,$utisak,$komentar);
			header("Location:../../OstaviUtisak/utisci/".$id);

		}else{
			header("Location:../../OstaviUtisak/index/".$id);
		}
		
	}
	public function utisci($id){
		$this->data['title']='Ostavi utisak';
		$this->data['content']=UtisciDB::utisci_korisnika($id);
		$this->data['content1']=UtisciDB::korisnik_koji_je_ostavio_utisak($id);
		$this->show_view('utisci');

	}
	public function mojiUtisci(){
		$this->data['title']='Moji utisci';
		$this->data['content']=UtisciDB::mojiUtisci();  //niz utisci + podaci korisnika koji je ostavio utisak
		$this->data['content1']=KorisniciDB::getMyData(); //podaci ulogovanog korisnika
		$this->show_view('mojiUtisci');

	}
	public function izbrisiUtisak($id,$id_prodavca){
		$this->data['title']='Utisci o prodavcu';
		$this->data['content']=UtisciDB::izbrisi_utisak($id);
		header("Location:../../utisci/$id_prodavca");
	}

}