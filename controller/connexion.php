<?php
session_start();
include_once "../model/search.php";
include_once "../model/session.php";

if( !$_POST['login'] || !$_POST['pwd']) header("location:../");

if( login_exist("Utilisateur" , $_POST['login'] , $_POST['pwd'] ) )
{
	if(isset($_POST['souvenir']))
	{
		setcookie("login" , $_POST['login'] , time()+ 3600*24*7 , "/www/aeroport");
		setcookie("pwd" , $_POST['pwd'] , time()+ 3600*24*7 , "/www/aeroport");
		
	}
		
	$row = fetch($_POST['login']);
	load_session($row);
	
	header("location:../");
}
else
{
	echo "login ou mot de passe invalide";
	header("refresh:3;url=../");

}





