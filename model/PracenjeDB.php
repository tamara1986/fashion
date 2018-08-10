<?php
class PracenjeDB extends DB{
	public static function prati($id){
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		$id_zapracenog=intval($id);
		$sql="INSERT INTO pracenje VALUES (null,$id_ulogovanog,$id_zapracenog)";
		$req = self::executeSQL($sql);
		return;
	}
	public static function da_li_vec_prati($id){
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		$id_zapracenog=intval($id);
		$sql="SELECT * FROM pracenje WHERE id_ulogovanog=$id_ulogovanog and id_zapracenog=$id_zapracenog";
		$req = self::executeSQL($sql);
		return $req->num_rows;
		
	}
	public static function ne_prati_vise($id){
		$id_ulogovanog=KorisniciDB::idUlogovanog();
		$id_zapracenog=intval($id);
		$sql="DELETE FROM pracenje WHERE id_ulogovanog=$id_ulogovanog and id_zapracenog=$id_zapracenog";
		$req = self::executeSQL($sql);
		return;
	}
}