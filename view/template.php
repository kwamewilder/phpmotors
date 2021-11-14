<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors</title>
    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php';?>
    </header>

    <nav>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/navigation.php';?>
    </nav>

    <h1>
        Content Title Here
    </h1>
    <div id="line"></div>

    <Footer>
        &#169; PHP Motors, All rights reserved. <br>
        All images used are believed to be in "Fair Use". Please notify the author if any are not and they will be removed. <br>
        <?php
        echo "Last Updated: " . date("F d Y", filemtime("home.php"));
        ?>
    </Footer>



</body>

</html>