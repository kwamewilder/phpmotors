<?php

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Management | PHP Motors</title>
    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/navigation.php'; ?>
    </nav>

    <main class="image_main">

        <h1>
            Image Management
        </h1>

        <h2>Add New Vehicle Image</h2>
        <?php
        if (isset($message)) {
            echo '<p class="message"><strong>' . $message . '</strong></p>';
        } ?>
        <div class="image_container">
            <div class="first_wrapper">
                <form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
                    <label for="invItem">Vehicle</label>
                    <?php echo $prodSelect; ?>
                    <fieldset>
                        <label>Is this the main image for the vehicle?</label>
                        <label for="priYes" class="pImage">Yes</label>
                        <input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">
                        <label for="priNo" class="pImage">No</label>
                        <input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">
                    </fieldset>
                    <label>Upload Image:</label>
                    <input type="file" name="file1">
                    <input type="submit" class="upbtn" value="Upload">
                    <input type="hidden" name="action" value="upload">
                </form>
                <hr>
            </div>
            <div class="second_wrapper">
                <h2>Existing Images</h2>
                <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
                <?php
                if (isset($imageDisplay)) {
                    echo $imageDisplay;
                } ?>
            </div>

        </div>
    </main>
    <div id="line"></div>

    <Footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . './phpmotors/common/footer.php'; ?>
    </Footer>



</body>

</html>
<?php unset($_SESSION['message']); ?>