@extends('layouts.app')

@section('content')
<b-navbar toggleable="lg" type="dark" variant="danger">
    <b-container>
        <b-navbar-brand href="#">Release Dates</b-navbar-brand>
        <b-navbar-nav class="ml-auto">
            <template v-if="authenticated">
                <b-nav-item href="#" @click="showAddForm = true">Add Release</b-nav-item>
                <b-nav-item href="#" @click="logout">Logout</b-nav-item>
            </template>
        </b-navbar-nav>
    </b-container>
</b-navbar>
<b-container id="app-content">
    <release-form-component
        v-show="showAddForm"
        @hideform="showAddForm = false"
        @added="addRelease">        
    </release-form-component>
    <template v-if="authenticated">
        <release-list-component></release-list-component>
    </template>
    <template v-else>
        <login-component @loggedin="loggedIn"></login-component>
    </template>
</b-container>
@endsection
