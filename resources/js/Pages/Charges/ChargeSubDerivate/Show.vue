<template>
  <AuthenticatedLayout>
    <div class="flex justify-end mb-4">
      <Link
        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        :href="route('charge.directive.index')"
      >
        <i class="fa-solid fa-arrow-left"></i>
        Regresar
      </Link>
    </div>

    <!-- Cuarto -->
    <div class="card">
      <div
        class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0"
      >
        <h2 class="card-title text-base">Detalles de cuarto</h2>
      </div>
      <div class="card-body sm:p-5 p-4 sm:pb-0 pb-0">
        <div class="flex flex-wrap w-full">
          <div class="w-full md:w-1/2">
            <h1 class="mb-4 text-md font-semibold">
              <i class="fa-solid fa-house mr-2"></i>
              {{ room.name }}
            </h1>
            <p class="mb-4">
              Descripción: <br />
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </p>
          </div>
          <div class="w-full md:w-1/2">
            <ul class="list-group flex flex-col list-group-flush">
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Cargas </strong>
                <span class="mb-0">
                  {{ room.charge }}
                </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Uso </strong>
                <span class="mb-0"> {{ room.porcent }} % </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Kw </strong>
                <span class="mb-0"> 211.4861 </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> A </strong>
                <span class="mb-0"> 294.4 </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Estado </strong>
                <span class="mb-0">
                  <span
                    class="py-[0.1875rem] px-[0.8125rem] text-xs rounded-[1.25rem] text-white leading-[1.5] inline-block border duration-500"
                    :class="`bg-${room.status.class} border-${room.status.class}`"
                  >
                    {{ room.status.name }}
                  </span>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Cuarto -->

    <!-- Derivada -->
    <div class="card">
      <div
        class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0"
      >
        <h2 class="card-title text-base">Detalles de derivada</h2>
      </div>
      <div class="card-body sm:p-5 p-4 sm:pb-0 pb-0">
        <div class="flex flex-wrap w-full">
          <div class="w-full md:w-1/2">
            <h1 class="mb-4 text-md font-semibold">
              <i class="fa-solid fa-house mr-2"></i>
              {{ room.name }}
            </h1>
            <p class="mb-4">
              Descripción: <br />
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </p>
          </div>
          <div class="w-full md:w-1/2">
            <ul class="list-group flex flex-col list-group-flush">
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Cargas </strong>
                <span class="mb-0">
                  {{ room.charge }}
                </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Uso </strong>
                <span class="mb-0"> {{ room.porcent }} % </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Kw </strong>
                <span class="mb-0"> 211.4861 </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> A </strong>
                <span class="mb-0"> 294.4 </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Estado </strong>
                <span class="mb-0">
                  <span
                    class="py-[0.1875rem] px-[0.8125rem] text-xs rounded-[1.25rem] text-white leading-[1.5] inline-block border duration-500"
                    :class="`bg-${room.status.class} border-${room.status.class}`"
                  >
                    {{ room.status.name }}
                  </span>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Derivada -->

    <!-- Sub derivadas -->
    <div class="card dz-tab-area">
      <div
        class="card-header sm:flex justify-between items-center px-5 pt-6 relative z-[2] pb-0 block"
      >
        <h4 class="card-title capitalize">Cargas derivadas</h4>

        <Link
          :href="route('charge.directive.store', { room: 0 })"
          class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
        >
          <i class="fa-solid fa-plus"></i>
          Agregar
        </Link>
      </div>
      <div class="sm:p-5 p-4">
        <div class="table-responsive">
          <SubChargeDerivateIndex />
        </div>
      </div>
    </div>
    <!-- Sub derivadas -->
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
