<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $perPage = 18;

    protected $fillable = [
        'name', 'description', 'length', 'url', 'slug', 'thumbnail', 'category_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getLengthInHumanAttribute()
    {
        return gmdate("i:s", $this->value);
    }

    public function getCreatedAtAttribute($value)
    {
        return (new Verta($value))->formatDifference();
    }

    public function relatedVideos(int $count = 6)
    {
        return $this->category->getRandomVideos($count);
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
