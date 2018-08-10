<?php
class Login extends Controller{
	public function Index(){
		$this->data['title']='Login';
		$this->show_view('login');
	}
	public function loginUser () {
		if ( isset($_POST['login'])) {
			$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);;
			$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
			$password_hash=md5($password);
			$data = KorisniciDB::validateData($username, $password_hash);
			
		  	if ($data == true) {
			  $_SESSION['loged'] = true;
			  $_SESSION['username']=$username;
			  $_SESSION['password']=$password_hash;
			  $_SESSION['id']=KorisniciDB::idUlogovanog();
			  header("Location: ".ROOT_URL);
			}else{
				echo '<h1>Incorrect data</h1>';
				$this->show_view('login');
			}
		}else{
			echo '<h1>Incorrect data</h1>';
			$this->show_view('login');
			

		}
		
	}
	public function logoutUser(){
		unset($_SESSION['loged']);
		session_destroy();
		header("Location: ".ROOT_PATH);
	}
}



 ?>