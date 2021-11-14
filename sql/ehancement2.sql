/*****Insert data into clients table***********/

INSERT INTO `clients`(`clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `comment`) 
VALUES ('Tony','Stark','tony@starkent.com','Iam1ronM@n','I am the real Ironman');

/*********Update Tony Stark ClientLevel to 3************/

UPDATE clients
SET clientLevel = 3
WHERE clientId = 1;



/***********Replace function*********/

UPDATE inventory
set invDescription = REPLACE(invDescription, 'small interior', 'spacious interior')
WHERE invId = '12'; 


/**************Inner Join****************/


SELECT inventory.invModel,
  carclassification.classificationName
FROM inventory
  INNER JOIN carclassification ON inventory.classificationId = carclassification.classificationId
WHERE carclassification.classificationName = 'SUV';

/***********Delete**************/

DELETE FROM inventory
WHERE invModel = 'Wrangler' ;


/**************Update all**************/

UPDATE inventory
SET invImage = CONCAT("/phpmotors", invImage),
  invThumbnail = CONCAT("/phpmotors", invThumbnail);