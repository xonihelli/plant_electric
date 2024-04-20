<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, router, useForm } from "@inertiajs/vue3";

const form = useForm({
  name: "",
  description: "",
});
const sendForm = () => {
  form.submit("post", route("room.store"), {
    onFinish: () => {
      if (Object.keys(form.errors).length) {
        Swal.fire({
          icon: "error",
          title: "Hay errores en el formulario",
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "La información del cuarto eléctrico ha sido guardada",
        }).then(() => {
          location.href = route("room.index");
        });
      }
    },
  });
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
            Detalles del cuarto eléctrico
          </h2>
        </div>
        <div class="card-body sm:p-5 p-4 space-y-6">
          <div>
            <InputLabel for="name" value="Nombre del cuarto" />
            <TextInput
              id="name"
              v-model="form.name"
              type="text"
              autocomplete="name"
              placeholder="Nombre del cuarto"
            />
          </div>
          <div>
            <InputLabel for="description" value="Descripción" />
            <textarea
              class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full input-default"
              id="description"
              v-model="form.description"
              placeholder="Descripción"
            ></textarea>
          </div>

          <div class="flex justify-around">
            <Link
              :href="route('room.index')"
              class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-secondary text-white bg-secondary hover:bg-hover-secondary hover:border-hover-success duration-300 btn-xxs shadow"
            >
              Cancelar
            </Link>
            <button
              class="btn btn-success inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-success text-white bg-success hover:bg-hover-success hover:border-hover-success duration-300 btn-xxs shadow"
            >
              Crear cuarto
            </button>
          </div>
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
