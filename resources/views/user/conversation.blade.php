@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex xs12>
        <template>
            <v-card flat>
                <v-card-text>
                    <v-btn flat>
                        New
                    </v-btn>
                    <v-btn flat>
                        <v-icon>refresh</v-icon>
                    </v-btn>
                    <v-btn flat>
                        Remind Me
                    </v-btn>
                    <v-btn flat>
                        Archive
                    </v-btn>
                    <v-btn flat>
                        Delete
                    </v-btn>
                </v-card-text>
            </v-card>
        </template>
    </v-flex>
    <v-flex md8>
        <v-card flat color="transparent" height="500px" style="overflow-y: scroll; overflow-x: hidden; margin-bottom: 20px;">
            <template>
                <v-layout row v-for="message in conversation.messages" :reverse="checkSender(message)">
                    <v-flex xs1>
                        <v-avatar>
                            <img :src="message.sender.avatar">
                        </v-avatar>
                    </v-flex>
                    <v-flex xs10>
                        <v-card flat wrap>
                            <v-card-text>
                                @{{message.body}}
                            </v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
            </template>
        </v-card>

        <template>
            <v-layout row wrap>
                <v-flex xs1>
                    <v-btn color="cyan" dark outline fab style="margin: 0;">
                        <v-icon>add</v-icon>
                    </v-btn>
                </v-flex>
                <v-flex xs10>
                    <v-textarea outline label="Type your message" height="70"></v-textarea>
                </v-flex>
                <v-flex xs1>
                    <v-btn color="cyan" dark outline fab style="margin: 0;">
                        <v-icon>send</v-icon>
                    </v-btn>
                </v-flex>
            </v-layout>
        </template>
    </v-flex>
    <v-flex md4>
        <template>
            <v-layout row>
                <v-flex xs12>
                <v-card>
                    <v-card-text>
                        <v-list>
                            <v-list-tile avatar> 
                                <v-list-tile-avatar size="70">
                                    <v-img :src="client.avatar"></v-img>
                                </v-list-tile-avatar>                            
                                
                                <v-list-tile-content style="margin-left: 10px;">
                                    <span class="title">@{{client.name}}</span>
                                    <span class="subheading">@{{client.email}}</span>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                        
                        <v-tabs grow v-model="currentItem" slider-color="cyan">
                            <v-tab href="#main">
                                <v-icon>home</v-icon>
                            </v-tab>
                            <v-tab href="#info">
                                <v-icon>info</v-icon>
                            </v-tab>
                            <v-tab href="#appointments">
                                <v-icon>event</v-icon>
                            </v-tab>
                            <v-tab href="#earnings">
                                <v-icon>attach_money</v-icon>
                            </v-tab>
                            <v-tab href="#documents">
                                <v-icon>file_copy</v-icon>
                            </v-tab>
                        </v-tabs>
                        <v-tabs-items v-model="currentItem">
                            <v-tab-item id="main">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vivamus arcu felis bibendum ut. Eu sem integer vitae justo eget magna fermentum iaculis eu. Faucibus a pellentesque sit amet porttitor eget. Vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sit amet justo donec enim diam vulputate ut pharetra sit. Neque viverra justo nec ultrices dui sapien eget mi. Nulla pellentesque dignissim enim sit amet. Pellentesque adipiscing commodo elit at imperdiet dui accumsan sit. Gravida quis blandit turpis cursus. Dictum fusce ut placerat orci nulla. Nulla malesuada pellentesque elit eget gravida. Odio ut enim blandit volutpat maecenas volutpat blandit aliquam etiam. Iaculis urna id volutpat lacus laoreet non curabitur. Ultricies integer quis auctor elit sed vulputate mi. Enim neque volutpat ac tincidunt vitae semper quis lectus. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Enim eu turpis egestas pretium aenean pharetra magna ac. Hac habitasse platea dictumst quisque sagittis purus sit amet. Consectetur adipiscing elit ut aliquam purus.

                                    Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Vitae aliquet nec ullamcorper sit amet risus nullam eget felis. Sit amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Vestibulum sed arcu non odio euismod lacinia at quis risus. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Felis imperdiet proin fermentum leo vel. Blandit turpis cursus in hac habitasse platea dictumst. Orci nulla pellentesque dignissim enim sit amet venenatis urna cursus. Tellus mauris a diam maecenas sed. Imperdiet sed euismod nisi porta lorem. Dictum at tempor commodo ullamcorper a. Morbi enim nunc faucibus a pellentesque sit. Eu ultrices vitae auctor eu augue ut. In nibh mauris cursus mattis molestie a iaculis at erat. Suspendisse in est ante in nibh mauris. Tempor orci eu lobortis elementum.
                            </v-tab-item>
                            <v-tab-item id="info">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vivamus arcu felis bibendum ut. Eu sem integer vitae justo eget magna fermentum iaculis eu. Faucibus a pellentesque sit amet porttitor eget. Vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sit amet justo donec enim diam vulputate ut pharetra sit. Neque viverra justo nec ultrices dui sapien eget mi. Nulla pellentesque dignissim enim sit amet. Pellentesque adipiscing commodo elit at imperdiet dui accumsan sit. Gravida quis blandit turpis cursus. Dictum fusce ut placerat orci nulla. Nulla malesuada pellentesque elit eget gravida. Odio ut enim blandit volutpat maecenas volutpat blandit aliquam etiam. Iaculis urna id volutpat lacus laoreet non curabitur. Ultricies integer quis auctor elit sed vulputate mi. Enim neque volutpat ac tincidunt vitae semper quis lectus. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Enim eu turpis egestas pretium aenean pharetra magna ac. Hac habitasse platea dictumst quisque sagittis purus sit amet. Consectetur adipiscing elit ut aliquam purus.

                                    Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Vitae aliquet nec ullamcorper sit amet risus nullam eget felis. Sit amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Vestibulum sed arcu non odio euismod lacinia at quis risus. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Felis imperdiet proin fermentum leo vel. Blandit turpis cursus in hac habitasse platea dictumst. Orci nulla pellentesque dignissim enim sit amet venenatis urna cursus. Tellus mauris a diam maecenas sed. Imperdiet sed euismod nisi porta lorem. Dictum at tempor commodo ullamcorper a. Morbi enim nunc faucibus a pellentesque sit. Eu ultrices vitae auctor eu augue ut. In nibh mauris cursus mattis molestie a iaculis at erat. Suspendisse in est ante in nibh mauris. Tempor orci eu lobortis elementum.
                            </v-tab-item>
                            <v-tab-item id="appointments">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vivamus arcu felis bibendum ut. Eu sem integer vitae justo eget magna fermentum iaculis eu. Faucibus a pellentesque sit amet porttitor eget. Vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sit amet justo donec enim diam vulputate ut pharetra sit. Neque viverra justo nec ultrices dui sapien eget mi. Nulla pellentesque dignissim enim sit amet. Pellentesque adipiscing commodo elit at imperdiet dui accumsan sit. Gravida quis blandit turpis cursus. Dictum fusce ut placerat orci nulla. Nulla malesuada pellentesque elit eget gravida. Odio ut enim blandit volutpat maecenas volutpat blandit aliquam etiam. Iaculis urna id volutpat lacus laoreet non curabitur. Ultricies integer quis auctor elit sed vulputate mi. Enim neque volutpat ac tincidunt vitae semper quis lectus. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Enim eu turpis egestas pretium aenean pharetra magna ac. Hac habitasse platea dictumst quisque sagittis purus sit amet. Consectetur adipiscing elit ut aliquam purus.

                                    Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Vitae aliquet nec ullamcorper sit amet risus nullam eget felis. Sit amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Vestibulum sed arcu non odio euismod lacinia at quis risus. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Felis imperdiet proin fermentum leo vel. Blandit turpis cursus in hac habitasse platea dictumst. Orci nulla pellentesque dignissim enim sit amet venenatis urna cursus. Tellus mauris a diam maecenas sed. Imperdiet sed euismod nisi porta lorem. Dictum at tempor commodo ullamcorper a. Morbi enim nunc faucibus a pellentesque sit. Eu ultrices vitae auctor eu augue ut. In nibh mauris cursus mattis molestie a iaculis at erat. Suspendisse in est ante in nibh mauris. Tempor orci eu lobortis elementum.
                            </v-tab-item>
                            <v-tab-item id="earnings">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vivamus arcu felis bibendum ut. Eu sem integer vitae justo eget magna fermentum iaculis eu. Faucibus a pellentesque sit amet porttitor eget. Vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sit amet justo donec enim diam vulputate ut pharetra sit. Neque viverra justo nec ultrices dui sapien eget mi. Nulla pellentesque dignissim enim sit amet. Pellentesque adipiscing commodo elit at imperdiet dui accumsan sit. Gravida quis blandit turpis cursus. Dictum fusce ut placerat orci nulla. Nulla malesuada pellentesque elit eget gravida. Odio ut enim blandit volutpat maecenas volutpat blandit aliquam etiam. Iaculis urna id volutpat lacus laoreet non curabitur. Ultricies integer quis auctor elit sed vulputate mi. Enim neque volutpat ac tincidunt vitae semper quis lectus. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Enim eu turpis egestas pretium aenean pharetra magna ac. Hac habitasse platea dictumst quisque sagittis purus sit amet. Consectetur adipiscing elit ut aliquam purus.

                                    Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Vitae aliquet nec ullamcorper sit amet risus nullam eget felis. Sit amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Vestibulum sed arcu non odio euismod lacinia at quis risus. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Felis imperdiet proin fermentum leo vel. Blandit turpis cursus in hac habitasse platea dictumst. Orci nulla pellentesque dignissim enim sit amet venenatis urna cursus. Tellus mauris a diam maecenas sed. Imperdiet sed euismod nisi porta lorem. Dictum at tempor commodo ullamcorper a. Morbi enim nunc faucibus a pellentesque sit. Eu ultrices vitae auctor eu augue ut. In nibh mauris cursus mattis molestie a iaculis at erat. Suspendisse in est ante in nibh mauris. Tempor orci eu lobortis elementum.
                            </v-tab-item>
                            <v-tab-item id="documents">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vivamus arcu felis bibendum ut. Eu sem integer vitae justo eget magna fermentum iaculis eu. Faucibus a pellentesque sit amet porttitor eget. Vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sit amet justo donec enim diam vulputate ut pharetra sit. Neque viverra justo nec ultrices dui sapien eget mi. Nulla pellentesque dignissim enim sit amet. Pellentesque adipiscing commodo elit at imperdiet dui accumsan sit. Gravida quis blandit turpis cursus. Dictum fusce ut placerat orci nulla. Nulla malesuada pellentesque elit eget gravida. Odio ut enim blandit volutpat maecenas volutpat blandit aliquam etiam. Iaculis urna id volutpat lacus laoreet non curabitur. Ultricies integer quis auctor elit sed vulputate mi. Enim neque volutpat ac tincidunt vitae semper quis lectus. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Enim eu turpis egestas pretium aenean pharetra magna ac. Hac habitasse platea dictumst quisque sagittis purus sit amet. Consectetur adipiscing elit ut aliquam purus.

                                    Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Vitae aliquet nec ullamcorper sit amet risus nullam eget felis. Sit amet porttitor eget dolor morbi. Posuere sollicitudin aliquam ultrices sagittis. Vestibulum sed arcu non odio euismod lacinia at quis risus. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Felis imperdiet proin fermentum leo vel. Blandit turpis cursus in hac habitasse platea dictumst. Orci nulla pellentesque dignissim enim sit amet venenatis urna cursus. Tellus mauris a diam maecenas sed. Imperdiet sed euismod nisi porta lorem. Dictum at tempor commodo ullamcorper a. Morbi enim nunc faucibus a pellentesque sit. Eu ultrices vitae auctor eu augue ut. In nibh mauris cursus mattis molestie a iaculis at erat. Suspendisse in est ante in nibh mauris. Tempor orci eu lobortis elementum.
                            </v-tab-item>
                        </v-tabs-items>
                    
                    </v-card-text>
                </v-card>
                </v-flex>
            </v-layout>
        </template>
    </v-flex>
</v-layout>
@endsection

@section('scripts')
<script>
    var app = new Vue({
        el: "#app",
        data: () => ({
            drawer: null,
            user: null,
            currentItem: 'main',
            client: {
                name: "Test Client",
                email: "test@user.tla",
                avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
            },
            conversation: {
                messages: [
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "otheremail@test.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "otheremail@test.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "test@user.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "otheremail@test.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "test@user.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "otheremail@test.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "otheremail@test.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "test@user.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "otheremail@test.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "test@user.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "otheremail@test.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "otheremail@test.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "test@user.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "otheremail@test.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "test@user.tla"
                        }
                    },
                    {
                        body: "Lorem ipsum dolor sit amet",
                        sender: {
                            avatar: "https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png",
                            email: "otheremail@test.tla"
                        }
                    }
                ]
            }
            
        }),
        mounted: function () {
            let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
            if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('app').style.display = 'block';
            this.getUser();
        },
        methods: {
            checkSender(message) {
                // console.log(this.client);
                return this.client.email === message.sender.email;
            },
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
        }
    });
</script>
@endsection