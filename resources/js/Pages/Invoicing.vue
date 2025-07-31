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
import axios from 'axios'
import { ref, onMounted } from 'vue'

const nama = ref('')
const tanggal = ref('')
const amount = ref('')
const keterangan = ref('')
const selectedId = ref(null) // 👉 buat edit

const tabunganList = ref([]) // 👉 data tabungan

// axios config
const api = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: {
    Accept: 'application/json',
  }
})

// ✅ Format ke MySQL date
function formatDateToMySQL(dateInput) {
  const date = new Date(dateInput)
  const year = date.getFullYear()
  const month = String(date.getMonth() + 1).padStart(2, '0')
  const day = String(date.getDate()).padStart(2, '0')
  return `${year}-${month}-${day}`
}

// ✅ Create / Update Handler
function handleConfirm() {
  const formattedDate = formatDateToMySQL(tanggal.value)
  const payload = {
    nama: nama.value,
    tanggal: formattedDate,
    amount: parseInt(amount.value),
    keterangan: keterangan.value,
  }

  const request = selectedId.value
    ? api.put(`/tabungan/${selectedId.value}`, payload)
    : api.post('/tabungan', payload)

  request
    .then(res => {
      alert(selectedId.value ? '✅ Data berhasil diupdate' : '✅ Data berhasil ditambahkan')
      resetForm()
      fetchData()
    })
    .catch(err => {
      console.error('❌ Gagal simpan data:', err)
      alert('❌ Gagal simpan data.')
    })
}

// ✅ Reset form
function resetForm() {
  nama.value = ''
  tanggal.value = ''
  amount.value = ''
  keterangan.value = ''
  selectedId.value = null
}

// ✅ Fetch data dari backend
function fetchData() {
  api.get('/tabungan')
    .then(res => {
      tabunganList.value = res.data
    })
    .catch(err => {
      console.error('❌ Gagal ambil data:', err)
    })
}

// ✅ Handle edit dari table
function handleEditSelected(item) {
  nama.value = item.nama
  tanggal.value = item.tanggal
  amount.value = item.amount
  keterangan.value = item.keterangan
  selectedId.value = item.id
}

// ✅ delete item (opsional kalau mau dari sini juga)
function deleteItem(id) {
  if (confirm("Yakin hapus data ini?")) {
    api.delete(`/tabungan/${id}`)
      .then(() => fetchData())
      .catch(err => console.error('❌ Gagal hapus data:', err))
  }
}

onMounted(() => {
  fetchData()
})
</script>

<template>
  <AppLayout>
    <Topbar />
    <div class="flex gap-6">
      <!-- Kiri -->
      <div class="w-[75%] px-6 py-6">
        <h1 class="text-2xl font-bold mb-4">Invoicing</h1>
        <CardInvoicing />
        <div class="flex justify-between items-center mb-4">
          <h1 class="text-lg font-bold mb-4">Savings</h1>
        </div>

        <!-- Tabel -->
        <div class="overflow-y-hidden rounded-xl">
          <table class="min-w-full divide-y divide-[#F5EFFC]">
            <thead class="bg-[#F5EFFC] text-[#4A4A4A] text-sm">
              <tr class="border-x-2 border-b-2 border-[#F5EFFC]">
                <th class="text-left px-4 py-6 font-medium">Nama</th>
                <th class="text-left px-4 py-6 font-medium">Tanggal</th>
                <th class="text-left px-4 py-6 font-medium">Jumlah</th>
                <th class="text-left px-4 py-6 font-medium">Keterangan</th>
                <th class="text-center px-4 py-6 font-medium w-[1%] whitespace-nowrap">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-sm text-[#4A4A4A]">
              <tr
                v-for="item in tabunganList"
                :key="item.id"
                class="hover:bg-[#FAF9FF] border-x-2 border-b-2 border-[#F5EFFC]"
              >
                <td class="px-4 py-3">{{ item.nama }}</td>
                <td class="px-4 py-3">{{ item.tanggal }}</td>
                <td class="px-4 py-3">Rp {{ Number(item.amount).toLocaleString('id-ID') }}</td>
                <td class="px-4 py-3">{{ item.keterangan }}</td>
                <td class="px-4 py-3 text-center">
                  <div class="flex justify-center items-center gap-3">
                    <button @click="handleEditSelected(item)" class="bg-green-500 px-3 py-1 rounded-md text-white">Edit</button>
                    <button @click="deleteItem(item.id)" class="bg-red-500 px-3 py-1 rounded-md text-white">Delete</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- Pagination Dummy -->
          <div class="flex items-center justify-between px-4 py-5 text-sm text-gray-500 border-x-2 border-b-2 border-[#F5EFFC] rounded-b-xl">
            <div>
              Menampilkan <span class="font-medium text-black">{{ tabunganList.length }}</span> data dari
              <span class="font-medium text-black">{{ tabunganList.length }}</span> total data
            </div>
          </div>
        </div>
      </div>

      <!-- Kanan -->
      <div class="w-[25%] bg-[#F5EFFC] bg-opacity-50 h-auto p-6">
        <div class="flex flex-col gap-4">
          <h1 class="font-bold text-md">My Card</h1>
          <BankingCard />
          <h1 class="font-bold text-md">Start Savings</h1>
          <div class="w-full h-full flex flex-col gap-1 text-black">
            <TabSelector @tabChanged="handleTabChange" />
            <div class="w-full py-3">
              <Field v-model="nama" label="Nama" placeholder="Masukkan nama" />
            </div>
            <div class="w-full py-3">
              <Field v-model="tanggal" label="Tanggal" placeholder="Contoh: 2025-07-31" type="date" />
            </div>
            <div class="w-full py-3">
              <Field v-model="amount" label="Jumlah Tabungan" placeholder="Masukkan jumlah" icon="/icons/Money.png" />
            </div>
            <div class="w-full py-3">
              <Field v-model="keterangan" label="Keterangan" placeholder="Masukkan keterangan" />
            </div>
            <div class="w-full py-3">
              <Confirm :label="selectedId ? 'Update' : 'Saving Now'" @click="handleConfirm" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
