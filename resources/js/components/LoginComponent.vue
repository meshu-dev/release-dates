<template>
        <!--
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

        </form> -->


<!--
<div>
  <b-img src="https://picsum.photos/1024/400/?image=41" fluid alt="Responsive image"></b-img>
</div> -->



 <div>
    <b-form
        action="#"
        @submit.prevent="handleLogin"
        inline
        style="flex-direction: column;">
      <b-form-group
        id="input-group-email"
        label="Email address:"
        label-for="email-input"
      >
        <b-form-input
          id="email-input"
          type="email"
          required
          placeholder="Enter email"
          v-model="formData.email"
        ></b-form-input>
      </b-form-group>

      <b-form-group
        id="input-group-password"
        label="Password:"
        label-for="password-input"
    >
        <b-form-input
          id="password-input"
          type="password"
          required
          placeholder="Enter password"
          v-model="formData.password"
        ></b-form-input>
      </b-form-group>
      <b-form-group
        id="input-group-submit"
      >
        <b-button type="submit" variant="primary">Submit</b-button>
      </b-form-group>
    </b-form>
    <b-button @click="getUser">Get User</b-button>
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
  },
  methods: {
    async handleLogin() {
      console.log('Test!');

      await axios.get('/sanctum/csrf-cookie');

      try {
        const data = await axios.post('/login', this.formData);
        this.$emit('logged-in');

        console.log('Data', data);
      } catch (error) {
        console.log('Error', error);
      }
    },
    async getUser() {
      console.log('Test getUser!');

      try {
        const data = await axios.get('/api/user');
        this.$emit('loggedin', data);

        console.log('Data', data);
      } catch (error) {
        console.log('Error', error);
      }
    }
  }
}
</script>