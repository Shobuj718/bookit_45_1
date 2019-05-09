@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap class="setting-page">
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Settings</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex md4 class="setting-col-1">
        <h4 class="title col-title">MY BUSINESS</h4>
        <v-card class="border-top">
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings/business-info')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">business</v-icon>
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Business Info</span>
                            <span class="caption">Upload profile image or logo</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>

        <v-card>
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings/staff')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">supervisor_account</v-icon>
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Staff</span>
                            <span class="caption">Add your first staff member</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>

        <v-card>
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings/my-account')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">account_circle</v-icon>
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">My Account</span>
                            <span class="caption">Your plan: free</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>

        <v-card>
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">all_inbox</v-icon>
                                
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Inbox & Leads</span>
                            <span class="caption">Set the notifications sent to you</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>
    </v-flex>

    <v-flex md4 class="setting-col-2">
        <h4 class="title col-title">SERVICES</h4>
        <v-card class="border-top">
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings/my-services')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">business_center</v-icon>
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">My Services</span>
                            <span class="caption">3 services are currently defined</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>

        <v-card>
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">date_range</v-icon>
                                
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Online Booking Options</span>
                            <span class="caption">Set your online scheduling preferneces</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>

        <v-card>
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings/calendar')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">event_available</v-icon>
                                
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Availability & Calendar</span>
                            <span class="caption">Sync your calendar to keep your schedule updated</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>

        <v-card>
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">monetization_on</v-icon>
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Payments</span>
                            <span class="caption">Connect a payment gateway to start accepting payments online.</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>

        <v-card>
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">local_activity</v-icon>
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Coupons</span>
                            <span class="caption">Creating and manage coupons and special offers.</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>

    </v-flex>


    <v-flex md4 class="setting-col-3">
        <h4 class="title col-title">OTHER SETTINGS</h4>
        <v-card class="border-top">
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">mail_outline</v-icon>
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Auto Client Messages</span>
                            <span class="caption">Upgrade to enable text message notifications</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>

        <v-card>
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">mail_outline</v-icon>
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Email Templates</span>
                            <span class="caption">Upgrade to edit your email templates.</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>

        <v-card>
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">assignment_ind</v-icon>
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Client Card</span>
                            <span class="caption">Email, First Name, Last Name...</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>

        <v-card>
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">timeline</v-icon>
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Conversion Tracking</span>
                            <span class="caption">Upgrade to add conversion tracking options</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>


        <v-card>
            <v-card-text>
                <v-list>
                    <v-list-tile avatar href="{{url('/settings')}}">
                        <v-list-tile-avatar>
                            <v-avatar>
                                <v-icon class="micon">settings</v-icon>
                            </v-avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <span class="subheading">Integrations</span>
                            <span class="caption">Connect vCita with 3rd parties.</span>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-tooltip bottom>
                                <v-btn icon ripple slot="activator" color="transparent" light>
                                    <v-icon>help_outline</v-icon>
                                </v-btn>
                                <span>Bottom tooltip</span>
                            </v-tooltip>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
        </v-card>
    </v-flex>
</v-layout>
@endsection

@section('scripts')
<style>
.v-card{
    margin-bottom: 20px;
}
</style>

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