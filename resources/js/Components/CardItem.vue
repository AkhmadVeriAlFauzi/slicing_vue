<template>
  <div class="relative bg-white border border-[#F5EFFC] rounded-xl px-6 py-6 shadow-sm overflow-hidden">
    <div class="relative z-10 mb-8">
      <h3 class="text-2xl font-bold leading-none mb-3" :style="{ color }">{{ title }}</h3>
      <h3 class="text-sm text-[#A89BB3] font-medium leading-tight">{{ subtitle }}</h3>
    </div>
    <div class="absolute bottom-4 left-6 right-6 flex items-end justify-between z-0">
      <div class="flex items-center gap-2">
        <img :src="'/icons/arrow.png'" alt="Arrow" class="w-5 h-5" />
        <h3 class="text-xs text-[#A89BB3] font-medium">+ 15%</h3>
      </div>
      <img :src="chart" alt="Chart" class="w-16 h-16" />
    </div>
  </div>
</template>

<script setup>
defineProps(['title', 'subtitle', 'color', 'chart'])
</script>
