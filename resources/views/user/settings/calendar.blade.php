@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Setting / Calendar</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-card class="setting-calendar">
        <v-card-text>
            <v-list>
                <v-list-tile>
                    <v-list-tile-title>
                        Week Start
                    </v-list-tile-title>
                    <v-list-tile-content>
                        <v-layout row wrap>
                            <v-flex xs12 sm12 md12>
                                <v-select :items="week_days" item-text="text" item-value="index" label="Select starting day of week" v-model="calendarSettings.week_start"></v-select>
                            </v-flex>
                        </v-layout>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile>
                    <v-list-tile-title>
                        Booking Interval
                    </v-list-tile-title>
                    <v-list-tile-content>
                        <v-layout row wrap>
                            <v-flex xs6 sm6 md6>
                                <v-text-field label="Hours" v-model="calendarSettings.increment_hour"></v-text-field>
                            </v-flex>
                            <v-flex xs6 sm6 md6>
                                <v-text-field label="Minutes" v-model="calendarSettings.increment_minute"></v-text-field>
                            </v-flex>
                        </v-layout>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile>
                    <v-list-tile-title>
                        Weekly Off
                    </v-list-tile-title>
                    <v-list-tile-content>
                        <v-layout row wrap>
                            <v-flex xs12 sm12 md12>
                                <v-select :items="week_days" item-text="text" item-value="index" label="Select weekly off days" v-model="calendarSettings.weekly_off" multiple></v-select>
                            </v-flex>
                        </v-layout>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile>
                    <v-list-tile-title>
                        Timezone
                    </v-list-tile-title>
                    <v-list-tile-content>
                        <v-layout row wrap>
                            <v-flex xs12 sm12 md12>
                                <v-select :items="timezones" item-text="text" item-value="index" label="Select timezone" v-model="calendarSettings.timezone"></v-select>
                            </v-flex>
                        </v-layout>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile>
                    <v-list-tile-title>
                        Business Hours
                    </v-list-tile-title>
                    <v-list-tile-content>
                        <v-layout row wrap>
                            <v-flex xs6 sm6 md6>
                                <v-dialog ref="startingHourDialog" v-model="startingHourModal" :return-value.sync="businessHourStart" persistent lazy full-width width="290px">
                                    <v-text-field slot="activator" v-model="calendarSettings.business_hour_start" label="From" prepend-icon="access_time" readonly></v-text-field>
                                    <v-time-picker v-if="startingHourModal" v-model="businessHourStart" full-width>
                                        <v-spacer></v-spacer>
                                        <v-btn flat color="primary" @click="startingHourModal = false">Cancel</v-btn>
                                        <v-btn flat color="primary" @click="$refs.startingHourDialog.save(businessHourStart);calendarSettings.business_hour_start=amPm(businessHourStart)">OK</v-btn>
                                    </v-time-picker>
                                </v-dialog>
                            </v-flex>
                        
                            <v-flex xs6 sm6 md6>
                                <v-dialog ref="endHourDialog" v-model="endHourModal" :return-value.sync="businessHourEnd" persistent lazy full-width width="290px">
                                    <v-text-field slot="activator" v-model="calendarSettings.business_hour_end" label="To" prepend-icon="access_time" readonly></v-text-field>
                                    <v-time-picker v-if="endHourModal" v-model="businessHourEnd" full-width>
                                        <v-spacer></v-spacer>
                                        <v-btn flat color="primary" @click="endHourModal = false">Cancel</v-btn>
                                        <v-btn flat color="primary" @click="$refs.endHourDialog.save(businessHourEnd);calendarSettings.business_hour_end=amPm(businessHourEnd)">OK</v-btn>
                                    </v-time-picker>
                                </v-dialog>
                            </v-flex>
                        </v-layout>
                    </v-list-tile-content>
                </v-list-tile>

                <v-list-tile>
                    <v-list-tile-title>
                        Local Time
                    </v-list-tile-title>
                    <v-list-tile-content>
                        <v-layout row wrap>
                            <v-flex xs12 sm12 md12>
                                <v-checkbox v-model="calendarSettings.local_time"></v-checkbox>
                            </v-flex>
                        </v-layout>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="saveCalendarSettings" dark flat class="save_btn">
                Save
            </v-btn>
        </v-card-actions>
    </v-card>
</v-layout>
@endsection

@section('scripts')
<script>

    var app = new Vue({
        el: "#app",
        data: () => ({
            drawer: null,
            user: null,
            week_days: [{
                index: 0,
                text: 'Sunday'
            },{
                index: 1,
                text: 'Monday'
            },{
                index: 2,
                text: 'Tuesday'
            },{
                index: 3,
                text: 'Wednesday'
            },{
                index: 4,
                text: 'Thursday'
            },{
                index: 5,
                text: 'Friday'
            },{
                index: 6,
                text: 'Saturday'
            }],
            businessHourStart: null,
            businessHourEnd: null,
            startingHourModal: false,
            endHourModal: false,
            timezones: {!!json_encode(DateTimeZone::listIdentifiers(DateTimeZone::ALL))!!},
            calendarSettings: {
                business_hour_start: null,
                business_hour_end: null,
                week_start: 0,
                weekly_off: [0,6],
                local_time: false,
                increment_hour: 0,
                increment_minute: 30,
                timezone: ''
            }
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
            
            amPm: function(time){
                if(!time) return;
                let splitTime = time.split(':');
                let hour = splitTime[0] > 12 ? splitTime[0] - 12 : splitTime[0];
                let meridian = splitTime[0] == hour ? 'AM' : 'PM';

                hour = hour == 0 ? 12 : hour;
                return hour+":"+splitTime[1]+" "+meridian;
            },
            getCalendarSettings: function(){
                let that = this;
                axios({
                    method: "get",
                    url: '/api/calendar-settings/index'
                }).then(function(response){
                    that.calendarSettings = response.data.calendarSettings;
                }).catch(function(errors){
                    console.log(errors);
                });
            },
            saveCalendarSettings: function(){
                let that = this;
                axios({
                    url: '/api/calendar-settings/save',
                    method: "post",
                    data: this.calendarSettings
                }).then(function(response) {
                    that.calendarSettings = response.data.data;
                    console.log(response.data.data);
                }).catch(function(errors) {
                    console.log(errors);
                });
                
                // return false;
            }
            
        },
        mounted: function () {
            let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
            if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('app').style.display = 'block';
            this.getUser();
            this.getCalendarSettings();
        }
    });
</script>
@endsection

