@extends('layouts.user.dashboard')
@section('content')
@include('user.onboard.index')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Dashboard</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex d-flex md9>
        <v-layout row wrap>
            <v-flex md12 mb20 calendar_text>
                <v-card>
                    <v-card-title class="padding26">
                        <h4 class="title">Calendar</h4>
                    </v-card-title>
                    <v-card-text class="padding26">
                        <v-layout row wrap>
                            <v-flex md4>
                                <v-card class="boxshadow0 border1">
                                    <v-card-title>
                                        <span class="subheading">Today</span>
                                        <v-spacer></v-spacer>
                                        Tuesday, September 25, 2018
                                    </v-card-title>
                                    <v-card-text>
                                        <v-list two-line>
                                            <template v-for="(appointment, index) in appointments">
                                                <v-list-tile avatar @click="">
                                                <v-list-tile-avatar>
                                                    <img :src="appointment.client.avatar">
                                                </v-list-tile-avatar>
                                                <v-list-tile-content>
                                                    <v-list-tile-title v-html="appointment.timespan"></v-list-tile-title>
                                                    <v-list-tile-sub-title v-html="appointment.service.name"></v-list-tile-sub-title>
                                                </v-list-tile-content>
                                                </v-list-tile>
                                            </template>
                                        </v-list>
                                    </v-card-text>
                                </v-card>
                            </v-flex>
        
                            <v-flex md4>
                                <v-card class="boxshadow0 border1">
                                    <v-card-title>
                                        <span class="subheading">Wednesday, September 26, 2018</span>
                                    </v-card-title>
                                    <v-card-text>
                                        <v-list two-line>
                                            <template v-for="(appointment, index) in appointments">
                                                <v-list-tile avatar @click="">
                                                <v-list-tile-avatar>
                                                    <img :src="appointment.client.avatar">
                                                </v-list-tile-avatar>
                                                <v-list-tile-content>
                                                    <v-list-tile-title v-html="appointment.timespan"></v-list-tile-title>
                                                    <v-list-tile-sub-title v-html="appointment.service.name"></v-list-tile-sub-title>
                                                </v-list-tile-content>
                                                </v-list-tile>
                                            </template>
                                        </v-list>
                                    </v-card-text>
                                </v-card>
                            </v-flex>
        
                            <v-flex md4>
                                <v-card class="boxshadow0 border1">
                                    <v-card-title>
                                        <span class="subheading">Thursday, September 27, 2018</span>
                                    </v-card-title>
                                    <v-card-text>
                                        <v-list two-line>
                                            <template v-for="(appointment, index) in appointments">
                                                <v-list-tile avatar @click="">
                                                <v-list-tile-avatar>
                                                    <img :src="appointment.client.avatar">
                                                </v-list-tile-avatar>
                                                <v-list-tile-content>
                                                    <v-list-tile-title v-html="appointment.timespan"></v-list-tile-title>
                                                    <v-list-tile-sub-title v-html="appointment.service.name"></v-list-tile-sub-title>
                                                </v-list-tile-content>
                                                </v-list-tile>
                                            </template>
                                        </v-list>
                                    </v-card-text>
                                </v-card>
                            </v-flex>
        
                        </v-layout>
                    </v-card-text>
                </v-card>
            </v-flex>
    
            <v-flex md12 mb20>
                <v-card>
                    <v-card-title class="padding26">
                        <h4 class="title">Payments</h4>
                    </v-card-title>
                    <v-card-text class="padding26">
                        <v-layout row wrap>
                            <v-flex md4>
                                <v-card class="boxshadow0 border1 pay-box">
                                    <v-card-title>
                                        <span class="subheading">Open Estimates</span>
                                    </v-card-title>
                                    <v-card-text>
                                        <span class="display-2">$25.00</span>
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                            <v-flex md4>
                                <v-card class="boxshadow0 border1 pay-box">
                                    <v-card-title>
                                        <span class="subheading">Unpaid Bookings</span>
                                    </v-card-title>
                                    <v-card-text>
                                        <span class="display-2">$25.00</span>
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                            <v-flex md4>
                                <v-card class="boxshadow0 border1 pay-box">
                                    <v-card-title>
                                        <span class="subheading">Past Due Payments</span>
                                    </v-card-title>
                                    <v-card-text>
                                        <span class="display-2">$25.00</span>
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                        </v-layout>
                    </v-card-text>
                </v-card>
            </v-flex>
            
        </v-layout>
        
    </v-flex>

    <v-flex d-flex md3 mb20>
        <v-card>
            <v-card-title class="padding26">
                <h4 class="title">Clients</h4>
            </v-card-title>
            <v-card-text class="sidebar_list">
                <h4 class="subheading subtitle">Recently Active</h4>
                <v-list two-line>
                    <template v-for="(client, index) in clients">
                        <v-divider v-if="client.divider" ></v-divider>
                        <v-list-tile v-else avatar @click="">
                        <v-list-tile-avatar>
                            <img :src="client.avatar">
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <v-list-tile-title v-html="client.name"></v-list-tile-title>
                            <v-list-tile-sub-title v-html="client.appointment_date"></v-list-tile-sub-title>
                        </v-list-tile-content>
                        </v-list-tile>
                    </template>
                </v-list>
            </v-card-text>
        </v-card>
    </v-flex>
    <v-flex d-flex md6>
        <v-card>
            <v-card-title class="padding26">
                <h4 class="title">Coupons</h4>
            </v-card-title>
            <v-card-text>
                <v-list>
                    <v-list-tile two-line v-for="coupon in coupons">
                        <v-list-tile-title>@{{coupon.code}}</v-list-tile-title>
                        <v-list-tile-sub-title>@{{coupon.discount}}</v-list-tile-sub-title>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>
    </v-flex>
    <v-flex d-flex md6>
        <v-card>
            <v-card-title class="padding26">
                <h4 class="title ">Documents</h4>
            </v-card-title>
            <v-card-text>
                <v-list>
                    <template v-for="doc in documents">
                        <v-list-tile avatar :href="doc.url">
                            <v-list-tile-avatar>
                                <v-icon>insert_drive_file</v-icon>
                            </v-list-tile-avatar>
                            <v-list-tile-title>@{{doc.name}}</v-list-tile-title>
                        </v-list-tile>
                    </template>
                </v-list>
            </v-card-text>
        </v-card>
    </v-flex>


    <v-btn fixed dark fab bottom right color="cyan">
        <v-icon>add</v-icon>
    </v-btn>
</v-layout
@endsection

@section('scripts')
<script>
    var vm = new Vue({
        el: "#app",
        data: () => ({
            drawer: null,
            user: null,
            clients: [
                {
                    name: "Lorem ipsum",
                    appointment_date: "October 20, 2018",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    divider: false
                },
                {
                    name: "Lorem ipsum",
                    appointment_date: "October 20, 2018",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    divider: false
                },
                {
                    name: "Lorem ipsum",
                    appointment_date: "October 20, 2018",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    divider: false
                },
                {
                    name: "Lorem ipsum",
                    appointment_date: "October 20, 2018",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    divider: false
                },
                {
                    name: "Lorem ipsum",
                    appointment_date: "October 20, 2018",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    divider: false
                },
                {
                    name: "Lorem ipsum",
                    appointment_date: "October 20, 2018",
                    avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                    divider: false
                }
            ],
            appointments: [
                {
                    client: {
                        avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
                    },
                    timespan: "8:00 AM - 12:00 PM",
                    service: {
                        name: "Free Intro Call"
                    }
                },
                {
                    client: {
                        avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
                    },
                    timespan: "8:00 AM - 12:00 PM",
                    service: {
                        name: "Free Intro Call"
                    }
                },
                {
                    client: {
                        avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
                    },
                    timespan: "8:00 AM - 12:00 PM",
                    service: {
                        name: "Free Intro Call"
                    }
                }
            ],
            coupons: [
                {
                    code: "IB5673",
                    discount: "10"
                },
                {
                    code: "IB5673",
                    discount: "10"
                },
                {
                    code: "IB5673",
                    discount: "10"
                },
                {
                    code: "IB5673",
                    discount: "10"
                }
            ],
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
        mounted: function () {
            let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
            if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('app').style.display = 'block';
            this.getUser();
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
        }
    });
</script> 
@endsection