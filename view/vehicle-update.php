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
    } elseif (isset($invInfo['classificationId'])) {
        if ($classification['classificationId'] === $invInfo['classificationId']) {
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

    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Modify $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Modify $invMake $invModel";
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
    <h1 class="center">Edit Post</h1>
            <p class="center">
                Please edit your post.
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
                <textarea id="review" name="editReview" rows="4" cols="50" required><?php echo $review['reviewText'];  ?></textarea>
                <br>
                <input type="submit" name="submit" id="regbtn" value="Update Review">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="editReview">
                <input type="hidden" name="review" <?php echo 'value="'.$reviewId.'"' ?>>
            </form>
    </main>


    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

   
</body>

</html>