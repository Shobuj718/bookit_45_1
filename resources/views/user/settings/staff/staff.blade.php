@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Settings / Staff</h4>
                <v-btn href="{{url('/settings/staff/add')}}" class="new-staff-btn">
                    New Staff Account
                </v-btn>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex md9>
        <v-card>
            <v-card-text>
                <v-list v-for="staff in staffs">
                    <v-list-tile avatar>
                        <v-list-tile-avatar>
                            
                                <v-avatar>
                                    <v-img :src="staff.avatar">
                                    </v-img>
                                </v-avatar>
                            
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <v-layout row wrap style="width: 100%;">
                                <v-flex>
                                    <span class="subheading staff-name">@{{staff.display_name}}</span>
                                    <span class="subheading staff-email">@{{staff.email}}</span>
                                </v-flex>
                                <v-flex class="staff-btn">
                                    <v-btn  href="{{url('/settings/staff/edit')}}">
                                        Edit Staff<v-icon>edit</v-icon>
                                    </v-btn>
                                    <v-btn @click="deleteStaff(staff)" class="staff-d">
                                        Delete Staff<v-icon>delete</v-icon>
                                    </v-btn>
                                </v-flex>
                            </v-layout>
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
            user:null,
            staffs: []
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
            getStaffs: function(){
                let that = this;
                axios({
                    method: 'get',
                    url: '/api/staff/index'
                }).then(function(response){
                    that.staffs = response.data.staffs;
                });
            },
            deleteStaff: function(staff){
                let that = this;
                axios({
                    url: '/api/staff/delete',
                    method: 'post',
                    data: {
                        slug: staff.slug
                    }
                }).then(function(response){
                    that.getStaffs();
                });
            }
        },
        mounted: function () {
            let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
            if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('app').style.display = 'block';
            this.getUser();
            this.getStaffs();
        }
    });
</script>
@endsection