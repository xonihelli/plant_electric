<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ChargeDerivateIndex from "@/Pages/Charges/ChargeDerivate/Index.vue";
import { Link, router } from "@inertiajs/vue3";
import CardRoom from "@/Components/Custom/CardRoom.vue";
import CardElectronic from "@/Components/Custom/CardElectronic.vue";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
  charge: {
    type: Object,
    default: () => ({}),
  },
  room: {
    type: Object,
    default: () => ({}),
  },
  idRoom: {
    type: String,
  },
  totalA: {
    type: Number,
  },
  totalKw: {
    type: Number,
  },
  totalTransformers: {
    type: Number,
  },
  totalTablersDistro: {
    type: Number,
  },
});

</script>
<template>
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
          class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left font-medium"
        >
          {{ room.name }}
        </li>
        <li
          class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"
        >
          Detalles del transformador eléctrico: {{ data.name }}
        </li>
      </ol>

      <Link
        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        :href="route('room.show', { room: idRoom })"
      >
        <i class="fa-solid fa-arrow-left"></i>
        Regresar
      </Link>
    </div>

    <!-- Cuarto -->
    <CardRoom
      :room="room"
      :idRoom="idRoom"
      :totalTransformers="totalTransformers"
      :totalKw="totalKw"
      :totalA="totalA"
      :edit="false"
    />

    <!-- Cuarto -->

    <!-- Derivada -->
    <CardElectronic
      :data="data"
      :totalTablersDistro="totalTablersDistro"
      :edit="false"
    />
    <!-- Derivada -->

    <!-- Sub derivadas -->
    <ChargeDerivateIndex :data="charge" />
  </AuthenticatedLayout>
</template>

