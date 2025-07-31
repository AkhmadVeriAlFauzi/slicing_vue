<template>
  <div class="overflow-y-hidden rounded-xl">
    <table class="min-w-full divide-y divide-[#F5EFFC]">
      <thead class="bg-[#F5EFFC] text-[#4A4A4A] text-sm">
        <tr class="border-x-2 border-b-2 border-[#F5EFFC]">
          <th class="text-left px-4 py-6 font-medium">ID</th>
          <th class="text-left px-4 py-6 font-medium">Nama</th>
          <th class="text-left px-4 py-6 font-medium">Tanggal</th>
          <th class="text-left px-4 py-6 font-medium">Jumlah</th>
          <th class="text-left px-4 py-6 font-medium">Keterangan</th>
          <th class="text-center px-4 py-6 font-medium">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-sm text-[#4A4A4A]">
        <tr
          v-for="item in tabunganList"
          :key="item.id"
          class="hover:bg-[#FAF9FF] border-x-2 border-b-2 border-[#F5EFFC]"
        >
          <td class="px-4 py-3">{{ item.id }}</td>
          <td class="px-4 py-3">{{ item.nama }}</td>
          <td class="px-4 py-3">{{ item.tanggal }}</td>
          <td class="px-4 py-3">Rp {{ Number(item.amount).toLocaleString('id-ID') }}</td>
          <td class="px-4 py-3">{{ item.keterangan }}</td>
          <td class="px-4 py-3 text-center">
            <div class="flex justify-center items-center gap-3">
              <button @click="editItem(item)" class="bg-green-500 px-3 py-1 rounded-md text-white">Edit</button>
              <button @click="deleteItem(item.id)" class="bg-red-500 px-3 py-1 rounded-md text-white">Delete</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Optional: Pagination Dummy -->
    <div class="flex items-center justify-between px-4 py-5 text-sm text-gray-500 border-x-2 border-b-2 border-[#F5EFFC] rounded-b-xl">
      <div>
        Menampilkan <span class="font-medium text-black">{{ tabunganList.length }}</span> data dari <span class="font-medium text-black">{{ tabunganList.length }}</span> total data
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: "TabunganTable",
  data() {
    return {
      tabunganList: [],
    };
  },
  mounted() {
    this.fetchData()
  },
  methods: {
    fetchData() {
      axios.get('http://localhost:8000/api/tabungan')
        .then(response => {
          this.tabunganList = response.data
        })
        .catch(error => {
          console.error('❌ Gagal ambil data tabungan:', error)
        })
    },
    editItem(item) {
      alert(`Edit data: ${item.nama}`)
      // bisa autofill ke form kanan, tinggal emit event
    },
    deleteItem(id) {
      if (confirm("Yakin mau hapus data ini?")) {
        axios.delete(`http://localhost:8000/api/tabungan/${id}`)
          .then(() => {
            this.fetchData() // refresh data
          })
          .catch(err => {
            console.error('❌ Gagal hapus data:', err)
          })
      }
    },
  },
};
</script>
