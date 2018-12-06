<?php 

// $st ="INSERT INTO Album(`Title`, `Description`, `Date_Updated`, `Owner_Id`, `Accessibility_Code` 
// VALUES(:title, :description, :date_updated, :owner_id , :accessibility) ";

function addPicture($db, $fileame, $title, $description, $albumId ) {
  $currentDate = date("Y-m-d H:i:s");
  $st = "INSERT INTO Picture( `FileName`, `Title`, `Description`, `Date_Added`, `Album_Id`)
          VALUES( :fileName, :title, :description, :dateAdded, :albumid)";
  $prepSt = $db->prepare($st);
  $prepSt->execute([ 'fileName' => $fileame, 
                     'title' => $title,
                     'description' => $description,
                     'dateAdded' => $currentDate,
                     'albumid' => $albumId
                      ]);        
  }
  function getPicturesByAlbum($db, $album_id) {
    $st = "SELECT * from `Picture` 
    WHERE `Album_Id` = :album_id";
    $prepSt = $db->prepare($st);
    $prepSt->execute([ 'album_id' => $album_id]); 
    $res = $prepSt->fetchAll(PDO::FETCH_OBJ);
    return $res;
  }
?>