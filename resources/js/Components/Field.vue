<template>
  <div class="w-full">
    <h1 class="text-xs font-semibold mb-1 text-[#4A4A4A]">{{ label }}</h1>
    <div class="relative bg-white w-full rounded-lg px-4 py-3 text-[#4A4A4A] flex items-center gap-2">
      <img v-if="icon" :src="icon" alt="icon" class="w-4 h-4" />
      <input
        type="text"
        class="text-sm w-full outline-none"
        :placeholder="placeholder"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
      />
    </div>
  </div>
</template>

<script setup>
defineProps({
  label: String,
  placeholder: String,
  icon: String,
  modelValue: String
})

defineEmits(['update:modelValue'])
</script>
