<?php


class DodajNoviProizvod extends Controller{
	public function index(){
		$this->data['title'] = 'Dodaj novi proizvod';
		$this->data['content']=ProizvodiDB::getData();
		$this->data['content1']=ProizvodiDB::dajKategorije();
		
		$this->show_view('dodajNoviProizvod');
	}
	public function dodaj_novi_artikal(){
		if (isset($_POST['submit']) && !empty($_POST['naslov_artikla']) && !empty($_POST['brend'])  && !empty($_POST['vrsta']) && !empty($_POST['velicina']) && !empty($_POST['description']) && !empty($_POST['cena']) && (isset($_FILES['slika_1'])|| isset($_FILES['slika_2']) || isset($_FILES['slika_3']) || isset($_FILES['slika_4']) || isset($_FILES['slika_5'])) ){
			$post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$naslov_artikla=$post['naslov_artikla'];
			$brend=$post['brend'];
			$vrsta=intval($post['vrsta']);
			$velicina=intval($post['velicina']);
			$description=$post['description'];
			$cena=intval($post['cena']);
			$slika_1=$_FILES['slika_1'];
			$slika_2=$_FILES['slika_2'];
			$slika_3=$_FILES['slika_3'];
			$slika_4=$_FILES['slika_4'];
			$slika_5=$_FILES['slika_5'];
			
		$this->data['content2']=ProizvodiDB::dodajProizvod($naslov_artikla,$brend,$vrsta,$velicina,$description,$cena,$slika_1,$slika_2,$slika_3,$slika_4,$slika_5);
		header("Location:../../DodajNoviProizvod/index/");
	
		}

	}

}