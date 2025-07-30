<template>
  <div class="flex justify-between">
    <div
      @click="setActiveTab('important')"
      class="flex-1 text-center pb-2 cursor-pointer"
      :class="activeTab === 'important'
        ? 'border-b-4 border-[#4F45B6]'
        : 'border-b-2 border-[#A098AE] border-opacity-50 hover:border-[#A89BB3]'">
      <h1
        :class="activeTab === 'important'
          ? 'text-sm font-medium text-[#4F45B6]'
          : 'text-sm font-medium text-[#A89BB3]'">
        Important
      </h1>
    </div>

    <div
      @click="setActiveTab('socials')"
      class="flex-1 text-center pb-2 cursor-pointer"
      :class="activeTab === 'socials'
        ? 'border-b-4 border-[#4F45B6]'
        : 'border-b-2 border-[#A098AE] border-opacity-50 hover:border-[#A89BB3]'">
      <h1
        :class="activeTab === 'socials'
          ? 'text-sm font-medium text-[#4F45B6]'
          : 'text-sm font-medium text-[#A89BB3]'">
        Socials
      </h1>
    </div>
  </div>
</template>

<script>
export default {
  name: "TabSelector",
  data() {
    return {
      activeTab: "important",
    };
  },
  methods: {
    setActiveTab(tab) {
      this.activeTab = tab;
      // Bisa emit juga kalau perlu kasih info ke parent
      this.$emit("tabChanged", tab);
    },
  },
};
</script>
