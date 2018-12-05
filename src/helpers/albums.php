<?php 

    // get albums
    function getAlbumsByUser($id, $db)
    {
        $st ="SELECT * from Album WHERE Owner_Id = :userId";
        $prepSt = $db->prepare($st);
        $prepSt->execute(['userId' => $id]);
        $res = $prepSt->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
  
    //Create Album // Finished
    function createAlbum($db, $owner, $title, $description, $date_updated, $accessibility)
    {
      $st ="INSERT INTO Album(`Title`, `Description`, `Date_Updated`, `Owner_Id`, `Accessibility_Code`) 
      VALUES(:title, :description, :date_updated, :owner_id , :accessibility)";

      $prepSt = $db->prepare($st);
      $prepSt->execute(['owner_id' => $owner,
                        'title' => $title,  
                        'description' => $description,
                        'date_updated' => $date_updated,
                        'accessibility' => $accessibility
                            ]);
        return 'your album ' . $title . ' has been successfully created!';
    }


    function deleteAlbum($db, $owner, $album) {
        
        // remove pictures first
        $st ="DELETE from `Picture`
             WHERE `Picture`.`Album_Id` = :album ";
        $prepSt = $db->prepare($st);
        $prepSt->execute(['album' => $album]);
        
        // delete album
        $st = "DELETE from `Album`
               WHERE `Album`.`Album_Id` = :album_id
               AND `Album`.`Owner_Id`= :owner";
        $prepSt = $db->prepare($st);
        $prepSt->execute(['owner' => $owner, 'album_id' => $album]);

        return 'Album Successfully Deleted!';
    }

    function changeAlbumPermissions($db, $access, $album_id) {
        $st = "UPDATE `Album`
               SET `Album`.`Accessibility_Code` = :access
               WHERE `Album`.`Album_Id` = :album_id";
        $prepSt = $db->prepare($st);
        $prepSt->execute(['access' => $access, 'album_id' => $album_id]);
        return 'Albums have Been Updated';
    }
?>

