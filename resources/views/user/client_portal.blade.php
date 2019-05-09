@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Client Portal</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex md12>
        <v-card flat class="client-p">
            <v-card-title>
                <span class="title">@{{client.name}} - Client Portal</span>

                <v-btn href="{{url('client-portal/edit')}}">
                    Edit Client Portal<v-icon>edit</v-icon>
                </v-btn>
            </v-card-title>
            <v-card-text>
                <v-card flat width="641" style="margin: 0 auto;">
                    <div class="laptop-holder">
                        <iframe :src="client.portal_url">
                        </iframe>
                    </div>
                    <div class="phone-holder">
                        <iframe :src="client.portal_url">
                        </iframe>
                    </div>
                </v-card>
            </v-card-text>
            <v-card-actions>
            </v-card-actions>
        </v-card>
    </v-flex>
    <v-flex md12>
        <v-card flat class="cptitle">
            <v-card-title>
                <span class="title">Client Portal Url</span>
            </v-card-title>
            <v-card-text>

                <v-layout row wrap>
                    <v-flex md6 class="cp-title">
                        <span>Your client portal url is: </span>
                        <v-text-field readonly id="portal_url" :value="client.portal_url" append-icon="file_copy" @click:append="copyToClipboard">
                        </v-text-field>
                    </v-flex>
    
                    <v-flex md6 class="cp-title">
                        <span>Share on social networks</span>
                        <social-sharing :url="client.portal_url" v-cloak inline-template>
                            <div>
                                <network network="facebook">
                                    <v-btn fab color="#4267b2" dark>
                                        <i class="fa fa-facebook"></i>
                                    </v-btn>
                                </network>
                            
                                <network network="googleplus">                                
                                    <v-btn fab color="#db4437" dark>
                                        <i class="fa fa-google-plus"></i>
                                    </v-btn>
                                </network>
                                <network network="linkedin">
                                    <v-btn fab color="#0077B5" dark>
                                        <i class="fa fa-linkedin"></i>
                                    </v-btn>
                                </network>
                            
                                <network network="twitter">
                                    <v-btn fab color="#1da1f2" dark>
                                        <i class="fa fa-twitter"></i>
                                    </v-btn>
                                </network>
                            </div>
                        </social-sharing>
                    
                    </v-flex>
                </v-layout>

            </v-card-text>
        </v-card>
    </v-flex>
</v-layout>
@endsection

@section('scripts')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script>
Vue.use(SocialSharing);
var app = new Vue({
    el: "#app",
    data: () => ({
        drawer: null,
        user: null,
        client: {
            name: "Test Client",
            portal_url: "/http://faysal-ishtiaq.tk"
        }
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
        copyToClipboard: () => {
            let testingCodeToCopy = document.querySelector('#portal_url')
            testingCodeToCopy.setAttribute('type', 'text')    // 不是 hidden 才能複製
            testingCodeToCopy.select()

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';

            } catch (err) {
                alert('Oops, unable to copy');
            }

            window.getSelection().removeAllRanges()
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