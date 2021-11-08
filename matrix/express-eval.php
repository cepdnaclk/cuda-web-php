<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> CUDA - Let's go parallel :D </title>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="http://jquery-limit.googlecode.com/files/jquery.limit-1.2.source.js"></script>
    <script src="../js/jquery.validate.js"></script>
    <script src="../js/jquery.placeholder.js"></script>
    <script src="../js/jquery.form.js"></script>
    <script src="../js/myScript.js"></script>

    <link rel="stylesheet" href="../css/style.css">



</head>
<?php
ini_set('upload_max_filesize', '80M');
?>
<h1> CUDA - Matrix Expression Evaluation </h1>
<body>

<div id="contact-form">

    <form id="contact" method="post" action="uploads/accept.php" enctype="multipart/form-data">
        <fieldset>


            <?php /*<input type="text" name="name" placeholder="Full Name" title="Enter your name" class="required">
*/?>



            <input type="hidden" name="process" value="matrix_express"/>

            <h1 >Matrices uploaded are identified by A, B, C, D, and E. </h1><br>
            <h2>- Expressions can have +,-,* operations including brackets. <br>- Inverse can be stated like inv(A)
                But nested inverses like inv(A*inv(B)) or inv(A+B) are not supported.<br>- spaces are allowed. But not mandatory <br>- Up to 5 matrices are supported. Keep unnecessary ones blank</h2>
            <br>

            <!--- Input File Box -->
            <div id="file1">
                <label for="file1">Matrix A (.txt) </label>
                <input type="file" name="file1" placeholder="INPUT TEXT FILE" title="Select the input file" class="required file">
            </div>

            <!--- Input col Box -->
            <div id = "mat_a_cols">
                <label  for="arg1" id="colsa">No.of Rows </label>
                <input id ="col" type="text" name="mat_a_rows" placeholder="" title="Enter the WIDTH " class="required WIDTH">
            </div>

            <!--- Input row Box -->
            <div id = "mat_a_rows">
                <label for="arg2" id="rowsa">No.of Columns </label>
                <input id = "arg2" type="tel" name="mat_a_cols" placeholder=""  title="Enter the HEIGHT " class="required HEIGHT">
            </div>


            <!--- Input File Box -->
            <div id="file2">
                <label for="file2">Matrix B (.txt) </label>
                <input type="file" name="file2" placeholder="INPUT TEXT FILE" title="Select the input file" class="required file">
            </div>

            <!--- Input col Box -->
            <div id = "mat_b_cols">
                <label  for="arg1" id="colsb">No.of Rows </label>
                <input id ="col" type="text" name="mat_b_rows" placeholder="" title="Enter the WIDTH " class="required WIDTH">
            </div>

            <!--- Input row Box -->
            <div id = "mat_b_rows">
                <label for="arg2" id="rowsb">No.of Columns </label>
                <input id = "arg2" type="tel" name="mat_b_cols" placeholder=""  title="Enter the HEIGHT " class="required HEIGHT">
            </div>

            <!--- Input File Box -->
            <div id="file3">
                <label for="file3">Matrix C (.txt) </label>
                <input type="file" name="file3" placeholder="INPUT TEXT FILE" title="Select the input file" class="required file">
            </div>

            <!--- Input col Box -->
            <div id = "mat_c_cols">
                <label  for="arg1" id="colsc">No.of Rows </label>
                <input id ="col" type="text" name="mat_c_rows" placeholder="" title="Enter the WIDTH " class="required WIDTH">
            </div>

            <!--- Input row Box -->
            <div id = "mat_c_rows">
                <label for="arg2" id="rowsc">No.of Columns </label>
                <input id = "arg2" type="tel" name="mat_c_cols" placeholder=""  title="Enter the HEIGHT " class="required HEIGHT">
            </div>


            <!--- Input File Box -->
            <div id="file4">
                <label for="file4">Matrix D (.txt) </label>
                <input type="file" name="file4" placeholder="INPUT TEXT FILE" title="Select the input file" class="required file">
            </div>

            <!--- Input col Box -->
            <div id = "mat_d_cols">
                <label  for="arg1" id="colsd">No.of Rows </label>
                <input id ="col" type="text" name="mat_d_rows" placeholder="" title="Enter the WIDTH " class="required WIDTH">
            </div>

            <!--- Input row Box -->
            <div id = "mat_d_rows">
                <label for="arg2" id="rowsd">No.of Columns </label>
                <input id = "arg2" type="tel" name="mat_d_cols" placeholder=""  title="Enter the HEIGHT " class="required HEIGHT">
            </div>

            <!--- Input File Box -->
            <div id="file5">
                <label for="file5">Matrix E (.txt) </label>
                <input type="file" name="file5" placeholder="INPUT TEXT FILE" title="Select the input file" class="required file">
            </div>

            <!--- Input col Box -->
            <div id = "mat_e_cols">
                <label  for="arg1" id="colse">No.of Rows </label>
                <input id ="col" type="text" name="mat_e_rows" placeholder="" title="Enter the WIDTH " class="required WIDTH">
            </div>

            <!--- Input row Box -->
            <div id = "mat_e_rows">
                <label for="arg2" id="rowse">No.of Columns </label>
                <input id = "arg2" type="tel" name="mat_e_cols" placeholder=""  title="Enter the HEIGHT " class="required HEIGHT">
            </div>

            <label for="expression">Expression</label>
            <textarea name="expression" class="alpha" ID="tb1" placeholder="A + B*C + D*E + inv(A)*(A+inv(A))" ></textarea>
            Remaining Characters: <span id="left" ></span>



            <input type="submit" name="submit" class="button" id="submit" value="Send Request" />

        </fieldset>
    </form>

</div><!-- /end #contact-form -->

<script src="../js/modernizr-min.js"></script>
<script>
    if (!Modernizr.input.placeholder){
        $('input[placeholder], textarea[placeholder]').placeholder();
    }

//    $('textarea').limit('250','#left');


    $(function() {
        $('textarea.alpha').keyup(function() {
            if (this.value.match(/[^A-E0-9invd\-)(et/*+. ]/g)) {
                this.value = this.value.replace(/[^A-E0\-)(9in-vdet/*+. ]/g, '');
            }
        });
    });

</script>

</body>
</html>
