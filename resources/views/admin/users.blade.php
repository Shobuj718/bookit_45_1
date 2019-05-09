@extends('layouts.admin.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12>
        <v-card>
            <v-card-title>
                <span class="title">Users</span>
            </v-card-title>
            <v-card-text>
                <template>
                    <v-data-table :headers="headers" :items="users" class="elevation-1">
                        <template slot="headerCell" slot-scope="props">
                            <v-tooltip bottom>
                                <span slot="activator">
                                    @{{ props.header.text }}
                                </span>
                                <span>
                                    @{{ props.header.text }}
                                </span>
                            </v-tooltip>
                        </template>
                        <template slot="items" slot-scope="props">
                            <td>@{{ props.item.firstname }}</td>
                            <td>@{{ props.item.lastname }}</td>
                            <td>@{{ props.item.email }}</td>
                        </template>
                    </v-data-table>
                </template>
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
                topbarMenu: false,
                user: null,
                headers: [
                    { text: 'First Name',align: 'left',value: 'firstname' },
                    { text: 'Last Name', value: 'lastname' },
                    { text: 'Email', value: 'email' },
                ],
                users: []
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
                },
                getUsers: function() {
                    let that = this;
                    axios({
                        method: "get",
                        url: "/api/users",
                    }).then(function(response){
                        that.users = response.data.users;
                    }).catch(function(error){
    
                    }).then(function(response){
    
                    });
                }
            },
            mounted: function () {
                let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
                if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
                document.getElementById('preloader').style.display = 'none';
                document.getElementById('app').style.display = 'block';
                this.getUser();
                this.getUsers();
            }
        });
    </script>
@endsection