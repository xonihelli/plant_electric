<script setup>
import { router, useForm } from "@inertiajs/vue3";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
  rooms: {
    type: Object,
    default: () => ({}),
  },
  idData: {
    type: Number,
  },
});

const form = useForm({
  room_id: props.data.room_id ?? "",
  name: props.data.name ?? "",
  kw: props.data.kw ?? "",
  a: props.data.a ?? "",
  total_kw: props.data.total_kw ?? "",
  total_a: props.data.total_a ?? "",
  fu_general: props.data.fu_general ?? "",
  fu_kw: props.data.fu_kw ?? "",
  fu_a: props.data.fu_a ?? "",
  measurement_date: props.data.measurement_date ?? "",
});

const sendForm = () => {
  const formData = new FormData();

  formData.append("room_id", form.room_id);
  formData.append("name", form.name);
  formData.append("kw", form.kw);
  formData.append("a", form.a);
  formData.append("total_kw", form.total_kw);
  formData.append("total_a", form.total_a);
  formData.append("fu_general", form.fu_general);
  formData.append("fu_kw", form.fu_kw);
  formData.append("fu_a", form.fu_a);
  formData.append("measurement_date", form.measurement_date);

  form.submit("put", route("rooms.electric-charge.update", props.idData), {
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
          title: "La información de la carga eléctrica ha sido actualizada",
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
