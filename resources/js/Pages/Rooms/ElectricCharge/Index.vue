<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { defineProps, computed } from "vue";

const props = defineProps({
  charges: {
    type: Object,
  },
  room: {
    type: Object,
  },
  totalKw: {
    type: Number,
  },
  totalA: {
    type: Number,
  },
});

function deleteDerivada(id) {
  Swal.fire({
    title: "¿Estas seguro de eliminar este Transformador eléctrico?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      router
        .delete(
          route(
            "electric-charge.destroy",
            { electric_charge: id },
            { preserveScroll: true }
          )
        )
        .then(() => {
          // Recarga la página después de eliminar
          location.reload();
        })
        .catch((error) => {
          // Manejo del error, por si acaso la solicitud falla
          console.error("Error al eliminar:", error);
          Swal.fire(
            "Error",
            "No se pudo eliminar el transformador eléctrico.",
            "error"
          );
        });
    }
  });
}

// Constantes
const FU_GENERAL = 0.4;

const transformadoresConCalculos = computed(() => {
  if (!props.totalKw || !props.totalA) {
    // Aquí puedes manejar el error como prefieras.
    console.error("totalKw o totalA son 0, indefinidos o no son números");
    return [];
  }

  return props.charges.map((charge) => {
    const kw = charge.kw || 0; // Asegúrate de que siempre sea un número.
    const a = charge.a || 0; // Lo mismo aquí.
    const totalKwTransformador = charge.totalKwTransformador || 0;
    const fuKw = kw * FU_GENERAL;
    const fuA = a * FU_GENERAL;
    const porcentajeUso = (totalKwTransformador / props.totalKw) * 100;

    // Verifica si el uso es mayor o igual a 80%
    if (porcentajeUso >= 80) {
      // Muestra una alerta. Asegúrate de que esta operación no se repita innecesariamente.
      Swal.fire({
        title: "Advertencia",
        text: `El transformador ${charge.name} está al ${porcentajeUso.toFixed(
          2
        )}% de su uso. Por favor, revisalo.`,
        icon: "warning",
        confirmButtonText: "Entendido",
      });
    }
    return {
      ...charge,
      fuKw: fuKw.toFixed(2),
      fuA: fuA.toFixed(2),
      porcentajeUso: porcentajeUso.toFixed(2), // Esto asegurará que siempre obtengas un número.
    };
  });
});
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
            Porcentaje
          </th>

          <th
            class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left"
          >
            Acciones
          </th>
        </tr>
      </thead>
      <tbody v-for="charge in transformadoresConCalculos" :key="charge.id">
        <tr class="bg-transparent">
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
            {{ charge.totalKwTransformador ?? "No disponible" }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.totalATransformador ?? "No disponible" }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ FU_GENERAL ?? "No disponible" }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.fuKw ?? "No disponible" }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{ charge.fuA ?? "No disponible" }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            {{
              charge.measurement_date
                ? new Date(charge.measurement_date).toLocaleDateString(
                    "es-ES",
                    {
                      day: "numeric",
                      month: "long",
                      year: "numeric",
                    }
                  )
                : "Fecha no disponible"
            }}
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            <div class="flex items-center">
              <div
                class="progress bg-[#f6f6f6] dark:bg-[#1E1E1E] mr-[5px] h-[5px] overflow-hidden flex-1"
              >
                <div
                  class="progress-bar bg-primary"
                  style="width: 80%; height: 5px; border-radius: 4px"
                  role="progressbar"
                ></div>
              </div>
              <span class="text-primary">
                <td>{{ charge.porcentajeUso }}%</td>
              </span>
            </div>
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            <span v-if="charge.porcentajeUso >= 80" class="text-red-600">
              ¡Alto uso!
            </span>
          </td>
          <td
            class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left"
          >
            <div class="flex space-x-2">
              <Link
                :href="
                  route('electric-charge.edit', {
                    electric_charge: charge.id,
                  })
                "
                class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
              >
                <i class="fa-solid fa-pen"></i>
              </Link>

              <Link
                :href="route('directive.show', { directive: charge.id })"
                class="btn btn-info inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-info text-white bg-info hover:bg-hover-info hover:border-hover-info duration-300 btn-xxs shadow"
              >
                <i class="fa-solid fa-eye"></i>
              </Link>
              <button
                @click="deleteDerivada(charge.id)"
                class="btn btn-danger inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-danger text-white bg-danger hover:bg-hover-danger hover:border-hover-danger duration-300 btn-xxs shadow"
              >
                <i class="fa-solid fa-trash"></i>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>



