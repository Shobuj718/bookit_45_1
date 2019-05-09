@extends('layouts.auth')

@section('content')

<v-card class="elevation-12">
    <v-card-text>
        <div style="width: 100%; text-align: center;">
            <img src="{{asset('images/miynlogo.png')}} style="height: 128px; width: 192; text-align: center;"/>                                        
            <h3 class="headline text-sm-center mb-0">Login</h3>
        </div>
        <v-form>
            <v-text-field prepend-icon="person" v-model="username" :error-messages="usernameErrors" id="username" name="username" label="Username/Email" type="text"></v-text-field>
            <v-text-field id="password" v-model="password" :error-messages="passwordErrors" prepend-icon="lock" name="password" label="Password" type="password"></v-text-field>
            <v-checkbox id="remember-me" v-model="checkbox" :error-messages="checkboxErrors" label="Remember me" @change="$v.checkbox.$touch()" @blur="$v.checkbox.$touch()"></v-checkbox>

        </v-form>
        <a href="{{url('/register')}}">Register here.</a>
        <br>
        <a href="{{url('/password/reset')}}">Forgot password?</a>
    </v-card-text>
    <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="primary">Login</v-btn>
    </v-card-actions>
</v-card>
@endsection

@section('scripts')
<script>
    var app = new Vue({
        el: "#app",
        data: () => ({
            drawer: null,
            username: null,
            password: null,
            checkbox: null,
            usernameErrors: null,
            passwordErrors: null,
            checkboxErrors: null
        }),
        props: {
            source: String
        }
    }); 
</script>
@endsection