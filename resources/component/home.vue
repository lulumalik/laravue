<template>
  <div class="leading-normal tracking-normal text-white gradient">
    <headerHome />
  </div>
</template>

<script>
import headerHome from "./component_home/header";
export default {
  components: {
    headerHome
  }
};
</script>

<style>
.gradient {
  background: linear-gradient(90deg, #2d3748 0%, #4a5568 100%);
}
</style>