
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  electricCharges: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  electric_charge_id: "",
  name_technical: "",
  name: "",
  kw: "",
  a: "",
});

const sendForm = () => {
  form.submit("post", route("charge.directive.store"), {
    onFinish: () => {
      if (Object.keys(form.errors).length) {
        Swal.fire({
          icon: "error",
          title: "Hay errores en el formulario",
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "La información de la carga derivada ha sido guardada",
        }).then(() => {
          location.href("charge.directive.index");
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
        <h2 class="card-title text-base">Detalles de cuarto</h2>
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
        <h4 class="card-title capitalize">Agregar cargas derivadas</h4>

        <Link
          :href="route('rooms.room.show', { room: 1 })"
          class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        >
          <i class="fa-solid fa-arrow-left"></i>
          regresar
        </Link>
      </div>
      <div class="sm:p-5 p-4">
        <div class="space-y-4">
          <div>
            <InputLabel for="electric_charge_id" value="Carga eléctrica" />
            <TextInput
              id="electric_charge_id"
              v-model="form.electric_charge_id"
              type="text"
              autocomplete="off"
            />
            <InputError :message="form.electric_charge_id" class="mt-2" />
          </div>

          <div class="flex sm:flex-wrap md:flex-nowrap space-x-2">
            <div class="w-full md:w-1/2">
              <InputLabel for="name_technical" value="Nombre técnico" />
              <TextInput
                id="name_technical"
                v-model="form.name_technical"
                type="text"
                autocomplete="off"
              />
              <InputError :message="form.name_technical" class="mt-2" />
            </div>
            <div class="w-full md:w-1/2">
              <InputLabel for="name" value="Nombre" />
              <TextInput
                id="name"
                v-model="form.name"
                type="text"
                autocomplete="off"
              />
              <InputError :message="form.name" class="mt-2" />
            </div>
          </div>
          <div class="flex sm:flex-wrap md:flex-nowrap space-x-2">
            <div class="w-full md:w-1/2">
              <InputLabel for="kw" value="kW" />
              <TextInput
                id="kw"
                v-model="form.kw"
                type="text"
                autocomplete="off"
              />
              <InputError :message="form.kw" class="mt-2" />
            </div>
            <div class="w-full md:w-1/2">
              <InputLabel for="a" value="A" />
              <TextInput
                id="a"
                v-model="form.a"
                type="text"
                autocomplete="off"
              />
              <InputError :message="form.a" class="mt-2" />
            </div>
          </div>
          <div class="flex justify-around">
            <Link
              :href="route('rooms.room.show', { room: 1 })"
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
      </div>
    </div>
  </AuthenticatedLayout>
</template>

