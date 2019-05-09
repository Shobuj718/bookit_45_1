@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Business Information</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex d-flex md9 class="business-info-page">
        <v-layout row wrap>
                <v-flex md12 id="business-description" class="business-desc mb20">
                    <v-card>
                        <v-card-title>
                            <span class="title">Business Description</span>
                        </v-card-title>
                        <v-card-text>
                            <v-list v-show="businessDescriptionServerSideErrors.length > 0">
                                <li class="red--text" v-for="error in businessDescriptionServerSideErrors">@{{error}}</li>
                            </v-list>
                            
                            <v-layout row wrap>
                                <v-flex md8>
                                    <v-layout row wrap>
                                        <v-flex xs12 md12>
                                            <v-text-field label="Name" v-model="businessDescription.name">
                                            </v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex xs12 md12>
                                            <v-textarea label="Short Description" v-model="businessDescription.short_description">
                                            </v-textarea>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex xs12 md6>
                                            <v-select label="Industry" :items="industries" v-model="industry" item-text="name" item-value="name" return-object @change="getProfessionList">
                                            </v-select>
                                        </v-flex>
                                        <v-flex xs12 md6>
                                            <v-select label="Profession" :items="professions"  v-model="profession" item-text="name" item-value="name" return-object >
                                                <template slot="item" slot-scope="{item}">
                                                    <span>@{{item.name}}</span>
                                                </template>
                                                <template slot="selection" slot-scope="{item, index}">
                                                    <span>@{{item.name}}</span>
                                                </template>
                                            </v-select>
                                        </v-flex>
                                    </v-layout>
                                </v-flex>
                                <v-flex md4>
                                    <v-layout row wrap class="profile-center">
                                        <v-flex xs12>
                                            <h4 class="subheading">Profile Picture</h4>
                                            <v-avatar size="96">
                                                <v-img v-if="user.avatar" :src="user.avatar"></v-img>
                                                <v-img v-else src="https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?fit=256%2C256&quality=100&ssl=1">
                                                </v-img>
                                            </v-avatar>
                                        </v-flex>
                                        <v-flex xs12>
                                            <file-pond style="" ref="pondAvatar" auto-upload="false" accepted-file-types="image/jpeg, image/png"></file-pond>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap class="profile-center">
                                        <v-flex xs12>
                                            <h4 class="subheading">Logo</h4>
                                            <v-avatar size="96">
                                                <v-img v-if="businessDescription.logo" :src="businessDescription.logo"></v-img>
                                                <v-img v-else src="https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?fit=256%2C256&quality=100&ssl=1">
                                                </v-img>
                                            </v-avatar>
                                        </v-flex>
                                        <v-flex xs12>
                                            <file-pond style="width: 100%; height: 100%;" ref="pondLogo" auto-upload="false" accepted-file-types="image/jpeg, image/png"></file-pond>
                                        </v-flex>
                                    </v-layout>
                                </v-flex>
                            </v-layout>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="custom-btn" @click="saveBusinessDescription">Save</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-flex>
                <v-flex md12 id="contact-info" class="business-desc mb20">
                    <v-card>
                        <v-card-title>
                            <span class="title">Contact Info</span>
                        </v-card-title>
                        <v-card-text>
                            <v-list v-show="contactInfoServerSideErrors.length > 0">
                                <li class="red--text" v-for="error in contactInfoServerSideErrors">@{{error}}</li>
                            </v-list>
                            <v-layout row wrap>
                                <v-flex md2>
                                    <v-autocomplete label="Country" v-model="contactInfo.country" :items="countries" :item-text="countryToString" :item-value="countryToString" return-object></v-autocomplete>
                                </v-flex>
                                <v-flex md4>
                                    <v-text-field label="Phone Number" v-model="contactInfo.phone">
                                    </v-text-field>
                                </v-flex>
                                <v-flex md6>
                                    <v-checkbox label="Display phone number to clients" v-model="contactInfo.display_phone">
                                    </v-checkbox>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex md6>
                                    <v-text-field label="Address" v-model="contactInfo.address">
                                    </v-text-field>
                                </v-flex>
                                <v-flex md6>
                                    <v-checkbox label="Display address to clients" v-model="contactInfo.display_address">
                                    </v-checkbox>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex md6>
                                    <v-text-field label="Website URL" v-model="contactInfo.website_url">
                                    </v-text-field>
                                </v-flex>
                                <v-flex md6>
                                    <v-checkbox label="Display website url to clients" v-model="contactInfo.display_website_url">
                                    </v-checkbox>
                                </v-flex>
                            </v-layout>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="custom-btn" @click="saveContactInfo">Save</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-flex>
                <v-flex md12 id="admin-account" class="business-desc mb20">
                    <v-card>
                        <v-card-title>
                            <span class="title">Admin Account</span>
                        </v-card-title>
                        <v-card-text>
                            <v-list v-show="userServerSideErrors.length > 0">
                                <li class="red--text" v-for="error in userServerSideErrors">@{{error}}</li>
                            </v-list>
                            <v-layout row wrap>
                                <v-flex md6>
                                    <v-text-field label="Account Email" v-model="user.email">
                                    </v-text-field>
                                </v-flex>
                                <v-flex md6>
                                    <v-checkbox label="Display email address to clients">
                                    </v-checkbox>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex md6>
                                    <v-text-field label="First Name" v-model="user.firstname">
                                    </v-text-field>
                                </v-flex>
                                <v-flex md6>
                                    <v-text-field label="Last Name" v-model="user.lastname">
                                    </v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex md12>
                                    <v-text-field label="Display Name" v-model="user.display_name">
                                    </v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex md2>
                                    <v-autocomplete label="Country" v-model="user.country" :items="countries" :item-text="countryToString" :item-value="countryToString" return-object></v-autocomplete>
                                </v-flex>
                                <v-flex md4>
                                    <v-text-field label="Phone Number" v-model="user.phone">
                                    </v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex md6>
                                    <v-text-field label="Professional Title" v-model="user.professional_title">
                                    </v-text-field>
                                </v-flex>
                            </v-layout>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="custom-btn" @click="saveAdminAccount">Save</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-flex>
        </v-layout>
    </v-flex>
    <v-flex d-flex md3 mb20>
        <v-card class="right-nav">
            <v-card-title>
                <span class="title">QUICK NAVIGATION</span>
            </v-card-title>
            <v-card-text>
                <a href="#business-description">Business Description</a>
                <a href="#contact-info">Contact info</a>
                <a href="#admin-account">Admin Account</a>
            </v-card-text>
        </v-card>
    </v-flex>
</v-layout>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
<link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">

<script src="https://unpkg.com/filepond-plugin-image-preview"></script>
<script src="https://unpkg.com/filepond"></script>
<script src="https://unpkg.com/vue-filepond"></script>
<script>
    var app = new Vue({
        el: "#app",
        data: () => ({
            baseUrl: window.location.origin,
            drawer: null,
            user: {},
            businessDescription: {},
            contactInfo: {},
            industries: [],
            professions: [],
            countries: [],
            industry: {},
            profession: {},
            businessDescriptionServerSideErrors: [],
            contactInfoServerSideErrors: [],
            userServerSideErrors: []
        }),
        components: {
            FilePond: vueFilePond.default(FilePondPluginImagePreview)
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
                    url: "/api/user?relations=business.industry,business.profession,contact_info.country,country"
                }).then(function(response){
                    console.log(response);
                    that.user = response.data;
                    if(response.data.business){
                        that.businessDescription = response.data.business;
                        if(response.data.business.industry){
                            that.industry = response.data.business.industry;
                            that.getProfessionList();
                            that.profession = response.data.business.profession;
                        }
                    }

                    if(response.data.contact_info){
                        that.contactInfo = response.data.contact_info;
                    }
                });
            },
            saveAdminAccount(){
                let that = this;
                let data = this.user;
                data.country_id = this.user.country.id;
                axios({
                    url: "/api/save-user",
                    method: "post",
                    data: data
                }).then(function(response){
                    if(response.data.status == "error"){
                        for(let key in response.data.errors){
                            let errors = response.data.errors[key];

                            for(let i = 0; i < errors.length; i++){
                                that.userServerSideErrors.push(errors[i]);
                            }
                        };
                    }
                });
            },
            saveBusinessDescription(){
                let that = this;
                let data = new FormData;
                for(let key in this.businessDescription){
                    data.append(key, this.businessDescription[key])
                }
                
                data.append('industry_id', this.industry.id);
                data.append('profession_id', this.profession.id);
                
                if(this.$refs.pondLogo.getFiles().length){
                    data.append('logo', this.$refs.pondLogo.getFiles()[0].file);
                }            
                
                if(this.$refs.pondAvatar.getFiles().length){
                    data.append('avatar', this.$refs.pondAvatar.getFiles()[0].file);
                }


                axios({
                    method: "post",
                    url: "/api/business-description",
                    data: data
                }).then(function(response){
                    if(response.data.status == "error"){
                        for(let key in response.data.errors){
                            let errors = response.data.errors[key];

                            for(let i = 0; i < errors.length; i++){
                                that.businessDescriptionServerSideErrors.push(errors[i]);
                            }
                        };
                    }

                    if(response.data.status=="success"){
                        that.businessDescription = response.data.businessDescription;
                    }
                }).catch(function(){

                }).then(function(){
                    that.$refs.pondLogo.removeFiles();
                    that.$refs.pondAvatar.removeFiles();
                });
            },
            saveContactInfo(){
                let that = this;
                let data = this.contactInfo;
                data.country_id = data.country.id;
                axios({
                    url: "/api/contact-info",
                    method: "post",
                    data: data
                }).then(function(response){

                    if(response.data.status == "error"){
                        for(let key in response.data.errors){
                            let errors = response.data.errors[key];

                            for(let i = 0; i < errors.length; i++){
                                that.contactInfoServerSideErrors.push(errors[i]);
                            }
                        };
                    }
                }).catch().then(function(response){
                    
                });
            },
            getIndustryList(){
                let that = this;
                axios({
                    url: "/api/industry/index",
                    method: "get"
                }).then(function(response){
                    that.industries = response.data.industries;
                });
            },
            getProfessionList(){
                let that = this;
                axios({
                    url: "/api/profession/index",
                    method: "post",
                    data: {
                        industry_id: this.industry.id
                    }
                }).then(function(response){
                    that.professions = response.data.professions;
                });
            },
            getCountries(){
                let that = this;
                axios({
                    url: "/api/countries",
                    method: "get"
                }).then(function(response){
                    that.countries = _.sortBy(response.data.countries, [function(o) { return o.code; }]);
                });
            },
            countryComparator(a, b){
                return typeof a === "object" && typeof b === "object" && a.code === b.code && a.dialing_code === b.dialing_code;
            },
            countryToString(a){
                return a.code+' ( '+a.dialing_code+' )';
            }
        },
        mounted: function () {
            let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
            if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('app').style.display = 'block';
            this.getCountries();
            this.getUser();
            this.getIndustryList();
            this.getProfessionList();
        }
    });
</script>
@endsection