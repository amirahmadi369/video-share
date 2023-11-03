<?php

namespace App\Models;
use Hekmatinasser\Verta\Verta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'url' , 'thumbnail' , 'slug' , 'length'] ;
    public function getlengthAttribute($value)
    {
        return gmdate("i:s", $value) ;
    }
    public function getcreatedatAttribute($value)
    {
        return (new verta($value))->formatDifference();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
    }
}
