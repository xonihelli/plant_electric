<script setup>
import { Link, router, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  name: props.data.name ?? "",
  description: props.data.description ?? "",
});

const sendForm = () => {
  const formData = new FormData();
  formData.append("name", form.name);
  formData.append("description", form.description);

  form.submit("put", route("room.update", props.data.id), {
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
          title: "La información del cuarto eléctrico ha sido actualizada",
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
          class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left"
        >
          <Link
            :href="route('room.show', data.id)"
            class="text-[#828690] dark:text-white text-[13px]"
          >
            {{ data.name }}
          </Link>
        </li>
        <li
          class="pl-2 before:content-['/'] before:font-[simple-line-icons] before:font-black before:text-xl before:leading-4 before:pr-2 before:float-left before:text-primary text-primary font-medium"
        >
          Editar
        </li>
      </ol>

      <Link
        class="btn btn-primary inline-block rounded font-medium py-1.5 px-[0.9375rem] text-[0.6875rem] leading-[1.3] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xxs shadow"
        :href="route('room.show', data.id)"
      >
        <i class="fa-solid fa-arrow-left"></i>
        Regresar
      </Link>
    </div>
    <div class="card">
      <form @submit.prevent="sendForm">
        <div
          class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0"
        >
          <h2 class="card-title text-base font-bold">
            Detalles de cuarto eléctrico
          </h2>
        </div>
        <div class="card-body sm:p-5 p-4 space-y-6">
          <div>
            <InputLabel for="name" value="Nombre del cuarto" />
            <TextInput
              id="name"
              v-model="form.name"
              type="text"
              autocomplete="off"
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
              Actualizar cuarto eléctrico
            </button>
          </div>
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
