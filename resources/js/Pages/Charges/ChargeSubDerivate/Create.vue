
<script setup>
import { router, useForm } from "@inertiajs/vue3";

const props = defineProps({
  chargeDerivates: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  charge_derivate_id: "",
  name: "",
  kw: "",
  a: "",
  brand: "",
  model: "",
  capacity: "",
  location: "",
  lightning_discharge: "",
  surge: "",
});

const sendForm = () => {
  form.submit("post", route("charge.sub-directive.store"), {
    onFinish: () => {
      if (Object.keys(form.errors).length) {
        Swal.fire({
          icon: "error",
          title: "Hay errores en el formulario",
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "La información de la carga subderivada ha sido guardada",
        }).then(() => {
          router.push(route("charge.sub-directive.index"));
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
