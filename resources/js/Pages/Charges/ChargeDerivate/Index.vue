<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
});

function deleteDerivada(id) {
  Swal.fire({
    title: "Estas seguro?",
    text: "No podras revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      router.delete(
        route(
          "charge.directive.destroy",
          { directive: id },
          { preserveScroll: true }
        )
      );
      onSucess: () => {
        Swal.fire("Eliminado!", "El registro ha sido eliminado.", "success");
      };
    }
  });
}
</script>

<template>
  <div class="overflow-x-auto table-scroll">
    <table id="example" class="display table pb-8 w-full">
      <thead>
        <tr class="bg-transparent">
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
            Total kW
          </th>
          <th
            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
          >
            Total A
          </th>
          <th
            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
          >
            Fu General
          </th>
          <th
            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
          >
            Fu Kw
          </th>
          <th
            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
          >
            Fu a
          </th>
          <th
            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
          >
            Fecha de medicion
          </th>
          <th
            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
          >
            Acciones
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-transparent" v-for="charge in data" :key="charge.id">
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.name }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.kw }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.a }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.total_kw }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.total_a }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.fu_general }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.fu_kw }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.fu_a }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.date_measurement }}
          </td>

          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            <div class="flex space-x-2">
              <Link
                :href="route('charge.directive.edit', { directive: charge.id })"
                class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
              >
                <i class="fa-solid fa-pen"></i>
                Editar
              </Link>
              <Link
                :href="route('charge.directive.show', { directive: charge.id })"
                class="btn btn-info inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-info text-white bg-info hover:bg-hover-info hover:border-hover-info duration-300 btn-xxs shadow"
              >
                <i class="fa-solid fa-eye"></i>
                Más información
              </Link>
              <button
                @click="deleteDerivada(charge.id)"
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
</template>



