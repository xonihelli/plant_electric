<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
});
</script>
<template>
    <div class="overflow-x-auto table-scroll">
        <table id="example" class="display table pb-8 w-full">
            <thead>
                <tr class="bg-transparent">
                    <th class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left">
                        Nombre
                    </th>
                    <th class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left">
                        kW
                    </th>
                    <th class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left">
                        A
                    </th>
                    <th class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left">
                        Sub Derivadas
                    </th>
                    <th class="text-black py-5 px-[0.9375rem] border-b-2 border-solid border-[#E6E6E6] dark:border-[#444444] capitalize whitespace-nowrap text-base font-medium text-left">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="bg-transparent"
                    v-for="i in 10"
                    :key="i"
                >
                    <td class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left">
                        CAVSC-S21 CCM 8
                    </td>
                    <td class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left">
                        121.4861
                    </td>
                    <td class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left">
                        169.4
                    </td>
                    <td class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left">
                        <Link
                            class="text-info"
                        >
                            500
                        </Link>
                    </td>
                    <td class="text-body-color bg-transparent xl:py-5 py-2 xl:px-[0.9375rem] px-[0.9375rem] capitalize whitespace-nowrap xl:text-[15px] text-[13px] font-normal text-left">
                        <div class="flex space-x-2">
                            <Link
                                :href="route('charge.directive.edit', {directive: i})"
                                class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
                            >
                                <i class="fa-solid fa-pen"></i>
                                Editar
                            </Link>
                            <Link
                                :href="route('charge.directive.show', {directive: i})"
                                class="btn btn-info inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-info text-white bg-info hover:bg-hover-info hover:border-hover-info duration-300 btn-xxs shadow"
                            >
                                <i class="fa-solid fa-eye"></i>
                                Ver más
                            </Link>
                            <button
                            @click="deleteDerivada(i)"
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

<script setup>
    import { Link } from '@inertiajs/vue3';
    function deleteDerivada(id){
        Swal.fire({
            title: 'Estas seguro?',
            text: "No podras revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Eliminado!',
                    'El registro ha sido eliminado.',
                    'success'
                )
            }
        })
    }
</script>

<style lang="scss" scoped>


</style>
