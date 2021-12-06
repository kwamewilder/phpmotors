<!DOCTYPE html>
<html lang="en">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>PHP Motors</title>
</head>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php echo $navList; ?>
    </nav>

    <section class="picture">
    <h1 class="headings">Welcome to PHP Motors!</h1>
    <ul class="featuresOfCar">
        <li class="colorText">DMC Delorean</li>
        <li class="colorText">3 Cup holders</li>
        <li class="colorText">Superman doors</li>
        <li class="colorText">Fuzzy dice!</li>
    </ul>
    <button>Own Today</button>
    <img src="/phpmotors/images/vehicles/delorean.jpg" alt="Image of the Delorean car.">
</section>

<div class="fullsizeWrapper">

    <section class="reviewSection">
        <h2 class="headings">DMC Delorean Reviews</h2>
        <ul>
            <li>"So fast its almost like traveling in time. (4/5)"</li>
            <li>"Coolest ride on the road." (4/5)</li>
            <li>"I'm feeling McFly! (5/5)"</li>
            <li>"The most futuristic ride of our day." (4.5/5)</li>
            <li>"80's livin and I love it!" (5/5)</li>
        </ul>
    </section>

    <section class="upgradeSection">
        <h2 class="headings">Delorean Upgrades</h2>
        <div class="gridWrapper">
            <div id="fluxCap">
                <img class="imageBackground" src="/phpmotors/images/upgrades/flux-cap.png" alt="Image for flux capacitor upgrade.">
                <a href="#" title="Link to view the flux capacitor upgrade">Flux Capacitor</a>
            </div>

            <div id="flames">
                <img class="imageBackground" src="/phpmotors/images/upgrades/flame.jpg" alt="Image for flame decal upgrade.">
                <a href="#" title="Link to view the flame decal upgrade">Flame Decals</a>
            </div>

            <div id="bumperStickers">
                <img class="imageBackground" src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="Image for bumber sticker upgrade.">
                <a href="#" title="Link to view the bumber sticker upgrade">Bumper Stickers</a>
            </div>

            <div id="hubcaps">
                <img class="imageBackground" src="/phpmotors/images/upgrades/hub-cap.jpg" alt="Image for hub caps upgrade.">
                <a href="#" title="Link to view the hub caps upgrade">Hub Caps</a>
            </div>
        </div>
    </section>
</div>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/scripts/scripts.php'; ?>
</body>

</html>