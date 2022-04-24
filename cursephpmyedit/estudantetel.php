<!DOCTYPE html>
<html>
<head>
	<title>Estudante Telefone</title>
	<link rel="stylesheet" type="text/css" href="css/estudanteindex">
</head>
<body>
	<header>
		<div class="p1">School Management 			
		<input type="button" name="logout" id="logout" value="Log Out" onclick="location.href='logout.php' ">
		</div>        
	</header>
	<div class="left">
		<div class="cd">Menu</div>
		<div id="menu">
			<ul class="box">
				<li class="estudanteinfo"><a href="estudanteindex.php" class="xx">Estudante Info</a></li>
				<li class="estudantecurso"><a href="estudantecurso.php" class="xx">Escolher Disciplina</a></li>
				<li class="consultaAll"><a href="searchcourse.php" class="xx">Pesquisa Disciplina</a></li>
				<li class="anular"><a href="anulardis.php" class="xx">Anular Disciplina</a></li>
				<li class="alterar">
					<a href="#" class="xx">Alterar Profile</p>
					<ul>
						<li><a href="estudanteage.php" class="xx">Alterar Idade</a></li>
						<li><a href="estudantetel.php" class="xx">Alterar Telefone</a></li>
					</ul>
				</li>
				<li class="changepw"><a href="changepw.php" class="xx">Alterar Password</a></li>
			</ul>
		</div>
	</div>
	<div class="right">
		<?php 
			session_cache_limiter('nocache');
			session_start();
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  Bem vindos estudante".'“'.$_SESSION['username'].'”'."Login!"."<br>"."<br>";
			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','curse','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('Falha na conexão do base de dados!')</script>";
			}
			if(isset($_POST['submit'])){
				$tel=$_POST['newtel'];
				if($tel==""){
					echo"<script>alert('Introduz numero Telefone!');window.history.go(-1)</script>";
					exit();
				}
				$result=mysqli_query($link,"update estudante set tel=$tel where username=$username");

				if($result==1){
					echo"<script>alert('Sucesso!');window.history.go(-1)</script>";
				}
			}
			mysqli_close($link);			
		 ?>
		<form name="estudantetel" id="estudantetel" method="post">
			<table border="0" cellspacing="0" cellpadding="0"  class="rt">
				<tr>
					<td>Introduz nova numero telefone：</td>
					<td><input type="text" name="newtel" size="20"></td>
					<td><input type="submit" name="submit" value="Change" class="sb"></td>
				</tr>
			</table>			
		</form>		
	</div>
</body>
</html>