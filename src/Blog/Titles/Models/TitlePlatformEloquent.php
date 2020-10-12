<?php


namespace App\Blog\Titles\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class TitleEloquent
 * @property integer id
 * @property integer title_id
 * @property integer platform_id
 * @package App\Blog\Titles\Models
 */
class TitlePlatformEloquent extends Model
{
    protected $table = 'title_platform';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_id',
        'platform_id',
    ];
}
