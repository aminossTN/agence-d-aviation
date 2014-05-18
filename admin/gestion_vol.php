<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>welcom</title>
	<meta charset="UTF-8"/>
	<script src="../JS/formulaire.js"></script>
<?php include_once "../model/search.php";?>
</head>
<body>
<header><?php include_once "../vue/header.php";?></header>
<!-- liste des vols-->
<?php
$req = (isset($_GET['page']))?fetch_vol($_GET['page']):fetch_vol(1);
if(!($n = mysql_num_rows($req)))
{
	echo "Pas de vol dans la base.<br/>";
	if(isset($_GET['page']))
	{
		$p = $_GET['page']-1;
		header("location:gestion_vol.php?page=$p");
	}
}
else
{
?>
<h2>Liste des vols</h2>
<form method="POST" action="../controller/delete_vol.php">
<table border=1>
	<tr>
		<th><label><input type="checkbox" onClick="selectAll(1,<?php echo $n; ?>)"/>
		Selectionner</th>
		<th>Numero</th>
		<th>Avion</th>
		<th>Equipe</th>
		<th>Date de départ</th>
		<th>Depart</th>
		<th>Destination</th>
		<th>Date d'arrivée</th>
		<th>Place restant</th>
		<th>Valider</th>
		<th>Etat</th>
	</tr>
<?php
	for($i = 1 ; $row= mysql_fetch_assoc($req) ;$i++)
	{
		echo "<tr><td>";
		echo "<input type='checkbox' name='".$row['id_vol']."'id=$i /></td>";
		foreach($row as $elem)
			echo "<td>$elem</td>";
		echo "</tr>";
	}

?><table/>
	<input type="submit" value="Suppprimer"/>
<?php
	$pres = (isset($_GET['page']) && $_GET['page']-1>=1)?$_GET['page']-1:1;
	$suiv = (isset($_GET['page']))?$_GET['page']+1:2;
	$page = (isset($_GET['page']))?$_GET['page']:1;
	echo "<a href='?page=$pres'> <= precedent</a> page ".$page." <a href='?page=$suiv'>suivant => </a>";
}?>
</form>
<!-- liste des avions-->
<!-------------------->
<!--ajout d'un vol-->

<h2>ajouter un vol</h2>

<form method="POST" action="../controller/add_vol.php">
	
	Numero : <input type="text" name="id" required/><br/>
	Identifiant de l'avion : <input type="text" name="avion" /><br/>
	Identifiant de l'equipe : <input type="text" name="equipe"/><br/>
	date depart : <input type="date" name="date_d" required /><br/>
	depart : <input type="text" name="dep" required /><br/>
	destination : <input type="text" name="dest" required /><br/>
	date d'arrivée : <input type="date" name="date_a" required /><br/>
	<input type="submit" value="Valider"/>
</form>
<!----------ajout d'un avion------------->
<!------------------------------------ -->
<?php /*






























<!--liste des vol fait par un avion------>
<h2>Liste des vols</h2>
<form method="GET" action="#">
identifiant avion : <input type="text" name="id_av"/><!-- il faut changer ça par un menu -->
<input type="submit" value="Chercher"/><br/>
</form>
<?php
if(!isset($_GET['id_av']))
	echo "selectionner un avion.<br/>";
else
{?>
<h2>Liste des vols effectué par l'avion : <?php $_GET['id_av'];?></h2>
<?php
$req = (isset($_GET['page_av']))?fetch_avion_vol($_GET['page_av']):fetch_avion_vol(1);
if(!($n = mysql_num_rows($req)))
{
	if(id_exist("Avion" , "id_av" , $_GET['id_av']))
	
		echo "Pas de vol fait par cet avion.<br/>";
	else
		echo "identifiant inexistant dans la base.<br/>";
	
	if(isset($_GET['page_av']) && $_GET['page_av'] > 1)
	{
		$page = $_GET['page_av']-1;
		header("location:gestion_avion.php?page_av=$page");
	}
	
}
else
{
?>
<table border=1 >
<tr>
	<th>id vol</th>
	<th>id avion</th>
	<th>id equipe</th>
	<th>date depart</th>
	<th>depart</th>
	<th>destination</th>
	<th>date arrivé</th>
	<th>place restant</th>
	<th>valider</th>
	<th>etat</th>
</tr>
<?php
	for($i = 11 ; $row= mysql_fetch_assoc($req) ;$i++)
	{
		echo "<tr>";
		foreach($row as $elem)
			echo "<td>".$elem."</td>";
		echo "</tr>";
	}
?>
</table>
<?php
	$pres = (isset($_GET['page_av']) && $_GET['page_av']-1>=1)?$_GET['page_av']-1:1;
	$suiv = (isset($_GET['page_av']))?$_GET['page_av']+1:2;
	$page = (isset($_GET['page_av']))?$_GET['page_av']:1;
	echo "<a href='?page_eq=$pres'> <= precedent</a> page ".$page." <a href='?page_eq=$suiv'>suivant => </a>";//il y a un bug ici
}
}?>

<!--liste des vol fait par un avion------>
<aside><?php include_once "../controller/aside.php";?></aside>
<footer><?php include_once "../vue/footer.html";?></footer>*/?>
</body>
</html>
