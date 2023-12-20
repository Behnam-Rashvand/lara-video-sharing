   <!-- Related Posts-->
   <div class="col-md-4">
       <div id="related-posts">
           @foreach ($videos as $video)
               <!-- video item -->
               <div class="related-video-item">
                   <div class="thumb">
                       <small class="time">{{ $video->lengthInHuman }}</small>
                       <a href="{{ route('videos.show' , $video) }}"><img src="{{ $video->thumbnail }}" alt=""></a>
                   </div>
                   <a href="{{ route('videos.show' , $video) }}" class="title"> {{ $video->name }} </a>
                   <a class="channel-name" href="#">{{ $video->owner_name }}<span>
                           <i class="fa fa-check-circle"></i></span></a>
               </div>
               <!-- // video item -->
           @endforeach
       </div>
   </div><!-- // col-md-4 -->
   <!-- // Related Posts -->
