@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Clients</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <template>
        <v-flex md4  v-for="client in clients">
            <v-card class="clients-card">
                <v-card-text>
                    <v-list>
                        <v-list-tile avatar class="client-avatar">                        
                            <v-list-tile-avatar>
                                <v-img :src="client.avatar">
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <span class="title" v-html="client.name"></span>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-list-tile avatar>
                            <v-list-tile-avatar>
                                <v-icon>mail</v-icon>
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <span class="subheading">
                                    @{{client.email}}
                                </span>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-list-tile avatar>
                            <v-list-tile-avatar>
                                <v-icon>phone</v-icon>
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <span class="subheading">
                                    @{{client.phone}}
                                </span>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-list-tile avatar>
                            <v-list-tile-avatar>
                                <v-icon>event</v-icon>
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <span class="subheading">
                                    @{{client.appointment.date}}
                                </span>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>
                </v-card-text>
            </v-card>
        </v-flex>
    </template>
</v-layout>
@endsection

@section('scripts')
<script>

    var app = new Vue({
        el: "#app",
        data: () => ({
            drawer: null,
            user: null,
            clients: [
                {
                    name: "Test User",
                    email: "test@user.domain",
                    phone: "+12334454545",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    appointment: {
                        date: "29 September, 2018"
                    }
                },
                {
                    name: "Test User",
                    email: "test@user.domain",
                    phone: "+12334454545",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    appointment: {
                        date: "29 September, 2018"
                    }
                },
                {
                    name: "Test User",
                    email: "test@user.domain",
                    phone: "+12334454545",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    appointment: {
                        date: "29 September, 2018"
                    }
                },
                {
                    name: "Test User",
                    email: "test@user.domain",
                    phone: "+12334454545",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    appointment: {
                        date: "29 September, 2018"
                    }
                },
                {
                    name: "Test User",
                    email: "test@user.domain",
                    phone: "+12334454545",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    appointment: {
                        date: "29 September, 2018"
                    }
                },
                {
                    name: "Test User",
                    email: "test@user.domain",
                    phone: "+12334454545",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    appointment: {
                        date: "29 September, 2018"
                    }
                },
                {
                    name: "Test User",
                    email: "test@user.domain",
                    phone: "+12334454545",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    appointment: {
                        date: "29 September, 2018"
                    }
                }
            ]
        }),
        computed: {
        },
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