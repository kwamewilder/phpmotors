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
        <img src="/phpmotors/images/site/logo.png" alt="logo">

        <h2>
            My Account
        </h2>

    </header>

    <nav>
        <?php echo $navList; ?>
    </nav>

    <h1>
        Server Error
    </h1>
    <p>Sorry our server seems to be experiencing some technical difficulties. Please check back later. </p>
    <div id="line"></div>

    <Footer>
        <?php require $_SERVER['DOCUMENT_ROOT']. '/phpmotors/common/footer.php';  ?>
    </Footer>



</body>

</html>