
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

<template>
  <AuthenticatedLayout>
    <div class="card">
      <div
        class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0"
      >
        <h2 class="card-title text-base">
          Detalles del tablero de distribución
        </h2>
      </div>
      <div class="card-body sm:p-5 p-4 sm:pb-0 pb-0">
        <div class="flex flex-wrap w-full">
          <div class="w-full md:w-1/2">
            <h1 class="mb-4 text-md font-semibold">
              <i class="fa-solid fa-house mr-2"></i>
              {{ room.name }}
            </h1>
            <p class="mb-4">
              Descripción: <br />
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </p>
          </div>
          <div class="w-full md:w-1/2">
            <ul class="list-group flex flex-col list-group-flush">
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Cargas </strong>
                <span class="mb-0">
                  {{ room.charge }}
                </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Uso </strong>
                <span class="mb-0"> {{ room.porcent }} % </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Kw </strong>
                <span class="mb-0"> 211.4861 </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> A </strong>
                <span class="mb-0"> 294.4 </span>
              </li>
              <li
                class="list-group-item flex py-4 text-body-color dark:text-white text-sm justify-between"
              >
                <strong> Estado </strong>
                <span class="mb-0">
                  <span
                    class="py-[0.1875rem] px-[0.8125rem] text-xs rounded-[1.25rem] text-white leading-[1.5] inline-block border duration-500"
                    :class="`bg-${room.status.class} border-${room.status.class}`"
                  >
                    {{ room.status.name }}
                  </span>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="card dz-tab-area">
      <div
        class="card-header sm:flex justify-between items-center px-5 pt-6 relative z-[2] pb-0 block"
      >
        <h4 class="card-title capitalize">Agregar Carga derivada</h4>

        <Link
          :href="route('charge.sub-directive.index')"
          class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        >
          <i class="fa-solid fa-arrow-left"></i>
          regresar
        </Link>
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

