<template>
  <section class="hero is-success is-halfheight">
    <div class="hero-body">
      <div class="">
        <p class="title">Tasks</p>
        <p class="subtitle">Listing</p>
      </div>
    </div>
    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
      <app-nav></app-nav>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {
    console.log("Header Component mounted.");
  },
};
</script>
