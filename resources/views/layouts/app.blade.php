<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

        <!-- Scripts -->
        <script src="{{ asset('js/vendor.js') }}" defer></script>
        <script src="{{ asset('js/manifest.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="app">
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
        </div>
    </body>
</html>
