<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorie
 *
 * @property $id
 * @property $titre
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @property Article[] $articles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categorie extends Model
{
    protected $table ='categorie';

    static $rules = [
		'titre' => 'required',
		'description' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titre','description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article', 'categorie_id', 'id');
    }


}
