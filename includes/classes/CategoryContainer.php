<?php

class CategoryContainer
{

private $con, $username;

    public function __construct($con, $username)
    {
        $this->con = $con;
        $this->username = $username;
    }

    public function showAllCategories() {
        $query = $this->con->prepare("SELECT * FROM categories");
        $query->execute();

        $html = "<div class='previewCategories'>";

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getCategoryHTML($row, null, true, true);
        }

        return $html . "</div>";

    }

    private function getCategoryHTML($sqlData, $title, $tvShows, $movies) {
        $categoryID = $sqlData['id'];
        $title = $title === null ? $sqlData['name'] : $title;

        if($tvShows && $movies) {
            $entities = EntityProvider::getEntites($this->con, $categoryID, 30);
        } else if($tvShows) {
            
        } else {
            //
        }

        if(sizeof($entities) === 0) {
            return;
        }

        $entitiesHTML = "";

        $previewProvider = new PreviewProvider($this->con, $this->username);

        foreach($entities as $entity) {
            $entitiesHTML .= $previewProvider->createEntityPreviewSquare($entity);
        }

        return "<div class='category'>
                    <a href='category.php?id=$categoryID'>
                        <h3>$title</h3>
                    </a>

                    <div class='entities'>
                        $entitiesHTML
                    </div>
                </div>
        ";
    }

}
