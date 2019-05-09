@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Settings / Offered Services</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex d-flex md9>
        <v-card>
            <v-card-title>
                <v-dialog v-model="categoryModal" width="500">
                    <v-btn slot="activator" flat class="save_btn">
                        <v-icon left>add</v-icon>
                        Add Category
                    </v-btn>

                    <v-card class="add-cat-modal">
                        <v-card-title class="headline grey lighten-2" primary-title>
                            Add Category
                        </v-card-title>

                        <v-card-text>
                            <v-form>
                                <v-text-field v-model="newCategory" label="Name"></v-text-field>
                            </v-form>
                        </v-card-text>

                        <v-divider></v-divider>

                        <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="primary" flat @click="categoryModal = false">
                            Cancel
                        </v-btn>

                        <v-btn color="primary" flat @click="saveCategory">
                            Save
                        </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
                @include('partials.service.add')
            </v-card-title>
            <v-card-text class="all-services">

            <v-card v-for="category in categories" class="cat-list">
                    <v-card-title>
                        <span class="subheading font-weight-bold">
                            @{{category.name}}
                        </span>

                        <v-btn fab small flat color="cyan" @click=editCategory(category)>
                            <v-icon>edit</v-icon>
                        </v-btn>
                        <v-btn fab small flat color="red" @click=deleteCategory(category)>
                            <v-icon>delete</v-icon>
                        </v-btn>
                    </v-card-title>
                    <v-card-text  class="cat-list-textarea">
                        <v-list>
                            <v-list-tile v-for="service in category.services"  class="cat-list-item">
                                <v-list-tile-content>
                                    <span class="font-weight-bold cat-list-item-title">@{{service.name}}</span>
                                </v-list-tile-content>
                                {{-- <v-list-title-action> --}}
                                    <v-btn fab small flat color="cyan" @click=editService(service)>
                                        <v-icon>edit</v-icon>
                                    </v-btn>
                                    {{-- @include('partials.service.edit') --}}
                                {{-- </v-list-title-action> --}}
                                
                                <v-list-tile-action>
                                    <v-btn fab small flat color="red" @click=deleteService(service)>
                                        <v-icon>delete</v-icon>
                                    </v-btn>
                                </v-list-tile-action>
                            </v-list-tile>
                        </v-list>
                    </v-card-text>
                </v-card>
            </v-card-text>
        </v-card>
    </v-flex>
</v-layout>

<v-dialog v-model="editCategoryModal" width="500">
    <v-card class="edit-cat-modal">
        <v-card-title class="headline grey lighten-2" primary-title>
            Edit Category
        </v-card-title>

        <v-card-text>
            <v-form>
                <v-text-field v-model="eCategory.name" label="Name"></v-text-field>
            </v-form>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="primary" flat @click="editCategoryModal = false">
            Cancel
        </v-btn>

        <v-btn color="primary" flat @click="updateCategory">
            Save
        </v-btn>
        </v-card-actions>
    </v-card>
</v-dialog>



@include('partials.service.edit')

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
            drawer: null,
            user: null,
            categories: [],
            categoryModal: false,
            serviceModal: false,
            businessPhoneNumber: "",
            businessAddress: "",
            faceToFace: "business",
            phoneCall: "business",
            online: "business",
            othersOnlineMethod: "",
            locationSelection: 0,
            newCategory: "",
            eCategory: "",
            eService: "",
            newService: {
                name: '',
                fee: 0,
                description: '',
                category_id: 0,
                show_on_booking_form: false,
                duration: {
                    hours: 0,
                    minutes: 20
                }
            },
            editCategoryModal: false,
            editServiceModal: false,
            info: "",
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
                    url: "/api/user"
                }).then(function(response){
                    that.user = response.data;
                }).catch(function(errors){
                    console.log(errors);
                });
            },
            saveService(){
                this.serverSideValidationErrors = [];
                let that = this;
                let image;
                let location;
                let method = '';
                let address = "";
                let contact_number = "";
                let online_method = "";

                if(this.locationSelection == 0){
                    location = this.locationSelection;
                    method = this.faceToFace;
                    if(method == "business"){
                    }
                } if(this.locationSelection == 1){
                    location = this.locationSelection;
                    method = this.phoneCall;
                    if(method == "business"){
                        contact_number = this.businessPhoneNumber;
                    }
                } if(this.locationSelection == 2){
                    location = this.locationSelection;
                    method = this.online;
                    online_method = this.othersOnlineMethod;
                }

                if(this.$refs.pond.getFiles().length)
                    image = this.$refs.pond.getFiles()[0].file;

                // console.log(this.newService);
                // return false;
                
                // if(!this.$v.$invalid){
                    // let that = this;
                    let service = new FormData;
                    service.append('name', this.newService.name);
                    service.append('description', this.newService.description);
                    service.append('show_on_booking_form', this.newService.show_on_booking_form);
                    service.append('category_id', this.newService.category_id);
                    service.append('image', image);
                    service.append('duration_hours', this.newService.duration.hours);
                    service.append('duration_minutes', this.newService.duration.minutes);
                    service.append('fee', this.newService.fee);
                    service.append('location', location);
                    service.append('method', method);
                    service.append('address', address);
                    service.append('contact_number', contact_number);
                    service.append('online_method', online_method);

                    axios({
                        method: "post",
                        url: "/api/service/save",
                        data: service
                    }).then(function(response){
                        that.getCategories();
                        that.serviceModal = false;
                    }).catch().then();
                // }
            },
            editService(service){
                this.eService = service;
                this.locationSelection = this.eService.location;
                this.businessPhoneNumber = this.eService.contact_number ? this.eService.contact_number : this.businessPhoneNumber;
                this.businessAddress = this.eService.address ? this.eService.address : this.businessAddress;
                if(this.eService.method == "business"){
                    this.online = this.eService.method
                    this.othersOnlineMethod = this.eService.online_method ? this.eService.online_method : this.othersOnlineMethod;
                } if(this.eService.method == "client"){
                    this.online = this.eService.method
                    this.othersOnlineMethod = this.eService.online_method ? this.eService.online_method : this.othersOnlineMethod;
                }
                
                this.editServiceModal = true;
                console.log(this.eService);
            },
            updateService(){
                let that = this;
                let image;
                let location;
                let method = '';
                let address = "";
                let contact_number = "";
                let online_method = "";

                if(this.locationSelection == 0){
                    location = this.locationSelection;
                    method = this.faceToFace;
                    if(method == "business"){
                        address = this.businessAddress;
                    }
                } if(this.locationSelection == 1){
                    location = this.locationSelection;
                    method = this.phoneCall;
                    if(method == "business"){
                        contact_number = this.businessPhoneNumber;
                    }
                } if(this.locationSelection == 2){
                    location = this.locationSelection;
                    method = this.online;
                    online_method = this.othersOnlineMethod;
                }

                if(this.$refs.pond.getFiles().length)
                    image = this.$refs.pond.getFiles()[0].file;

                // console.log(this.newService);
                // return false;
                
                // if(!this.$v.$invalid){
                    // let that = this;
                    let service = new FormData;
                    service.append('name', this.eService.name);
                    service.append('slug', this.eService.slug);
                    service.append('description', this.eService.description);
                    service.append('show_on_booking_form', this.eService.show_on_booking_form);
                    service.append('category_id', this.eService.category_id);
                    service.append('image', image);
                    service.append('duration_hours', this.eService.duration_hours);
                    service.append('duration_minutes', this.eService.duration_minutes);
                    service.append('fee', this.eService.fee);
                    service.append('location', location);
                    service.append('method', method);
                    service.append('address', address);
                    service.append('contact_number', contact_number);
                    service.append('online_method', online_method);
                axios({
                    url: '/api/service/update',
                    method: 'post',
                    data: service
                }).then(function(response) {
                    that.getCategories();
                    console.log(response);

                }).catch(function(errors) {
                    console.log(errors);
                    console.log('failed');
                });
            },
            saveCategory(){
                let that = this;
                axios({
                    url: '/api/category/save',
                    method: 'post',
                    data: {
                        name: this.newCategory
                    }
                }).then(function(response){
                    that.getCategories();
                    that.categoryModal = false;
                });
            },
            getCategories(){
                let that = this;
                axios({
                    url: '/api/category/index',
                    method: 'get'
                }).then(function(response){
                    that.categories = response.data.categories;
                }).catch(function(errors){
                    console.log(errors);
                });
            },
            editCategory(category){
                // console.log(category);
                this.eCategory = category;
                this.editCategoryModal = true;
            },
            deleteCategory(category){
                let that = this;

                axios({
                    url: '/api/category/delete',
                    method: 'post',
                    data: {
                        slug: category.slug
                    }
                }).then(function(){
                    that.getCategories();
                }).catch(function(errors){
                    console.log(errors);
                });
            },
            updateCategory(){
                let that = this;
                axios({
                    url: '/api/category/update',
                    method: 'post',
                    data: this.eCategory
                }).then(function(response){
                    that.getCategories();
                    that.editCategoryModal = false;
                }).catch(function(errors){
                    console.log(errors);
                });
            },
            deleteService(service){
                let that = this;

                axios({
                    url: '/api/service/delete',
                    method: 'post',
                    data: {
                        slug: service.slug
                    }
                }).then(function(){
                    that.getCategories();
                }).catch(function(errors){
                    console.log(errors);
                });
            },
            getBusinessInfo(){
                let that = this;
                axios({
                    url: '/api/contact-info/business-details',
                    method: "get",
                }).then(function(response){
                    console.log(response);
                    that.businessPhoneNumber = response.data.businessPhoneNumber;
                    that.businessAddress = response.data.businessAddress;
                    that.othersOnlineMethod = response.data.othersOnlineMethod;
                }).catch(function(errors){
                    console.log(errors);
                });
            }
        },
        
        mounted: function () {
            let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
            if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('app').style.display = 'block';
            this.getUser();
            this.getCategories();
            this.getBusinessInfo();
        }
    });
</script>
@endsection