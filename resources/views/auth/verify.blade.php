@extends('layouts.auth')

@section('content')
<v-card class="elevation-12">
    <v-card-text>
            <div class="card-header">{{ __('Verify Your Email Address') }}</div>

            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
            </div>
    </v-card-text>
</v-card>    
@endsection

@section('scripts')
<script>
    var app = new Vue({
        el: "#app"
    });
</script>
@endsection
