<template>
  <div class="card">
    <div class="card-header flex justify-between px-5 pt-6 relative z-[2]">
      <h2 class="card-title text-base">
        Detalles sobre el contenido del transformador
      </h2>
    </div>
    <div class="card-body sm:p-5 p-4">
      <div class="flex flex-wrap w-full">
        <div class="w-full md:w-1/2">
          <h1 class="mb-4 text-md font-semibold text-3xl">
            <i class="fa-solid fa-bolt mr-2"></i>
            {{ data.name }}
          </h1>
        </div>
        <div class="w-full md:w-1/2">
          <ul class="list-group flex flex-col list-group-flush">
            <li
              class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
            >
              <strong> Total de Tableros de distribución </strong>
              <span class="mb-0">
                {{ totalTablersDistro }}
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  data: {
    type: Object,
  },
  idRoom: {
    type: Number,
  },
  totalTablersDistro: {
    type: Number,
  },
});
</script>

<style scoped>
</style>
