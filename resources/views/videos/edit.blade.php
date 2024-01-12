@extends('layout')

@section('content')
    <div id="upload">
        <div class="row">
            <x-validation-error />

            <!-- upload -->
            <div class="col-md-8">
                <h1 class="page-title"><span>@lang('videos.upload')</span> @lang('videos.video')</h1>
                <form action="{{ route('videos.update', $video) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>@lang('videos.name')</label>
                            <input type="text" value="{{ $video->name }}" name="name" class="form-control"
                                placeholder="@lang('videos.name')">
                        </div>
                        {{-- <div class="col-md-6">
                            <label>برچسب ها</label>
                            <input type="text" name="tag" class="form-control" placeholder="برچسب ها">
                        </div> --}}

                        <div class="col-md-6">
                            <label> @lang('videos.slug')</label>
                            <input type="text" value="{{ $video->slug }}" name="slug" class="form-control"
                                placeholder=" @lang('videos.slug')">
                        </div>
                        <div class="col-md-6">
                            <label> @lang('videos.url') </label>
                            <input id="upload_file" type="file" class="form-control" name="file">
                        </div>
                        <div class="col-md-6">
                            <label> @lang('videos.thumbnail') </label>
                            {{-- <input id="featured_image" type="file" class="file"> --}}
                            <input type="text" value="{{ $video->thumbnail }}" name="thumbnail" class="form-control"
                                placeholder=" @lang('videos.thumbnail')">
                        </div>
                        <div class="col-md-6">
                            <lable> @lang('videos.category') </lable>
                            <select name="category_id" id="category" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($video->category_id == $category->id ) >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>@lang('videos.description')</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="@lang('videos.description')">
                                {{ $video->description }}
                            </textarea>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" id="contact_submit" class="btn btn-dm">@lang('videos.save')</button>
                        </div>
                    </div>
                </form>
            </div><!-- // col-md-8 -->

            <div class="col-md-4">
                <a href="#"><img src="{{ Vite::image('demo_img/upload-adv.png') }}" alt=""></a>
            </div><!-- // col-md-8 -->
            <!-- // upload -->
        </div><!-- // row -->
    </div><!-- // upload -->
@endsection
