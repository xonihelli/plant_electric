
<script setup>
import { router, useForm } from "@inertiajs/vue3";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
  idData: {
    type: Number,
  },
});

const form = useForm({
  name: props.data.name ?? "",
  description: props.data.description ?? "",
});

const sendForm = () => {
  const formData = new FormData();

  formData.append("name", form.name);
  formData.append("description", form.description);

  form.submit("put", route("rooms.room.update", props.idData), {
    body: formData,
    onFinish: () => {
      if (Object.keys(form.errors).length) {
        Swal.fire({
          icon: "error",
          title: "Hay errores en el formulario",
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "La información del cuarto eléctrico ha sido actualizada",
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
