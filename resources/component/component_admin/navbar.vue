<template>
  <div>
    <!-- Desktop Header -->
    <header class="w-full flex items-center bg-white py-2 px-6 hidden sm:flex">
      <div class="w-1/2"></div>
      <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button
          @click="isOpen = !isOpen"
          class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none"
        >
          <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400" />
        </button>
        <button
          v-if="isOpen"
          @click="isOpen = false"
          class="h-full w-full fixed inset-0 cursor-default"
        ></button>
        <div v-if="isOpen" style="cursor:pointer" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
          <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
          <a @click="signout" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
        </div>
      </div>
    </header>

    <!-- Mobile Header & Nav -->
    <header class="w-full bg-sidebar py-5 px-6 sm:hidden">
      <div class="flex items-center justify-between">
        <router-link
          to="/admin/main"
          class="text-white text-3xl font-semibold uppercase hover:text-gray-300"
        >Admin Page</router-link>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
          <i v-if="!isOpen" class="fas fa-bars"></i>
          <i v-else class="fas fa-times"></i>
        </button>
      </div>

      <!-- Dropdown Nav -->
      <div
        v-if="isOpen"
        style="width:95%;cursor:pointer"
        class="absolute left-0 ml-2 right-0 bg-white text-black rounded-lg shadow-lg py-2 mt-4"
      >
        <router-link
          to="/admin/main"
          class="block px-4 py-2 account-link hover:text-white"
        >Dashboard</router-link>
        <router-link
          to="/admin/diagram"
          class="block px-4 py-2 account-link hover:text-white"
        >Diagram</router-link>
        <router-link to="#" class="block px-4 py-2 account-link hover:text-white">Support</router-link>
        <a @click="signout" class="block px-4 py-2 account-link hover:text-white">Sign out</a>
      </div>
    </header>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isOpen: false
    };
  },
  methods: {
    signout() {
      localStorage.clear();
      this.$router.push("/")
    }
  }
};
</script>