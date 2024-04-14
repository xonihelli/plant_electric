<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, router, useForm, Head } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { format } from "date-fns";
import CardElectronic from "@/Components/Custom/CardElectronic.vue";
import CardRoom from "@/Components/Custom/CardRoom.vue";

const props = defineProps({
  room: {
    type: Object,
  },
  data: {
    type: Object,
    default: () => ({}),
  },
  rooms: {
    type: Object,
    default: () => ({}),
  },
  electric_charge: {
    type: String,
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
  totalTablersDistro: {
    type: Number,
  },
});

const form = useForm({
  room_id: props.data.room_id ?? "",
  name: props.data.name ?? "",
  kw: props.data.kw ? props.data.kw.toString() : "",
  a: props.data.a ? props.data.a.toString() : "",
  measurement_date: props.data.measurement_date
    ? format(new Date(props.data.measurement_date), "yyyy-MM-dd")
    : "",
});

const sendForm = () => {
  const formData = new FormData();

  formData.append("room_id", form.room_id);
  formData.append("name", form.name);
  formData.append("kw", form.kw);
  formData.append("a", form.a);
  formData.append("measurement_date", form.measurement_date);

  form.submit(
    "put",
    route("rooms.electric-charge.update", props.electric_charge),
    {
      body: formData,
      onFinish: () => {
        if (Object.keys(form.errors).length) {
          Swal.fire({
            icon: "error",
            title: "Hay errores en el formulario",
          });
        } else {
          Swal.fire({
            icon: "success",
            title: "La información de la carga eléctrica ha sido actualizada",
          }).then(() => {
            location.href = route("rooms.room.show", { room: props.idRoom });
          });
        }
      },
    }
  );
};
</script>


<template>
  <Head title="Editar Carga Eléctrica" />
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
          Transformador eléctrico: {{ data.name }}
        </li>
      </ol>

      <Link
        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        :href="route('rooms.room.show', { room: idRoom })"
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
    <CardElectronic :data="data" :totalTablersDistro="totalTablersDistro" />

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
              </div>
            </div>
            <div class="w-full md:w-1/2 px-2 mb-4">
              <!-- Nombre de la carga eléctrica -->
              <div>
                <InputLabel for="name" value="Nombre de la carga eléctrica" />
                <TextInput
                  id="name"
                  v-model="form.name"
                  type="text"
                  class="input-default"
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
                />
                <InputError :message="form.errors.a" />
              </div>
            </div>
            <div class="w-full md:w-1/2 px-2 mb-4">
              <!-- measurement_date -->
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
              :href="route('rooms.room.show', { room: props.idRoom })"
              class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-secondary text-white bg-secondary hover:bg-hover-secondary hover:border-hover-success duration-300 btn-xxs shadow"
            >
              Cancelar
            </Link>
            <button
              class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
            >
              Actualizar el transformador eléctrico
            </button>
          </div>
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>

