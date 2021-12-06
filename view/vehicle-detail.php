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
        <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
        echo $navList; ?>
    </nav>

    <main>
        <h1 class="center">Vehicle Details</h1>
        <section class="main">


            <?php
            if (!empty($vehicleDetailsDisplay)) {
                echo $vehicleDetailsDisplay;
            }
            if (isset($thumbnailsList)) {
                echo $thumbnailsList;
            }
            ?>

        </section>
    </main>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/scripts/scripts.php'; ?>
</body>

</html>