@extends('layout')


@section('content')

<h1 class="new-video-title"><i class="fa fa-bolt"></i> 
    {{ $title ?? '' }}
</h1>
<div class="row">

    @foreach ($videos as $video)
       <x-video-box :$video />
    @endforeach
</div>
<div class="" style="margin-top: 20px" dir="ltr">
    <div class="paginate text-center">
        {{ $videos->links() }}
    </div>
</div>
@endsection