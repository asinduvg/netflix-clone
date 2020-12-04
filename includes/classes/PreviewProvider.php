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

    public function createEntityPreviewSquare($entity) {
        $id = $entity->getId();
        $thumbnail = $entity->getThumbnail();
        $name = $entity->getName();

        return "<a href='entity.php?id=$id'>
                    <div class='preview__container small'>
                        <img src='$thumbnail' title='$name'>
                    </div>
                </a>
        ";

    }

    private function getRandomEntity()
    {
        $entity = EntityProvider::getEntites($this->con, null, 1);
        return $entity[0];
    }

}
