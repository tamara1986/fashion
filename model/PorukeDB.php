<?php
class PorukeDB extends DB{
	public static function mojiRazgovori(){
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		$sql="SELECT k.first_name,k.last_name,k.id FROM poruke as p 
		join poruke_primalac as pp
		on p.id=pp.id_poruke
		join korisnici as k 
		on k.id=pp.id_primalac
		WHERE p.id_ulogovanog=$id_ulogovanog
		and pp.status=1";
		$req = self::executeSQL($sql);
		$rez1 = $req->fetch_all(MYSQL_ASSOC);

		
		$sql="SELECT k.first_name,k.last_name,k.id FROM poruke as p 
		join poruke_primalac as pp
		on p.id=pp.id_poruke
		join korisnici as k 
		on k.id=p.id_ulogovanog
		WHERE pp.id_primalac=$id_ulogovanog
		and pp.status=1";
		$req = self::executeSQL($sql);
		$rez2 = $req->fetch_all(MYSQL_ASSOC);
		
		$rezultat=array_merge($rez1,$rez2);
		return $rezultat;
	}
	public static function medjusobniRazgovori($id){
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		$id_primalac=$id;
		$sql="SELECT * FROM poruke as p 
		join poruke_primalac as pp 
		on p.id=pp.id_poruke 
		join korisnici as k 
		on k.id=p.id_ulogovanog 
		WHERE p.id_ulogovanog=$id_ulogovanog and pp.id_primalac=$id_primalac
		or p.id_ulogovanog=$id_primalac and pp.id_primalac=$id_ulogovanog
		ORDER BY p.id;
		";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		return $rez;
		

	}
	public static function dodaj_poruku($id,$poruka){
		$id_primalac=intval($id);
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		
		$sql="INSERT INTO poruke VALUES(null,$id_ulogovanog,'$poruka',NOW())";
		$req = self::executeSQL($sql);
		$sql="SELECT * FROM poruke as p 
		join poruke_primalac as pp 
		on p.id=pp.id_poruke 
		WHERE p.id_ulogovanog=$id_ulogovanog AND pp.id_primalac=$id_primalac OR (p.id_ulogovanog=$id_primalac AND pp.id_primalac=$id_ulogovanog)";
		$req = self::executeSQL($sql);
		
		if ($req->num_rows==0) {
			$last_insert_id=PorukeDB::lastInsertIdPoruke();
			$sql="INSERT INTO poruke_primalac VALUES(null,$last_insert_id,$id_primalac,1)";
			$req = self::executeSQL($sql);
		}else{
		
			$last_insert_id=PorukeDB::lastInsertIdPoruke();
			$sql="INSERT INTO poruke_primalac VALUES(null,$last_insert_id,$id_primalac,0)";
			$req = self::executeSQL($sql);
		}
		return;	
	}
	public static function izbrisi_poruku($poruka){
		$id_poruke=intval($poruka);
		$sql="DELETE FROM poruke WHERE id=$id_poruke";
		$req = self::executeSQL($sql);
		$sql="DELETE FROM poruke_primalac WHERE id_poruke=$id_poruke";
		$req = self::executeSQL($sql);
		return;
	}
	public static function id_prodavca($id_poruke){
		$id_poruke=intval($id_poruke);
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		var_dump($id_ulogovanog);
		$sql="SELECT pp.id_primalac FROM poruke_primalac as pp 
		join poruke as p 
		on p.id=pp.id_poruke
		WHERE p.id_ulogovanog=".$id_ulogovanog." and p.id=".$id_poruke;
		$req = self::executeSQL($sql);
		$rez = $req->fetch_all(MYSQL_ASSOC);
		$id=intval($rez[0]['id_primalac']);
		// var_dump($rez);
		return $id;
	}
		public static function lastInsertIdPoruke(){
		$sql="SELECT id FROM poruke ORDER BY id DESC limit 1";
		$req = self::executeSQL($sql);
		$rez = $req->fetch_assoc();
		$id=intval($rez['id']);
		return $id;
	}
	
}


 ?>