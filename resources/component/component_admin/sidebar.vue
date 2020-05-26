<template>
  <div>
    <modal v-if="modal" @close="modal = false" style="z-index:100000">
      <div class="text-left">
        <!-- <div v-if="!$store.state.inputMoment">
          <div class="font-bold text-base">Terinput</div>
          <div class="mt-2" v-for="(post, i) in $store.state.inputPostZakat" :key="i">halo</div>
          <div class="mt-2" v-if="$store.state.inputPostZakat.length == 0">Belum ada yang di input</div>
          <button
            @click="tambah(true)"
            class="bg-blue-500 mt-2 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded"
          >
            Tambah
            <i class="fas fa-plus ml-2"></i>
          </button>
        </div>-->
        <!-- v-else-if="$store.state.inputMoment" -->
        <div>
          <!-- <div @click="tambah(false)" style="cursor: pointer" class="mb-3">Tutup</div> -->
          <inputZakat @wantClose="modal = false" />
        </div>
      </div>
    </modal>
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl pr-0">
      <div class="p-6">
        <div>
          <a
            href="index.html"
            class="text-white text-3xl font-semibold uppercase hover:text-gray-300"
          >budi luhur</a>
        </div>
        <div class="text-white">
          {{dataToken.email}}
        </div>
        <button
          @click="modal = true"
          :disabled="$route.name === 'Dashboard' ? false : true"
          class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center"
        >
          <i class="fas fa-plus mr-3"></i> New Report Zakat
        </button>
      </div>
      <nav class="text-white text-base font-semibold pt-3 px-6">
        <router-link
          v-for="(sidebar, index) in sidebarContent"
          :key="index"
          :to="sidebar.to"
          :class="$route.name === sidebar.name ? 'active-nav-link' : ''"
          class="flex items-center mt-2 rounded-full text-white py-4 pl-6 nav-item"
        >
          <i class="mr-3" :class="sidebar.icon"></i>
          {{sidebar.name}}
        </router-link>
      </nav>
      <!-- <div class="flex items-center justify-center">
        <a
          href="calendar.html"
          class="flex items-center justify-start active-nav-link text-white rounded-full py-4 pl-4 nav-item pr-8"
        >
          <i class="fas fa-arrow-circle-up mr-3"></i>
          Upgrade to Pro!
        </a>
      </div>-->
    </aside>
  </div>
</template>

<script>
import modal from "../modal";
import jwt_decode from "jwt-decode";
import inputZakat from "./formInput";
export default {
  components: {
    modal,
    inputZakat
  },
  data() {
    return {
      modal: false,
      sidebarContent: [
        {
          name: "Dashboard",
          to: "/admin/main",
          icon: "fas fa-sticky-note"
        },
        {
          name: "Diagram",
          to: "/admin/diagram",
          icon: "fas fa-align-left"
        }
      ]
    };
  },
  computed: {
    dataToken() {
      if (localStorage.getItem("users")) {
        return jwt_decode(localStorage.getItem("users"))
      }
    }
  },
  methods: {
    tambah(event) {
      this.$store.commit("dynamic", {
        key: "inputMoment",
        value: event
      });
    }
  }
  // mounted() {
  //   this.$axios.get(`${this.$baseUrl}zakat`).then((res) => {
  //     this.datazakat = res.data
  //   })
  // }
};
</script>
