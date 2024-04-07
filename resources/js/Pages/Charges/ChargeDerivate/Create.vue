
<script setup>
import { router, useForm } from "@inertiajs/vue3";

const props = defineProps({
  electricCharges: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  electric_charge_id: "",
  name_technical: "",
  name: "",
  kw: "",
  a: "",
});

const sendForm = () => {
  form.submit("post", route("charge.directive.store"), {
    onFinish: () => {
      if (Object.keys(form.errors).length) {
        Swal.fire({
          icon: "error",
          title: "Hay errores en el formulario",
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "La información de la carga derivada ha sido guardada",
        }).then(() => {
          router.push(route("charge.directive.index"));
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
