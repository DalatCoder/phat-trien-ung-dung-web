<?php

$all_params = $_GET;

$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];
$user_gender = $_POST['user_gender'];
$user_branch = $_POST['user_branch'];
?>

<h1>User Full Name: <?php echo $user_name; ?></h1>
<p>User Password: <?php echo $user_password; ?></p>
<p>User Gender: <?php echo $user_gender; ?></p>
<p>User Branch: <?php echo $user_branch; ?></p>
