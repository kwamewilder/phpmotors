<?php

//Build Select list

$classifList = '<select name="classificationId">';
foreach ($classifications as $classification) {
    $classifList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if($classification['classificationId'] === $classificationId){
            $classifList .= ' selected ';
        }  
    }
    $classifList .= "> $classification[classificationName]</option>";
}

$classifList .= '</select>';

if ($_SESSION['clientData']['clientLevel'] < 2){
    header('Location: /phpmotors/');
    exit;
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle | PHP Motors</title>
    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php echo $navList; ?>
    </nav>

    <h1>
        Add Vehicle
    </h1>

    <?php
    if (isset($message)) {
        echo '<strong><p class="message">' . $message . '</p></strong>';
    }
    ?>

    <form action="/phpmotors/vehicles/index.php" method="post">

        <p>*Note all Fields are Required</p>

        <fieldset>
            <label class="top">Car classification</label>
            <?php echo $classifList; ?><br>

            <label class="top" for="invMake">Make</label>
            <input class="top" type="text" name="invMake" id="invMake" <?php if (isset($invMake)) {
                                                                            echo "value='$invMake'";
                                                                        } ?> required>

            <label class="top" for="invModel">Model</label>
            <input class="top" type="text" name="invModel" id="invModel" <?php if (isset($invModel)) {
                                                                                echo "value='$invModel'";
                                                                            } ?> required>

            <label class="top" for="invDescription">Description</label>
            <textarea class="top" name="invDescription" id="invDescription" rows="5" cols="20" <?php if (isset($invDescription)) {echo "value='$invDescription'";}?> required></textarea>

            <label class="top" for="invImage">Image Path</label>
            <input class="top" type="text" name="invImage" id="invImage" value="phpmotors/images/no-image.png" required>

            <label class="top" for="invThumbnail">Thumbnail Path</label>
            <input class="top" type="text" name="invThumbnail" id="invThumbnail" value="phpmotors/images/no-image.png" required>

            <label class="top" for="invPrice">Price</label>
            <input class="top" type="text" name="invPrice" id="invPrice" <?php if (isset($invPrice)) {
                                                                                echo "value='$invPrice'";
                                                                            } ?> required>

            <label class="top" for="invStock"># In Stock</label>
            <input class="top" type="text" name="invStock" id="invStock" <?php if (isset($invStock)) {
                                                                                echo "value='$invStock'";
                                                                            } ?> required>

            <label class="top" for="invColor">Color</label>
            <input class="top" type="text" name="invColor" id="invColor" <?php if (isset($invColor)) {
                                                                                echo "value='$invColor'";
                                                                            } ?> required>

            
            <button class="SubmitBtn" type="submit" name="submit" id="addVBtn">Add Vehicle</button>

            <input type="hidden" name="action" value="addVehicle-attempt">

        </fieldset>

    </form>
    <div id="line"></div>

    <Footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </Footer>



</body>

</html>