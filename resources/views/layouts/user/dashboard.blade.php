<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('/css/preloader.css')}}">
    <link rel="icon" href="{{asset('images/miynlogo.png')}}" type="image/png">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
</head>
<body>
<div id="preloader">
    <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
    </div>
</div>
<div id="app" style="display: none;">
    <v-app id="inspire">
        <v-navigation-drawer fixed :clipped="$vuetify.breakpoint.mdAndUp" app v-model="drawer" class="user_sidebar">
        <div class="sidebar-logo">
            <img src="{{asset('images/miynlogo-light.png')}}"/> 
        </div>
            <v-list dense>
                <v-list-tile href="{{url('dashboard')}}">
                    <v-list-tile-action>
                        <v-icon>dashboard</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Dashboard</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                
                <v-list-tile href="{{url('inbox')}}">
                    <v-list-tile-action>
                        <v-icon>inbox</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Inbox</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>

                <v-list-tile href="{{url('calendar')}}">
                    <v-list-tile-action>
                        <v-icon>event</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Calendar</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                
                <v-list-tile href="{{url('clients')}}">
                    <v-list-tile-action>
                        <v-icon>supervised_user_circle</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Clients</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                
                <v-list-tile href="{{url('payments')}}">
                    <v-list-tile-action>
                        <v-icon>credit_card</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Payments</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                
                <v-list-tile href="{{url('documents')}}">
                    <v-list-tile-action>
                        <v-icon>insert_drive_file</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Documents</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                
                <v-list-group value="true" active-class="custom-default" prepend-icon="public" no-action>
                    <v-list-tile slot="activator">
                        <v-list-tile-content>
                            <v-list-tile-title>Online Presence</v-list-tile-title>
                        </v-list-tile-content>    
                    </v-list-tile>

                
                    <v-list-tile href="{{url('client-portal')}}">
                        <v-list-tile-content>
                            <v-list-tile-title>
                                Client Portal
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile href="{{url('widget')}}">
                        <v-list-tile-content>
                            <v-list-tile-title>
                                Website Widget
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list-group>
                   
                <v-list-tile href="{{url('/settings')}}">
                    <v-list-tile-action>
                        <v-icon>settings</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Settings</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <!--navigation drawer finish-->
        
        <!-- toolbar start -->
        <v-toolbar color="cyan" dark app :clipped-left="$vuetify.breakpoint.mdAndUp" fixed>
            <v-toolbar-title style="width: 300px" class="ml-0 pl-3">
                <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
                <span class="hidden-sm-and-down">
                    {{ config('app.name', 'Laravel') }}
                </span>
            </v-toolbar-title>
            
            <v-spacer></v-spacer>
            
            <v-btn icon class="icon-color">
                <v-icon>apps</v-icon>
            </v-btn>
            
            <v-btn icon class="icon-color">
                <v-icon>notifications</v-icon>
            </v-btn>
                
            <template>
                <div class="text-xs-center">
                    <v-menu model="topbarMenu" :close-on-content-click="false" offset-x>
                        <v-btn icon large slot="activator">
                            <v-avatar size="32px" tile>
                                <img v-if="user" :src="user.avatar" alt="avatar" class="user_avatar">
                            </v-avatar>
                        </v-btn>  
                        
                        <v-card>
                            <v-list>
                                <v-list-tile avatar>
                                    <v-list-tile-avatar>
                                        <img v-if="user" :src="user.avatar" alt="avatar">
                                    </v-list-tile-avatar>
                
                                    <v-list-tile-content>
                                        <v-list-tile-title v-if="user">@{{user.firstname}} @{{user.lastname}}</v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                
                            <v-divider></v-divider>
                
                            <v-list>
                                <v-list-tile avatar @click="logout">
                                    <v-list-tile-avatar>
                                        <v-icon>power_settings_new</v-icon>
                                    </v-list-tile-avatar>
                                    <v-list-tile-title>Logout</v-list-tile-title>
                                </v-list-tile>
                            </v-list>
                        </v-card>
                    </v-menu>
                </div>
            </template>
        
        
        </v-toolbar>
        <!--toolbar finished-->
        <!-- content start -->
        <v-content class="dashboard_content">
            <v-container grid-list-md fluid padding-t class="@if(Request::path() == 'payments' || Request::path() == 'documents') not-height @else fill-heights @endif">
                @yield('content')
            </v-container>
        </v-content>

        <v-footer></v-footer>
    </v-app>
</div>

<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vuelidate@0.7.4/dist/vuelidate.min.js"></script>
<script src="https://unpkg.com/vuelidate@0.7.4/dist/validators.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
<script src="{{asset('/js/tinymce.min.js')}}"></script>
<script src="{{asset('/js/vue-social-sharing.js')}}"></script>
<script src="{{asset('/js/vue-components.js')}}"></script>
<script src="{{asset('/js/bootstrapper.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.23/moment-timezone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.23/moment-timezone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.23/moment-timezone-with-data.js"></script>

@yield('scripts')
</body>
</html>
