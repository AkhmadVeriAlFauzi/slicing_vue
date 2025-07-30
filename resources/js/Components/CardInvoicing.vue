<template>
  <div class="grid grid-cols-4 gap-6 mb-6">
    <CardItem title="1234" subtitle="Sent" color="#4F45B6" chart="/images/chart-1.png" />
    <CardItem title="654" subtitle="Pending" color="#F8C140" chart="/images/chart-3.png" />
    <CardItem title="756" subtitle="Unpaid" color="#F58869" chart="/images/chart-2.png" />
    <CardItem title="456" subtitle="Paid" color="#64C4F7" chart="/images/chart-4.png" />
  </div>
</template>

<script setup>
import CardItem from './CardItem.vue'
</script>
