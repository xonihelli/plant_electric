<template>
  <AuthenticatedLayout>
    <div class="flex justify-end mb-4">
      <Link
        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        :href="route('sub-directive.index')"
      >
        <i class="fa-solid fa-arrow-left"></i>
        Regresar
      </Link>
    </div>

    <!-- <CardRoom/>
    <CardElectronic/> -->
    <div class="card dz-tab-area">
        <div
          class="card-header sm:flex justify-between items-center px-5 pt-6 relative z-[2] pb-0 block"
        >
          <h4 class="card-title capitalize">
            Tableros de cargas electricas
          </h4>
    
          <Link
            :href="route('sub-directive.create')"
            class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
          >
            <i class="fa-solid fa-plus"></i>
            Agregar
          </Link>
        </div>
        <div class="table-responsive">
            <div class="sm:p-5 p-4">
                <div class="table-responsive">
                    <table id="example" class="display table pb-8 w-full">
                    <thead>
                        <tr class="bg-transparent">
                        <th
                            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
                        >
                            Tablero de distribución
                        </th>

                        <th
                            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
                        >
                            Nombre
                        </th>

                        <th
                            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
                        >
                            kW
                        </th>
                        <th
                            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
                        >
                            A
                        </th>

                        <th
                            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
                        >
                            Marca
                        </th>

                        <th
                            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
                        >
                            Modelo
                        </th>

                        <th
                            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
                        >
                            Capacidad
                        </th>

                        <th
                            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
                        >
                            Ubicación
                        </th>

                        <th
                            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
                        >
                            Sobretensión
                        </th>

                        <th
                            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
                        >
                            Acciones
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                        class="bg-transparent"
                        v-for="i in 30"
                        :key="i"
                        >
                        <td
                            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                        >
                            HOLA
                        </td>
                        <td
                            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                        >
                            {{ i }}
                        </td>

                        <td
                            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                        >
                            {{ i }}
                        </td>
                        <td
                            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                        >
                            {{ i }}
                        </td>
                        <td
                            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                        >
                            {{ i }}
                        </td>

                        <td
                            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                        >
                            {{ i }}
                        </td>

                        <td
                            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                        >
                            {{ i }}
                        </td>

                        <td
                            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                        >
                            {{ i }}
                        </td>

                        <td
                            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                        >
                            {{ i }}
                        </td>

                        <td
                            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                        >
                            <div class="flex space-x-2">
                            <Link
                                :href="route('sub-directive.edit', i)"
                                class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
                            >
                                <i class="fa-solid fa-pen"></i>
                                Editar
                            </Link>
                            <button
                                class="btn btn-danger inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-danger text-white bg-danger hover:bg-hover-danger hover:border-hover-danger duration-300 btn-xxs shadow"
                            >
                                <i class="fa-solid fa-trash"></i>
                                Elimniar
                            </button>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CardRoom from "@/Components/Custom/CardRoom.vue";
import CardElectronic from "@/Components/Custom/CardElectronic.vue";

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
