<template>
  <div v-if="success">
    <div class="alert alert-success" role="alert">
      {{ success }}
    </div>
  </div>
  <div v-else-if="errorsList.length">
    <ul class="alert alert-danger" style="list-style-type:none;" role="alert">
      <li v-for="(value, index) in errorsList" v-bind:key="index">@{{ value }}</li>
    </ul>
  </div>
</template>
<script>
export default {
  name: 'Alert',
  props: [
    'errors',
    'success'
  ],
  data: function() {
    return {
      errorsList: [],
      timeout: 10000
    }
  },
  watch: {
    errors: function() {
      this.alertErrors();
    },
    success: function() {
      setTimeout(() => this.success = "", this.timeout);
    }
  },
  methods: {
    alertErrors: function() {
      this.errorsList = Object.values(this.errors).flat();
      setTimeout(() => this.errorsList = [], this.timeout);
    }
  }
}
</script>
