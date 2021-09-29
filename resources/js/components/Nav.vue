<template>
  <nav class="tabs is-boxed">
    <div class="container">
      <!-- for logged-in user-->
      <ul>
        <router-link tag="li" to="/" exact>
          <a>Home</a>
        </router-link>
        <router-link tag="li" to="/tasks" exact>
                <a> Tasks </a>
        </router-link>
        <router-link tag="li" to="/tasks/priority" exact>
                <a> Priority Task </a>
        </router-link>
      </ul>

    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      isLoggedIn: false,
    };
  },
  methods: {
  },
  created() {
    if (window.Laravel.isLoggedin) {
      this.isLoggedIn = true;
    }
  },
};
</script>
