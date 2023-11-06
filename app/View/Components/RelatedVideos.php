<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Video;
class RelatedVideos extends Component
{
    public $videos;
    /**
     * Create a new component instance.
     */
    public function __construct(Video  $video)
    {
        $this->videos = $video->relatedvideos(10);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.related-videos');
    }
   
}
