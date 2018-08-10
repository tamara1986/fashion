<?php
class Poruke extends Controller{
	public function razgovori(){
		$this->data['title'] = 'Razgovori';
		$this->data['content']=PorukeDB::mojiRazgovori();
		$this->show_view('poruke');
	}
	public function razgovor($id){
		$this->data['title'] = 'Razgovori';
		$this->data['content']=PorukeDB::medjusobniRazgovori($id);
		$this->data['content1']=$id;
		$this->show_view('razgovor');
	}
	public function izbrisiPoruku($id_poruke){
		$this->data['title'] = 'Razgovori';
		$this->data['content1']=PorukeDB::id_prodavca($id_poruke);
		$this->data['content']=PorukeDB::izbrisi_poruku($id_poruke);

		header("Location:../../Poruke/razgovor/".$this->data['content1']);
	}
	public function dodajPoruku($id){
		$this->data['title'] = 'Razgovori';
		if (isset($_POST['submit']) && isset($_POST['napisi_poruku'])) {
			$post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$poruka=$post['napisi_poruku'];
			var_dump($poruka);
			$this->data['content']=PorukeDB::dodaj_poruku($id,$poruka);
			header("Location:../../Poruke/razgovor/".$id);
		}
	}
	public function posalji_prodavcu($id){
		$this->data['title'] = 'Poruke';
		$this->data['content']=KorisniciDB::podaciProdavca($id); 
		$this->show_view('posaljiPoruku');
	}
	public function posaljiProdavcu($id){
		$this->data['title'] = 'Poruka';
		if (isset($_POST['submit']) && isset($_POST['napisi_poruku'])) {
			$post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$poruka=$post['napisi_poruku'];
			// var_dump($poruka);
			$this->data['content']=PorukeDB::dodaj_poruku($id,$poruka);
			header("Location:../razgovor/".$id);
		}
	}
	public function poruci_proizvod($id){
		$this->data['title'] = 'Poruke';
		
		$this->data['content']=ProizvodiDB::getMyProduct($id);
		// var_dump($this->data['content']);
		$this->data['content1']=$_SERVER['HTTP_REFERER'];
		// var_dump($this->data['content1']);
		$this->show_view('zelimOvajProizvod');
	}
}