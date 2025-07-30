<template>
  <div class="relative">
    <!-- Trigger -->
    <div
      class="w-full bg-white text-sm text-[#4A4A4A] rounded-lg px-4 py-3 pr-12 border border-gray-300 cursor-pointer flex justify-between items-center"
      @click="isOpen = !isOpen"
    >
      <span>{{ selectedLabel }}</span>
      <div class="absolute right-4">
    <img :src="'/icons/dropdown-blue.png'" class="w-4 h-auto" alt="dropdown icon" />
  </div>
    </div>

    <!-- Dropdown List -->
    <ul
      v-if="isOpen"
      class="absolute z-10 mt-1 w-full bg-white border border-gray-200 rounded-lg shadow-md max-h-48 overflow-auto"
    >
      <li
        v-for="(item, index) in options"
        :key="index"
        class="px-4 py-2 text-sm text-[#4A4A4A] hover:bg-[#F5EFFC] cursor-pointer"
        @click="selectOption(item)"
      >
        {{ item }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, watch, computed } from 'vue'

const props = defineProps({
  modelValue: String,
  options: {
    type: Array,
    default: () => []
  }
})

const emit = defineEmits(['update:modelValue'])

const isOpen = ref(false)

// Pilih value yang ditampilkan (default/placeholder)
const selectedLabel = computed(() => {
  return props.modelValue || 'Select from list'
})

// Update saat item diklik
function selectOption(value) {
  emit('update:modelValue', value)
  isOpen.value = false
}

// Close dropdown saat klik di luar
function handleClickOutside(event) {
  if (!event.target.closest('.relative')) {
    isOpen.value = false
  }
}

watch(isOpen, (open) => {
  if (open) document.addEventListener('click', handleClickOutside)
  else document.removeEventListener('click', handleClickOutside)
})
</script>
