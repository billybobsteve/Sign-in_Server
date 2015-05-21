<?php 
$name = htmlspecialchars($_POST['name'])
$dest = htmlspecialchars($_POST['destination'])
echo "{$name} has just been signed out to {$dest}"; 
?>
