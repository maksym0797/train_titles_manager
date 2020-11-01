<?php


namespace App\TitlesManager\Titles\Transformer;


use App\TitlesManager\Titles\Models\PlatformEloquent;
use App\TitlesManager\Titles\Models\TitleEloquent;
use App\TitlesManager\Titles\Settings\PlatformSettings;

/**
 * Class TitleTransformer
 * @package App\TitlesManager\Titles\Transformer
 */
class TitleTransformer
{
    /**
     * @var PlatformTransformer
     */
    private $platformTransformer;
    /**
     * @var PlatformSettings
     */
    private $platformSettings;

    /**
     * TitleTransformer constructor.
     * @param PlatformTransformer $platformTransformer
     * @param PlatformSettings $platformSettings
     */
    public function __construct(PlatformTransformer $platformTransformer, PlatformSettings $platformSettings)
    {
        $this->platformTransformer = $platformTransformer;
        $this->platformSettings = $platformSettings;
    }

    /**
     * @param TitleEloquent $titleEloquent
     * @return array
     */
    public function transform(TitleEloquent $titleEloquent)
    {
        return [
            'id' => $titleEloquent->id,
            'name' => $titleEloquent->name,
            'isShow' => $titleEloquent->is_show,
            'year' => $titleEloquent->release_year,
            'platforms' => $titleEloquent->platforms->map([$this->platformTransformer, 'transform']),
            'image' => $this->getImageByPlatform($titleEloquent->platforms->first())
        ];
    }

    /**
     * @param PlatformEloquent|null $platformEloquent
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public function getImageByPlatform(?PlatformEloquent $platformEloquent)
    {
        if (! $platformEloquent) {
            return $this->platformSettings->getDefaultPlatformImage();
        }
        switch (true) {
            case $platformEloquent->isNetflix():
                return $this->platformSettings->getNetflixPlatformImage();
            case $platformEloquent->isHulu():
                return $this->platformSettings->getHuluPlatformImage();
            case $platformEloquent->isAmazon():
                return $this->platformSettings->getAmazonPlatformImage();
            default:
                return $this->platformSettings->getDefaultPlatformImage();
        }
    }
}
