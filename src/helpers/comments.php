


SELECT `Comment`.`*`, `User`.`Name`
FROM `Comment`
JOIN `User` 
ON `User`.UserId = `Comment`.Author_Id
WHERE Picture_Id = :picture_id

foreach ( $comments as $comment ) {

}

<?php 

?>