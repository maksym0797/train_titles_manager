<?php


namespace App\TitlesManager\Titles\Transformer;


use App\TitlesManager\Titles\Models\TitleEloquent;

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
     * TitleTransformer constructor.
     * @param PlatformTransformer $platformTransformer
     */
    public function __construct(PlatformTransformer $platformTransformer)
    {
        $this->platformTransformer = $platformTransformer;
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
            'platforms' => $titleEloquent->platforms->map([$this->platformTransformer, 'transform'])
        ];
    }
}
