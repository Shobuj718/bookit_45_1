@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Settings / My Account</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex md8>
        <v-card>
            <v-card-text class="plan-style">
                <v-list>
                    <v-list-tile avatar>
                        <v-list-tile-avatar size="72">
                                <v-img src="{{asset('images/badge.png')}}">
                                </v-img>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <div style="margin-left: 30px;">
                                <h4 class="subheading">Your current plan is:</h4>
                                <h3 class="title">Bookit Business (Annual)</h3>
                                <h5>Started at: 12, June, 2018</h5>
                            </div>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-btn class="custom-btn">
                                Change Plan
                            </v-btn>
                        </v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                        <v-list-tile-content class="subscription-title">
                            Lead Generation Package
                        </v-list-tile-content>
                        
                        
                    </v-list-tile>
                    
                    <v-list-tile>
                        <v-list-tile-action>
                            <A HREF="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_subscr-find&alias=4TZA4Q5Y44SE2">
                                <IMG SRC="https://www.sandbox.paypal.com/en_AU/i/btn/btn_unsubscribe_LG.gif" BORDER="0">
                            </A>
                        </v-list-tile-action>
                        <v-list-tile-action class="subscribe-btn">
                            
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="2AT9WLG6YST7E">
                                <input type="hidden" name="notify_url" value={{url('paypal-subscription/'.(\Auth::user()->slug))}}>
                                <input type="image" src="https://www.sandbox.paypal.com/en_AU/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                            </form>
                            
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
            
            <!-- ==================================================== Another package ==================================================== -->
            
            <v-card-text class="plan-style">
                <v-list>
                    <v-list-tile avatar>
                        <v-list-tile-avatar size="72">
                                <v-img src="{{asset('images/badge.png')}}">
                                </v-img>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <div style="margin-left: 30px;">
                                <h4 class="subheading">Your current plan is:</h4>
                                <h3 class="title">Bookit Business (Annual)</h3>
                                <h5>Started at: 12, June, 2018</h5>
                            </div>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-btn class="custom-btn">
                                Change Plan
                            </v-btn>
                        </v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                        <v-list-tile-content class="subscription-title">
                    
                            Test Package
                        
                    
                            
                        </v-list-tile-content>
                    
                        
                    </v-list-tile>
                    
                    <v-list-tile>
                        <v-list-tile-action>
                            <!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">-->
                                <input type="hidden" name="notify_url" value={{url('paypal-unsubscription/'.(\Auth::user()->slug))}}>
                                <A HREF="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_subscr-find&alias=4TZA4Q5Y44SE2">
                                    <IMG SRC="https://www.sandbox.paypal.com/en_AU/i/btn/btn_unsubscribe_LG.gif" BORDER="0">
                                </A>
                            <!--</form>-->
                        </v-list-tile-action>
                        <v-list-tile-action class="subscribe-btn">
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="UP3WSQUX2KP36">
                                <input type="hidden" name="notify_url" value={{url('paypal-subscription/'.(\Auth::user()->slug))}}>
                                <input type="image" src="https://www.sandbox.paypal.com/en_AU/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                            </form>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-card-text>
            
            <!-- Test database insertion for subscription and recurring payment-->
            
            <v-card-text class="plan-style">
                <v-list>
                    <v-list-tile avatar>
                        <v-list-tile-avatar size="72">
                                <v-img src="{{asset('images/badge.png')}}">
                                </v-img>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <div style="margin-left: 30px;">
                                <h4 class="subheading">Your current plan is:</h4>
                                <h3 class="title">Bookit Business (Annual)</h3>
                                <h5>Started at: 12, June, 2018</h5>
                            </div>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-btn class="custom-btn">
                                Change Plan
                            </v-btn>
                        </v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                        <v-list-tile-content class="subscription-title">
                            Basic Package
                        </v-list-tile-content>
                    </v-list-tile>
                    
                    <v-list-tile>
                        <v-list-tile-action>
                            <!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">-->
                                <A HREF="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_subscr-find&alias=4TZA4Q5Y44SE2">
                                    <IMG SRC="https://www.sandbox.paypal.com/en_AU/i/btn/btn_unsubscribe_LG.gif" BORDER="0">
                                </A>
                            <!--</form>-->
                        </v-list-tile-action>
                        <v-list-tile-action class="subscribe-btn">
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="V5VWPJHWJNZDJ">
                                <input type="hidden" name="notify_url" value={{url('paypal-subscription/'.(\Auth::user()->slug))}}>
                                <input type="image" src="https://www.sandbox.paypal.com/en_AU/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                            </form>
                        </v-list-tile-action>
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