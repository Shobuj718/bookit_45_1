@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md8>
        <v-card>
            <v-card-title>
                <span class="title">Inbox And Leads</span>
            </v-card-title>
            <v-card-text>
                <v-textarea label="List additional emails as a comma separated list"></v-textarea>
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
            user: null
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