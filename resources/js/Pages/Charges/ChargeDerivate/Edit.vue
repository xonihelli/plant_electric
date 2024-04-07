
<script setup>
import { router, useForm } from "@inertiajs/vue3";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
  electricCharges: {
    type: Object,
    default: () => ({}),
  },
  idData: {
    type: Number,
  },
});

const form = useForm({
  electric_charge_id: props.data.electric_charge_id ?? "",
  name_technical: props.data.name_technical ?? "",
  name: props.data.name ?? "",
  kw: props.data.kw ?? "",
  a: props.data.a ?? "",
});

const sendForm = () => {
  const formData = new FormData();

  formData.append("electric_charge_id", form.electric_charge_id);
  formData.append("name", form.name);
  formData.append("kw", form.kw);
  formData.append("a", form.a);

  form.submit("put", route("charge.directive.update", props.idData), {
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
          title: "La información de la carga derivada ha sido actualizada",
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
