
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  chargeDerivates: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  charge_derivate_id: "",
  name: "",
  kw: "",
  a: "",
  brand: "",
  model: "",
  capacity: "",
  location: "",
  lightning_discharge: "",
  surge: "",
});

const sendForm = () => {
  form.submit("post", route("charge.sub-directive.store"), {
    onFinish: () => {
      if (Object.keys(form.errors).length) {
        Swal.fire({
          icon: "error",
          title: "Hay errores en el formulario",
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "La información de la carga subderivada ha sido guardada",
        }).then(() => {
          location.href("charge.sub-directive.index");
        });
      }
    },
  });
};

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
                class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left "
            >
                <Link
                    :href="route('rooms.room.show', 1)"
                    class="text-[#828690] dark:text-white text-[13px]"
                >
                    Nombre del cuarto
                </Link>
            </li>
            <li
                class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"
            >
                tablero
            </li>
            <li
                class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"
            >
                Agregar carga
            </li>
        </ol>


        <Link
            class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
            :href="route('rooms.room.show', 1)"
        >
        <i class="fa-solid fa-arrow-left"></i>
        Regresar
      </Link>
    </div>
    <CardRoom :room="room" :edit="false" />
    <CardElectronic :data="charges" :edit="false" />

    <div class="card dz-tab-area">
      <div
        class="card-header sm:flex justify-between items-center px-5 pt-6 relative z-[2] pb-0 block"
      >
        <h4 class="card-title capitalize">Agregar Carga derivada</h4>
      </div>
      <div class="sm:p-5 p-4">
        <form @submit.prevent="sendForm" class="form">
          <div class="space-y-4">
            <div>
              <InputLabel
                for="charge_derivate_id"
                value="Transformador al que pertenece"
              />
              <select
                class="form-select relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full input-default"
                id="room_id"
                v-model="form.charge_derivate_id"
              >
                <option value="" disabled selected>
                  Selecciona un transformador electrico al que pertenece el
                  trablero de distribución
                </option>
                <option
                  v-for="electricCharge in chargeDerivates"
                  :key="electricCharge.id"
                  :value="electricCharge.id"
                >
                  {{ electricCharge.name }}
                </option>
              </select>
              <InputError :message="form.errors.charge_derivate_id" />
            </div>

            <div class="flex sm:flex-wrap md:flex-nowrap space-x-2">
              <div class="w-full md:w-1/2">
                <InputLabel for="name" value="Nombre" />
                <TextInput
                  id="name"
                  v-model="form.name"
                  type="text"
                  autocomplete="off"
                />
                <InputError :message="form.errors.name" />
              </div>
              <div class="w-full md:w-1/2">
                <InputLabel for="kw" value="kW" />
                <TextInput
                  id="kw"
                  v-model="form.kw"
                  type="text"
                  autocomplete="off"
                />
                <InputError :message="form.errors.kw" />
              </div>
              <div class="w-full md:w-1/2">
                <InputLabel for="a" value="A" />
                <TextInput
                  id="a"
                  v-model="form.a"
                  type="text"
                  autocomplete="off"
                />
                <InputError :message="form.errors.a" />
              </div>
            </div>
            <div class="flex sm:flex-wrap md:flex-nowrap space-x-2">
              <div class="w-full md:w-1/2">
                <InputLabel for="brand" value="Marca" />
                <TextInput
                  id="brand"
                  v-model="form.brand"
                  type="text"
                  autocomplete="off"
                />
                <InputError :message="form.errors.brand" />
              </div>
              <div class="w-full md:w-1/2">
                <InputLabel for="model" value="Modelo" />
                <TextInput
                  id="model"
                  v-model="form.model"
                  type="text"
                  autocomplete="off"
                />
                <InputError :message="form.errors.model" />
              </div>

              <div class="w-full md:w-1/2">
                <InputLabel for="capacity" value="Capacidad" />
                <TextInput
                  id="capacity"
                  v-model="form.capacity"
                  type="text"
                  autocomplete="off"
                />
                <InputError :message="form.errors.capacity" />
              </div>
            </div>

            <div class="flex sm:flex-wrap md:flex-nowrap space-x-2">
              <div class="w-full md:w-1/2">
                <InputLabel for="location" value="Ubicación" />
                <TextInput
                  id="location"
                  v-model="form.location"
                  type="text"
                  autocomplete="off"
                />
                <InputError :message="form.errors.location" />
              </div>
              <div class="w-full md:w-1/2">
                <InputLabel
                  for="lightning_discharge"
                  value="Descarga atmosférica"
                />
                <TextInput
                  id="lightning_discharge"
                  v-model="form.lightning_discharge"
                  type="text"
                  autocomplete="off"
                />
                <InputError :message="form.errors.lightning_discharge" />
              </div>
              <div class="w-full md:w-1/2">
                <InputLabel for="surge" value="Sobretensión" />
                <TextInput
                  id="surge"
                  v-model="form.surge"
                  type="text"
                  autocomplete="off"
                />
                <InputError :message="form.errors.surge" />
              </div>
            </div>
            <div class="flex justify-around">
              <Link
                :href="route('charge.sub-directive.index')"
                class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-secondary text-white bg-secondary hover:bg-hover-secondary hover:border-hover-success duration-300 btn-xxs shadow"
              >
                Cancelar
              </Link>
              <button
                class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
              >
                Crear carga derivada
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

