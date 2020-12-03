<?php

class PreviewProvider
{

    private $con, $username;

    public function __construct($con, $username)
    {
        $this->con = $con;
        $this->username = $username;
    }

    public function createPreviewVideo($entity)
    {
        if (!$entity) {
            $entity = $this->getRandomEntity();
        }

        $id = $entity->getId();
        $name = $entity->getName();
        $preview = $entity->getPreview();
        $thumbnail = $entity->getThumbnail();

        return "<div class='preview__container'>
                    <img src='$thumbnail' class='preview__img' hidden>
                    <video autoplay muted class='preview__video' onended='previewEnded()'>
                        <source src='$preview' type='video/mp4'>
                    </video>
                    <div class='preview__overlay'>
                        <div class='main__details'>
                            <h3>$name</h3>
                            <div class='buttons'>
                                <button><i class='fas fa-play'></i>&nbsp;Play</button>
                                <button onclick=volumeToggle(this)><i class='fas fa-volume-mute'></i></button>
                            </div>
                        </div>
                    </div>
                </div>
        ";

    }

    private function getRandomEntity()
    {
        $query = $this->con->prepare("SELECT * FROM entities ORDER BY RAND() LIMIT 1");
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return new Entity($this->con, $row);
    }

}
