<?php


namespace App\Blog\Titles\Models;

use Illuminate\Database\Eloquent\Model;

/**
* Class TitleEloquent
 * @property integer id
* @property string name
* @package App\Blog\Titles\Models
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
