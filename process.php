<?php
// Get Data	
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$phone = strip_tags($_POST['phone']);
$eno = strip_tags($_POST['eno']);
$year = strip_tags($_POST['year']);
$dep = strip_tags($_POST['dep']);
$message = strip_tags($_POST['message']);

// Send Message
mail( "mail.peraefac@gmail.com", "Register Form : Peraefac.com",
" Name: $name\n Email: $email\n E-No.: $eno\n year.: $year\n Dep : $dep\n Phone: $phone\n Message: $message\n",
"From: Registration Request <fawzan@peraefac.com>" );
?>