<template>
  <div class="mainModalTransparent">
    <div class="mainModal" @click="close"></div>
    <div class="bgModal" :style="{background: bgModal}">
      <div class="closeButton" @click="close" v-if="showClose">&times;</div>
      <div style="max-height:85vh;overflow-y:auto;overflow-x:hidden">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    bgModal: {
      default: 'white'
    },
    showClose: {
      default: true
    }
  },
  methods: {
    close(e) {
      this.$emit("close", e);
    }
  }
};
</script>

<style scoped>
.closeButton {
  font-size: 25px;
  position: absolute;
  right: 15px;
  top: 0px;
  z-index:10000;
  cursor: pointer;
}
.mainModal {
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  text-align: center;
  position: fixed;
  z-index: 1001;
  top: 0px;
  left: 0px;
  background: rgba(0, 0, 0, 0.5);
}
.mainModalTransparent {
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  text-align: center;
  position: fixed;
  z-index: 100000;
}

.bgModal {
  position: fixed;
  animation: fadeIn; /* referring directly to the animation's @keyframe declaration */
  animation-duration: 1s;
  top: 50%;
  transform: translateY(-50%);
  left: 0;
  right: 0;
  margin: 0px auto;
  padding: 30px;
  min-width: 250px;
  max-width: 720px;
  min-height: auto;
  border-radius: 10px;
  z-index: 1002;
}

@media screen and (max-width: 719px){
  .bgModal {
    max-width: 500px;
  }
}

@media screen and (max-width: 480px){
  .bgModal {
    max-width: 360px;
  }
}
</style>