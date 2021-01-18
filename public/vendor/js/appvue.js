new Vue({
    el: '#app',
    data: {
        posts: []
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get('https://m88fc.com/wp-json/wp/v2/posts?categories=3&per_page=3&_embed').then(posts => {
                this.posts = posts.data
            });
            axios.defaults.headers.common['Content-Type'] = 'application/x-www-form-urlencoded'
axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
        }
    },
})

new Vue({
    el: '#matches',
    data: {
        posts: []
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get('https://api.ffa.football/t1962/fixture').then(posts => {
                this.posts = posts.data
            });
        }
    }
})