<?php 
    function createComment($db, $author_id, $picture_id, $comment_text) {
        $date= date("Y-m-d H:i:s");
        $st = "INSERT INTO COMMENT(`Author_Id`, `Picture_Id`, `Comment_Text`, `Date`)
        VALUES(:athor_id, :picture_id, :comment_text, :date)";
        $prepSt = $db->prepare($st);
        $prepSt->execute(['athor_id' => $author_id, 'picture_id' => $picture_id, 'comment_text' => $comment_text, 'date' => $date]);
    }
    
    function getCommentsOnPicture($db, $picture_id)
    {
        $st ="SELECT * FROM `Comment` WHERE `Picture_Id` = :picId";
        $prepSt = $db->prepare($st);
        $prepSt->execute([ 'picId' => $picture_id]); 
        $res = $prepSt->fetchAll(PDO::FETCH_OBJ);
        
        return $res;
    }
?>