<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CardRoom from "@/Components/Custom/CardRoom.vue";
import CardElectronic from "@/Components/Custom/CardElectronic.vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
  room: {
    type: Object,
    default: () => ({}),
  },
  idDirective: {
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
  tablero: {
    type: Object,
    default: () => ({}),
  },
});

function deleteDerivada(id) {
  Swal.fire({
    title: "¿Estás seguro de eliminar esta Carga Electrica?",
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
          "sub-directive.destroy",
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
          Detalles del tablero de distribución : {{ data.name }}
        </li>
        <li
          class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"
        >
          Detalles de cargas electricas
        </li>
      </ol>

      <Link
        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        :href="route('directive.show', { directive: idDirective })"
      >
        <i class="fa-solid fa-arrow-left"></i>
        Regresar
      </Link>
    </div>

    <CardRoom
      :room="room"
      :totalTransformers="totalTransformers"
      :totalKw="totalKw"
      :totalA="totalA"
      :edit="false"
    />
    <CardElectronic :data="tablero" :totalTablersDistro="totalTablersDistro" />
    <div class="card dz-tab-area">
      <div
        class="card-header sm:flex justify-between items-center px-5 pt-6 relative z-[2] pb-0 block"
      >
        <h4 class="card-title capitalize">
          Cargas Electricas del Tablero de Distribución
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
                    Acciones
                  </th>
                </tr>
              </thead>
              <tbody v-for="charge in data" :key="charge.id">
                <tr class="bg-transparent">
                  <td
                    class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                  >
                    {{ charge.name ?? "No hay datos" }}
                  </td>

                  <td
                    class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                  >
                    {{ charge.kw ?? "No hay datos" }}
                  </td>
                  <td
                    class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                  >
                    {{ charge.a ?? "No hay datos" }}
                  </td>
                  <td
                    class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                  >
                    {{ charge.brand ?? "No hay datos" }}
                  </td>

                  <td
                    class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                  >
                    {{ charge.model ?? "No hay datos" }}
                  </td>

                  <td
                    class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                  >
                    {{ charge.capacity ?? "No hay datos" }}
                  </td>

                  <td
                    class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                  >
                    {{ charge.location ?? "No hay datos" }}
                  </td>

                  <td
                    class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
                  >
                    <div class="flex space-x-2">
                      <Link
                        :href="
                          route('sub-directive.edit', {
                            sub_directive: charge.id,
                          })
                        "
                        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
                      >
                        <i class="fa-solid fa-pen"></i>
                        Editar
                      </Link>
                      <button
                        class="btn btn-danger inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-danger text-white bg-danger hover:bg-hover-danger hover:border-hover-danger duration-300 btn-xxs shadow"
                        @click="deleteDerivada(charge.id)"
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

