<?php
function getClassificationID(){
 // Create a connection object from the phpmotors connection function
 $db = phpmotorsConnect(); 
 // The SQL statement to be used with the database 
 $sql = 'SELECT classificationId, classificationName FROM carclassification ORDER BY classificationName ASC'; 
 // The next line creates the prepared statement using the phpmotors connection      
 $stmt = $db->prepare($sql);
 // The next line runs the prepared statement 
 $stmt->execute(); 
 // The next line gets the data from the database and 
 // stores it as an array in the $classifications variable 
 $classifications = $stmt->fetchAll(); 
 // The next line closes the interaction with the database 
 $stmt->closeCursor(); 
 // The next line sends the array of data back to where the function 
 // was called (this should be the controller) 
 return $classifications;
}


// Add Classification
function newClassification($classificationName) {
    $db = phpmotorsConnect();
    $sql = 'INSERT INTO carclassification (classificationName)
           VALUES (:classificationName )';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function newVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor,  $classificationId ) 
{
    $db = phpmotorsConnect();
    $sql = 'INSERT INTO inventory (invMake, invModel, invDescription, invImage, invThumbnail, invPrice, invStock, invColor, classificationId)
           VALUES (:invMake, :invModel, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invColor, :classificationId)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invMake', $invMake, PDO::PARAM_STR);
    $stmt->bindValue(':invModel', $invModel, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_STR);
    $stmt->bindValue(':invColor', $invColor, PDO::PARAM_STR);
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
?>