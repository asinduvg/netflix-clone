<?php

class SeasonProvider
{
    private $con, $username;

    public function __construct($con, $username)
    {
        $this->con = $con;
        $this->username = $username;
    }

    public function create($entity)
    {
        $seasons = $entity->getSeasons();

        if (sizeof($seasons) == 0) {
            return;
        }

        $seasonsHTML = '';
        foreach ($seasons as $season) {
            $seasonNumber = $season->getSeasonNumber();

            $videosHTML = '';
            foreach ($season->getVideos() as $video) {
                $videosHTML .= $this->createVideoSquare($video);
            }

            $seasonsHTML .= "<div class='season'>
                                <h3>Season $seasonNumber</h3>
                                <div class='videos'>
                                    $videosHTML
                                </div>
                            </div>";
        }

        return $seasonsHTML;

    }

    private function createVideoSquare($video)
    {
        $id = $video->getId();
        $thumbnail = $video->getThumbnail();
        $name = $video->getTitle();
        $description = $video->getDescription();
        $episodeNumber = $video->getEpisodeNumber();

        return "<a href='watch.php?id=$id'>
                    <div class='episode__container'>
                        <div class='contents'>
                            <img src='$thumbnail'>
                            <div class='video__info'>
                                <h4>$episodeNumber. $name</h4>
                                <span>$description</span>
                            </div>
                        </div>
                    </div>
                </a>
        ";
    }
}
