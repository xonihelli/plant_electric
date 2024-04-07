<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { format } from "date-fns";

const props = defineProps({
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
});

const form = useForm({
  room_id: props.data.room_id ?? "",
  name: props.data.name ?? "",
  kw: props.data.kw ? props.data.kw.toString() : "",
  a: props.data.a ? props.data.a.toString() : "",
  total_kw: props.data.total_kw ? props.data.total_kw.toString() : "",
  total_a: props.data.total_a ? props.data.total_a.toString() : "",
  fu_general: props.data.fu_general ? props.data.fu_general.toString() : "",
  fu_kw: props.data.fu_kw ? props.data.fu_kw.toString() : "",
  fu_a: props.data.fu_a ? props.data.fu_a.toString() : "",
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
  formData.append("total_kw", form.total_kw);
  formData.append("total_a", form.total_a);
  formData.append("fu_general", form.fu_general);
  formData.append("fu_kw", form.fu_kw);
  formData.append("fu_a", form.fu_a);
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
            location.href = route("rooms.electric-charge.index");
          });
        }
      },
    }
  );
};
</script>


<template>
  <AuthenticatedLayout>
    <div class="card">
      <form @submit.prevent="sendForm" class="form">
        <div
          class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0"
        >
          <h2 class="card-title text-sm font-bold">
            Detalles de carga eléctrica
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
            <div class="w-full md:w-1/2 px-2 mb-4">
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
            <div class="w-full md:w-1/2 px-2 mb-4">
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
          </div>

          <!-- Fila 3 -->

          <div class="flex flex-wrap -mx-2">
            <div class="w-full md:w-1/2 px-2 mb-4">
              <!-- TOTAL kW -->
              <div>
                <InputLabel for="total_kw" value="Total kW" />
                <TextInput
                  id="total_kw"
                  v-model="form.total_kw"
                  type="text"
                  class="input-default"
                />
                <InputError :message="form.errors.total_kw" />
              </div>
            </div>
            <div class="w-full md:w-1/2 px-2 mb-4">
              <!-- TOTAL A -->
              <div>
                <InputLabel for="total_a" value="Total A" />
                <TextInput
                  id="total_a"
                  v-model="form.total_a"
                  type="text"
                  class="input-default"
                />
                <InputError :message="form.errors.total_a" />
              </div>
            </div>
          </div>

          <!-- Fila 4 -->

          <div class="flex flex-wrap -mx-2">
            <div class="w-full md:w-1/2 px-2 mb-4">
              <!-- General -->
              <div>
                <InputLabel for="fu_general" value="Fu General" />
                <TextInput
                  id="fu_general"
                  v-model="form.fu_general"
                  type="text"
                  class="input-default"
                />
                <InputError :message="form.errors.fu_general" />
              </div>
            </div>
            <div class="w-full md:w-1/2 px-2 mb-4">
              <!-- FU KW -->
              <div>
                <InputLabel for="fu_kw" value="Fu Kw" />
                <TextInput
                  id="fu_kw"
                  v-model="form.fu_kw"
                  type="text"
                  class="input-default"
                />
                <InputError :message="form.errors.fu_kw" />
              </div>
            </div>
          </div>

          <!-- Fila 5 -->

          <div class="flex flex-wrap -mx-2">
            <div class="w-full md:w-1/2 px-2 mb-4">
              <!-- FU A -->
              <div>
                <InputLabel for="fu_a" value="Fu A" />
                <TextInput
                  id="fu_a"
                  v-model="form.fu_a"
                  type="text"
                  class="input-default"
                />
                <InputError :message="form.errors.fu_a" />
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
              :href="route('rooms.room.index')"
              class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-secondary text-white bg-secondary hover:bg-hover-secondary hover:border-hover-success duration-300 btn-xxs shadow"
            >
              Cancelar
            </Link>
            <button
              class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
            >
              Actualizar carga eléctrica
            </button>
          </div>
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>

