<template>
  <div class="flex">
    <Sidebar />
    <Topbar />

    <main class="ml-20 w-full min-h-screen">
      <slot />
    </main>
  </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar.vue'
</script>
