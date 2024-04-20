
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CardRoom from "@/Components/Custom/CardRoom.vue";
import CardElectronic from "@/Components/Custom/CardElectronic.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  chargeDerivates: {
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
    type: String,
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
  data: {
    type: Object,
    default: () => ({}),
  },
  tablero: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  charge_derivate_id: props.data.charge_derivate_id ?? "",
  name: props.data.name ?? "",
  kw: props.data.kw ? props.data.kw.toString() : "",
  a: props.data.a ? props.data.a.toString() : "",
  brand: props.data.brand ?? "",
  model: props.data.model ?? "",
  capacity: props.data.capacity ?? "",
  location: props.data.location ?? "",
});

const sendForm = () => {
  form.submit("post", route("sub-directive.store"), {
    onFinish: () => {
      if (Object.keys(form.errors).length) {
        Swal.fire({
          icon: "error",
          title: "Hay errores en el formulario",
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "La información de la carga subderivada ha sido Actualizada",
        }).then(() => {
          location.href("sub-directive.show", { sub_directive: idDirective });
        });
      }
    },
  });
};
</script>

<template>
  <AuthenticatedLayout>
    <CardRoom
      :room="room"
      :totalTransformers="totalTransformers"
      :totalKw="totalKw"
      :totalA="totalA"
      :edit="false"
    />
    <CardElectronic
      :data="tablero"
      :totalTablersDistro="totalTablersDistro"
      :edit="false"
    />

    <div class="card dz-tab-area">
      <div
        class="card-header sm:flex justify-between items-center px-5 pt-6 relative z-[2] pb-0 block"
      >
        <h4 class="card-title capitalize">Editar Carga derivada</h4>

        <Link
          :href="route('sub-directive.show', { sub_directive: idDirective })"
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
            </div>

            <div class="flex sm:flex-wrap md:flex-nowrap space-x-2">
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
            </div>
            <div class="flex justify-around">
              <Link
                :href="
                  route('sub-directive.show', { sub_directive: idDirective })
                "
                class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-secondary text-white bg-secondary hover:bg-hover-secondary hover:border-hover-success duration-300 btn-xxs shadow"
              >
                Cancelar
              </Link>
              <button
                class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
              >
                Actualizar carga derivada
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

