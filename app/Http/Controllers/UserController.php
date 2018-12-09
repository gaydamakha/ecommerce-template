<?php

namespace App\Http\Controllers;
use App\Models\Model_Base;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDO;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public static function adduser(){
 
		session_start();

		if (isset($_POST['loginup']) && isset($_POST['passwordup']) && isset($_POST['confirmpasswordup'])){
		    $login = htmlentities($_POST['loginup']);
		    $password = htmlentities($_POST['passwordup']);
		    $confirmpassword = htmlentities($_POST['confirmpasswordup']);
		    if($password != $confirmpassword){
		    	$_SESSION["message"]="Confirmation of password is different! Please, try again";
				header("Location: /signup");
				exit;
		    }
		}
		else{
			$_SESSION["message"]="Inner problem, please try again";
			header("Location: /signup");
			exit;
		}

		$user= new User($login,$password);
		$user->set_db(DB::connection()->getPdo());
		try {
			$user->create();
		}
		catch(Exception $e){
			$_SESSION["message"]="Failed to create an user ".$e->getMessage();
			header("Location: /signup");
			exit;
		}
		$_SESSION["message"]="You are signed up!";
		header("Location: /signin");
		exit;
	}

	public static function authenticate(){

		if (isset($_POST['login']) && isset($_POST['password']) ){
		    $login = htmlentities($_POST['login']);
		    $password = htmlentities($_POST['password']);
		}
		else{
		  $_SESSION["message"]="Login or Password incorrect!";
			header("Location: /signin");
		  exit;
		}

		session_start();
		$user= new User($login,$password);
		$user->set_db(DB::connection()->getPdo());
		if(!$user->exists()){
		  $_SESSION["message"]="Login or Password incorrect!";
		  echo "<script>alert('Login or Password incorrect！');history.go(-1);</script>";  
		  exit;
		}
		$_SESSION["user"] = $login;
		$_SESSION["message"] = null;
		header("Location: /account/welcome");
		exit;
	}
	public static function changepassword(){
		session_start();
		if(!isset($_SESSION['user']) || empty($_SESSION["user"])){
			header("Location: /account/formpassword");
			exit;
		}

		if (!isset($_POST['chpassword']) || !isset($_POST['confchpassword']) || empty($_POST['chpassword'])|| empty($_POST['confchpassword'])){
			$_SESSION["message"]="Please, try again";
			header("Location: /account/formpassword");
			exit;
		}
		$password = $_POST['chpassword'];
		$confpassword = $_POST['confchpassword'];
		if($password != $confpassword){
			$_SESSION["message"]="Confirmation of password is different! Please, try again";
			header("Location: /account/formpassword");
			exit;
		}


		$user= new User($_SESSION['user'],null);
		$user->set_db(DB::connection()->getPdo());
		try {
			$user->changePassword($password);
		}
		catch(Exception $e){
			$_SESSION["message"]="Password hasn't changed. Please, try again ".$e->getMessage();
			header("Location: /account/formpassword");
			exit;
		}
		$_SESSION["message"]="Password successfully changed!";
		header("Location: /account/welcome");
		exit;
	}

	public static function deleteuser(){
		session_start();
		if(!isset($_SESSION['user']) || empty($_SESSION["user"]))
		  header("Location: /account/welcome");

		$user=new User($_SESSION["user"],null);
		$user->set_db(DB::connection()->getPdo());
		try {
		  $user->delete();
		}
		catch (Exception $e) {
		    echo "Failed to delete user".$e->getMessage();
		 
		    header("Location: /account/welcome");
		    exit;
		}
		$_SESSION["message"]="Account is deleted!";//ne s'affiche pas car apres session est supprime'
		session_destroy();
		header("Location: /signin");
		exit;
	}
	public static function signout(){
		session_start();
	    session_destroy();
	    header("Location: /signin");
	    exit;
	}
}
?>