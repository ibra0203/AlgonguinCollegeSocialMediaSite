<?php
    function getNameFromId($id, &$db)
    {
        $st ="SELECT Name FROM User WHERE UserId = :id";
        $prepSt = $db->prepare($st);
        $prepSt->execute(['id' => $id]);
        $row = $prepSt->fetch();
        $name = $row['Name'];
        return $name;
    }
?>
