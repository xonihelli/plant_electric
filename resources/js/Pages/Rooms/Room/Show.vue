
<script setup>
import ChargeDerivateIndex from "@/Pages/Charges/ChargeDerivate/Index.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ElectricCharge from "@/Pages/Rooms/Components/ElectricCharge.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  room: {
    type: Object,
    default: () => ({}),
  },
  idRoom: {
    type: String,
  },
});

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
</script>
<template>
  <AuthenticatedLayout>
    <div class="flex justify-end mb-4">
      <Link
        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        :href="route('rooms.room.index')"
      >
        <i class="fa-solid fa-arrow-left"></i>
        Regresar
      </Link>
    </div>
    <div class="card">
      <div
        class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0"
      >
        <h2 class="card-title text-base">Detalles del cuarto electrico</h2>

        <Link
          class="btn btn-info inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-info text-white bg-info hover:bg-hover-info hover:border-hover-info duration-300 btn-xxs shadow"
          :href="route('rooms.room.edit', { room: props.idRoom })"
        >
          <i class="fa-solid fa-pen"></i>
          Editar
        </Link>
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
              {{ props.room.description }}
            </p>
          </div>
          <div class="w-full md:w-1/2">
            <ul class="list-group flex flex-col list-group-flush">
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Total de transformadores </strong>
                <span class="mb-0">
                  CANTIDAD DE Trasnformadores QUE HAY EN UN CUARTO
                </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Uso </strong>
                <span class="mb-0"> USO EN PORCENTAJE 60 % </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Total de los Kw </strong>
                <span class="mb-0">TOTAL DE KW </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong>Total de los A </strong>
                <span class="mb-0"> TOTAL DE A</span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Estado </strong>

                <span class="mb-0">
                  <span
                    class="py-[0.1875rem] px-[0.8125rem] text-xs rounded-[1.25rem] text-white leading-[1.5] inline-block border duration-500"
                  >
                    <!-- :class="`bg-${room.status.class} border-${room.status.class}`" -->
                    ESTATUS DEL CUARTO
                  </span>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="card dz-tab-area">
      <div
        class="card-header sm:flex justify-between items-center px-5 pt-6 relative z-[2] pb-0 block"
      >
        <h4 class="card-title capitalize">
          Transformadores eléctricos del cuarto
        </h4>

        <Link
          :href="route('rooms.electric-charge.create')"
          class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
        >
          <i class="fa-solid fa-plus"></i>
          Agregar
        </Link>
      </div>
      <div class="sm:p-5 p-4">
        <div class="table-responsive">
          <ElectricCharge :charges="props.room.electric_charges" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>


