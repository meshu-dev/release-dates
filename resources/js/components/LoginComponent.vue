<template>
  <div id="app-addform">
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
  </div>
</template>
<script>
export default {
  data() {
    return {
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