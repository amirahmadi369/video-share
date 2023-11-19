<?php

namespace App\Models;
use Hekmatinasser\Verta\Verta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'url' , 'thumbnail' , 'slug' , 'length','description','category_id'] ;
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getlengthInHumanAttribute()
    {
        return gmdate("i:s", $this->value) ;
    }
    public function getcreatedatAttribute($value)
    {
        return (new verta($value))->formatDifference();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
    }
    public function relatedVideos($count = 6){
        return Video::all()->random($count);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getCategoryNameAttribute()
    {
        return $this->category?->name;
    }
}
