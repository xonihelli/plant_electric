<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SubChargeDerivateIndex from "@/Pages/Charges/ChargeSubDerivate/Index.vue";
import { Link, router } from "@inertiajs/vue3";
import CardRoom from "@/Components/Custom/CardRoom.vue";
import CardElectronic from "@/Components/Custom/CardElectronic.vue";

let room = {
    id: 1,
    name: "cuarto #" + Math.floor(Math.random() * 1000),
    description:
        "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
    charge: Math.floor(Math.random() * 1000),
    porcent: Math.floor(Math.random() * 100),
};

let charges = {
    id: 1,
    name: "Derivada #" + Math.floor(Math.random() * 1000),
    description:
        "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
    charge: Math.floor(Math.random() * 1000),
    porcent: Math.floor(Math.random() * 100),
};

</script>
<template>
  <AuthenticatedLayout>
    <div class="page-titles dark:bg-[#242424] flex items-center justify-between relative border-b border-[#E6E6E6] dark:border-[#444444] flex-wrap z-[1] py-[0.6rem] sm:px-[1.95rem] px-[1.55rem] bg-white shadow mb-5">
        <ol class="text-[13px] flex items-center flex-wrap bg-transparent">
            <li>
                <Link
                    :href="route('rooms.room.index')"
                    class="text-[#828690] dark:text-white text-[13px]
                ">
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
                Detalles de tablero: {{ room.name }}
            </li>
        </ol>


        <Link
            class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
            :href="route('rooms.room.index')"
        >
        <i class="fa-solid fa-arrow-left"></i>
        Regresar
      </Link>
    </div>

    <!-- Cuarto -->
    <CardRoom :room="room" :edit="false" />

    <!-- Cuarto -->

    <!-- Derivada -->
    <CardElectronic :data="charges" :edit="false" />
    <!-- Derivada -->

    <!-- Sub derivadas -->
    <SubChargeDerivateIndex/>
    <!-- Sub derivadas -->
  </AuthenticatedLayout>
</template>

