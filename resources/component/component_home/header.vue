<template>
  <div>
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
      <div class="w-full container mx-auto flex flex-wrap bg-gray-800 sm:bg-transparent  items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <router-link
            class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
            to="/"
          >Mosque`st</router-link>
        </div>

        <div class="block lg:hidden pr-4">
          <button
            @click="isOpen = !isOpen"
            id="nav-toggle"
            class="flex items-center p-1 text-gray-100 hover:text-gray-500"
          >
            <svg
              class="fill-current h-6 w-6"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
          <div
            v-if="isOpen"
            style="width:95%"
            class="absolute left-0 ml-2 right-0 bg-white text-black rounded-lg shadow-lg py-2 mt-4"
          >
            <router-link to="/admin/main" class="block px-4 py-2 account-link hover:text-white" v-if="isToken">Admin</router-link>
            <router-link to="/login" class="block px-4 py-2 account-link hover:text-white" v-if="isToken">Login</router-link>
            <router-link to="#" class="block px-4 py-2 account-link hover:text-white">Support</router-link>
          </div>
        </div>

        <div
          class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
          id="nav-content"
        >
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
              <router-link to="/admin/main" class="inline-block py-2 px-4 text-white font-bold no-underline" v-if="isToken">Admin</router-link>
              <router-link to="/login" class="inline-block py-2 px-4 text-white font-bold no-underline" v-else>Login</router-link>
            </li>
          </ul>
          <button
            id="navAction"
            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75"
          >Support</button>
        </div>
      </div>
      <!-- 
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />-->
    </nav>

    <!--Hero-->
    <div class="pt-20 lg:pt-32 md:pb-40 lg:pb-20">
      <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div
          class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left"
        >
          <p class="uppercase tracking-loose w-full">Kelola Masjid</p>
          <h1 class="my-4 text-4xl lg:text-5xl font-bold leading-tight">Pengelolaan sederhana DKM.</h1>
          <p
            class="leading-normal text-1xl lg:text-2xl mb-8"
          >Aplikasi gratis! pengelolaan masjid</p>

          <button
            class="mx-auto lg:mx-0 my-10 hover:underline bg-white text-gray-800 font-bold rounded-full my-4 py-4 px-6 lg:py-4 lg:px-8 shadow-lg"
          >Daftar Sekarang</button>
        </div>
        <!--Right Col-->
        <div class="w-full md:w-3/5 py-4 sm:py-0 lg:py-6 text-center">
          <div class="flex flex-col md:flex-row">
            <div class="main-content flex-1 mt-12 md:mt-2 pb-24 md:pb-5">
              <div class="flex flex-wrap justify-center">
                <div class="w-full sm:w-1/2 p-3" v-for="(card, index) in promote" :key="index">
                  <!--Metric Card-->
                  <div :class="card.color" class="bg-green-100 border-b-4 rounded-lg shadow-lg p-5">
                    <div class="flex flex-row items-center">
                      <div class="flex-shrink pr-4">
                        <div class="rounded-full p-4" :class="card.bg">
                          <i :class="card.icon" class="fa-2x fa-inverse"></i>
                        </div>
                      </div>
                      <div class="flex-1 text-center">
                        <h5 class="font-bold uppercase text-gray-600">{{card.title}}</h5>
                      </div>
                    </div>
                  </div>
                  <!--/Metric Card-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- bg gelombang -->
    <div class="relative -mt-12 lg:-mt-24">
      <svg
        viewBox="0 0 1428 174"
        version="1.1"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
      >
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path
              d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
              opacity="0.100000001"
            />
            <path
              d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
              opacity="0.100000001"
            />
            <path
              d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
              id="Path-4"
              opacity="0.200000003"
            />
          </g>
          <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path
              d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
            />
          </g>
        </g>
      </svg>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    isToken() {
      return localStorage.getItem("users") ? true : false
    }
  },
  data() {
    return {
      isOpen: false,
      promote: [
          {
              icon: 'fa fa-wallet',
              title: '100% Gratis tanpa pungutan',
              color: 'border-green-600',
              bg: 'bg-green-600'
          },
          {
              icon: 'fa fa-book-reader',
              title: 'Tampilan sederhana dan mobile friendly',
              color: 'border-pink-600',
              bg: 'bg-pink-600'
          },
          {
              icon: 'fa fa-download',
              title: 'Export data table',
              color: 'border-indigo-600',
              bg: 'bg-indigo-600'
          }
      ]
    };
  }
};
</script>