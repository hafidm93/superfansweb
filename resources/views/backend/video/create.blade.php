@extends('backend.layouts.app')
@section('title', 'Tambah Video Baru')
@section('content')
<div id="output"></div>

<form method="post" action="{{route('mvideo.store')}}" enctype="multipart/form-data" id="addArticle">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Judul</label>
                <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" type="text"
                    value="{{ old('title') }}">
                @error('title')
                <div id="title" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Singkat (max 160 karakter)</label>
                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                    type="text">{{ old('description') }}</textarea>
                @error('description')
                <div id="description" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="my-input">Body</label>
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="editor"
                    rows="10">{!! old('body') !!}</textarea>

                {{-- Word Count: <span id="count">0</span>
                    --}}
                @error('body')
                <div id="body" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <script>
                    CKEDITOR.replace( 'editor', 
                    {
                        toolbar: [
                                { name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                                [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
                                '/',																					// Line break - next group will be placed in new line.
                                { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
                                ]
                    } );
                    
                </script>
                
            </div>
        </div>
        <div class="col-md-4">

            <div class="form-group">
                <label>Category</label><br>
                <select class="form-control chosen-select" multiple="multiple" name="categories[]">
                    @foreach ($category as $cat)
                    <option @if ($cat->id == 1)
                        selected
                        @endif
                        value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('categories[]')
                <div id="categories[]" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div data-toggle="tooltip" data-placement="top"
                    title="adalah kategori default, hapus jika menggunakan kategori yang lain"><i
                        class="fas fa-info-circle"></i></div>
            </div>

            

            <div class="form-group mb-3">
                <label for="cover">Thumbnail</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="cover" id="cover"
                        onchange="previewImg()" accept="image/png, image/jpeg, image/jpg">
                    <label class="custom-file-label @error('cover') is-invalid @enderror" id="file-label"
                        for="cover">Choose file</label>
                    @error('cover')
                    <div id="cover" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

        
            <script type="text/javascript">
                document.getElementById('output').innerHTML = location.search;
                $(".chosen-select").chosen();
            </script>
            <div class="form-group">
                <label for="preview_thumbnail">Preview Thumbnail</label><br>
                <img src="{{ asset('/static/image/article/default.jpg') }}" alt="" class="img-thumbnail"
                    id="img-preview">
            </div>

            <div class="form-group mb-3">
                <label for="media">Video</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="media" id="media"  accept="video/mp4, video/webm">
                    <label class="custom-file-label @error('media') is-invalid @enderror" id="video-label"
                        for="media">Choose file</label>
                    @error('media')
                    <div id="media" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="my-input">Video Preview</label>
                <video id="video" class="embed-responsive embed-responsive-16by9" controls></video>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <details class="btn btn-primary mb-3">
                        <summary>Schedule?</summary>
                        <div>
                            <div class="form-group">
                                <label for="published_at">Schedule</label>
                                <input id="published_at" class="form-control" type="datetime-local" name="published_at">
                            </div>
                        </div>
                    </details>
                    @error('published_at')
                    <div id="published_at" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <select class="form-control" name="isPublished" id="isPublished">
                            <option value="1">Publish Now</option>
                            <option value="0">Save Draft</option>
                        </select>
                    </div>
                    <div class="col">
                        <button class="btn btn-block btn-primary" type="submit">Save</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection