<!DOCTYPE html>
<html lang="en">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>

    <title><?php if (isset($invInfo['invMake'])) {
                echo "Delete $invInfo[invMake] $invInfo[invModel]";
            } ?> | PHP Motors</title>
</head>

<!-- checks user level and if they are logged in -->
<?php
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] != 3) {
    header('Location: ../index.php');
    exit;
}
?>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
        echo $navList; ?>
    </nav>

    <main>
        <div class="main_content">
            <h1><?php if (isset($invInfo['invMake'])) {
                    echo "Delete $invInfo[invMake] $invInfo[invModel]";
                } ?></h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <p>Are you sure this is the correct vehicle you want to delete? Once removed it cannot be recovered.</p>
            <form action="/phpmotors/vehicles/index.php" method="post">

                <label for="invMake">Make</label><br>
                <input <?php
                        if (isset($invInfo['invMake'])) {
                            echo "value='$invInfo[invMake]'";
                        } ?> type="text" id="invMake" name="invMake" readonly><br>

                <label for="invModel">Model</label><br>
                <input <?php
                        if (isset($invInfo['invModel'])) {
                            echo "value='$invInfo[invModel]'";
                        } ?> type="text" id="invModel" name="invModel" readonly><br>

                <label for="invDescription">Description</label><br>
                <textarea rows="2" cols="20" id="invDescription" name="invDescription" readonly><?php
                                                                                                if (isset($invInfo['invDescription'])) {
                                                                                                    echo "value='$invInfo[invDescription]'";
                                                                                                } ?>></textarea><br>

                <input type="submit" name="submit" value="Delete Vehicle" id="btn">
                <input type="hidden" name="action" value="deleteVehicle">
                <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                                echo $invInfo['invId'];
                                                            } ?>">

            </form>
        </div>
    </main>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/scripts/scripts.php'; ?>
</body>

</html>