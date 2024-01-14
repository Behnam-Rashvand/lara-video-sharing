<?php

return [

    'ffmpeg.binaries'  => env('ffmpeg_binaries' , '/usr/bin/ffmpeg'), // the path to the FFMpeg binary
    'ffprobe.binaries' => env('ffprobe_binaries' , '/usr/bin/ffprobe' ), // the path to the FFProbe binary
    'timeout'          => env('ffmpeg_timeout' , 3600 ),
    'ffmpeg.threads'   => env('ffmpeg_threads' , 12),
];