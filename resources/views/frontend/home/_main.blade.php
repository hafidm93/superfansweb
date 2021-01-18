<section id="video">
    <div class="container-fluid mb-4 py-4">
        <div class="row my-4">
            <div class="col mb-4 text-center">
                <img class="img-fluid mvideo-logo" src="{{asset('upload/logo/mvideo-dark.png')}}">
            </div>
        </div>
        <div class="row align-middle" id="mvideo">
            <!-- section 1 -->
            @foreach ($videos as $video => $item)
                <div class="col-md-3 mb-2">
                    <a href="{{route('show_video', $item->slug)}}">
                        <div class="card mvideo-content">
                            <img class="card-img-top mvideo-img" src="{{asset($item->cover)}}" alt="Card image cap">
                            <span class="mvideo-category badge badge-warning">Fakta & Gosip</span>
                            <p class="card-text text-uppercase">{{$item->title}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</section>

<section id="news">
    <div class="container py-5" id="newsContainer">
        <div class="row py-4 text-light bg-dark mb-3">
            <div class="col text-center ">
                <h4>Breaking <span class="text-warning">News</span></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12" id="app">
                        <template>
                            <div v-for="post in posts" :key="post.id" class="card  mb-1">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <a target="_blank" v-if="post._embedded['wp:featuredmedia'][0]"
                                            :href="post.link">
                                            <img class="card-img" id="newsImgsub"
                                                :src="post._embedded['wp:featuredmedia'][0].source_url" />
                                        </a>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a :href="post.link" class="card-title"
                                                target="_blank">
                                                @{{ post.title.rendered }}
                                            </a>

                                            <p class="card-text text-right"><a target="_blank" :href="post.link"
                                                    class="btn btn-sm btn-warning">Read</a></small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center my-3">
                        <a href="https://m88fc.com/topics/liga-spanyol" class="btn btn-sm btn-outline-secondary"
                            target="_target">See
                            all News</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">

                    <div class="col-md-12" id="matches">
                        <div v-for="post in posts.slice(0,5)" :key="post.data"
                            class="text-light p-3 matches bg-secondary rounded mb-2">
                            @{{ post.match.title }}
                        </div>
                    </div>
                    <ul class="posts"></ul>
                </div>
                <div class="row">
                    <div class="col-md-12 my-3 text-center">
                        <a href="#" class="btn btn-sm btn-outline-secondary">See all Matches</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>