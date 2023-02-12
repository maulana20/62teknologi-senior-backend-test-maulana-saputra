<template>
  <div id="app">
    <nav class="navbar navbar-expand navbar-dark bg-dark">
      <a href class="navbar-brand" @click.prevent>62 Teknologi</a>
      <div class="navbar-nav mr-auto" v-if="loggedIn">
        <li class="nav-item">
          <router-link to="/dashboard" class="nav-link">
            <font-awesome-icon icon="home" /> Home
          </router-link>
        </li>
        <li class="nav-item">
          <router-link to="/business" class="nav-link">Business</router-link>
        </li>
      </div>
      <div v-if="!loggedIn" class="navbar-nav ml-auto">
        <li class="nav-item">
        <li class="nav-item">
          <router-link to="/login" class="nav-link">
            <font-awesome-icon icon="sign-in-alt" /> Login
          </router-link>
        </li>
      </div>
      <div v-if="loggedIn" class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href @click.prevent="logOut">
            <font-awesome-icon icon="sign-out-alt" /> LogOut
          </a>
        </li>
      </div>
    </nav>

    <div class="container">
      <router-view style="margin-top: 10px;"/>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    loggedIn() {
      return this.$store.state.auth.loggedIn;
    }
  },
  methods: {
    logOut: function() {
      this.$store.dispatch('auth/logout');
    }
  }
};
</script>
