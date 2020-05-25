<template>
  <div>
    <div class="bg-gray-200 ">
      <div class="flex">
        <div class="flex-grow-0">
          <sideBar />
        </div>
        <div class="flex-grow">
          <navbar style="position:relative;z-index:100" />
          <contentData />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import contentData from "./component_admin/content";
import sideBar from "./component_admin/sidebar";
import navbar from "./component_admin/navbar";
export default {
  components: {
    navbar,
    sideBar,
    contentData
  }
};
</script>