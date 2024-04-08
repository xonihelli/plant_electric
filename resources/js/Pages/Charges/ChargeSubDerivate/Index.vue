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
    title: "¿Estás seguro de eliminar esta carga eléctrica?",
    text: "¡No podras revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      router.delete(
        route(
          "charge.sub-directive.destroy",
          { sub_directive: id },
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
  <AuthenticatedLayout>
    <div class="card dz-tab-area">
      <div
        class="card-header sm:flex justify-between items-center px-5 pt-6 relative z-[2] pb-0 block"
      >
        <h4 class="card-title capitalize">Cargas eléctricas</h4>

        <Link
          :href="route('charge.sub-directive.create')"
          class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
        >
          <i class="fa-solid fa-plus"></i>
          Agregar
        </Link>
      </div>
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
                v-for="sub_directive in data"
                :key="sub_directive.id"
              >
                <td
                  class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                >
                  {{ sub_directive.charge_derivate.name }}
                </td>
                <td
                  class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                >
                  {{ sub_directive.name }}
                </td>

                <td
                  class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                >
                  {{ sub_directive.kw }}
                </td>
                <td
                  class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                >
                  {{ sub_directive.a }}
                </td>
                <td
                  class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                >
                  {{ sub_directive.brand }}
                </td>

                <td
                  class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                >
                  {{ sub_directive.model }}
                </td>

                <td
                  class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                >
                  {{ sub_directive.capacity }}
                </td>

                <td
                  class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                >
                  {{ sub_directive.location }}
                </td>

                <td
                  class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                >
                  {{ sub_directive.surge }}
                </td>

                <td
                  class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                >
                  <div class="flex space-x-2">
                    <Link
                      :href="
                        route('charge.sub-directive.edit', {
                          sub_directive: sub_directive.id,
                        })
                      "
                      class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
                    >
                      <i class="fa-solid fa-pen"></i>
                      Editar
                    </Link>
                    <Link
                      :href="
                        route('charge.sub-directive.show', {
                          sub_directive: sub_directive.id,
                        })
                      "
                      class="btn btn-info inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-info text-white bg-info hover:bg-hover-info hover:border-hover-info duration-300 btn-xxs shadow"
                    >
                      <i class="fa-solid fa-eye"></i>
                      Más información
                    </Link>
                    <button
                      @click="deleteDerivada(sub_directive.id)"
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
  </AuthenticatedLayout>
</template>



