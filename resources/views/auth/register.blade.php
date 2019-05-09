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
                <h3 class="title text-sm-center mb-0">Sign Up</h3>
            </div>
        </v-flex> 
    </v-layout>
    <v-layout row fill-height class="rg-form-padding">
      <v-flex xs6 class="border-right">
        <v-card class="elevation-0 box-shadow-0 register-form">
            <v-card-text class="padding-bottom-0">
                <v-form class="text-fields">
                    <v-list v-show="serverSideValidationErrors.length > 0">
                        <li class="red--text" v-for="error in serverSideValidationErrors">@{{error}}</li>
                    </v-list>
                    <v-text-field v-model="firstname" :error-messages="firstnameErrors" :counter="32" @input="$v.firstname.$touch()" @blur="$v.firstname.$touch()" label="Firstname" type="text" class="firstname"></v-text-field>
                    <v-text-field v-model="lastname" :error-messages="lastnameErrors" :counter="32" @input="$v.lastname.$touch()" @blur="$v.lastname.$touch()" label="Lastname" type="text"></v-text-field>
                    <v-text-field v-model="email" :error-messages="emailErrors" @input="$v.email.$touch()" @blur="$v.email.$touch()" label="Email" type="email"></v-text-field>
                    <v-text-field v-model="password" :error-messages="passwordErrors" @input="$v.password.$touch()" @blur="$v.password.$touch()" label="Password" type="password"></v-text-field>
                    <v-text-field v-model="password_confirmation" :error-messages="password_confirmationErrors" @input="$v.password_confirmation.$touch()" @blur="$v.password_confirmation.$touch()" label="Confirm Password" type="password"></v-text-field>
                    <v-checkbox required v-model="agreement" :error-messages="agreementErrors" @change="$v.agreement.$touch()" @blur="$v.agreement.$touch()" label="I agree to the terms and conditions" class="aggreement-style"></v-checkbox>
                </v-form>
            <v-card-actions class="form_btn">
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="submit">Register</v-btn>
            </v-card-actions>
            </v-card-text>
        </v-card>
      </v-flex>
      <v-flex xs6 class="social-container">
        <v-card tile flat class="social-area">
          <v-card-text>
              <a href="#" class="facebook"><img src="{{asset('images/facebook.png')}}"/><span>Sign Up with Facebook</span></a>
              <a href="#" class="google"><img src="{{asset('images/search.png')}}"/><span>Sign Up with Google</span></a>
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
    <v-layout row fill-height>
        <v-flex xs12 class="login-forgot">
            Already have an account?<a href="{{url('/login')}}">Login</a>
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
    const {required, minLength, sameAs, maxLength, email} = window.validators;

    var app = new Vue({
        el: "#app",
        validations: {
            firstname: { 
                required, 
                maxLength: maxLength(32) 
            },
            lastname: { 
                required, 
                maxLength: maxLength(32) 
            },
            email: { 
                required, 
                email 
            },
            password: { 
                required,  
                minLength: minLength(5) 
            },
            password_confirmation: { 
                required,
                sameAsPassword: sameAs('password')
            },
            agreement: { 
                sameAs: sameAs( () => true ) 
            }
        },
        data: () => ({
            drawer: null,
            firstname: '',
            lastname: '',
            email: '',
            password: '',
            password_confirmation: '',
            agreement: false,
            serverSideValidationErrors: []
        }),
        props: {
            source: String
        },

        computed: {
            agreementErrors () {
                const errors = [];
                if (!this.$v.agreement.$dirty) return errors;
                !this.$v.agreement.sameAs && errors.push('You must agree to continue!');
                return errors;
            },
            firstnameErrors () {
                const errors = [];
                if (!this.$v.firstname.$dirty) return errors;
                !this.$v.firstname.maxLength && errors.push('Firstname must be at most 32 characters long');
                !this.$v.firstname.required && errors.push('Firstname is required.');
                return errors;
            },
            lastnameErrors () {
                const errors = [];
                if (!this.$v.lastname.$dirty) return errors;
                !this.$v.lastname.maxLength && errors.push('Lastname must be at most 32 characters long');
                !this.$v.lastname.required && errors.push('Lastname is required.');
                return errors;
            },
            emailErrors () {
                const errors = []
                if (!this.$v.email.$dirty) return errors;
                !this.$v.email.email && errors.push('Must be valid e-mail');
                !this.$v.email.required && errors.push('E-mail is required');
                return errors
            },
            passwordErrors () {
                const errors = []
                if (!this.$v.password.$dirty) return errors;
                !this.$v.password.minLength && errors.push('Password must be at least 6 characters long');
                !this.$v.password.required && errors.push('Password is required');
                return errors;
            },
            password_confirmationErrors () {
                const errors = []
                if (!this.$v.password_confirmation.$dirty) return errors;
                !this.$v.password_confirmation.sameAsPassword && errors.push('Password doesn\'t match Password Confirmation');
                !this.$v.password_confirmation.required && errors.push('Password must be confirmed');
                return errors;
            }
        },

        methods: {
            submit () {
                this.$v.$touch();
                this.serverSideValidationErrors = [];
                if(!this.$v.$invalid){
                    let form = this;
                    let registrationData = {
                        firstname: this.firstname,
                        lastname: this.lastname,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation
                    };

                    axios({
                        method: "post",
                        url: "/register",
                        data: registrationData
                    }).then(function(response){
                        if(response.data.status == "error"){
                            for(let key in response.data.errors){
                                let errors = response.data.errors[key];

                                for(let i = 0; i < errors.length; i++){
                                    form.serverSideValidationErrors.push(errors[i]);
                                }
                            };
                        }

                        if(response.data.status=="success"){
                            window.location = response.data.redirect_url;
                        }
                    }).catch(function(error){
                        console.log(error);
                    });
                }
            },
            clear () {
                this.$v.$reset();
                this.firstname = '';
                this.lastname = '';
                this.email = '';
                this.password = '';
                this.password_confirmation = '';
                this.agreement = false;
            }
        }
    }); 
</script>
@endsection