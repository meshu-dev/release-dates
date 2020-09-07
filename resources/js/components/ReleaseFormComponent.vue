<template>
  <div id="app-login" class="form-inline">
    <b-form
        action="#"
        @submit.prevent="submitForm"
        inline
        style="flex-direction: column;">
      <b-form-group
        id="input-group-name"
        label="Name:"
        label-for="name-input"
      >
        <b-form-input
          id="name-input"
          required
          placeholder="Enter name"
          v-model="formData.name"
        ></b-form-input>
      </b-form-group>
      <b-form-group
        id="input-group-date"
        label="Date:"
        label-for="date-input">
        <datepicker
          id="date-input"
          v-model="formData.date"></datepicker>
      </b-form-group>
      <b-form-group id="input-group-buttons">
        <b-button type="submit" variant="danger">Submit</b-button>
        <b-button type="button" variant="secondary" @click="hideForm">Cancel</b-button>
      </b-form-group>
    </b-form>
  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
import EventBus from './../event-bus';

export default {
  components: {
    Datepicker
  },
  data() {
    return {
      formData: {
        name: '',
        date: ''
      }
    }
  },
  methods: {
    async submitForm() {
      try {
        const dateObj = this.formData.date;
        const date = dateObj.toJSON().split('T')[0];

        const response = await axios.post(
          '/api/releases',
          {
            name: this.formData.name,
            date: date
          }
        );

        if (response.data) {
          this.formData.name = '';
          this.formData.date = '';

          EventBus.$emit('ADDED_RELEASE', response.data);
        }
      } catch (error) {
        console.log('Error', error);
      }
    },
    hideForm() {
      this.$emit('hideform');
    }
  }
}
</script>