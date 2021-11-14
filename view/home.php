<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | PHP Motors</title>
    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php echo $navList;
        //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/navigation.php';
        ?>
    </nav>

    <h1>
        Welcome to PHP Motors!
    </h1>
    <section class="main_focus">
        <div class="d_wrapper">
            <div class="details">
                <h2>DMC Delorean</h2>
                <p><strong>
                        3 Cup holders <br>
                        Superman doors <br>
                        Fuzzy dice! <br>
                    </strong>
                </p>
                <img class="img_button" src="/phpmotors/images/site/own_today.png" alt="button">
            </div>
        </div>
        <img class="delorean" src="/phpmotors/images/delorean.jpg" alt="delorean">

    </section>

    <section class="info">
        <div class="upgrades">
            <h3>Delorean Upgrades</h3>
            <div class="info_wrapper">
                <div class="info_details">
                    <div class="images">
                        <img src="/phpmotors/images/upgrades/flux-cap.png" alt="flux">
                    </div>
                    <a href="#">Flux Capacitor</a>
                </div>

                <div class="info_details">
                    <div class="images">
                        <img src="/phpmotors/images/upgrades/flame.jpg" alt="flame">
                    </div>
                    <a href="#">Flame Decals</a>
                </div>

                <div class="info_details">
                    <div class="images">
                        <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="bumper">
                    </div>
                    <a href="#">Bumper Stickers</a>
                </div>

                <div class="info_details">
                    <div class="images">
                        <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="hub">
                    </div>
                    <a href="#">Hub Caps</a>
                </div>
            </div>
        </div>

        <div class="reviews">
            <h3>DMC Delorean Reviews</h3>
            <ul>
                <li>"So fast its almost like travelling in time." (4/5) </li>
                <li>"Coolest ride on the road" (4/5) </li>
                <li>"I'm feeling Marty McFly!" (5/5)</li>
                <li>"The most futuristic ride of our day." (4.5/5)</li>
                <li>"80's livin and I love it" (5/5) </li>
            </ul>

        </div>
    </section>
    <div id=line></div>
    <Footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php' ?>
    </Footer>

</body>

</html>