<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> CUDA - Mandelbrot set  </title>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/jquery.placeholder.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/myScript.js"></script>

    <link rel="stylesheet" href="css/style.css">


</head>

<h1> CUDA - Mandelbrot set </h1>
<body>

<div id="contact-form">

    <form id="contact" method="post" action="mandelbrot/accept.php" enctype="multipart/form-data">
        <fieldset>

            <input type="hidden" name="process" value="mandel"/>

            <div id = "mat_b_cols">
                <label  for="arg1"  id="colsb">WIDTH ( in PIXEL )</label>
                <input id ="col2" type="text" name="mat_b_rows" placeholder="1024" title="Enter the WIDTH " class="required WIDTH">
            </div>

            <div id = "mat_b_rows">
                <label for="arg2" id="rowsb">HEIGHT ( in PIXEL )</label>
                <input id = "arg22" type="tel" name="mat_b_cols" placeholder="768"  title="Enter the HEIGHT " class="required HEIGHT">
            </div>

            <div id = "arg3">
                <label id = "arg3" for="arg3">REAL_MIN( x min)</label>
                <input id = "arg3" type="text" name="arg3" placeholder="-2" title="Enter the REAL_MIN " class="required REAL_MIN">
            </div>

            <div id = "arg4">
                <label id = "arg4" for="arg4">REAL_MAX (x max)</label>
                <input id = "arg4" type="tel" name="arg4" placeholder="1.2" title="Enter the REAL_MAX " class="required REAL_MAX">
            </div>

            <div id = "arg5">
                <label id = "arg5" for="arg5">IMAGINARY_MIN (y min)</label>
                <input id = "arg5" type="text" name="arg5" placeholder="-1.5" title="Enter the  IMAGINARY_MIN " class="required IMAGINARY_MIN">
            </div>

            <div id = "arg6">
                <label id = "arg6" for="arg6">IMAGINARY_MAX  (y max)</label>
                <input id = "arg6" type="tel" name="arg6" placeholder="1.5" title="Enter the  IMAGINARY_MAX " class="required IMAGINARY_MAX" >
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
