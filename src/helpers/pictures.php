<?php 
$st ="INSERT INTO Album(`Title`, `Description`, `Date_Updated`, `Owner_Id`, `Accessibility_Code` 
VALUES(:title, :description, :date_updated, :owner_id , :accessibility) ";

function addPicture($db, $fileame, $title, $description ) {
  $currentDate = date("Y-m-d H:i:s");
  $st = "INSERT INTO Picture( `FileName`, `Title`, `Description`, `Date_Added`)
          VALUES( :fileName, :title, :description, :dateAdded)";
  $prepSt = $db->prepare($st);
  $prepSt->execute([ 'fileName' => $fileame, 
                     'title' => $title,
                     'description' => $description,
                     'dateAdded' => $currentDate
                      ]);        
  }
?>