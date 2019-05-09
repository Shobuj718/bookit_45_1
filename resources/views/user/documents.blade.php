@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Documents</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex md4 class="doc_box">
        <v-card>
            <v-card-title>
                <span class="title">Internal Use</span>
                <v-icon>lock</v-icon>
            </v-card-title>
            <v-card-text>
                <v-list>
                    <v-list-tile v-for="document in documents" avatar :href="document.url">
                        <v-list-tile-avatar>
                            <v-icon>insert_drive_file</v-icon>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            @{{document.name}}
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>
    </v-flex>

    <v-flex md4 class="doc_box">
        <v-card>
            <v-card-title>
                <span class="title">Shared With Client</span>
                <v-icon>share</v-icon>
            </v-card-title>
            <v-card-text>
                <v-list>
                    <v-list-tile v-for="document in documents" avatar :href="document.url">
                        <v-list-tile-avatar>
                            <v-icon>insert_drive_file</v-icon>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            @{{document.name}}
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>
    </v-flex>

    <v-flex md4 class="doc_box">
        <v-card>
            <v-card-title>
                <span class="title">Incoming</span>
                <v-icon class="incom">save_alt</v-icon>
            </v-card-title>
            <v-card-text>
                <v-list>
                    <v-list-tile v-for="document in documents" avatar :href="document.url">
                        <v-list-tile-avatar>
                            <v-icon>insert_drive_file</v-icon>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            @{{document.name}}
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>
    </v-flex>

</v-layout>
@endsection

@section('scripts')
<script>
var app = new Vue({
    el: "#app",
    data: () => ({
        drawer: null,
        user: null,
        documents: [
            {
                name: 'lorem_ipsum.pdf',
                url: 'http://kmmc.in/wp-content/uploads/2014/01/lesson2.pdf'
            },
            {
                name: 'lorem_ipsum.pdf',
                url: 'http://kmmc.in/wp-content/uploads/2014/01/lesson2.pdf'
            },
            {
                name: 'lorem_ipsum.pdf',
                url: 'http://kmmc.in/wp-content/uploads/2014/01/lesson2.pdf'
            }
        ]
    }),
    methods: {

        logout: function(){
            axios({
                method: "post",
                url: "/logout"
            }).then(function(response){
                if(response.data.logged_out){
                    window.location = response.data.redirect_url
                }
            }).catch(function(){

            }).then(function(){

            });
        },
        getUser: function(){
            let that = this;
            axios({
                method: "get",
                url: "/api/user"
            }).then(function(response){
                that.user = response.data;
            });
        }
    },
    mounted: function () {
        let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
        if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
        document.getElementById('preloader').style.display = 'none';
        document.getElementById('app').style.display = 'block';
        this.getUser();
    }
});
</script>
@endsection