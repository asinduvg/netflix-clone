<?php

class EntityProvider {

    public static function getEntites($con, $categoryID, $limit) {

        $sql = "SELECT * FROM entities ";

        if($categoryID) {
            $sql .= "WHERE categoryId=:categoryId ";
        }

        $sql .= "ORDER BY RAND() LIMIT :limit";

        $query = $con->prepare($sql);

        if($categoryID) {
            $query->bindValue(":categoryId", $categoryID);
        }

        $query->bindValue(":limit", $limit, PDO::PARAM_INT); // param int tells limit is an int value
        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Entity($con, $row); // result[] = use next available space
        }

        return $result;

    }

}


?>