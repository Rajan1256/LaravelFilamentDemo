<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function users()
    {
        return $this->hasMany(User::class,'companie_id','id');
    }
}
