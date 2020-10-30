<?php


namespace App\TitlesManager\Titles\Transformer;


use App\TitlesManager\Titles\Models\PlatformEloquent;

/**
 * Class PlatformTransformer
 * @package App\TitlesManager\Titles\Transformer
 */
class PlatformTransformer
{
    /**
     * @param PlatformEloquent $platformEloquent
     * @return array
     */
    public function transform(PlatformEloquent $platformEloquent)
    {
        return [
            'id' => $platformEloquent->id,
            'name' => $platformEloquent->name,
        ];
    }
}
