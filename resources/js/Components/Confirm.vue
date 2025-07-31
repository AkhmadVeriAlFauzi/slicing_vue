<template>
  <button
    class="relative text-center bg-[#4F45B6] w-full rounded-lg px-4 py-3 text-white text-sm hover:bg-[#3e3791] transition-colors"
    @click="emit('click')"
  >
    {{ label }}
  </button>
</template>

<script setup>
defineProps({
  label: {
    type: String,
    default: 'Confirm'
  }
})
const emit = defineEmits(['click'])
</script>
