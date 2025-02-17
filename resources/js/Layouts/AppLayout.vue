<template>
    <div>
      <admin-sidebar />
      <div class="relative md:ml-64 bg-blueGray-100">
        <admin-navbar />
        <admin-header />
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
          <slot />
          <admin-footer />
        </div>
      </div>
    </div>
  
  
  </template>

<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import AdminNavbar from '@/Admin/AdminNavbar.vue';
import AdminSidebar from '@/Admin/Sidebar/AdminSidebar.vue';
import AdminHeader from '@/Admin/AdminHeader.vue';
import AdminFooter from '@/Admin/AdminFooter.vue';
// import Banner from '@/Components/Banner.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};
</script>
