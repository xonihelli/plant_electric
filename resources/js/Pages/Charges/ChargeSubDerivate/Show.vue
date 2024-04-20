<template>
  <AuthenticatedLayout>
    <div class="flex justify-end mb-4">
      <Link
        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        :href="route('directive.index')"
      >
        <i class="fa-solid fa-arrow-left"></i>
        Regresar
      </Link>
    </div>

    // cuartos
    // tablero de distribucuión
        // toatl cargas
        // tablero que pertenece
        
    // tabla de cargas electricas
        // cargas electricas (crud)
    
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SubChargeDerivateIndex from "@/Pages/Charges/ChargeSubDerivate/Index.vue";

import { Link } from "@inertiajs/vue3";

let status = [
  {
    id: 1,
    name: "bueno",
    class: "success",
    icon: "fa-solid fa-check",
  },
  {
    id: 1,
    name: "peligroso",
    class: "warning",
    icon: "fa-solid fa-triangle-exclamation",
  },
  {
    id: 1,
    name: "malo",
    class: "success",
    icon: "fa-solid fa-xmark",
  },
];

let room = {
  id: 1,
  name: "cuarto #" + Math.floor(Math.random() * 1000),
  description:
    "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
  charge: Math.floor(Math.random() * 1000),
  porcent: Math.floor(Math.random() * 100),
  status: status[Math.floor(Math.random() * status.length)],
};
</script>

<style scoped>
</style>
