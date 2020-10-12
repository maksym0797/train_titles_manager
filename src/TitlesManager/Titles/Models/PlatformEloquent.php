<?php


namespace App\TitlesManager\Titles\Models;

use Illuminate\Database\Eloquent\Model;

/**
* Class TitleEloquent
 * @property integer id
* @property string name
* @package App\TitlesManager\Titles\Models
*/
class PlatformEloquent extends Model
{
    protected $table = 'platforms';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
