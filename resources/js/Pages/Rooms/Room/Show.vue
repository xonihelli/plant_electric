
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ElectricCharge from "@/Pages/Rooms/ElectricCharge/Index.vue";
import { Link, Head, usePage } from "@inertiajs/vue3";
import CardRoom from "@/Components/Custom/CardRoom.vue";

const props = defineProps({
  room: {
    type: Object,
    default: () => ({}),
  },
  idRoom: {
    type: String,
  },
  totalTransformers: {
    type: Number,
  },
  totalKw: {
    type: Number,
  },
  totalA: {
    type: Number,
  },
});
</script>
<template>
  <Head :title="`Cuarto: ${room.name}`" />
  <AuthenticatedLayout>
    <div
      class="page-titles dark:bg-[#242424] flex items-center justify-between relative border-b border-[#E6E6E6] dark:border-[#444444] flex-wrap z-[1] py-[0.6rem] sm:px-[1.95rem] px-[1.55rem] bg-white shadow mb-5"
    >
      <ol class="text-[13px] flex items-center flex-wrap bg-transparent">
        <li>
          <Link
            :href="route('room.index')"
            class="text-[#828690] dark:text-white text-[13px]"
          >
            Cuartos
          </Link>
        </li>
        <li
          class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"
        >
          {{ room.name }}
        </li>
      </ol>

      <Link
        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        :href="route('room.index')"
      >
        <i class="fa-solid fa-arrow-left"></i>
        Regresar
      </Link>
    </div>

    <CardRoom
      :room="room"
      :idRoom="idRoom"
      :totalTransformers="totalTransformers"
      :totalKw="totalKw"
      :totalA="totalA"
    />

    <div class="card dz-tab-area">
      <div
        class="card-header sm:flex justify-between items-center px-5 pt-6 relative z-[2] pb-0 block"
      >
        <h4 class="card-title capitalize">
          Transformardores electricos del cuarto
        </h4>

        <Link
          :href="route('electric-charge.create')"
          class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
        >
          <i class="fa-solid fa-plus"></i>
          Agregar Transformador
        </Link>
      </div>
      <div class="sm:p-5 p-4">
        <div class="table-responsive">
          <ElectricCharge :charges="room.electric_charges" :room="room" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>


