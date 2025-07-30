<template>
  <div class="relative w-full h-52 bg-[#4F45B6] rounded-2xl p-6 flex flex-col gap-1 text-white overflow-hidden shadow-lg mb-4">
    <!-- Blur Decorations -->
    <div class="absolute -top-20 left-0 w-52 h-52 bg-[#4F45B6] opacity-100 blur-xl rounded-full z-0"></div>
    <div class="absolute -bottom-20 -left-10 w-52 h-52 bg-[#F58869] opacity-100 blur-xl rounded-full z-0"></div>
    <div class="absolute -bottom-10 -right-20 w-64 h-64 bg-[#F8C140] opacity-100 blur-xl rounded-full z-0"></div>

    <div class="flex justify-between relative z-10">
      <h1 class="text-sm">Name</h1>
      <h1 class="font-bold text-lg">.... .... .... <span class="font-medium">1234</span></h1>
    </div>

    <h1 class="font-bold text-xl mb-8 relative z-10">Nella Vita</h1>

    <div class="relative z-10">
      <h1 class="text-sm">Balance</h1>
      <div class="flex justify-between items-center">
        <h1 class="font-bold text-xl">{{ balance }}</h1>
        <img :src="circleImage" alt="circle" class="w-20 h-auto" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "BankingCard",
  props: {
    name: {
      type: String,
      default: "Nella Vita",
    },
    lastDigits: {
      type: String,
      default: "1234",
    },
    balance: {
      type: String,
      default: "$4811,21",
    },
    circleImage: {
      type: String,
      default: "/images/Circle.png", // path public, bisa disesuaikan
    },
  },
};
</script>
