<template>
  <nav
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
  >
    <div
      class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
    >
      <!-- Toggler -->
      <button
        class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
        type="button"
        v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Brand -->
      <a
        class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
        href="/"
      >
        Vue Notus
      </a>
      <!-- User -->
      <ul class="md:hidden items-center flex flex-wrap list-none">
        <li class="inline-block relative">
          <notification-dropdown />
        </li>
        <li class="inline-block relative">
          <user-dropdown />
        </li>
      </ul>
      <!-- Collapse -->
      <div
        class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
        v-bind:class="collapseShow"
      >
        <!-- Collapse header -->
        <div
          class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
        >
          <div class="flex flex-wrap">
            <div class="w-6/12">
              <a
                class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                href="/"
              >
                Vue Notus
              </a>
            </div>
            <div class="w-6/12 flex justify-end">
              <button
                type="button"
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                v-on:click="toggleCollapseShow('hidden')"
              >
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-6 mb-4 md:hidden">
          <div class="mb-3 pt-0">
            <input
              type="text"
              placeholder="Search"
              class="border-0 px-3 py-2 h-12 border border-solid border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
            />
          </div>
        </form>

        <!-- Divider -->
        <hr class="my-4 md:min-w-full" />
        <!-- Heading -->
        
        <!-- Navigation -->

        <ul class="md:flex-col md:min-w-full flex flex-col list-none">
          <li class="items-center">
            <a
              href="/dashboard"
              @click.prevent="navigate('/dashboard')"
              class="text-xs uppercase py-3 font-bold block"
              :class="[isActive('/dashboard') ? 'text-emerald-500 hover:text-emerald-600' : 'text-blueGray-700 hover:text-blueGray-500']"
            >
              <i
                class="fas fa-tv mr-2 text-sm"
                :class="[isActive('/dashboard') ? 'opacity-75' : 'text-blueGray-300']"
              ></i>
              Dashboard
            </a>
          </li>
          <li class="items-center">
            <a
              href="/admin/customer"
              @click.prevent="navigate('/admin/customer')"
              class="text-xs uppercase py-3 font-bold block"
              :class="[isActive('/admin/customer') ? 'text-emerald-500 hover:text-emerald-600' : 'text-blueGray-700 hover:text-blueGray-500']"
            >
              <i
                class="fas fa-tools mr-2 text-sm"
                :class="[isActive('/admin/customer') ? 'opacity-75' : 'text-blueGray-300']"
              ></i>
              Customer
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { router } from '@inertiajs/vue3'; // Correct import for Inertia router
import NotificationDropdown from "@/Admin/Dropdowns/NotificationDropdown.vue";
import UserDropdown from "@/Admin/Dropdowns/UserDropdown.vue";

export default {
  data() {
    return {
      collapseShow: "hidden",
    };
  },
  mounted() {
    this.setActiveLink();
  },
  methods: {
    toggleCollapseShow(classes) {
      this.collapseShow = classes;
    },
    navigate(url) {
      router.visit(url); // Use router.visit for navigation
    },
    isActive(route) {
      return window.location.pathname === route;
    },
    setActiveLink() {
      const currentPath = window.location.pathname;
      const links = document.querySelectorAll('nav a');
      links.forEach(link => {
        if (link.getAttribute('href') === currentPath) {
          link.classList.add('text-emerald-500', 'hover:text-emerald-600');
          const icon = link.querySelector('i');
          if (icon) {
            icon.classList.add('opacity-75');
          }
        } else {
          link.classList.add('text-blueGray-700', 'hover:text-blueGray-500');
          const icon = link.querySelector('i');
          if (icon) {
            icon.classList.add('text-blueGray-300');
          }
        }
      });
    }
  },
  components: {
    NotificationDropdown,
    UserDropdown,
  },
};
</script>
