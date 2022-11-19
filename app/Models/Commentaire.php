<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $table = 'commentaire';
    protected $fillable =[
        'article_id',
        'nom',
        'email',
        'IP',
        'commentaire'
    ];
}
