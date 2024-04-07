
<script setup>
import { router, useForm } from "@inertiajs/vue3";

const props = defineProps({
  rooms: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  room_id: "",
  name: "",
  kw: "",
  a: "",
  total_kw: "",
  total_a: "",
  fu_general: "",
  fu_kw: "",
  fu_a: "",
  measurement_date: "",
});

const sendForm = () => {
  form.submit("post", route("rooms.electric-charge.store"), {
    onFinish: () => {
      if (Object.keys(form.errors).length) {
        Swal.fire({
          icon: "error",
          title: "Hay errores en el formulario",
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "La información de la carga eléctrica ha sido guardada",
        }).then(() => {
          router.push(route("rooms.electric-charge.index"));
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
