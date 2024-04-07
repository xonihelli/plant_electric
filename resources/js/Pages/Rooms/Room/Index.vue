<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
});
</script>
<template>
  <AuthenticatedLayout>
    {{ $page.props.auth.user.name }}
  </AuthenticatedLayout>
</template>
<style scoped>
</style>
