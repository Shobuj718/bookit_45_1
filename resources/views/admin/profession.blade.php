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
                    <v-select label="Select Industry" prepend-icon="business" :items="industries" v-model="industry" :error-messages="industryErrors" @change="updateProfessionList" @blur="$v.industry.$touch()">
                        <template slot="item" slot-scope="{item}">
                            <span>@{{item.name}}</span>
                        </template>
                        <template slot="selection" slot-scope="{item, index}">
                            <span>@{{item.name}}</span>
                        </template>
                    </v-select>
                    <v-text-field prepend-icon="business_center" label="Profession Name" v-model="name" :error-messages="nameErrors" @input="$v.name.$touch()" @blur="$v.name.$touch()"></v-text-field>
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
                <span class="title">Professions</span>
            </v-card-title>
            <v-card-text>
                <v-list v-if="professions.length">
                    <template>
                        <v-list-tile v-for="profession in professions">
                            <v-list-tile-content>
                                @{{profession.name}}
                            </v-list-tile-content>
                            <v-list-tile-action>
                                <v-btn fab small outline color="red" @click="deleteProfession(profession.id)">
                                    <v-icon>delete</v-icon>
                                </v-btn>
                            </v-list-tile-action>
                        </v-list-tile>
                    </template>
                </v-list>
                <v-alert :value="true" type="warning" v-else>
                    Not Available
                </v-alert>
            </v-card-text>
        </v-card>
    </v-flex>
</v-layout>
@endsection
@section('scripts')
<script>
    Vue.use(window.vuelidate.default);
    const {required} = window.validators;
    var app = new Vue({
        el: "#app",
        validations: {
            name: { required },
            industry: { required }
        },
        data: () => ({
            drawer: null,
            topbarMenu: false,
            user: null,
            name: '',
            industry: null,
            industries: [],
            professions: [],
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

                if(!this.$v.$invalid){
                    axios({
                        method: "post",
                        url: "/api/profession/store",
                        data: {
                            name: this.name,
                            industry_id: this.industry.id
                        }
                    }).then(function(response){
                        that.name = '';
                        if(response.data.status=='success'){
                            that.updateProfessionList();
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
            deleteProfession(id){
                let that = this;
                axios({
                    url: "/api/profession/delete",
                    method: "post",
                    data: {
                        id: id
                    }
                }).then(function(response){
                    if(response.data.status=='success'){
                        that.updateProfessionList();
                    }
                }).catch(function(error){
                    console.log(error);
                });
            },
            updateProfessionList(){
                this.$v.industry.$touch();
                let that = this;
                if(this.industry){
                    axios({
                        url: "/api/profession/index",
                        method: "post",
                        data: {
                            industry_id: this.industry.id
                        }
                    }).then(function(response){
                        if(response.data.status === "success" && response.data.professions){
                            that.professions = response.data.professions;
                        }
                    }).catch(function(error){
                        console.log(error);
                    }).then(function(response){
                    });
                }
            },
            updateIndustryList(){
                let that = this;
                axios({
                    url: "/api/industry/index",
                    method: "get"
                }).then(function(response){
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
            },
            industryErrors () {
                const errors = [];
                if (!this.$v.industry.$dirty) return errors;
                !this.$v.industry.required && errors.push('Select an industry.');
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
            this.updateProfessionList();
        }
    });
</script>
@endsection