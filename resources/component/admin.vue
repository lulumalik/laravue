<template>
  <div>
    <div class="bg-gray-200">
      <div class="flex">
        <div class="flex-grow-0">
          <sideBar />
        </div>
        <div class="flex-grow">
          <navbar style="position:relative;z-index:100" />
          <div class="py-2 px-6 w-full overflow-x-hidden border-t-2">
            <router-view></router-view>
          </div>
          
          <!-- <contentData /> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import sideBar from "./component_admin/sidebar";
import navbar from "./component_admin/navbar";
export default {
  components: {
    navbar,
    sideBar
  }
};
</script>