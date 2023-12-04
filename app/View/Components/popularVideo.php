<?php

namespace App\View\Components;

use Closure;
use App\Models\Video;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class popularVideo extends Component
{

    public $videos;
    public $title = 'محبوب ترین ها';
    /**
     * Create a new component instance.  
     */
    public function __construct()
    {
        $this->videos = Video::all()->random(6);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.latest-video');
    }
}
