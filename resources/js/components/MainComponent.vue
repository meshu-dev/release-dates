<template>
    <div>
        <div v-if="!secrets.length" class="row">
            <form action="#" @submit.prevent="handleLogin">
                <div class="form-row">
                    <input type="email" class="form-control" v-model="formData.email">
                </div>
                <div class="form-row">
                    <input type="password" v-model="formData.password">
                </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                Email Address
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                Password
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid" name="password" required autocomplete="current-password"/ >
                            </div>
                        </div>

                <div class="form-row">
                    <button type="submit">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            secrets: [],
            formData: {
                email: '',
                password: ''
            }
        }
    }
}
</script>