<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FFmpegAdapter{
    
    private $ffprobe ;
    private $video_probe ;

    public function __construct(public string $path){

        $this->ffprobe = \FFMpeg\FFProbe::create();
        $this->video_probe = $this->ffprobe->format(Storage::path($path));
    }

    public function getDuration(){
        return (int) $this->video_probe->get('duration');
    }
}