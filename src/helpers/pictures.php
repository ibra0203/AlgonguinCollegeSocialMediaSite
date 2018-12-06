<?php 

// $st ="INSERT INTO Album(`Title`, `Description`, `Date_Updated`, `Owner_Id`, `Accessibility_Code` 
// VALUES(:title, :description, :date_updated, :owner_id , :accessibility) ";
include ('helpers/Class_Lib.php');
include_once ('util.php');
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
    $pics = array();
    foreach ($res as $row)
    {
        $filename = $row->FileName;
        $id =$row->Picture_Id;
        //  public function __construct($fileName, $id, $title, $description, $date)

        $pic = new Picture($filename, $id, $row->Title, $row->Description, $row->Date_Added);
        array_push($pics, $pic);
    }
    return $pics;
  }
  
?>