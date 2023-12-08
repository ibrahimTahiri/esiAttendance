<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected  $primaryKey='matricule';
    protected $fillable=[
        'matricule',
        'nom'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->matricule < 0) {
                // Lancez une exception si le matricule est négatif
                throw new \InvalidArgumentException('Le matricule ne peut pas être négatif.');
            }
        });
    }
}
