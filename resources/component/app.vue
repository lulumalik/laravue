<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  beforeMount() {
    this.$axios.interceptors.request.use(
      function(config) {
        // assume your access token is stored in local storage
        // (it should really be somewhere more secure but I digress for simplicity)
        let token = localStorage.getItem("users");
        if (token) {
          config.headers["Authorization"] = `Bearer ${token}`;
        }
        return config;
      },
      function(error) {
        // Do something with request error
        return Promise.reject(error);
      }
    );
  }
};
</script>
