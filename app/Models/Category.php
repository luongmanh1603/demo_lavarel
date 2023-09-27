<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected  $table="categories";
    //protected $primaryKey="id"; neu id la khoa chinh thi 0 can khai bao

    protected $fillable = [
        "name",
        "slug"
    ];
}
