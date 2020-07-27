@extends('layouts.app')

@section('content')
<b-navbar toggleable="lg" type="dark" variant="danger">
    <b-container>
        <b-navbar-brand href="#">Release Dates</b-navbar-brand>
        <b-navbar-nav class="ml-auto">
            <template v-if="authenticated">
                <b-nav-item href="#">Add Release</b-nav-item>
                <b-nav-item href="#" @click="logout">Logout</b-nav-item>
            </template>
        </b-navbar-nav>
    </b-container>
</b-navbar>
<b-container id="app-content">
    <div class="flex-center position-ref full-height">
        <template v-if="authenticated">
            <release-component></release-component>
        </template>
        <template v-else>
            <login-component @loggedin="loggedIn"></login-component>
        </template>
    </div>
</b-container>
@endsection
