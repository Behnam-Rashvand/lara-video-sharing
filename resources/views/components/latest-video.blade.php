<h1 class="new-video-title"><i class="fa fa-bolt"></i> 
    {{ $title ?? '' }}
</h1>
<div class="row">

    @foreach ($videos as $video)
       <x-video-box :$video />

    @endforeach

</div>
