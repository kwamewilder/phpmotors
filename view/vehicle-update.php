<?php

//Build Select list

// Build the classifications option list
$classifList = '<select name="classificationId" id="classificationId">';
$classifList .= "<option>Choose a Car Classification</option>";
foreach ($classifications as $classification) {
    $classifList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classification['classificationId'] === $classificationId) {
            $classifList .= ' selected ';
        }
    } elseif (isset($invInfo['classificationId'])) {
        if ($classification['classificationId'] === $invInfo['classificationId']) {
            $classifList .= ' selected ';
        }
    }
    $classifList .= ">$classification[classificationName]</option>";
}
$classifList .= '</select>';


if (($_SESSION['clientData']['clientLevel']) < 2) {
    header('Location: /phpmotors/');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Modify $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Modify $invMake $invModel";
            } ?> | PHP Motors</title>
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
        <?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
            echo "Modify $invInfo[invMake] $invInfo[invModel]";
        } elseif (isset($invMake) && isset($invModel)) {
            echo "Modify $invMake $invModel";
        } ?>
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
                                                                        } elseif (isset($invInfo['invMake'])) {
                                                                            echo "value='$invInfo[invMake]'";
                                                                        } ?> required>

            <label class="top" for="invModel">Model</label>
            <input class="top" type="text" name="invModel" id="invModel" <?php if (isset($invModel)) {
                                                                                echo "value='$invModel'";
                                                                            } elseif (isset($invInfo['invModel'])) {
                                                                                echo "value='$invInfo[invModel]'";
                                                                            } ?> required>

            <label class="top" for="invDescription">Description</label>
            <textarea class="top" name="invDescription" id="invDescription" required ><?php if (isset($invDescription)) {
                                                                                            echo $invDescription;
                                                                                        } elseif (isset($invInfo['invDescription'])) {
                                                                                            echo $invInfo['invDescription'];
                                                                                        } ?></textarea>

            <label class="top" for="invImage">Image Path</label>
            <input class="top" type="text" name="invImage" id="invImage" <?php if (isset($invImage)) {
                                                                                echo "value='$invImage'";
                                                                            } elseif (isset($invInfo['invImage'])) {
                                                                                echo "value='$invInfo[invImage]'";
                                                                            } ?> required>

            <label class="top" for="invThumbnail">Thumbnail Path</label>
            <input class="top" type="text" name="invThumbnail" id="invThumbnail" <?php if (isset($invMake)) {
                                                                                        echo "value='$invThumbnail'";
                                                                                    } elseif (isset($invInfo['invThumbnail'])) {
                                                                                        echo "value='$invInfo[invThumbnail]'";
                                                                                    } ?> required>

            <label class="top" for="invPrice">Price</label>
            <input class="top" type="text" name="invPrice" id="invPrice" <?php if (isset($invPrice)) {
                                                                                echo "value='$invPrice'";
                                                                            } elseif (isset($invInfo['invPrice'])) {
                                                                                echo "value='$invInfo[invPrice]'";
                                                                            }  ?> required>

            <label class="top" for="invStock"># In Stock</label>
            <input class="top" type="text" name="invStock" id="invStock" <?php if (isset($invStock)) {
                                                                                echo "value='$invStock'";
                                                                            } elseif (isset($invInfo['invStock'])) {
                                                                                echo "value='$invInfo[invStock]'";
                                                                            } ?> required>

            <label class="top" for="invColor">Color</label>
            <input class="top" type="text" name="invColor" id="invColor" <?php if (isset($invColor)) {
                                                                                echo "value='$invColor'";
                                                                            } elseif (isset($invInfo['invColor'])) {
                                                                                echo "value='$invInfo[invColor]'";
                                                                            }  ?> required>


            <button class="SubmitBtn" type="submit" name="submit" id="addVBtn" value="Update Vehicle">Update Vehicle</button>

            <input type="hidden" name="action" value="updateVehicle">
            <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                            echo $invInfo['invId'];
                                                        } elseif (isset($invId)) {
                                                            echo $invId;
                                                        } ?>">

        </fieldset>

    </form>
    <div id="line"></div>

    <Footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </Footer>



</body>

</html>