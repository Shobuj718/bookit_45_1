@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Calendar</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex md12>
        <div id='calendar'></div>
    </v-flex>
</v-layout>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
<script>
    (function($) {
        $(document).ready(function(){
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

                    $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay,listMonth'
                        },
                        defaultDate: moment(),
                        navLinks: true,
                        editable: true,
                        eventLimit: true,
                        defaultView: 'agendaWeek'
                    });
                }
            });
        });
    })( jQuery );
</script>
@endsection