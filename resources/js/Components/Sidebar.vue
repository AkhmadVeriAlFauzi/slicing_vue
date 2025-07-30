<template>
  <aside
    class="w-[5%] h-screen bg-white text-blue-500 flex flex-col items-center py-6 space-y-6 fixed top-0 left-0 border-r border-r-[#F5EFFC]"
  >
    <a href="/dashboard" title="Logo" class="hover:text-blue-400">
      <img :src="'/icons/logo.png'" alt="Logo" class="w-8 h-8 mb-4" />
    </a>
    <a href="/invoicing" title="Dashboard" class="hover:text-blue-400">
      <img :src="'/icons/dashboard.png'" alt="Dashboard" class="w-8 h-8" />
    </a>
    <a href="/invoicing" title="Email" class="hover:text-blue-400">
      <img :src="'/icons/email.png'" alt="Email" class="w-8 h-8" />
    </a>
    <a href="/invoicing" title="Contact" class="hover:text-blue-400">
      <img :src="'/icons/contact.png'" alt="Contact" class="w-8 h-8" />
    </a>
    <a href="/invoicing" title="Crypto" class="hover:text-blue-400">
      <img :src="'/icons/crypto.png'" alt="Crypto" class="w-8 h-8" />
    </a>
    <a href="/invoicing" title="Kanban" class="hover:text-blue-400">
      <img :src="'/icons/kanban.png'" alt="Kanban" class="w-8 h-8" />
    </a>
    <a
      href="/invoicing"
      class="w-full flex justify-center py-2"
      :class="{ 'border-r-4 border-[#4F45B6]': $page.url.startsWith('/invoicing') }"
      title="Invoicing"
    >
      <img :src="'/icons/invoicing.png'" alt="Invoicing" class="w-8 h-8" />
    </a>
    <a href="/invoicing" title="Banking" class="hover:text-blue-400">
      <img :src="'/icons/banking.png'" alt="Banking" class="w-8 h-8" />
    </a>
    <a href="/invoicing" title="Ticketing" class="hover:text-blue-400">
      <img :src="'/icons/ticketing.png'" alt="Ticketing" class="w-8 h-8" />
    </a>
  </aside>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
</script>
