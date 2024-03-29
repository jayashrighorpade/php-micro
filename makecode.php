<?php
   session_start(); 
   
    if($_SESSION["username"] == "")
    {
        echo 'not logged in';
        header("Location: login.php");
        exit;
    }

?>

<?php

$error = false;
$md5 = false;
$code = "";

if ( isset($_GET['code']) ) 
{
    $code = $_GET['code'];

    if ( strlen($code) != 4 ) 
    {
        $error = "Input must be exactly four numbers";
    } 
    
    else if ( $code[0] < "0" || $code[0] > "9" || 
              $code[1] < "0" || $code[1] > "9" ||
              $code[2] < "0" || $code[2] > "9" ||
              $code[3] < "0" || $code[3] > "9"  ) 
    {
        $error = "Input must be four numbers";
    } 
    
    else 
    {
        $md5 = hash('md5', $code);
    }
}
?>



<!DOCTYPE html>
<head>
    <title>MD5</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>


<body style="background: rgb(39, 14, 39)">
<h1 style="color:rgb(255, 255, 255);text-align:center;font-family: 'Julius Sans One', sans-serif;font-size: 40px;">MD5 PIN Maker</h1>

<?php

if ( $error !== false ) 
{
    print '<p style="color:red;font-size: 15px;font-family: Open Sans;">';
    print htmlentities($error);
    print "</p>\n";
}

if ( $md5 !== false ) 
{
    print "<p style='text-align:left ;font-size: 15px;font-family: Open Sans;color:lightgreen;'>MD5 value: ".htmlentities($md5)."</p>";
}

?>

<p style="text-align:left;font-size: 20px;font-family: Open Sans;color:aliceblue;">Please enter a four number key for encoding.</p>

<form>
<input type="text" name="code" value="<?= htmlentities($code) ?>"/>
<input type="submit" value="Compute MD5"/>
</form>

<ul>
<li><a href="makecode.php" style="text-align: center;font-size: 20px;font-family: Open Sans;color:aliceblue;">Reset</a></li><br><br>
<li><a href="indexx.php" style="text-align: center;font-size: 20px;font-family: Open Sans;color:aliceblue;">Back to cracking</a></li><br>
<li><a href="home.php" style="text-align: center;font-size: 20px;font-family: Open Sans;color:aliceblue;">Home</a></li>
</ul>

</body>
</html>