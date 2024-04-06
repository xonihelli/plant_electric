<script setup>
import WebLayout from '@/Layouts/WebLayout.vue';

import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <WebLayout>
        <div class="authincation min-h-[100vh] h-full flex">
            
            <div class="container-fluid h-full pt-0 w-full px-[12.5px]">
                <div class="row h-[100vh]">
                    <div class="lg:w-1/2 w-full mx-auto self-center">
                        <div class="login-form mx-auto max-w-[600px] lg:px-[50px] lg:py-0 sm:p-[25px] p-[14px]">
                            
                            <div class="flex justify-center w-full">
                                <Link href="/">
                                    <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                                </Link>
                            </div>

                            <slot />
                        </div>
                    </div>
                    <div class="lg:w-1/2 w-full">
                        <div class="pages-left h-full bg-white dark:bg-[#242424]">
                            <div class="login-media text-center flex items-center justify-center h-full">
                                <img src="assets/images/login.png" alt="" class="max-lg:w-[60%] w-[70%] inline-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </WebLayout>
</template>
