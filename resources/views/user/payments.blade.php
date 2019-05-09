@extends('layouts.user.dashboard')
@section('content')


<v-layout row wrap>
    <v-flex d-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Payments</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex d-flex md12>
        <v-layout row wrap>
            <v-flex md4 class="payment_box">
                <v-card>
                    
                    <v-card-title>
                        <span class="subheading">Open Estimates</span>
                        <v-icon>monetization_on</v-icon>
                        
                        
                    </v-card-title>
                    <v-card-text>
                        <span class="display-2">$25.00</span>
                    </v-card-text>
                </v-card>
            </v-flex>
            <v-flex md4 class="payment_box">
                <v-card>
                    <v-card-title>
                        <span class="subheading">Unpaid Bookings</span>
                        <v-icon>attach_money</v-icon>
                    </v-card-title>
                    <v-card-text>
                        <span class="display-2">$25.00</span>
                    </v-card-text>
                </v-card>
            </v-flex>
            <v-flex md4 class="payment_box">
                <v-card>
                    <v-card-title>
                        <span class="subheading">Past Due Payments</span>
                        <v-icon>timelapse</v-icon>
                    </v-card-title>
                    <v-card-text>
                        <span class="display-2">$25.00</span>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
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