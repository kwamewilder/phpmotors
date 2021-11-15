<?php
 
//Buil classification list
$classList = "<select name='classificationId' id='classificationId'>";
$classList .= '<option value ="">Please Choose</option>';
foreach ($classifications as $classification) {
   $classList .= "<option value='$classification[classificationId]'";
   if(isset($classificationId)){
   
   if($classId['classificationId'] === $classificationId){
     $classList .= ' selected ';
 }
}   
   $classList .= ">$classification[classificationName]</option>";
}
$classList .= "</select>";

?>
<?php

if (isset($_SESSION['clientData']['clientLevel'])&&($_SESSION['clientData']['clientLevel'] != 3)) {
    header('Location: /phpmotors/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <title>PHP Motors | Add Vehicle</title>
    </head>
    <!-- checks user level and if they are logged in -->

    <body>
        <header>
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php';
            ?>
        </header>
        <nav class>
            <?php
              //require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/navigation.php';
              echo $navList;
            ?>
        </nav>
        <main>
            <h1>Add Vehicle</h1>
                <?php
                if (isset($message)) {
                echo $message;
                }
                ?>
                <form action="/phpmotors/vehicles/index.php?action=addNewVehicle" method="post">
                    <fieldset>
                        <label>Classification</label><br>
                        <?php echo $classList; ?> <br>
                        <label>Make</label><br>
                        <input type='text' name='invMake' id="invMake" <?php if(isset($invMake)){echo "value='$invMake'";} ?> required><br>
                        <label>Model</label><br>
                        <input type="text" name="invModel" id="invModel" <?php if(isset($invModel)){echo "value='$invModel'";} ?> required><br>
                        <label>Description</label><br>
                        <textarea rows="5" name='invDescription' id="invDescription">
                        <?php if(isset($invDescription)){echo "value='$invDescription'";} ?>
                        </textarea>
                        <br>
                        <label>Image</label><br>
                        <input type="text" name="invImage" id="invImage" value="/phpmotors/images/no-image.png" <?php if(isset($invImage)){echo "value='$invImage'";} ?> required><br>
                        <label>Thumbnail</label><br>
                        <input type="text" name="invThumbnail" id="invThumbnail" value="/phpmotors/images/no-image-tn.png"<?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> required><br>
                        
                        <label>Price</label><br>
                        <input type="number" name="invPrice" id="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required><br>
                        <label>Stock</label><br>
                        <input type="number" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";} ?> required><br>
                        <label>Color</label><br>
                        <input type="text" name="invColor" id="invColor" <?php if(isset($invColor)){echo "value='$invColor'";} ?> required>
                         <input type="submit" name="submit" class="field-button" id="regbtn" value="Add Vehicle">           
                            <input type="hidden" name="action" value="addNewVehicle">
                    </fieldset>
                </form>
        </main>
        <footer>
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php';
            ?>
        </footer>
    </body>
</html>
© 2021 GitHub, Inc.
Term