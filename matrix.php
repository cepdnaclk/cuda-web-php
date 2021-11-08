<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> CUDA - Let's go parallel :D </title>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src=".js/jquery.placeholder.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/myScript.js"></script>

    <link rel="stylesheet" href="css/style.css">


</head>

<h1> CUDA - Let's go parallel :D </h1>
<br>
<body>

<div id="contact-form">	


<div><a class="dark_button width-150px" href="matrix/addition.php">Matrix Addition</a></div><br>
<div><a class="dark_button width-150px" href="matrix/multiplication.php">Matrix Multipl ication</a></div><br>
<div><a class="dark_button width-150px"  href="matrix/lud.php">LU Decomposition</a></div><br>
<div><a class="dark_button width-150px"  href="matrix/linear.php">Linear System</a></div><br>
<div><a class="dark_button width-150px"  href="matrix/det.php">Determinant</a></div><br>
<div><a class="dark_button width-150px"  href="matrix/inverse.php">Inverse</a></div><br><br>
<!--<div><a class="dark_button width-150px"  href="matrix/eigen.php">Eigen values/vectors</a></div>-->
<div><a class="dark_button width-150px"  href="matrix/express-eval.php">Expression Evaluation</a></div><br>




</div><!-- /end #contact-form -->

<script src="js/modernizr-min.js"></script>
<script>
if (!Modernizr.input.placeholder){
      $('input[placeholder], textarea[placeholder]').placeholder();
}
</script>
</body>
</html>
