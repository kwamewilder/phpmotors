<!DOCTYPE html>
<html lang="en">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>PHP Motors</title>
</head>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        <?php
        //check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo "<span></span>";
        } else {
            header("Location: /phpmotors/index.php");
        } ?>
    </header>

    <nav>
        <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
        echo $navList; ?>
    </nav>

    <main>
    <h1 class="center">Confirm Delete</h1>
            <p class="center">
                Do you want to delete this post?
            </p>
            <?php
            if (isset($message)) {
                echo $message;
            } ?>
            <form action="/phpmotors/reviews/index.php" method="POST" <?php if (!$_SESSION['loggedin']){echo "hidden";} ?>>
                <label>Name as it appears</label>
                <br>
                <input name="clientname" id="clientname" type="text" <?php echo 'value="'.substr($review['clientFirstname'], 0, 1).". ".$review['clientLastname'].'"'; ?> readonly>
                <br>
                <br>
                <label>Review posted on</label>
                <br>
                <input name="date" id="date" type="text" <?php echo 'value="'.$review['reviewDate'].'"'; ?> readonly>
                <br>
                <br>
                <label>Review</label>
                <br>
                <textarea id="review" name="newReview" rows="4" cols="50" readonly><?php echo $review['reviewText'];  ?></textarea>
                <br>
                <input type="submit" name="submit" id="regbtn" value="Delete Review">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="deleteReview">
                <input type="hidden" name="review" <?php echo 'value="'.$reviewId.'"' ?>>
            </form>
    </main>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/scripts/scripts.php'; ?>
</body>

</html>