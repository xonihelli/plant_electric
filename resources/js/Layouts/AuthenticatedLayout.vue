<script setup>
import { ref } from "vue";
import WebLayout from "@/Layouts/WebLayout.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
  <WebLayout>
    <template #header>
      <!-- Nav header start -->
      <div class="nav-header">
        <a :href="route('dashboard')" class="brand-logo">
          <img
            class="logo-abbr"
            src="/images/COV_logo_extend.svg"
            alt="COVESTRO"
          />
        </a>
        <div class="nav-control">
          <div class="hamburger">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
          </div>
        </div>
      </div>
      <!-- Nav header end -->

      <!-- Header start -->
      <div class="header">
        <div class="header-content">
          <nav class="navbar navbar-expand">
            <div class="navbar-collapse justify-end">
              <ul class="navbar-nav header-right flex flex-row h-full">
                <li class="nav-item pl-4 flex justify-center relative">
                  <div class="dropdown header-profile2">
                    <a
                      data-dz-dropdown="DzinfoDropdown"
                      class="dz-dropdown nav-link relative p-2 text-[#464a53] text-lg leading-[1] block duration-500"
                      href="javascript:void(0);"
                      role="button"
                      data-bs-toggle="dropdown"
                    >
                      <div class="header-info2 flex items-center">
                        <div
                          class="header-media mr-[7px] h-[1.875rem] w-[1.875rem]"
                        >
                          <img
                            :src="`https://ui-avatars.com/api/?background=random&name=${encodeURIComponent(
                              $page.props.auth.user.name
                            )}`"
                            alt="User Avatar"
                          />
                        </div>
                        <div class="header-info text-white max-sm:hidden">
                          <h6
                            class="lg:text-[13px] text-xs mb-1 font-semibold text-white leading-[1]"
                          >
                            {{ $page.props.auth.user.name }}
                          </h6>
                          <p class="text-xs leading-[1] text-[#E1E1E1] mb-1">
                            {{ $page.props.auth.user.email }}
                          </p>
                        </div>
                      </div>
                    </a>
                    <div
                      id="DzinfoDropdown"
                      class="dz-dropdown-menu dropdown-menu dropdown-menu-end bg-white dark:bg-[#242424] absolute rounded-es-md rounded-ee-md w-[275px] right-0 top-full z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] py-2 hidden"
                    >
                      <div class="card border-0 mb-0">
                        <div
                          class="card-header relative flex items-center justify-between bg-transparent py-2 sm:px-[1.25rem] px-4 border-b border-[#E6E6E6] dark:border-[#444444]"
                        >
                          <div class="flex items-center">
                            <img
                              class="inline-block mr-2.5 w-[2.813rem] min-w-[2.813rem] h-[2.813rem] rounded-md relative object-cover avatar-md"
                              :src="`https://ui-avatars.com/api/?background=random&name=${encodeURIComponent(
                                $page.props.auth.user.name
                              )}`"
                              alt="User Avatar"
                            />
                            <div>
                              <h6 class="text-sm">
                                {{ $page.props.auth.user.name }}
                              </h6>
                              <span class="text-xs text-body-color">
                                {{ $page.props.auth.user.email }}
                              </span>
                            </div>
                          </div>
                        </div>
                        <div
                          class="card-body sm:py-2 border-b border-[#E6E6E6] dark:border-[#444444]"
                        >
                          <a
                            :href="route('profile.edit')"
                            class="dropdown-item py-[0.6rem] px-[1.25rem] block w-full ai-icon hover:bg-primary-light group"
                          >
                            <svg
                              class="inline-block"
                              width="20"
                              height="20"
                              viewBox="0 0 24 24"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M11.9848 15.3462C8.11714 15.3462 4.81429 15.931 4.81429 18.2729C4.81429 20.6148 8.09619 21.2205 11.9848 21.2205C15.8524 21.2205 19.1543 20.6348 19.1543 18.2938C19.1543 15.9529 15.8733 15.3462 11.9848 15.3462Z"
                                stroke="var(--primary)"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                              <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M11.9848 12.0059C14.5229 12.0059 16.58 9.94779 16.58 7.40969C16.58 4.8716 14.5229 2.81445 11.9848 2.81445C9.44667 2.81445 7.38857 4.8716 7.38857 7.40969C7.38 9.93922 9.42381 11.9973 11.9524 12.0059H11.9848Z"
                                stroke="var(--primary)"
                                stroke-width="1.42857"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>

                            <span
                              class="ml-2 text-[13px] text-body-color group-hover:text-primary"
                            >
                              Perfil
                            </span>
                          </a>
                        </div>
                        <div class="card-footer px-0 py-2">
                          <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="dropdown-item py-[0.6rem] px-[1.25rem] text-base block w-full ai-icon"
                          >
                            <svg
                              class="profle-logout inline-block"
                              xmlns="http://www.w3.org/2000/svg"
                              width="18"
                              height="18"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="#ff7979"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            >
                              <path
                                d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"
                              ></path>
                              <polyline points="16 17 21 12 16 7"></polyline>
                              <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span class="ml-2 text-danger text-[13px]">
                              Cerrar sesión
                            </span>
                          </Link>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </template>
    <slot />
  </WebLayout>
</template>
