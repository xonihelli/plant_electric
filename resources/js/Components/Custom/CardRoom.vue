<template>
    <div class="card">
        <div
          class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0"
        >
          <h2 class="card-title text-base">Detalles del cuarto electrico</h2>

          <Link
            class="btn btn-info inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-info text-white bg-info hover:bg-hover-info hover:border-hover-info duration-300 btn-xxs shadow"
            :href="route('rooms.room.edit', { room: idRoom })"
            v-if="edit"
          >
            <i class="fa-solid fa-pen"></i>
            Editar
          </Link>
        </div>
        <div class="card-body sm:p-5 p-4 sm:pb-0 pb-0">
          <div class="flex flex-wrap w-full">
            <div class="w-full md:w-1/2">
              <h1 class="mb-4 text-md font-semibold text-3xl">
                <i class="fa-solid fa-house mr-2"></i>
                {{ room.name }}
              </h1>
              <p class="mb-4">
                Descripción: <br />
                {{ room.description }}
              </p>
            </div>
            <div class="w-full md:w-1/2">
              <ul class="list-group flex flex-col list-group-flush">
                <li
                  class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
                >
                  <strong> Total de transformadores </strong>
                  <span class="mb-0">
                    30
                  </span>
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
              </ul>
            </div>
          </div>
        </div>
      </div>
</template>

<script setup>
import { Link, Head, usePage } from "@inertiajs/vue3";

defineProps({
    room: {
        type: Object,
    },
    idRoom: {
        type: String,
    },
    edit:{
        type: Boolean,
    }
})
</script>

<style scoped>

</style>
