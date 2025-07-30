<template>
  <div class="flex items-center justify-between bg-white px-6 py-6 border-b border-b-[#F5EFFC]">
    <!-- Search Form -->
    <form action="/search" method="GET" class="w-[20%]">
      <div class="relative">
        <input type="text" name="query" placeholder="Search here..."
          class="text-md w-full pl-10 pr-4 py-2 rounded-xl bg-[#F5EFFC] focus:outline-none focus:ring-2 focus:ring-blue-400" />
        <span class="absolute inset-y-0 left-4 flex items-center text-[#A098AE]">
          <img :src="'/icons/magnifier.png'" alt="Search" class="w-4 h-4" />
        </span>
      </div>
    </form>

    <!-- Right Side -->
    <div class="flex items-center space-x-6">
      <!-- Language -->
      <div class="relative" @click="toggleLang">
        <button type="button"
          class="flex items-center gap-2 text-sm text-[#4A4A4A] px-4 py-2 rounded-xl border border-[#F5EFFC] focus:outline-none">
          <img :src="'/icons/United.png'" alt="Language" class="w-4 h-4" />
          <span>English (US)</span>
          <img :src="'/icons/dropdown.png'" alt="" class="w-4 h-4 -rotate-90" />
        </button>
        <div v-show="showLang" class="absolute right-0 mt-2 w-28 bg-white border border-gray-200 rounded-md shadow-md z-50">
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">English</a>
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bahasa</a>
        </div>
      </div>

      <!-- Icons -->
      <div class="flex items-center space-x-11">
        <div class="relative">
          <img :src="'/icons/Chat.png'" alt="Comment" class="w-6 h-6 opacity-100" />
          <span class="absolute -top-1 -right-1 text-xs bg-[#4F45B6] text-white rounded-md w-4 h-4 flex items-center justify-center">2</span>
        </div>
        <div class="relative">
          <img :src="'/icons/bell.png'" alt="Notification" class="w-6 h-6 opacity-100" />
          <span class="absolute -top-1 -right-1 text-xs bg-[#4F45B6] text-white rounded-md w-4 h-4 flex items-center justify-center">2</span>
        </div>
        <div>
          <img :src="'/icons/Setting.png'" alt="Settings" class="w-6 h-6 opacity-100" />
        </div>
      </div>

      <!-- User Info -->
      <div class="flex items-center space-x-3">
        <div class="w-10 h-10 rounded-md bg-[#A89BB3]"></div>
        <div class="text-left leading-tight">
          <div class="font-semibold text-sm text-gray-800">Zara Wardani</div>
          <div class="text-xs text-[#A89BB3]">Admin</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
const showLang = ref(false)
const toggleLang = () => {
  showLang.value = !showLang.value
}
</script>
