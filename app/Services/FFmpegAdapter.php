<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FFmpegAdapter{

    private $ffprobe ;
    private $video_probe ;

    private $ffmpeg;
    private $video;

    public function __construct(public string $path){

        $this->ffmpeg = \FFMpeg\FFMpeg::create(); 
        $this->ffprobe = \FFMpeg\FFProbe::create();
        $this->video_probe = $this->ffprobe->format(Storage::path($path));
        $this->video =$this->ffmpeg->open(Storage::path($path));

    }

    public function getDuration(){
        return (int) $this->video_probe->get('duration');
    }

    public function getFrame(){
        $frame= $this->video->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(1));
        $fileName = 'videos/'.pathinfo($this->path , PATHINFO_FILENAME) . '.jpg';
        $storage_path = storage_path('app/public/' . $fileName);
        $frame->save($storage_path) ;

        return $fileName;
    }
}