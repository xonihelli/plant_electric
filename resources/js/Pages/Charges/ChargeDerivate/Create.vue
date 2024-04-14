
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm } from "@inertiajs/vue3";
import CardRoom from "@/Components/Custom/CardRoom.vue";
import CardElectronic from "@/Components/Custom/CardElectronic.vue";

const props = defineProps({
  transoformador: {
    type: Object,
    default: () => ({}),
  },
  electricCharges: {
    type: Object,
    default: () => ({}),
  },
  data: {
    type: Object,
    default: () => ({}),
  },
  room: {
    type: Object,
    default: () => ({}),
  },
  idRoom: {
    type: String,
    required: true,
  },
  idDirective: {
    type: Number,
    required: true,
  },
  totalTransformers: {
    type: Number,
    required: true,
  },
  totalKw: {
    type: Number,
    required: true,
  },
  totalA: {
    type: Number,
    required: true,
  },
  totalTablersDistro: {
    type: Number,
    required: true,
  },
});

const form = useForm({
  lightning_discharge: "",
  electric_charge_id: "",
  name_technical: "",
  voltage: "",
  surge: "",
  name: "",
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
          title: "La información del tablero de distribuición ha sido creada",
        }).then(() => {
          location.href("charge.directive.show", { directive: idDirective });
        });
      }
    },
  });
};
</script>

<template>
  <AuthenticatedLayout>
    <div
      class="page-titles dark:bg-[#242424] flex items-center justify-between relative border-b border-[#E6E6E6] dark:border-[#444444] flex-wrap z-[1] py-[0.6rem] sm:px-[1.95rem] px-[1.55rem] bg-white shadow mb-5"
    >
      <ol class="text-[13px] flex items-center flex-wrap bg-transparent">
        <li>
          <Link
            :href="route('rooms.room.index')"
            class="text-[#828690] dark:text-white text-[13px]"
          >
            Cuartos
          </Link>
        </li>
        <li
          class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left"
        >
          <Link
            :href="route('rooms.room.show', { room: idRoom })"
            class="text-[#828690] dark:text-white text-[13px]"
          >
            {{ room.name }}
          </Link>
        </li>
        <li
          class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"
        >
          {{ transoformador.name }}
        </li>
        <li
          class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"
        >
          Agregar tablero de distribuición
        </li>
      </ol>

      <Link
        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        :href="route('charge.directive.show', { directive: idDirective })"
      >
        <i class="fa-solid fa-arrow-left"></i>
        Regresar
      </Link>
    </div>

    <CardRoom
      :room="room"
      :idRoom="idRoom"
      :totalTransformers="totalTransformers"
      :totalKw="totalKw"
      :totalA="totalA"
      :edit="false"
    />
    <CardElectronic
      :data="data"
      :totalTablersDistro="totalTablersDistro"
      :edit="false"
    />

    <div class="card dz-tab-area">
      <div
        class="card-header sm:flex justify-between items-center px-5 pt-6 relative z-[2] pb-0 block"
      >
        <h4 class="card-title capitalize">Agregar Tablero de distribuición</h4>

        <Link
          :href="route('charge.directive.index')"
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
                for="electric_charge_id"
                value="Transformador al que pertenece"
              />
              <select
                class="form-select relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full input-default"
                id="room_id"
                v-model="form.electric_charge_id"
              >
                <option value="" disabled selected>
                  Selecciona un transformador electrico al que pertenece el
                  trablero de distribución
                </option>
                <option
                  v-for="electricCharge in electricCharges"
                  :key="electricCharge.id"
                  :value="electricCharge.id"
                >
                  {{ electricCharge.name }}
                </option>
              </select>
              <InputError :message="form.errors.electric_charge_id" />
            </div>

            <div class="flex sm:flex-wrap md:flex-nowrap space-x-2">
              <div class="w-full md:w-1/2">
                <InputLabel for="name_technical" value="Nombre técnico" />
                <TextInput
                  id="name_technical"
                  v-model="form.name_technical"
                  type="text"
                  autocomplete="off"
                  placeholder="Ejemplo: SVOC 2.1"
                />
                <InputError :message="form.errors.name_technical" />
              </div>
              <div class="w-full md:w-1/2">
                <InputLabel for="name" value="Nombre" />
                <TextInput
                  id="name"
                  v-model="form.name"
                  type="text"
                  autocomplete="off"
                  placeholder="Ejemplo: Tablero de distribuición 1"
                />
                <InputError :message="form.errors.name" />
              </div>
            </div>

            <div class="flex sm:flex-wrap md:flex-nowrap space-x-2">
              <div class="w-full md:w-1/2">
                <InputLabel for="surge" value="sobretensión eléctrica" />
                <TextInput
                  id="surge"
                  v-model="form.surge"
                  type="text"
                  autocomplete="off"
                  placeholder="Ejemplo: 1.2"
                />
                <InputError :message="form.errors.surge" />
              </div>
              <div class="w-full md:w-1/2">
                <InputLabel for="voltage" value="Volataje(Referencia)" />
                <TextInput
                  id="voltage"
                  v-model="form.voltage"
                  type="text"
                  autocomplete="off"
                  placeholder="Ejemplo: 1232"
                />
                <InputError :message="form.errors.voltage" />
              </div>
              <div class="w-full md:w-1/2">
                <InputLabel
                  for="lightning_discharge"
                  value="descarga electrica"
                />
                <TextInput
                  id="lightning_discharge"
                  v-model="form.lightning_discharge"
                  type="text"
                  autocomplete="off"
                  placeholder="Ejemplo: 1"
                />
                <InputError :message="form.errors.lightning_discharge" />
              </div>
            </div>
            <div class="flex justify-around">

                Cancelar
              </Link>
              <button
                class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
              >
                Crear Tablero de distribuición
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

