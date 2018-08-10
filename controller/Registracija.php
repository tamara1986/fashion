<?php
class Registracija extends Controller{
	public function index($data=""){
		$this->data['title']='Registracija';
		$data=str_replace("_", " ", $data);
		$this->data['msg']=$data;
		if (isset($_POST['submit'])){
			if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirmation'])) {
					if ($_POST['password']== $_POST['password_confirmation']) {
						$first_name=filter_var($_POST['first_name'],FILTER_SANITIZE_STRING);
						$last_name=filter_var($_POST['last_name'],FILTER_SANITIZE_STRING);
						$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
						$email=filter_var($_POST['email'],FILTER_SANITIZE_STRING);
						$password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
						$password_hash=md5($password);

						$mail_exists=KorisniciDB::email_exists($email);
						$username_exists=KorisniciDB::username_exists($username);
						
						if ($mail_exists->num_rows==0 && $username_exists->num_rows==0) {
							$registracija=KorisniciDB::registracija($first_name,$last_name,$username,$email,$password_hash);
							header("Location:../../Login/index/");
						}elseif ($mail_exists->num_rows==0 && $username_exists->num_rows==1) {
							$msg='Korisničko_ime_već_postoji';
							header("Location:../../Registracija/index/$msg");
							
						}elseif ($mail_exists->num_rows==1 && $username_exists->num_rows==0) {
							$msg='Email_već_postoji';
							header("Location:../../Registracija/index/$msg");
						}else{
							$msg='Email_i_korisničko_ime_već_postoje';
							header("Location:../../Registracija/index/$msg");
						}				
					}else{
						$msg='Polja_šifra_i_potvrdi_šifru_moraju_biti_ista';
						header("Location:../../Registracija/index/$msg");

					}
			}else{
				$this->data['msg']='Morate_popuniti_sva_polja!';
				header("Location:../../Registracija/index/$msg");
			}
		}else{
			$this->show_view('registracija');
		}
	}
	// public function registracija(){
	// 	$this->show_view('registracija');
	// 	// if (isset($_POST['submit'])){
	// 	// 	if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirmation'])) {
	// 	// 			if ($_POST['password']== $_POST['password_confirmation']) {
	// 	// 				$first_name=$_POST['first_name'];
	// 	// 				$last_name=$_POST['last_name'];
	// 	// 				$username=$_POST['username'];
	// 	// 				$email=$_POST['email'];
	// 	// 				$password=$_POST['password'];

	// 	// 				$mail_exists=KorisniciDB::email_exists($email);
	// 	// 				$username_exists=KorisniciDB::username_exists($username);
						
	// 	// 				if ($mail_exists->num_rows==0 && $username_exists->num_rows==0) {
	// 	// 					$registracija=KorisniciDB::registracija($first_name,$last_name,$username,$email,$password);
	// 	// 					var_dump('stigao');
	// 	// 				}elseif ($mail_exists->num_rows==0 && $username_exists->num_rows==1) {
	// 	// 					$this->data['msg']='Korisničko ime već postoji';
							
							
	// 	// 				}elseif ($mail_exists->num_rows==1 && $username_exists->num_rows==0) {
							
	// 	// 					$msg='Email već postoji';
							
	// 	// 				}else{
							
	// 	// 					$this->data['msg']='Email i korisničko ime već postoje';
	// 	// 					echo $this->data['msg'];
							
	// 	// 				}				
	// 	// 			}else{
						
	// 	// 				$this->data['msg']='Polja šifra i potvrdi šifru moraju biti ista';
	// 	// 				echo $this->data['msg'];
	// 	// 				var_dump($this->data['msg']);

	// 	// 			}
	// 	// 	}else{
	// 	// 		$this->data['msg']='Morate popuniti sva polja!';
	// 	// 		var_dump($this->data['msg']);
	// 	// 	}
	// 	// }
	// }
}