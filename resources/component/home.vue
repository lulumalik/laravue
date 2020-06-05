<template>
  <div class="leading-normal tracking-normal text-white gradient">
    <headerHome />
    <price />
  </div>
</template>

<script>
import headerHome from "./component_home/header";
import price from "./component_home/price";
export default {
  components: {
    headerHome,
    price
  }
};
</script>

<style>
.gradient {
  background: linear-gradient(90deg, #2d3748 0%, #4a5568 100%);
}
</style>