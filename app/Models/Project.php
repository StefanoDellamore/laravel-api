<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //Colonne abilitate al mass-assigment
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
        'status',
    ];


    //Reletionships

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
