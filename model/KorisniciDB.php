<?php 

class KorisniciDB extends DB{
	public static function validateData($username,$password){
		$sql = "select * from korisnici where username ='$username' and password='".$password."'";
		$req=self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQLI_ASSOC);
		return $rez;
	}

	public static function podaciProdavca($id){
		$sql="SELECT * FROM korisnici WHERE id=".$id;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function izmeniPodatke($naslov_radnje,$ime_i_prezime,$grad,$email,$description,$profilna_slika){
		$img=$profilna_slika;
		$extenzija=substr($img['name'],strpos($img['name'], '.'),4);
	
				if ($extenzija=='.jpg' || $extenzija=='.png' || $extenzija=='.gif' || $extenzija=='.jpe') {
					$ime_fajla=time().'_'.$img['name'];
					move_uploaded_file($img['tmp_name'], 'C:/wamp64/www/fashion_room/uploads/profilne_slike/'.$ime_fajla);
					echo '<h3 class="msg">Uspešno ste izmenili podatke!</h3>';
				}else{
					echo '<h3 class="msg">Morate popuniti sva polja!</h3>';
				}
				$username=$_SESSION['username'];
				$password=$_SESSION['password'];

		$sql="SELECT id from korisnici WHERE username='".$username."' and password='".$password."'";

		$req = self::executeSQL($sql);
		$rez = $req->fetch_assoc();
		$id=intval($rez['id']);

		$sql="UPDATE korisnici SET naslov_radnje='".$naslov_radnje."', ime_i_prezime_prikaz='".$ime_i_prezime."',grad='".$grad."', email_prikaz='".$email."', opis='".$description."',slika='".$ime_fajla."' WHERE id=".$id;

		$req = self::executeSQL($sql);

	}
		public static function idUlogovanog(){
		$username=$_SESSION['username'];
		$password=$_SESSION['password'];
		$sql="SELECT id from korisnici WHERE username='".$username."' and password='".$password."'";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_assoc();
		$id=intval($rez['id']);
		return $id;
	}
		public static function getMyData(){
		$id=self::idUlogovanog();
		$sql="SELECT * FROM korisnici WHERE id=".$id;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
		public static function stariPodaci(){
		$username=$_SESSION['username'];
		$password=$_SESSION['password'];
		$sql="SELECT naslov_radnje,ime_i_prezime_prikaz,grad,email_prikaz,opis FROM korisnici WHERE username='$username' and password='$password'";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;

		
	}
	public static function email_exists($email){
		$sql= "SELECT * FROM korisnici WHERE email='".$email."'";
		$req = self::executeSQL($sql);
		return $req;
	}
	public static function username_exists($username){
		$sql= "SELECT * FROM korisnici WHERE username='".$username."'";
		$req = self::executeSQL($sql);
		return $req;
		var_dump($req);

	}
	public static function registracija($first_name,$last_name,$username,$email,$password_hash){
		$sql="INSERT INTO korisnici (id, first_name, last_name, username,email,password) VALUES (null,'".$first_name."','".$last_name."','".$username."','".$email."','".$password_hash."')";
		$req = self::executeSQL($sql);
		return $req;
	}
	
}


?>