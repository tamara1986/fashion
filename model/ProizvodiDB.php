<?php

class ProizvodiDB extends DB{
	public static function dajPodkategorije($id){
		$sql="SELECT * FROM kategorije WHERE id_parent=".$id;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;	
	}
	public static function dajProizvodePodkategorije($id){
		$sql="SELECT p.id,p.naslov,p.cena,p.velicina,s.url_slike FROM proizvodi as p
		join korisnici as k
		on k.id=p.id_korisnika
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		WHERE p.id_kategorije=$id
		and s.status=1";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function getAllProducts(){
		$sql="SELECT p.id,p.naslov,p.cena,p.velicina,s.url_slike FROM proizvodi as p
		join korisnici as k
		on k.id=p.id_korisnika
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		WHERE s.status=1";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function dajProizvodeKategorije($id){
		$sql="SELECT p.id,p.naslov,p.cena,p.velicina,s.url_slike FROM proizvodi as p
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		join kategorije as kt
		on p.id_kategorije=kt.id
		WHERE kt.id_parent=".$id." 
		and s.status=1";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function dodaj_u_omiljeno($id){
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		$sql="SELECT * FROM omiljeni_proizvodi WHERE id_proizvoda=".$id;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_assoc();
		$num_rows=count($rez);
		if ($num_rows==0) {
			$sql="INSERT INTO omiljeni_proizvodi VALUES(null,$id,$id_ulogovanog)";
		$req = self::executeSQL($sql);
		}
		
	}
	public static function prikaziOmiljeno(){
		$id_log=KorisniciDB::idUlogovanog();
		$sql="SELECT p.id,p.naslov,p.velicina,p.id_kategorije,p.cena,s.url_slike FROM omiljeni_proizvodi  as o 
		join proizvodi as p 
		on p.id=o.id_proizvoda
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		WHERE o.id_korisnika=$id_log
		and s.status=1";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;	
	}
	public static function izbaci_omiljene($id){
		$sql="DELETE FROM omiljeni_proizvodi WHERE id_proizvoda=$id";
		$req = self::executeSQL($sql);
	}
	public static function paginacija($page){
		$result_per_page=9;
		$result=ProizvodiDB::getAllProducts();
		$number_of_result=count($result);
		$number_of_pages=ceil($number_of_result/$result_per_page);
		return $number_of_pages;
	}
	public static function result_pagination($page){
		$page=intval($page);
		$result_per_page=9;
		// $result=ProizvodiDB::getAllProducts();
		$number_of_pages=self::paginacija($page);
		// $starting_limit_number=(broj strane -1)*broj proizvoda na strani
		$this_page_first_result=($page-1)*$result_per_page;
		
		$sql="SELECT p.id,p.naslov,p.cena,p.velicina,s.url_slike FROM proizvodi as p
		join korisnici as k
		on k.id=p.id_korisnika
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		WHERE s.status=1 ORDER BY p.id DESC LIMIT ".$this_page_first_result.','.$result_per_page;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function getMyProducts(){
		$id=KorisniciDB::idUlogovanog();
		$sql="SELECT p.id,p.naslov,p.cena,p.velicina,s.url_slike FROM proizvodi as p
		join korisnici as k
		on k.id=p.id_korisnika
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		WHERE k.id=".$id."
		and s.status=1";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function getMyProduct($id){
		$sql="SELECT p.id,p.id_korisnika,k.username,p.naslov,p.marka,p.velicina,p.id_kategorije,p.cena,p.opis,k.slika,k.naslov_radnje,k.grad,k.ime_i_prezime_prikaz,s.url_slike from proizvodi as p
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		join korisnici as k
		on p.id_korisnika=k.id
		WHERE p.id=".$id;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;		
	}
	public static function dodajProizvod($naslov_artikla,$brend,$vrsta,$velicina,$opis,$cena,$slika_1=null,$slika_2=null,$slika_3=null,$slika_4=null,$slika_5=null){
		$id_korisnika=KorisniciDB::idUlogovanog();

		
		$sql="INSERT INTO proizvodi VALUES (null,$id_korisnika,'".$naslov_artikla."','".$brend."',$velicina,$vrsta,'".$opis."',$cena)";
		$req = self::executeSQL($sql);
		$lastInsertId=self::lastInsertId()-1;
		

		if ($slika_1['name'] !='') {
			$img=$slika_1;
			$ime_fajla=time().'_'.$img['name'];
			move_uploaded_file($img['tmp_name'], 'C:/wamp64/www/fashion_room/uploads/slike_proizvoda/'.$ime_fajla);
			$sql="INSERT INTO slike_proizvoda VALUES (null,$lastInsertId,'".$ime_fajla."',1)";
			$req = self::executeSQL($sql);
		}
		if ($slika_2['name'] !=''){
			$img=$slika_2;
			$ime_fajla=time().'_1'.$img['name'];
			move_uploaded_file($img['tmp_name'], 'C:/wamp64/www/fashion_room/uploads/slike_proizvoda/'.$ime_fajla);
			$sql="INSERT INTO slike_proizvoda VALUES (null,$lastInsertId,'".$ime_fajla."',0)";
			$req = self::executeSQL($sql);
		}
		if ($slika_3['name'] !='') {
			$img=$slika_3;
			$ime_fajla=time().'_2'.$img['name'];
			move_uploaded_file($img['tmp_name'], 'C:/wamp64/www/fashion_room/uploads/slike_proizvoda/'.$ime_fajla);
			$sql="INSERT INTO slike_proizvoda VALUES (null,$lastInsertId,'".$ime_fajla."',0)";
			$req = self::executeSQL($sql);
		}
		if ($slika_4['name'] !='') {
			$img=$slika_4;
			$ime_fajla=time().'_3'.$img['name'];
			move_uploaded_file($img['tmp_name'], 'C:/wamp64/www/fashion_room/uploads/slike_proizvoda/'.$ime_fajla);
			$sql="INSERT INTO slike_proizvoda VALUES (null,$lastInsertId,'".$ime_fajla."',0)";
			$req = self::executeSQL($sql);	
		}
		if ($slika_5['name'] !='') {
			$img=$slika_5;
			$ime_fajla=time().'_4'.$img['name'];
			move_uploaded_file($img['tmp_name'], 'C:/wamp64/www/fashion_room/uploads/slike_proizvoda/'.$ime_fajla);
			$sql="INSERT INTO slike_proizvoda VALUES (null,$lastInsertId,'".$ime_fajla."',0)";
			$req = self::executeSQL($sql);
		}
		
		$sql="SELECT kategorija from kategorije WHERE id=".$vrsta;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		$kategorije=$rez[0]['kategorija'];
		$sql="SELECT id_parent from kategorije WHERE id=$vrsta";
		$req = self::executeSQL($sql);
		$rezultat = $req->fetch_all(MYSQL_ASSOC);
		$parent=intval($rezultat[0]['id_parent']);
		$sql="SELECT kategorija from kategorije WHERE id=".$parent;
		$req = self::executeSQL($sql);
		$rez2 = $req->fetch_all(MYSQL_ASSOC);
		$parent1=$rez2[0]['kategorija'];

		
		$sql="INSERT INTO tagovi VALUES (null,$lastInsertId,'".$naslov_artikla."','".$brend."','".$velicina."','".$kategorije."','".$parent1."')";
		$req = self::executeSQL($sql);
		var_dump($sql);
		
		return;
	}
	public static function getData(){
		$sql="SELECT id,kategorija FROM kategorije WHERE id_parent=1 or id_parent=2 or id_parent=3 or id_parent=4 or id_parent=5";
		
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function dajKategorije(){
		$sql="SELECT * FROM kategorije WHERE id_parent=0";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function lastInsertId(){
		$sql="SELECT id FROM proizvodi ORDER BY id DESC limit 1";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_assoc();
		$id=intval($rez['id'])+1;
		return $id;
	}
	public static function brojDodatihPredmeta(){
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		$sql="SELECT count(id) as broj_predmeta FROM proizvodi WHERE id_korisnika=$id_ulogovanog";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_assoc();
		$broj_predmeta=$rez['broj_predmeta'];
		return $broj_predmeta;
	}
	public static function brojDodatihPredmetaProdavca($id){
		$id_prodavca=$id;
		$sql="SELECT count(id) as broj_predmeta FROM proizvodi WHERE id_korisnika=$id_prodavca";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_assoc();
		$broj_predmeta=$rez['broj_predmeta'];
		return $broj_predmeta;
	}
	public static function proizvodiProdavca($id){
		$sql="SELECT p.id,p.naslov,p.cena,p.velicina,s.url_slike FROM proizvodi as p
		join korisnici as k
		on k.id=p.id_korisnika
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		WHERE k.id=".$id."
		and s.status=1";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function izbrisi_proizvod($id){
		$id_proizvod=intval($id);
		
		$sql="DELETE FROM slike_proizvoda WHERE id_proizvod=".$id_proizvod;
		$rez = self::executeSQL($sql);
		$sql="DELETE FROM tagovi WHERE id_proizvoda=".$id_proizvod;
		// var_dump($sql);
		$rez = self::executeSQL($sql);
		$sql="DELETE FROM proizvodi WHERE id=".$id_proizvod;
		var_dump($sql);
		$rez = self::executeSQL($sql);
		
	}
	public static function dodato_u_omiljene($id){
		$id_proizvoda=$id;
		$sql="SELECT count(id) as utisci FROM omiljeni_proizvodi WHERE id_proizvoda=".$id;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function search($search){
		$pretraga=explode(' ', $search);
		if (sizeof($pretraga)==1) {
			$sql="SELECT p.id,s.url_slike,p.cena,p.naslov,p.velicina FROM proizvodi as p 
			join slike_proizvoda as s 
			on p.id=s.id_proizvod
			join tagovi as t
			on t.id_proizvoda=p.id 
			WHERE tag='".$search."' or  tag2='".$search."' or tag3='".$search."' or tag4='".$search."' or tag5='".$search."' group by p.id;
			";
			$req = self::executeSQL($sql);
			$rez = $req->fetch_all(MYSQL_ASSOC);
			return $rez;
		}else{
		$prvi=$pretraga[0];
		$drugi=$pretraga[1];
		$sql="SELECT p.id,s.url_slike,p.cena,p.naslov,p.velicina FROM proizvodi as p 
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		join tagovi as t 
		on t.id_proizvoda=p.id 
		WHERE (tag='".$prvi."' AND (tag2='".$drugi."' or tag3='".$drugi."' or tag4='".$drugi."' or tag5='".$drugi."')) OR 
		(tag2='".$prvi."' AND (tag='".$drugi."' or tag3='".$drugi."' or tag4='".$drugi."' or tag5='".$drugi."')) OR 
		(tag3='".$prvi."' AND (tag='".$drugi."' or tag2='".$drugi."' or tag4='".$drugi."' or tag5='".$drugi."')) OR 
		(tag4='".$prvi."' AND (tag='".$drugi."' or tag2='".$drugi."' or tag3='".$drugi."' or tag5='".$drugi."')) OR
		(tag5='".$prvi."' AND (tag='".$drugi."' or tag2='".$drugi."' or tag3='".$drugi."' or tag4='".$drugi."'))
		 group by p.id";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
		
		}
	}
	public static function proizvodiZapracenihProdavaca(){
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		$sql="SELECT pr.id,s.url_slike,pr.cena,pr.naslov,pr.velicina FROM pracenje as p 
		join korisnici as k 
		on k.id=p.id_zapracenog 
		join proizvodi as pr
		on k.id=pr.id_korisnika 
		join slike_proizvoda as s 
		on pr.id=s.id_proizvod 
		WHERE p.id_ulogovanog=$id_ulogovanog group by pr.id ORDER BY pr.id DESC";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
		
	}
	
	public static function KategorijePag($id,$page){
		$result_per_page=9;
		$result=ProizvodiDB::dajProizvodeKategorije($id);
		$number_of_result=count($result);
		$number_of_pages=ceil($number_of_result/$result_per_page);
		return $number_of_pages;
	}
	public static function dajProizvodeKategorijePag($id,$page){
		$page=intval($page);
		$result_per_page=9;
		// $result=ProizvodiDB::getAllProducts();
		$number_of_pages=self::KategorijePag($id,$page);
		// $starting_limit_number=(broj strane -1)*broj proizvoda na strani
		$this_page_first_result=($page-1)*$result_per_page;
		
		$sql="SELECT p.id,p.naslov,p.cena,p.velicina,s.url_slike FROM proizvodi as p
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		join kategorije as kt
		on p.id_kategorije=kt.id
		WHERE kt.id_parent=".$id."
		and s.status=1 ORDER BY p.id DESC LIMIT ".$this_page_first_result.','.$result_per_page;
		
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function PodkategorijePag($id,$page){
		$result_per_page=9;
		$result=ProizvodiDB::dajProizvodePodkategorije($id);
		$number_of_result=count($result);
		$number_of_pages=ceil($number_of_result/$result_per_page);
		return $number_of_pages;
	}
	public static function ProizvodiPodkategorijePag($id,$page){
		$page=intval($page);
		$result_per_page=9;
		$number_of_pages=self::PodkategorijePag($id,$page);
		// $starting_limit_number=(broj strane -1)*broj proizvoda na strani
		$this_page_first_result=($page-1)*$result_per_page;
		
		$sql="SELECT p.id,p.naslov,p.cena,p.velicina,s.url_slike FROM proizvodi as p
		join korisnici as k
		on k.id=p.id_korisnika
		join slike_proizvoda as s 
		on p.id=s.id_proizvod 
		WHERE p.id_kategorije=$id
		and s.status=1
	    ORDER BY p.id DESC LIMIT ".$this_page_first_result.','.$result_per_page;
		
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function zapraceniPag($page){
		$result_per_page=9;
		$result=ProizvodiDB::proizvodiZapracenihProdavaca();
		$number_of_result=count($result);
		$number_of_pages=ceil($number_of_result/$result_per_page);
		return $number_of_pages;
	}
	public static function proizvodiZapracenihProdavacaPag($page=1){
		$page=intval($page);
		$result_per_page=9;
		$number_of_pages=self::ZapraceniPag($page);
		// $starting_limit_number=(broj strane -1)*broj proizvoda na strani
		$this_page_first_result=($page-1)*$result_per_page;
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		$sql="SELECT pr.id,s.url_slike,pr.cena,pr.naslov,pr.velicina FROM pracenje as p 
		join korisnici as k 
		on k.id=p.id_zapracenog 
		join proizvodi as pr
		on k.id=pr.id_korisnika 
		join slike_proizvoda as s 
		on pr.id=s.id_proizvod 
		WHERE p.id_ulogovanog=$id_ulogovanog group by pr.id 
		ORDER BY pr.id DESC LIMIT ".$this_page_first_result.','.$result_per_page;
		
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function OmiljenoPag($page){
		$result_per_page=9;
		$result=ProizvodiDB::prikaziOmiljeno();
		$number_of_result=count($result);
		$number_of_pages=ceil($number_of_result/$result_per_page);
		return $number_of_pages;
	}
	public static function prikaziOmiljenoPag($page){
		$page=intval($page);
		$result_per_page=9;
		$number_of_pages=self::ZapraceniPag($page);
		// $starting_limit_number=(broj strane -1)*broj proizvoda na strani
		$this_page_first_result=($page-1)*$result_per_page;
		$id_log=KorisniciDB::idUlogovanog();
		$sql="SELECT p.id,p.naslov,p.velicina,p.id_kategorije,p.cena,s.url_slike FROM omiljeni_proizvodi  as o 
		join proizvodi as p 
		on p.id=o.id_proizvoda
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		WHERE o.id_korisnika=$id_log
		and s.status=1
		
		ORDER BY p.id DESC LIMIT ".$this_page_first_result.','.$result_per_page;
		
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function searchPag($page,$search){
		$result_per_page=9;
		$result=ProizvodiDB::search($search);
		$number_of_result=count($result);
		$number_of_pages=ceil($number_of_result/$result_per_page);
		return $number_of_pages;

	}
	public static function searchProizvodiPag($page,$search){
		$page=intval($page);
		$result_per_page=9;
		$number_of_pages=self::searchPag($page,$search);
		// $starting_limit_number=(broj strane -1)*broj proizvoda na strani
		$this_page_first_result=($page-1)*$result_per_page;

		$pretraga=explode(' ', $search);
		if (sizeof($pretraga)==1) {
			$sql="SELECT p.id,s.url_slike,p.cena,p.naslov,p.velicina FROM proizvodi as p 
			join slike_proizvoda as s 
			on p.id=s.id_proizvod
			join tagovi as t
			on t.id_proizvoda=p.id 
			WHERE tag='".$search."' or  tag2='".$search."' or tag3='".$search."' or tag4='".$search."' group by p.id ORDER BY p.id DESC LIMIT ".$this_page_first_result.','.$result_per_page
			;
			$req = self::executeSQL($sql);
			$rez = $req->fetch_all(MYSQL_ASSOC);
			return $rez;
		}else{
		$prvi=$pretraga[0];
		$drugi=$pretraga[1];
		$sql="SELECT p.id,s.url_slike,p.cena,p.naslov,p.velicina FROM proizvodi as p 
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		join tagovi as t 
		on t.id_proizvoda=p.id 
		WHERE (tag='".$prvi."' AND (tag2='".$drugi."' or tag3='".$drugi."' or tag4='".$drugi."')) OR 
		(tag2='".$prvi."' AND (tag='".$drugi."' or tag3='".$drugi."' or tag4='".$drugi."')) OR 
		(tag3='".$prvi."' AND (tag='".$drugi."' or tag2='".$drugi."' or tag4='".$drugi."')) OR 
		(tag4='".$prvi."' AND (tag='".$drugi."' or tag2='".$drugi."' or tag3='".$drugi."'))
		 group by p.id ORDER BY p.id DESC LIMIT ".$this_page_first_result.','.$result_per_page;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
		}
	}
	public static function MyProductsPag(){
		$result_per_page=9;
		$result=ProizvodiDB::getMyProducts();
		$number_of_result=count($result);
		$number_of_pages=ceil($number_of_result/$result_per_page);
		return $number_of_pages;

	}
	public static function getMyProductsPag($page){
		$page=intval($page);
		$result_per_page=9;
		$number_of_pages=self::MyProductsPag($page);
		// $starting_limit_number=(broj strane -1)*broj proizvoda na strani
		$this_page_first_result=($page-1)*$result_per_page;
		$id=KorisniciDB::idUlogovanog();
		$sql="SELECT p.id,p.naslov,p.cena,p.velicina,s.url_slike FROM proizvodi as p
		join korisnici as k
		on k.id=p.id_korisnika
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		WHERE k.id=".$id."
		and s.status=1
		ORDER BY p.id DESC LIMIT ".$this_page_first_result.','.$result_per_page;
		
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function ProizvodiPag($id,$page){
		$result_per_page=9;
		$result=ProizvodiDB::proizvodiProdavca($id);
		$number_of_result=count($result);
		$number_of_pages=ceil($number_of_result/$result_per_page);
		return $number_of_pages;

	}
	public static function proizvodiProdavcaPag($id,$page){
		$page=intval($page);
		$result_per_page=9;
		$number_of_pages=self::MyProductsPag($id,$page);
		// $starting_limit_number=(broj strane -1)*broj proizvoda na strani
		$this_page_first_result=($page-1)*$result_per_page;
		$sql="SELECT p.id,p.naslov,p.cena,p.velicina,s.url_slike FROM proizvodi as p
		join korisnici as k
		on k.id=p.id_korisnika
		join slike_proizvoda as s 
		on p.id=s.id_proizvod
		WHERE k.id=".$id."
		and s.status=1
		ORDER BY p.id DESC LIMIT ".$this_page_first_result.','.$result_per_page;
		
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}



}