
<script setup>
import { router, useForm } from "@inertiajs/vue3";

const form = useForm({
  name: "",
  description: "",
});

const sendForm = () => {
  form.submit("post", route("rooms.room.store"), {
    onFinish: () => {
      if (Object.keys(form.errors).length) {
        Swal.fire({
          icon: "error",
          title: "Hay errores en el formulario",
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "La información del cuarto eléctrico ha sido guardada",
        }).then(() => {
          router.push(route("rooms.room.index"));
        });
      }
    },
  });
};
</script>
<template>
  <div></div>
</template>
<style lang="scss" scoped>
</style>
