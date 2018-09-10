<?PHP
// Confere se usuário já logou para poder acessar essa tela
session_start();

// Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['matricula']) and !isset($_SESSION['senha']) ) {
	// Destrói
	session_destroy();
	// Limpa
	unset ($_SESSION['matricula']);
	unset ($_SESSION['senha']);	
	$loggenOnUser=$_SESSION['matricula'];
	// Redireciona para a página de autenticação
	header('location:index.php');
}
?>