<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> CUDA - Let's go parallel :D </title>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/jquery.placeholder.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/myScript.js"></script>

    <link rel="stylesheet" href="css/style.css">


</head>

<?php
ini_set('upload_max_filesize', '80M');
?>
<h1>  Generate Random Matrix  </h1>
<body>

<div id="contact-form">

    <form id="contact" method="post" action="random/accept.php" enctype="multipart/form-data">
        <fieldset>





            <input type="hidden" name="process" value="matrix_random"/>


            <!--- Input col Box -->
            <div id = "mat_a_cols">
                <label  for="arg1" id="colsa">No.of Rows</label>
                <input id ="col" type="text" name="mat_a_rows" placeholder="" title="Enter the WIDTH " class="required WIDTH">
            </div>

            <!--- Input col Box -->
            <div id = "mat_a_rows">
                <label  for="arg1" id="colsa">No.of Cols</label>
                <input id ="col" type="text" name="mat_a_cols" placeholder="" title="Enter the WIDTH " class="required WIDTH">
            </div>

            <input type="submit" name="submit" class="button" id="submit" value="Send Request" />

        </fieldset>
    </form>

</div><!-- /end #contact-form -->

<script src="/js/modernizr-min.js"></script>
<script>
    if (!Modernizr.input.placeholder){
        $('input[placeholder], textarea[placeholder]').placeholder();
    }
</script>
</body>
</html>