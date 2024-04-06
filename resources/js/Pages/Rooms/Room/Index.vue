<template>
    <AuthenticatedLayout>
        {{ $page.props.auth.user.name }}
    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<style scoped>


</style>