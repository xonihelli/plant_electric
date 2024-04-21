
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CardRoom from "@/Components/Custom/CardRoom.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  rooms: {
    type: Array,
    default: () => [],
  },
  room: {
    type: Object,
    default: () => ({}),
  },
  idRoom: {
    type: String,
  },
  totalTransformers: {
    type: Number,
  },
  totalKw: {
    type: Number,
  },
  totalA: {
    type: Number,
  },
});

const form = useForm({
  room_id: "",
  name: "",
  kw: "",
  a: "",
  measurement_date: "",
});

const sendForm = () => {
  form.submit("post", route("electric-charge.store"), {
    onFinish: () => {
      if (Object.keys(form.errors).length) {
        Swal.fire({
          icon: "error",
          title: "Hay errores en el formulario",
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "La información del transformador eléctrico ha sido guardada",
        }).then(() => {
          location.href = route("room.show", { room: props.idRoom });
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
          Agregar transformador eléctrico
        </li>
      </ol>

      <Link
        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        :href="route('room.show', { room: idRoom })"
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

    <div class="card">
      <form @submit.prevent="sendForm" class="form">
        <div
          class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0"
        >
          <h2 class="card-title text-sm font-bold">
            Detalles del transformador eléctrico
          </h2>
        </div>
        <div class="card-body sm:p-5 p-4 space-y-6">
          <!-- Fila 1 -->
          <div class="flex flex-wrap -mx-2">
            <div class="w-full md:w-1/2 px-2 mb-4">
              <!-- Cuarto eléctrico -->
              <div>
                <InputLabel
                  for="name"
                  value="Cuarto eléctrico al que pertenece"
                />

                <select
                  class="form-select relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full input-default"
                  id="room_id"
                  v-model="form.room_id"
                >
                  <option value="" disabled selected>
                    Selecciona un cuarto electrico al que pertenece la carga
                    eléctrica
                  </option>
                  <option v-for="room in rooms" :key="room.id" :value="room.id">
                    {{ room.name }}
                  </option>
                </select>
                <InputError :message="form.errors.room_id" />
              </div>
            </div>
            <div class="w-full md:w-1/2 px-2 mb-4">
              <!-- Nombre de la carga eléctrica -->
              <div>
                <InputLabel
                  for="name"
                  value="Nombre del transformador eléctrico"
                />
                <TextInput
                  id="name"
                  v-model="form.name"
                  type="text"
                  class="input-default"
                  placeholder="Ejemplo: Transformador 1"
                />
                <InputError :message="form.errors.name" />
              </div>
            </div>
          </div>

          <!-- Fila 2 -->
          <div class="flex flex-wrap -mx-2">
            <div class="w-full md:w-1/4 px-2 mb-4">
              <!-- kW -->
              <div>
                <InputLabel for="kw" value="kW" />
                <TextInput
                  id="kw"
                  v-model="form.kw"
                  type="text"
                  class="input-default"
                  placeholder="Ejemplo: 100"
                />
                <InputError :message="form.errors.kw" />
              </div>
            </div>
            <div class="w-full md:w-1/4 px-2 mb-4">
              <!-- A -->
              <div>
                <InputLabel for="a" value="A" />
                <TextInput
                  id="a"
                  v-model="form.a"
                  type="text"
                  class="input-default"
                  placeholder="Ejemplo: 92.1"
                />
                <InputError :message="form.errors.a" />
              </div>
            </div>
            <div class="w-full md:w-1/2 px-2 mb-4">
              <!-- FU KW -->
              <div>
                <InputLabel for="measurement_date" value="Fecha de medición" />
                <TextInput
                  id="measurement_date"
                  v-model="form.measurement_date"
                  type="date"
                  class="input-default"
                />
                <InputError :message="form.errors.measurement_date" />
              </div>
            </div>
          </div>

          <div class="flex justify-around">
            <Link
              :href="route('room.show', { room: idRoom })"
              class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-secondary text-white bg-secondary hover:bg-hover-secondary hover:border-hover-success duration-300 btn-xxs shadow"
            >
              Cancelar
            </Link>
            <button
              class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
            >
              Agregar Transformador eléctrico
            </button>
          </div>
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>

