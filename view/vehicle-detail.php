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
        <?php if (isset($_SESSION['loggedin']) == false)
        {
            echo "Login to leave a review";
        }else{
        echo '<form action = "/phpmotors/reviews/index.php" method="POST" >';
                echo "\r\n<label>Add a review</label>";
                echo "\r\n<br>";
                echo "\r\n<textarea id = 'review' name = 'newReview' rows = '4' cols = '50' required>";
                echo  '</textarea>';
                echo "\r\n<br>";
                echo "\r\n<input type = 'submit' name='submit' id='regbtn' value='Add Review'/> ";
                echo "\r\n<input type = 'hidden' name='action' value='addReview'/> ";
                echo "\r\n<input type = 'hidden' name='userId'";
                echo ' value= "'.$_SESSION['clientData']['clientId'].'" ' . '/> ';
                echo "\r\n<input type = 'hidden' name='carId' ";
                echo 'value = "' . $invId . '"' . '/>';
                echo "\r\n</form>";
        }
        ?>
            <?php 
                // Put the reviews on the page.
                if (isset($reviewHTML)){
                    echo $reviewHTML;
                }
            ?>
    </main>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

    
</body>

</html>