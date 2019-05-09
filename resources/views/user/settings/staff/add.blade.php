@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Settings / Add Staff Account</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex md9>
        <v-card class="add-staff">
            <v-card-title class="staff-title">
                <span class="title">Add Staff</span>
            </v-card-title>
            <v-card-text>
                <v-form>
                    <v-layout row wrap>
                        <v-flex md6>
                            <span class="body-2 custom-style">Profile Picture</span>
                            <file-pond ref="pond" auto-upload="false" accepted-file-types="image/jpeg, image/png" v-bind:files="profile_picture"></file-pond>
                        </v-flex>
                        <v-flex md6>
                            <span class="body-2 custom-style">Color</span>
                            <chrome-picker :value="colors" v-model="color" @input="updateValue"></chrome-picker>
                        </v-flex>
                    </v-layout>
                    <v-layout row wrap>
                        <v-flex md6>
                            <v-text-field label="Firstname" v-model="firstname" :error-messages="firstnameErrors" @input="$v.firstname.$touch()" @blur="$v.firstname.$touch()">
                            </v-text-field>
                        </v-flex>
                        <v-flex md6>
                            <v-text-field label="Lastname" v-model="lastname" :error-messages="lastnameErrors" @input="$v.lastname.$touch()" @blur="$v.lastname.$touch()">
                            </v-text-field>
                        </v-flex>
                    </v-layout>
                    <v-layout row wrap>
                        <v-flex md6>
                            <v-text-field label="Display Name" v-model="display_name" :error-messages="display_nameErrors" @input="$v.display_name.$touch()" @blur="$v.display_name.$touch()">
                            </v-text-field>
                        </v-flex>
                        <v-flex md6>
                            <v-text-field label="Professional Title" v-model="professional_title" :error-messages="professional_titleErrors" @input="$v.professional_title.$touch()" @blur="$v.professional_title.$touch()">
                            </v-text-field>
                        </v-flex>
                    </v-layout>
                    <v-layout row wrap>
                        <v-flex md12>
                            <v-text-field label="Email" v-model="email" :error-messages="emailErrors" @input="$v.email.$touch()" @blur="$v.email.$touch()">
                            </v-text-field>
                        </v-flex>
                    </v-layout>
                    <v-layout row wrap>
                        <v-flex md6>
                            <v-text-field label="Password" type="password" v-model="password" :error-messages="passwordErrors" @input="$v.password.$touch()" @blur="$v.password.$touch()">
                            </v-text-field>
                        </v-flex>
                        <v-flex md6>
                            <v-text-field label="Confirm Password" type="password" v-model="password_confirmation" :error-messages="password_confirmationErrors" @input="$v.password_confirmation.$touch()" @blur="$v.password_confirmation.$touch()">
                            </v-text-field>
                        </v-flex>
                    </v-layout>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn @click="addStaff" color="custom-btn">
                    Add
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-flex>
</v-layout>
@endsection

@section('scripts')
<script src="{{asset('js/vue-color.min.js')}}"></script>
<link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
<link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">

<script src="https://unpkg.com/filepond-plugin-image-preview"></script>
<script src="https://unpkg.com/filepond"></script>
<script src="https://unpkg.com/vue-filepond"></script>

<script>
    Vue.use(window.vuelidate.default);
    const {required, minLength, sameAs, maxLength, email} = window.validators;
    var {Chrome} = VueColor;
    var colors = "#07EAD4";
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
            display_name: { 
                required
            },
            professional_title: { 
                required
            },
            password: { 
                required,  
                minLength: minLength(5) 
            },
            password_confirmation: { 
                required,
                sameAsPassword: sameAs('password')
            }
        },
        components: {
            'chrome-picker': Chrome,
            FilePond: vueFilePond.default(FilePondPluginImagePreview)
        },
        data: () => ({
            drawer: null,
            user: null,
            colors: colors,
            firstname: '',
            lastname: '',
            display_name: '',
            email: '',
            professional_title: '',
            color: colors,
            password: '',
            password_confirmation: '',
            profile_picture: null
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
                }).catch(function(error){

                }).then(function(response){

                });
            },
            getUser: function(){
                let that = this;
                axios({
                    method: "get",
                    url: "/api/user"
                }).then(function(response){
                    this.user = response.data;
                });
            },
            updateValue (value) {
                this.colors = value.hex;
            },
            addStaff(){
                // this.$v.$touch();
                this.serverSideValidationErrors = [];
                let that = this;
                let profile_picture = this.$refs.pond.getFiles()[0].file;

                if(!this.$v.$invalid){
                    let form = this;
                    let staffData = new FormData;
                    staffData.append('firstname', this.firstname);
                    staffData.append('lastname', this.lastname);
                    staffData.append('email', this.email);
                    staffData.append('display_name', this.display_name);
                    staffData.append('professional_title', this.professional_title);
                    staffData.append('password', this.password);
                    staffData.append('password_confirmation', this.password_confirmation);
                    staffData.append('color', this.colors);
                    staffData.append('avatar', profile_picture);

                    axios({
                        method: "post",
                        url: "/settings/staff/add",
                        data: staffData
                    }).then(function(response){
                        console.log(response);
                        if(response.data.status == "success"){
                            window.location = response.data.redirect_url;
                        }
                    }).catch().then();
                }
            
            }
        },
        mounted: function () {
            let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
            if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('app').style.display = 'block';
            this.getUser();
        },

        computed: {
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
            },
            display_nameErrors () {
                const errors = [];
                if (!this.$v.display_name.$dirty) return errors;
                !this.$v.display_name.required && errors.push('Display Name is required.');
                return errors;
            },

            professional_titleErrors () {
                const errors = [];
                if (!this.$v.professional_title.$dirty) return errors;
                !this.$v.professional_title.required && errors.push('Professional Title is required.');
                return errors;
            }
        }
    });
</script>
@endsection