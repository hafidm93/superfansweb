@extends('frontend.layouts.page')
@section('title', 'Laliga Fantasy Marca')
@section('content')
    @foreach ($videos as $video => $item)
    <section id="fantasy" class="container full-height">
        <div class="row my-2">
            <div class="d-flex flex-row p-3">
                <h2>Ini judul video nya</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                    <video
                        id="my-player"
                        class="video-js embed-responsive-item"
                        controls
                        crossOrigin
                        controlsList="nodownload"
                        preload="auto"
                        loop="false"
                        poster="{{asset($item->cover)}}"
                        data-setup='{}'>
                        <source controlsList="nodownload" src="{{asset($item->media)}}" type="video/mp4"></source>
                        <source controlsList="nodownload" src="{{asset($item->media)}}" type="video/webm"></source>
                    </video>
                </div>
            </div>
        </div>
    </section>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "VideoObject",
          "name": "{{$item->title}}",
          "description": "{{$item->description}}",
          "thumbnailUrl": [
            "{{url($item->cover)}}",
            "{{url($item->cover)}}",
            "{{url($item->cover)}}"
           ],
          "uploadDate": "{{$item->created_at}}",
          "duration": "PT1M54S",
          "contentUrl": "{{url($item->media)}}",
          "embedUrl": "{{url()->current()}}",
          "interactionStatistic": {
            "@type": "InteractionCounter",
            "interactionType": { "@type": "http://schema.org/WatchAction" },
            "userInteractionCount": 85546
          },
          "regionsAllowed": "NL"
        }
        </script>

    @endforeach
@endsection
