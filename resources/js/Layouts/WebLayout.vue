<template>
  <!-- Preloader start  -->
  <!-- <div id="preloader" class="bg-white dark:bg-[#242424] p-0 m-0 h-full fixed z-[99999] w-full flex items-center justify-center">
		<div class="lds-ripple inline-block relative w-20 h-20">
			<div></div>
			<div></div>
		</div>
    </div> -->
  <!-- Preloader end -->

  <!-- Main wrapper start -->
  <div id="main-wrapper">
    <slot name="header" />
    <!-- Header end -->

    <!-- Sidebar start -->
    <div class="deznav" v-if="$page.props.auth.user">
      <div class="deznav-scroll">
        <Menu />
      </div>
    </div>
    <!-- Sidebar end -->

    <!-- Content body start -->
    <div
      class="content-body"
      style="min-height: 1040px"
      v-if="$page.props.auth.user"
    >
      <div class="container-fluid">
        <slot />
      </div>
    </div>
    <div v-else>
      <slot />
    </div>

    <!-- Content body end -->
  </div>
  <!-- Main wrapper end -->
</template>

<script setup>
import Menu from "@/Layouts/Menu.vue";
</script>

<style lang="scss" scoped>
</style>
