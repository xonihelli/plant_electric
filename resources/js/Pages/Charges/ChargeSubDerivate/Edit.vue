
<script setup>
import { router, useForm } from "@inertiajs/vue3";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
  chargeDerivates: {
    type: Object,
    default: () => ({}),
  },
  idData: {
    type: Number,
  },
});

const form = useForm({
  charge_derivate_id: props.data.charge_derivate_id ?? "",
  name: props.data.name ?? "",
  kw: props.data.kw ?? "",
  a: props.data.a ?? "",
  brand: props.data.brand ?? "",
  model: props.data.model ?? "",
  capacity: props.data.capacity ?? "",
  location: props.data.location ?? "",
  lightning_discharge: props.data.lightning_discharge ?? "",
  surge: props.data.surge ?? "",
});

const sendForm = () => {
  const formData = new FormData();

  formData.append("charge_derivate_id", form.charge_derivate_id);
  formData.append("name", form.name);
  formData.append("kw", form.kw);
  formData.append("a", form.a);
  formData.append("brand", form.brand);
  formData.append("model", form.model);
  formData.append("capacity", form.capacity);
  formData.append("location", form.location);
  formData.append("lightning_discharge", form.lightning_discharge);
  formData.append("surge", form.surge);

  form.submit("put", route("charge.sub-directive.update", props.idData), {
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
          title: "La información de la carga subderivada ha sido actualizada",
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
