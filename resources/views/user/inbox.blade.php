@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Inbox</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex md12>
        <v-tabs v-model="currentItem" slider-color="white">
            <v-tab :href="'#tab-inbox'" class="inbox-tab">
                Inbox2
            </v-tab>
            <v-tab :href="'#tab-requires-attention'" class="inbox-tab">
                Requires Attention
            </v-tab>
        </v-tabs>
        <v-tabs-items v-model="currentItem">
            <v-tab-item :id="'tab-inbox'">
                <v-card flat>
                    <v-card-text class="plr-0">
                        <v-list three-line>
                            <template v-for="appointment in appointments">
                                <v-list-tile avatar @click="" class="inbox_list">
                                    <v-list-tile-avatar>
                                        <img :src="appointment.client.avatar">
                                    </v-list-tile-avatar>
                                    <!--<a href="{{url('/single-inbox')}}"> -->
                                    <!--    <v-list-tile-content center>-->
                                    <!--        <v-layout style="width: 100%; padding: 15px;" row>-->
                                    <!--            <v-flex md3 xs12>-->
                                    <!--                <v-list-tile-title v-html="appointment.client.name"></v-list-tile-title>-->
                                    <!--                <v-list-tile-sub-title v-html="appointment.staff.name"></v-list-tile-sub-title>-->
                                    <!--            </v-flex>-->
                                    <!--            <v-flex md3 xs12>-->
                                    <!--                <v-list-tile-title v-html="appointment.service.name"></v-list-tile-title>-->
                                    <!--            </v-flex>-->
                                    <!--            <v-flex md3 xs12>-->
                                    <!--                <v-list-tile-title v-html="appointment.status"></v-list-tile-title>-->
                                    <!--            </v-flex>-->
                                    <!--            <v-flex md3 xs12>-->
                                    <!--                <v-list-tile-title v-html="appointment.date"></v-list-tile-title>-->
                                    <!--                <v-list-tile-sub-title v-html="appointment.start_time + ' - ' + appointment.end_time"></v-list-tile-sub-title>-->
                                    <!--            </v-flex>-->
                                    <!--        </v-layout>    -->
                                    <!--    </v-list-tile-content>-->
                                    <!--</a>-->
                                    <!--<a href="{{url('/single-inbox')}}">-->
                                        <v-list-tile-content center>
                                            <v-layout style="width: 100%; padding: 15px;" row>
                                                <v-flex md3 xs12>
                                                    <v-list-tile-title v-html="appointment.client.name"></v-list-tile-title>
                                                    <v-list-tile-sub-title v-html="appointment.staff.name"></v-list-tile-sub-title>
                                                </v-flex>
                                                <v-flex md3 xs12>
                                                    <v-list-tile-title v-html="appointment.service.name"></v-list-tile-title>
                                                </v-flex>
                                                <v-flex md3 xs12>
                                                    <a v-bind:href="'/single-inbox/'+ appointment.slug">
                                                        <v-list-tile-title v-html="appointment.status"></v-list-tile-title>
                                                    </a>
                                                </v-flex>
                                                <v-flex md3 xs12>
                                                    <v-list-tile-title v-html="appointment.date"></v-list-tile-title>
                                                    <template v-if="appointment.status === 'x' ">
                                                        <v-list-tile-sub-title v-html="appointment.start_time + ' - ' + appointment.end_time"></v-list-tile-sub-title>    
                                                    </template>
                                                    <template v-else>
                                                        <v-list-tile-sub-title></v-list-tile-sub-title>    
                                                    </template>
                                                </v-flex>
                                            </v-layout>    
                                        </v-list-tile-content>
                                    <!--</a>-->
                                    
                                </v-list-tile>
                                <v-divider></v-divider>
                            </template>
                            </v-list>
                    </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item :id="'tab-requires-attention'">
                <v-card flat>
                    <v-card-text class="plr-0">
                        <v-list three-line>
                            <template v-for="appointment in appointments">
                                <v-list-tile avatar @click="" class="inbox_list">
                                    <v-list-tile-avatar>
                                        <img :src="appointment.client.avatar">
                                    </v-list-tile-avatar>
                
                                    <v-list-tile-content center>
                                        <v-layout style="width: 100%; padding: 15px;" row>
                                            <v-flex md3 xs12>
                                                <v-list-tile-title v-html="appointment.client.name"></v-list-tile-title>
                                                <v-list-tile-sub-title v-html="appointment.staff.name"></v-list-tile-sub-title>
                                            </v-flex>
                                            <v-flex md3 xs12>
                                                <v-list-tile-title v-html="appointment.service.name"></v-list-tile-title>
                                            </v-flex>
                                            <v-flex md3 xs12>
                                                <v-list-tile-title v-html="appointment.status"></v-list-tile-title>
                                            </v-flex>
                                            <v-flex md3 xs12>
                                                <v-list-tile-title v-html="appointment.date"></v-list-tile-title>
                                                <template v-if="appointment.status === 'x' ">
                                                    <v-list-tile-sub-title v-html="appointment.start_time + ' - ' + appointment.end_time"></v-list-tile-sub-title>    
                                                </template>
                                                <template v-else>
                                                    <v-list-tile-sub-title></v-list-tile-sub-title>    
                                                </template>
                                                
                                            </v-flex>
                                        </v-layout>    
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                            </template>
                            </v-list>
                    </v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs-items>
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
            currentItem: 'tab-inbox',
            appointments: [
                // {
                //     service: {
                //         name: "Free Intro Call"
                //     },
                //     staff: {
                //         name: "Test Staff"
                //     },
                //     client: {
                //         name: "Test client",
                //         avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
                //     },
                //     date: "30 November, 2018",
                //     start_time: "8:00 AM",
                //     end_time: "10:00 AM",
                //     status: "Upcoming"
                // }
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
            },
            getAppointments: function() {
                
                let that = this;
                
                let appointment = {
                    service: {
                        name: ""
                    },
                    staff: {
                        name: ""
                    },
                    client: {
                        name: "",
                        avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
                    },
                    date: "",
                    start_time: "",
                    end_time: "",
                    status: "",
                    slug: ""
                };
                
                axios({
                
                    method: "get",
                    url: "/bookings"
                
                }).then(function(response) {
                
                    console.log(response);

                    for(let i = 0; i < response.data.appointments.length; i++) {
                    
                        appointment.service.name = response.data.appointments[i].service_name;
                        appointment.staff.name = response.data.appointments[i].staff_name;
                        appointment.client.name = response.data.appointments[i].first_name + " " + response.data.appointments[i].last_name;
                        appointment.date = moment(response.data.appointments[i].created_at).format('ddd D');
                        appointment.status = response.data.appointments[i].status;
                        appointment.slug = response.data.appointments[i].slug;
                        that.appointments.push(appointment);
                    
                    }
                    
                }).catch(function(error) {
                    
                    console.log(error);
                    
                });
            }
        },
        mounted: function () {
            let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
            if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('app').style.display = 'block';
            this.getUser();
            this.getAppointments();
        }
    });
</script>
@endsection