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

<h1> CUDA - Let's go parallel :D </h1>
<body>

<div id="contact-form">

    <form id="contact" method="post" action="sort/accept.php" enctype="multipart/form-data">
        <fieldset>

            <input type="hidden" name="process" value="sort"/>

            <!--- Input File Box -->
            <div id="file1">
                <label for="file1">Matrix A (.txt) </label>
                <input type="file" name="file1" placeholder="INPUT TEXT FILE" title="Select the input file" class="required file">
            </div>

            <div id = "mat_b_cols">
                <label  for="arg1"  id="colsb">No. of elements</label>
                <input id ="col2" type="text" name="elems" placeholder="1024" title="Enter the WIDTH " class="required WIDTH">
            </div>

            <div id="sort_type">
                <label  for="arg1"  id="colsb"> Ascending</label>
                   <input type="radio" name="type" value="1"/>
                <label  for="arg1"  id="colsb"> Descending</label>
                    <input type="radio" name="type" value="2"/>

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
