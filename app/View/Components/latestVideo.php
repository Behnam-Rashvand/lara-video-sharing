<?php

namespace App\View\Components;

use Closure;
use App\Models\Video;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class latestVideo extends Component
{

    public $videos ;
    public $title = 'آخرین ویدیو ها' ;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->videos= Video::latest()->take(6)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.latest-video');
    }
}
