<?php


namespace App\TitlesManager\Titles\Repository;


use App\TitlesManager\Titles\Models\TitleEloquent;
use App\TitlesManager\Titles\Models\TitlePlatformEloquent;

/**
 * Class TitleRepository
 * @package App\TitlesManager\Titles\Repository
 */
class TitleRepository
{
    /**
     * @param string $name
     * @param int|null $releaseYear
     * @param float|null $imdRating
     * @param int|null $tomatometer
     * @param bool $isShow
     * @return TitleEloquent|null
     */
    public function createTitle(
        string $name,
        ?int $releaseYear = null,
        ?float $imdRating = null,
        ?int $tomatometer = null,
        bool $isShow = false
    ): ?TitleEloquent
    {
        $title = new TitleEloquent();

        $title->name = $name;
        $title->release_year = $releaseYear;
        $title->imdb_rating = $imdRating;
        $title->tomatometer = $tomatometer;
        $title->is_show = $isShow;

        $title->save();

        return $title;
    }

    /**
     * @param int $titleId
     * @param int $platformId
     * @return TitlePlatformEloquent
     */
    public function createTitlePlatform(int $titleId, int $platformId)
    {
        $titlePlatform = new TitlePlatformEloquent();

        $titlePlatform->platform_id = $platformId;
        $titlePlatform->title_id = $titleId;

        $titlePlatform->save();

        return $titlePlatform;
    }
}
