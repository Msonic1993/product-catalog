<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
include 'header.php';
?>

		<div class="content">
			<h2>Witaj w aplikacji <?=$_SESSION['name']?></h2>
		</div>

<?php include 'footer.php';?>
