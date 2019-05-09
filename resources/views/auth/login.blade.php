@extends('layouts.auth')

@section('content')
<div class="register-container">
    <div class="register-logo">
        <img src="{{asset('images/miynlogo.png')}}"/> 
    </div>
<template>
  <v-container fluid class="elevation-12 bg-white">
    <v-layout row fill-height>
        <v-flex xs12>
            <div style="width: 100%; text-align: center;">
                <h3 class="title text-sm-center mb-0">Login to Miyn</h3>
            </div>
        </v-flex> 
    </v-layout>
    <v-layout row fill-height class="rg-form-padding">
      <v-flex xs6 class="border-right">
        <v-card class="elevation-0 box-shadow-0 register-form">
            <v-progress-circular style="position: absolute;top: 43%;left: 43%;z-index: 99999999;" v-show="loading" :size="70" :width="7" color="purple" indeterminate></v-progress-circular>
            
            <v-card-text class="padding-bottom-0">
                <v-form class="text-fields">
                    <v-list v-show="serverSideValidationErrors.length > 0">
                        <li class="red--text" v-for="error in serverSideValidationErrors">@{{error}}</li>
                    </v-list>
                    <v-text-field v-model="email" :error-messages="emailErrors" @input="$v.email.$touch()" @blur="$v.email.$touch()" label="Email" type="text" class="firstname"></v-text-field>
                    <v-text-field v-model="password" :error-messages="passwordErrors" @input="$v.password.$touch()" @blur="$v.password.$touch()" label="Password" type="password"></v-text-field>
                    <v-checkbox v-model="remember" label="Remember me" class="aggreement-style"></v-checkbox>
                </v-form>
                <v-card-actions class="form_btn">
                    <v-spacer></v-spacer>
                    <v-btn color="primary" @click="submit">Login</v-btn>
                </v-card-actions>
            </v-card-text>
        </v-card>
      </v-flex>
      <v-flex xs6 class="social-container">
        <v-card tile flat class="social-area">
          <v-card-text>
              <a href="#" class="facebook"><img src="{{asset('images/facebook.png')}}"/><span>Login with Facebook</span></a>
              <a href="#" class="google"><img src="{{asset('images/search.png')}}"/><span>Login with Google</span></a>
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
    <v-layout row fill-height>
        <v-flex xs12 class="login-forgot">
            Don't have an account?<a href="{{url('/register')}}">Sign Up</a>
            <br>
            <a href="{{url('/password/reset')}}">Forgot password?</a>
        </v-flex> 
    </v-layout>
  </v-container>
</template>
</div>
@endsection

@section('scripts')
<script>
    Vue.use(window.vuelidate.default);
    const {required, email, minLength} = window.validators;

    var app = new Vue({
        el: "#app",
        validations: {
            email: { 
                required,
                email
            },
            password: { 
                required,  
                minLength: minLength(6)
            }
        },
        data: () => ({
            drawer: null,
            email: '',
            password: '',
            remember: '',
            serverSideValidationErrors: [],
            loading: false
        }),
        props: {
            source: String
        },

        computed: {
            emailErrors () {
                const errors = [];
                if (!this.$v.email.$dirty) return errors;
                !this.$v.email.required && errors.push('Email is required.');
                return errors;
            },
            passwordErrors () {
                const errors = []
                if (!this.$v.password.$dirty) return errors;
                !this.$v.password.minLength && errors.push('Password must be at least 6 characters long');
                !this.$v.password.required && errors.push('Password is required');
                return errors;
            },
        },

        methods: {
            submit () {
                this.$v.$touch();
                this.serverSideValidationErrors = [];
                if(!this.$v.$invalid){
                    this.loading = true;
                    let form = this;
                    let loginData = {
                        "email": this.email,
                        "password": this.password
                    };
                    loginData.remember = this.remember;
                    
                    axios({
                        method: "post",
                        url: "/login",
                        data: loginData
                    }).then(function(response){
                        if(response.data.logged_in){
                            window.location = response.data.redirect_url;
                        }

                        if(response.data.status == "error"){
                            for(let key in response.data.errors){
                                form.serverSideValidationErrors.push(response.data.errors[key]);
                                // let errors = response.data.errors[key];

                                // for(let i = 0; i < errors.length; i++){
                                //     form.serverSideValidationErrors.push(errors[i]);
                                // }
                            };
                        }
                    }).catch(function(error){
                        console.log(error);
                    }).then(() => {
                        form.loading = false;
                    });
                }
            },
            clear () {
                this.$v.$reset();
                this.email = '';
                this.password = '';
                this.remember = false;
            }
        }
    }); 
</script>
@endsection