<?php

class UtisciDB extends DB{
	public static function da_li_postoji_utisak($id){
		$id_ulogovanog_korisnika=KorisniciDB::idUlogovanog();
		$sql="SELECT id FROM utisci WHERE id_prodavca=$id and id_ulogovanog_korisnika=".$id_ulogovanog_korisnika;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_assoc();
		$num_rows=count($rez);
		return $num_rows;
	}
	public static function ostavi_utisak($id,$utisak,$komentar){
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		$id_prodavca=intval($id);
		$sql="INSERT INTO utisci VALUES (null,$id_ulogovanog,$id_prodavca,$utisak,'$komentar')";
		$req = self::executeSQL($sql);
	}
	public static function utisci_korisnika($id){
		$id_prodavca=intval($id);
		$sql="SELECT k.id,k.username,k.slika,u.utisak,u.komentar,u.id_ulogovanog_korisnika,u.id as id_utiska FROM utisci as u 
		join korisnici as k 
		on k.id=u.id_prodavca 
		 WHERE u.id_prodavca=".$id_prodavca;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function mojiUtisci(){
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		$sql="SELECT * FROM utisci as u 
		join korisnici as k 
		on k.id=u.id_ulogovanog_korisnika
		WHERE u.id_prodavca=".$id_ulogovanog;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
	}
	public static function suma_utisaka($id_korisnika){
		$sql="SELECT count(id) as pozitivan FROM utisci WHERE id_prodavca=$id_korisnika AND utisak=0";
		$req = self::executeSQL($sql);
		$rez1 = $req->fetch_all(MYSQL_ASSOC);
		$sql="SELECT count(id) as negativan FROM utisci WHERE id_prodavca=$id_korisnika AND utisak=1";
		$req = self::executeSQL($sql);
		$rez2 = $req->fetch_all(MYSQL_ASSOC);
		$rezultat=array_merge($rez1,$rez2);
		return $rezultat;
		
	}
	public static function korisnik_koji_je_ostavio_utisak($id){
		$x=array();
		$rezultat=self::utisci_korisnika($id);
		foreach ($rezultat as $key => $value) {
			$id_komentatora=intval($rezultat[$key]['id_ulogovanog_korisnika']);
			$sql="SELECT username,slika,id FROM korisnici WHERE id=$id_komentatora";
			$req = self::executeSQL($sql);
			$rez = $req->fetch_all(MYSQL_ASSOC);
			array_push($x, $rez);

		}
		return $x;
	}
	public static function izbrisi_utisak($id){
		$sql="DELETE FROM utisci WHERE id=$id";
		$req = self::executeSQL($sql);
	}
}