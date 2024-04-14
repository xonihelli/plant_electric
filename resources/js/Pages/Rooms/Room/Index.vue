<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/vue3";
import CardRoom from "@/Components/Custom/CardRoom.vue";
import CardElectronic from "@/Components/Custom/CardElectronic.vue";


const props = defineProps({
    data: {
        type: Object,
        default: () => ({}),
    },
});

let status = [
    {
        id: 1,
        name: "success",
        icon: "fa-solid fa-check",
    },
    {
        id: 1,
        name: "warning",
        icon: "fa-solid fa-triangle-exclamation",
    },
    {
        id: 1,
        name: "danger",
        icon: "fa-solid fa-xmark",
    },
];
</script>
<template>
    <AuthenticatedLayout>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <div>
                <Link :href="route('rooms.room.create')">
                    <div class="card shadow-lg hover:shadow ease-in duration-200">
                        <div class="card-body depostit-card p-5 flex flex-wrap justify-center items-center h-full w-full">
                              <h6 class="font-bold block w-full text-center">Agregar cuarto</h6>

                              <div
                                  class="icon-box h-[2.5rem] w-[2.5rem] relative flex items-center justify-center rounded-md"
                                  :class="`bg-info-light`"
                              >
                                  <i class="fas fa-plus"></i>
                              </div>
                        </div>
                    </div>
                </Link>
            </div>
            <div v-for="room in data" :key="room.id">
                <Link :href="route('rooms.room.show', room.id)">
                    <div class="card shadow-lg hover:shadow ease-in duration-200">
                        <div class="card-body depostit-card p-5">
                            <div
                                class="depostit-card-media flex justify-between relative z-[2] items-center mb-3"
                            >
                                <h5 class="font-bold text-xl">
                                    {{ room.name }}
                                </h5>

                                <div
                                    class="icon-box h-[2.5rem] w-[2.5rem] relative flex items-center justify-center rounded-md"
                                    :class="`bg-info-light`"
                                >
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                            <p class="text-gray-500 flex justify-between">
                                <b> Carga total </b>

                                <span> 90 </span>
                            </p>
                            <p class="text-gray-500 flex justify-between">
                                <b> Cant. Transformadores </b>

                                <span> 90 </span>
                            </p>
                            <p class="text-gray-500 flex justify-between">
                                <b> Cant. Cargas electricas </b>

                                <span> 90 </span>
                            </p>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped></style>
