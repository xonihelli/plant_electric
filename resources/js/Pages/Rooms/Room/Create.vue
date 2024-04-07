<script setup>
import { router, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
  name: "",
  description: "",
kw: '',
a: '',
});

const sendForm = () => {
  form.submit("post", route("rooms.room.store"), {
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
          router.push(route("rooms.room.index"));
        });
      }
    },
  });
};
</script>
<template>
    <AuthenticatedLayout>
        <div class="card">
            <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0">
                <h2 class="card-title text-base text-sm font-bold">
                    Detalles de cuarto
                </h2>
            </div>
            <div class="card-body sm:p-5 p-4 space-y-6">
                <div>
                    <InputLabel for="name" value="Nombre del cuarto" />
                    <TextInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        autocomplete="current-password"
                    />
                    <InputError :message="form.name" class="mt-2" />
                </div>
                <div>
                    <InputLabel for="description" value="Descripción" />description
                    <textarea class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full input-default " id="description" v-model="form.description"></textarea>
                </div>
                <div class="flex sm:flex-wrap md:flex-nowrap space-x-2">
                    <div class="w-full md:w-1/2">
                        <InputLabel for="kw" value="kW" />
                        <TextInput
                            id="kw"
                            v-model="form.kw"
                            type="text"
                            autocomplete="current-password"
                        />
                        <InputError :message="form.kw" class="mt-2" />
                    </div>
                    <div class="w-full md:w-1/2">
                        <InputLabel for="a" value="A" />
                        <TextInput
                            id="a"
                            v-model="form.a"
                            type="text"
                            autocomplete="current-password"
                        />
                        <InputError :message="form.a" class="mt-2" />
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
                            Crear cuarto
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style lang="scss" scoped>
</style>
