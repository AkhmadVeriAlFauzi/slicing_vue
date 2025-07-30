<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import CardInvoicing from '@/Components/CardInvoicing.vue'
import Topbar from '../Components/Topbar.vue'
import InvoiceTable from '@/Components/InvoiceTable.vue'
import BankingCard from '@/components/BankingCard.vue'
import TabSelector from '@/components/TabSelector.vue' 
import Dropdown from '@/components/Dropdown.vue' 
import Field from '@/components/Field.vue' 
import Confirm from '@/Components/Confirm.vue'

import { ref } from 'vue'

const selectedName = ref('')
const referenceText = ref('')
const notesText = ref('')

function handleConfirm() {
    console.log('Recipient:', selectedName.value)
    console.log('Reference:', referenceText.value)
    console.log('Notes:', notesText.value)
    console.log('Confirmed clicked!')
}


// import SideRightPanel from '@/Components/SideRightPanel.vue'
</script>

<template>
  <AppLayout>
    <Topbar />
    <div class="flex gap-6">
      <!-- Konten Kiri (75%) -->
      <div class="w-[75%] px-6 py-6">
        <h1 class="text-2xl font-bold mb-4">Invoicing</h1>
        <CardInvoicing />
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-lg font-bold mb-4">Latest Invoicing</h1>
            <!-- <button class="bg-[#4F45B6] text-white px-4 py-2 rounded-lg">Add</button> -->
        </div>
        <InvoiceTable />
      </div>

      <!-- Konten Kanan (25%) -->
      <div class="w-[25%] bg-[#F5EFFC] bg-opacity-50 h-auto p-6">
        <div class="flex flex-col gap-4">
            <h1 class="font-bold text-md">My Card</h1>
            <BankingCard />
            <h1 class="font-bold text-md">Send Invoices</h1>
            <div class="w-full h-52 flex flex-col gap-1 text-black">
                <TabSelector @tabChanged="handleTabChange" />
                <div class="w-full py-3">
                    <h1 class="text-xs font-semibold mb-1 text-[#4A4A4A]">Recipient</h1>
                    <Dropdown
                    v-model="selectedName"
                    :options="['Raka Putra', 'Zara Wardani', 'Dina Amelia']"
                    />
                </div>
                <div class="w-full py-3">
                    <Field
                    v-model="amountText"
                    label="Amount"
                    placeholder="Insert amount"
                    icon="/icons/Money.png" 
                    />
                </div>
                <div class="w-full py-3">
                    <Field
                    v-model="referenceText"
                    label="Reference"
                    placeholder="Enter reference here"
                    />
                </div>
                <div class="w-full py-3">
                    <Confirm label="Send Now" @click="handleConfirm" />
                </div>
            </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>


