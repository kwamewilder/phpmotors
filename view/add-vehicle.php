<?php
// Build a dynamic select dropdown list using the $classifications array
$selectList = '<select name="classificationId" id="classificationId" required>';
$selectList .= '<option value="">-Choose Car Classification-</option>';
foreach ($classifications as $classification) {
    $selectList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classification['classificationId'] === $classificationId) {
            $selectList .= ' selected ';
        }
    }
    $selectList .= ">$classification[classificationName]</option>";
}
$selectList .= '</select>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>

    <title>PHP Motors</title>
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
            <h1>Add a Vehicle</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="/phpmotors/vehicles/index.php" method="post">
                <p>*Note all Fields are Required</p>
                <?php echo $selectList; ?><br>

                <label for="invMake">Make</label><br>
                <input <?php if (isset($invMake)) {
                            echo "value='$invMake'";
                        } ?> type="text" id="invMake" name="invMake"><br>

                <label for="invModel">Model</label><br>
                <input <?php if (isset($invModel)) {
                            echo "value='$invModel'";
                        } ?> type="text" id="invModel" name="invModel"><br>

                <label for="invDescription">Description</label><br>
                <textarea rows="2" cols="20" id="invDescription" name="invDescription"><?php if (isset($_POST['invDescription'])) {
                                                                                            echo htmlentities($_POST['invDescription'], ENT_QUOTES);
                                                                                        } ?></textarea><br>

                <label for="invImage">Image Path</label><br>
                <input <?php if (isset($invImage)) {
                            echo "value='$invImage'";
                        } ?> type="text" id="invImage" name="invImage"><br>

                <label for="invThumbnail">Thumbnail Path</label><br>
                <input <?php if (isset($invThumbnail)) {
                            echo "value='$invThumbnail'";
                        } ?> type="text" id="invThumbnail" name="invThumbnail"><br>

                <label for="invPrice">Price</label><br>
                <input <?php if (isset($invPrice)) {
                            echo "value='$invPrice'";
                        } ?> type="number" id="invPrice" name="invPrice"><br>

                <label for="invStock">Stock</label><br>
                <input <?php if (isset($invStock)) {
                            echo "value='$invStock'";
                        } ?> type="number" id="invStock" name="invStock"><br>

                <label for="invColor">Color</label><br>
                <input <?php if (isset($invColor)) {
                            echo "value='$invColor'";
                        } ?> type="text" id="invColor" name="invColor"><br>

                <input type="submit" name="submit" value="Add Vehicle" id="btn">
                <input type="hidden" name="action" value="adding-vehicle">
            </form>
        </div>
    </main>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/scripts/scripts.php'; ?>
</body>

</html>