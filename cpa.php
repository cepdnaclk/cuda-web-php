
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> CUDA - Correlation Power Analysis  </title>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/jquery.placeholder.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/myScript.js"></script>

    <link rel="stylesheet" href="css/style.css">


</head>

<h1> CUDA - Correlation Power Analysis </h1>
<body>



<div id="contact-form">	

<form id="contact" method="post" action="cpa/accept.php" enctype="multipart/form-data">
<fieldset>	


 <?php /*<input type="text" name="name" placeholder="Full Name" title="Enter your name" class="required">
*/?>


<input type="hidden" name="process" value="cpa"/>

<!--- Input File Box -->
 <div id="file1">
    <label for="file1">Plain text (.txt) </label>
    <input type="file" name="file1" placeholder="INPUT TEXT FILE" title="Select the input file" class="required file">
 </div>

<!--- Input File Box -->
<div id="file2">   
    <label for="file2">Power traces (.dat) </label>
    <input type="file" name="file2" placeholder="INPUT BINARY FILE" title="Select the input file" class="required file">
</div>

<!--- Input col Box -->
<div id = "mat_a_cols">
    <label  for="arg1" id="colsa">No.of plain text samples </label>
    <input id ="col" type="text" name="mat_a_rows" placeholder="" title="Enter the number of plain text samples " class="required WIDTH">
</div>

<!--- Input row Box -->
<div id = "mat_a_rows">
    <label for="arg2" id="rowsa">No.of sample points in a power trace </label>
    <input id = "arg2" type="tel" name="mat_a_cols" placeholder=""  title="Enter the number of sample points in a power trace " class="required HEIGHT">
</div>

<input type="submit" name="submit" class="button" id="submit" value="Send Request" />

</fieldset>
</form>

</div><!-- /end #contact-form -->

<script src="js/modernizr-min.js"></script>
<script>
if (!Modernizr.input.placeholder){
      $('input[placeholder], textarea[placeholder]').placeholder();
}
</script>
</body>
</html>
