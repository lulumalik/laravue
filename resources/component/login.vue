<template>
  <div class="mainBg">
    <modal v-if="modalOpen" @close="modalOpen = false" style="z-index:100000">
      <div>
        <div class="text-center text-red-500 font-bold">Error Message</div>
        {{error}}
      </div>
    </modal>
    <div class="bgForm">
      <!-- <img src="../assets/BMKG.png" alt="bmkg" style="width:110px;height:110px;margin:0px auto" /> -->
      <div style="font-size:2rem;font-weight:500">LOGIN</div>
      <form @submit.prevent="login">
        <input type="email" class="inputForm" v-model="dataUser.email" placeholder="Email" />
        <br />
        <input type="password" class="inputForm" v-model="dataUser.password" placeholder="Password" />
        <br />
        <button type="submit" :disabled="onLogin" class="submit mt-5 mb-3">
          <span v-if="!onLogin">Login</span>
          <span v-else>
            <spinner :height="35" :width="35" />
          </span>
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import spinner from "./spinner";
import modal from "./modal";
export default {
  components: {
    spinner,
    modal
  },
  data() {
    return {
      onLogin: false,
      modalOpen: false,
      error: "",
      dataUser: {
        email: "",
        password: ""
      }
    };
  },
  methods: {
    login() {
      this.onLogin = true;
      var timeout = setTimeout(() => {
        this.onLogin = false;
        alert("Timout, try login again");
      }, 30000);
      this.$axios
        .post(`${this.$baseUrl}login`, this.dataUser)
        .then(res => {
          clearTimeout(timeout);
          localStorage.setItem("users", res.data.token);
          this.$router.push("/admin/main");
        })
        .catch(error => {
          this.onLogin = false;
          clearTimeout(timeout);
          this.error =
            (error.response &&
              error.response.data &&
              error.response.data.message) ||
            (error.response &&
              error.response.data &&
              error.response.data.error);
          this.modalOpen = true;
        });
    }
  }
};
</script>

<style scoped>
::placeholder {
  color: black !important;
  font-size: 14px;
}
</style>

<style>
.mainBg {
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  text-align: center;
  background: linear-gradient(90deg, #2d3748 0%, #264272 100%);
}

.bgForm {
  position: relative;
  top: 50%;
  transform: translateY(-50%);
  margin: 0px auto;
  padding: 30px;
  width: 310px;
  height: auto;
  overflow-y: auto;
  border-radius: 10px;
  background: white;
}
.submit {
  width: 220px;
  background: #2d3748;
  border: 0px;
  border-radius: 5px;
  padding: 5px;
  color: white;
}
.inputForm {
  margin-top: 20px;
  width: 220px;
  border: 1px solid gray;
  border-radius: 5px;
  padding: 5px;
  text-align: center;
}
</style>