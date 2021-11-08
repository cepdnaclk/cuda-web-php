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
<script>
    /*
$(function(){
$('#contact').validate({
submitHandler: function(form) {
    $(form).ajaxSubmit({
    url: 'uploads/accept.php',
    success: function() {
    $('#contact').hide();
    $('#contact-form').append("<p class='thanks'>Please Wait ...</p>")
    }
    });
    }
});         
});*/
</script>

<script type="text/javascript">
    $(function(){

        $('#file1').hide();
        $('#file2').hide();
        $('#mat_a_cols').hide();
        $('#mat_a_rows').hide();


        $('select').change(function(){ // when one changes
           //$('select').val( $(this).val() ) // they all change
            //alert( $(this).val());
            var selected = $(this).val();

            if( selected == 'Mandelbrot set'){

                $('#file1').hide();
                $('#file2').hide();

                $('#mat_a_cols').hide();
                $('#mat_a_rows').hide();

                $('#mat_b_rows').show();
                $('#mat_b_cols').show();


                $('#colsa').text('WIDTH');
                $('#rowsa').text('HEIGHT');

                $('#colsb').text('WIDTH');
                $('#rowsb').text('HEIGHT');

//                $('#col').attr('placeholder','1024');
//                $('#arg2').attr('placeholder','768');
                $('#col2').attr('placeholder','1024');
                $('#arg22').attr('placeholder','768');

                $('#arg3').show();
                $('#arg4').show();
                $('#arg5').show();
                $('#arg6').show();


            }else if( selected == 'Matrix Multiplication'){
                $('#file1').show();
                $('#file2').show();

                $('#mat_a_cols').show();
                $('#mat_a_rows').show();

                $('#colsa').text('COLUMNS');
                $('#rowsa').text('ROWS');

                $('#colsb').text('COLUMNS');
                $('#rowsb').text('ROWS');

                $('#col').attr('placeholder','');
                $('#arg2').attr('placeholder','');
                $('#col2').attr('placeholder','');
                $('#arg22').attr('placeholder','');

                $('#arg3').hide();
                $('#arg4').hide();
                $('#arg5').hide();
                $('#arg6').hide();

            }else if( selected =='Matrix Addition'){

                $('#file1').show();
                $('#file2').show();


                $('#mat_a_cols').hide();
                $('#mat_a_rows').hide();

                $('#colsa').text('COLUMNS');
                $('#rowsa').text('COLUMNS');

                $('#col').attr('placeholder','');
                $('#arg2').attr('placeholder','');

                $('#arg3').hide();
                $('#arg4').hide();
                $('#arg5').hide();
                $('#arg6').hide();

            }else{
                //$('div').hide();
                msgs ='4';
            }
            //alert(msgs);
        })



    })
</script>

</head>

<h1> CUDA - Let's go parallel :D </h1>
<body>

<div id="contact-form">	

<form id="contact" method="post" action="uploads/accept.php" enctype="multipart/form-data">
<fieldset>	

<label for="name">Name</label>
    <div class="social-option">
    <select placeholder="--" id="dep" name="process" >
        <option> Mandelbrot set</option>
        <option> Matrix Multiplication</option>
        <option> Matrix Addition</option>
        <option> Other</option>
    </select>
        </div>
 <?php /*<input type="text" name="name" placeholder="Full Name" title="Enter your name" class="required">
*/?>

    <?php
    /*
     * WIDTH in PIXELS
HEIGHT inx PIXELS
REAL_MIN( x min)
REAL_MAX (x max)
IMAGINARY_MIN (y min)
IMAGINARY_MAX  (y max)
     *1024 768 -2 1.5 -2.5 2.5
     */

    ?>

 <div id="file1">
<label for="file1">Input (.txt) </label>
<input type="file" name="file1" placeholder="INPUT TEXT FILE" title="Select the input file" class="required file">
 </div>

    <div id = "mat_a_cols">
        <label  for="arg1" id="colsa">WIDTH ( in PIXEL )</label>
        <input id ="col" type="text" name="mat_a_rows" placeholder="1024" title="Enter the WIDTH " class="required WIDTH">
    </div>

    <div id = "mat_a_rows">
        <label for="arg2" id="rowsa">HEIGHT ( in PIXEL )</label>
        <input id = "arg2" type="tel" name="mat_a_cols" placeholder="768"  title="Enter the HEIGHT " class="required HEIGHT">
    </div>

<div id="file2">
    <label for="file2">Input (.txt) </label>
    <input type="file" name="file2" placeholder="INPUT TEXT FILE" title="Select the input file" class="required file">
</div>

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


<label for="message">Errors/Log</label>
<textarea name="message"></textarea>

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