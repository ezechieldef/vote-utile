<?php

namespace App\Models;

use App\Models\Lecture;
use App\Models\Commentaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 *
 * @property $id
 * @property $titre
 * @property $date
 * @property $contenu
 * @property $url_image
 * @property $code
 * @property $tags
 * @property $auteur
 * @property $categorie_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Categorie $categorie
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Article extends Model
{
    protected $table = "article";

    static $rules = [
        'titre' => 'required',
        'date' => 'required|before_or_equal:today',
        'contenu' => 'required',
        'url_image' => 'required',
        'code' => 'required',
        'tags' => 'required',
        'auteur' => 'required',
        'categorie_id' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titre', 'date', 'contenu', 'url_image', 'code', 'tags', 'auteur', 'categorie_id', 'isActive'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categorie()
    {

        return $this->hasOne('App\Models\Categorie', 'id', 'categorie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'auteur');
    }


    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'article_id', 'id');
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'article_id', 'id');
    }

    public static function last4()
    {
        //echo Article::where('isActive',true)->orderby('id','DESC')->limit(4)->toSql();
        return Article::where('isActive',true)->orderby('id','DESC')->limit(4);
    }
    public static function populaire4()
    {
        $res = DB::select("Select count(L.id) nbre_lu , L.article_id from lecture L, article A WHERE L.article_id=A.id AND A.isActive=1 GROUP by L.article_id order by nbre_lu DESC LIMIT 4");
        $aretour =array();
        foreach ($res as $key =>$art) {
            $aretour[]= Article::find($art->article_id);
        }
        return $aretour;
    }

    public static function tagList()
    {
        $tags = array();
        $res = DB::select('select GROUP_CONCAT(tags) gc from article where isActive = 1', []);
        //dd();
        foreach (explode(';', $res[0]->gc) as $ta) {
            if (trim($ta)!='' && !in_array(trim($ta), $tags)) {
                $tags[] = trim($ta);
            }

        }

        return $tags;
    }
}
