<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Consulta de Usuário</title>
</head>
<body>
	<?php
		if(isset($_SESSION['users'])){
			include_once '../../Model/UserModel.php';
			$users = array();
			$users = unserialize($_SESSION['users']);

			foreach ($users as $u) {
				echo '<tr>';
				echo "<td><a href='../../Controller/UserController.php?operation=excluirid=$u->id'>Deletar</a></td> -";
				echo "$u->nome<br>";
				echo '</tr>';
			}
			unset($_SESSION['users']);
		}
	?>
</body>      
</html>