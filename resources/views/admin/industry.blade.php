@extends('layouts.admin.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md6>
        <v-card>
            <v-card-title>
                <span class="title">Create</span>
            </v-card-title>
            <v-card-text>
                <v-list v-show="serverSideValidationErrors.length">
                    <li class="red--text" v-for="error in serverSideValidationErrors">@{{error}}</li>
                </v-list>
                <v-form>
                    <v-text-field label="Name" v-model="name" :error-messages="nameErrors" @input="$v.name.$touch()" @blur="$v.name.$touch()"></v-text-field>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn @click="submit" color="primary">Add</v-btn>
            </v-card-actions>
        </v-card>
    </v-flex>
    <v-flex md6>
        <v-card>
            <v-card-title>
                <span class="title">Industries</span>
            </v-card-title>
            <v-card-text>
                <v-list v-if="industries.length">
                    <template>
                        <v-list-tile v-for="industry in industries">
                            <v-list-tile-content>
                                @{{industry.name}}
                            </v-list-tile-content>
                            <v-list-tile-action>
                                <v-btn fab small outline color="red" @click="deleteInsustry(industry.id)">
                                    <v-icon>delete</v-icon>
                                </v-btn>
                            </v-list-tile-action>
                        </v-list-tile>
                    </template>
                </v-list>
                <v-alert :value="true" type="warning" v-else>
                    No Industry Is Created Yet
                </v-alert>
            </v-card-text>
        </v-card>
    </v-flex>
</v-layout>
@endsection
@section('scripts')
<script>
    Vue.use(window.vuelidate.default);
    const {required, email, minLength} = window.validators;
    var app = new Vue({
        el: "#app",
        validations: {
            name: { 
                required
            }
        },
        data: () => ({
            drawer: null,
            topbarMenu: false,
            user: null,
            name: '',
            industries: [],
            serverSideValidationErrors: []
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
            submit(){
                this.$v.$touch();
                this.serverSideValidationErrors = [];
                let that = this;
                if(!this.$v.invalid){
                    axios({
                        method: "post",
                        url: "/api/industry/store",
                        data: {
                            name: this.name
                        }
                    }).then(function(response){
                        that.name = '';
                        if(response.data.status=='success'){
                            that.updateIndustryList();
                        }

                        if(response.data.status == "error"){
                            for(let key in response.data.errors){
                                let errors = response.data.errors[key];

                                for(let i = 0; i < errors.length; i++){
                                    that.serverSideValidationErrors.push(errors[i]);
                                }
                            };
                        }
                    }).catch(function(error){
                        console.log(error);
                    }).then(function(response){
                        
                    });
                }
            },
            deleteInsustry(id){
                let that = this;
                axios({
                    url: "/api/industry/delete",
                    method: "post",
                    data: {
                        id: id
                    }
                }).then(function(response){
                    if(response.data.status=='success'){
                        that.updateIndustryList();
                    }
                }).catch(function(error){
                    console.log(error);
                });
            },
            updateIndustryList(){
                let that = this;
                axios({
                    url: "/api/industry/index",
                    method: "get"
                }).then(function(response){
                    console.log(response);
                    if(response.data.status === "success"){
                        that.industries = response.data.industries;
                    }
                }).catch(function(error){
                    console.log(error);
                }).then(function(response){
                    
                });
            }
        },
        computed: {
            nameErrors () {
                const errors = [];
                if (!this.$v.name.$dirty) return errors;
                !this.$v.name.required && errors.push('Name is required.');
                return errors;
            }
        },

        mounted: function () {
            let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
            if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('app').style.display = 'block';
            this.getUser();
            this.updateIndustryList();
        }
    });
</script>
@endsection