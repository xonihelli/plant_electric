<template>
    <AuthenticatedLayout>
        <div
           class="row"
        >
        <div
               class="xl:w-1/4 lg:w-1/2 sm:w-1/2"
            >
                <Link
                    :href="route('rooms.room.create')"
                >
                    <div
                    class="card"
                    >
                        <div class="card-body depostit-card p-5">
                            <div class="depostit-card-media flex justify-between relative z-[2]">

                                    <h6 class="font-bold">
                                        Agregar cuarto
                                    </h6>

                                <div
                                    class="icon-box h-[2.5rem] w-[2.5rem] relative flex items-center justify-center rounded-md"
                                    :class="`bg-info-light`"
                                >
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </Link>
            </div>
            <div
               class="xl:w-1/4 lg:w-1/2 sm:w-1/2"
                v-for="room in rooms" :key="room.id"
            >
                <div
                   class="card"
                >
                    <div class="card-body depostit-card p-5">
                        <div class="depostit-card-media flex justify-between relative z-[2]">
                            <Link
                                :href="route('rooms.room.show', room.id)"
                            >
                                <h6 class="font-bold">
                                    {{ room.name }}
                                </h6>
                                <h3 class="font-semibold leading-[1.346]">
                                    {{ room.charge }}
                                </h3>
                            </Link>
                            <div
                                class="icon-box h-[2.5rem] w-[2.5rem] relative flex items-center justify-center rounded-md"
                                :class="`bg-${room.status.name}-light`"
                            >
                                <i
                                    :class="room.status.icon"
                                ></i>
                            </div>
                        </div>
                        <div class="progress-box mt-0">
                            <div class="flex justify-between">
                                <p class="mb-0">
                                    Porcentaje de uso
                                </p>
                                <p class="mb-0">
                                    {{ room.porcent }}%/80%
                                </p>
                            </div>
                            <div class="progress h-[5px] flex overflow-hidden rounded-md">
                                <div
                                    class="progress-bar"
                                    :class="`bg-${room.status.name}`"
                                    style="border-radius:4px;"
                                    :style="`width: 80%;`"
                                    role="progressbar"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Link } from '@inertiajs/vue3';

    let status = [
        {
            id: 1,
            name: 'success',
            icon: 'fa-solid fa-check'
        },
        {
            id: 1,
            name: 'warning',
            icon: 'fa-solid fa-triangle-exclamation'
        },
        {
            id: 1,
            name: 'danger',
            icon: 'fa-solid fa-xmark'
        },
    ];

    let rooms = [];
    for (let i = 0; i < 10; i++) {
        rooms.push({
            id: i,
            name: 'Room ' + (i + 1),
            charge: Math.floor(Math.random() * 1000),
            porcent: Math.floor(Math.random() * 100),
            status: status[Math.floor(Math.random() * status.length)],
        });
    }
</script>
<template>
  <AuthenticatedLayout>
    {{ $page.props.auth.user.name }}
  </AuthenticatedLayout>
</template>
<style scoped>


</style>
