 <!DOCTYPE html>
 <html lang="en">

 <head>
     <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>

     <title>PHP Motors</title>
 </head>
 <!-- checks that the user is logged in and the right level -->
 <?php
    if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] != 3) {
        header('Location: ../index.php');
        exit;
    }

    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
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

     <main class="center">
         <div class="main_content">
             <h1>Add a Car Classification</h1>
             <a href="/phpmotors/vehicles/?action=classification-page">Add Classification</a><br>
             <a href="/phpmotors/vehicles/?action=vehicle-page">Add Vehicle</a>
         </div>

         <?php
            if (isset($message)) {
                echo $message;
            }
            if (isset($classificationList)) {
                echo '<h2>Vehicles By Classification</h2>';
                echo '<p>Choose a classification to see those vehicles</p>';
                echo $classificationList;
            }
            ?>
         <noscript>
             <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
         </noscript>
         <table id="inventoryDisplay"></table>
     </main>

     <footer>
         <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
     </footer>

     <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/scripts/scripts.php'; ?>

     <script src="../js/inventory.js"></script>
 </body>

 </html>

 <?php unset($_SESSION['message']); ?>