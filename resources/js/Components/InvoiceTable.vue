<template>
  <div class="overflow-y-hidden rounded-xl">
    <table class="min-w-full divide-y divide-[#F5EFFC]">
      <thead class="bg-[#F5EFFC] text-[#4A4A4A] text-sm">
        <tr class="border-x-2 border-b-2 border-[#F5EFFC]">
          <th class="text-left px-4 py-6 font-medium">Invoice ID</th>
          <th class="text-left px-4 py-6 font-medium">Date</th>
          <th class="text-left px-4 py-6 font-medium">Amount</th>
          <th class="text-left px-4 py-6 font-medium">Due Date</th>
          <th class="text-left px-4 py-6 font-medium">Status</th>
          <th class="text-center px-4 py-6 font-medium"></th>
        </tr>
      </thead>
      <tbody class="text-sm text-[#4A4A4A]">
        <tr v-for="(invoice, index) in invoices" :key="index" class="hover:bg-[#FAF9FF] border-x-2 border-b-2 border-[#F5EFFC]">
          <td class="px-4 py-3">{{ invoice.id }}</td>
          <td class="px-4 py-3">{{ invoice.date }}</td>
          <td class="px-4 py-3">{{ invoice.amount }}</td>
          <td class="px-4 py-3">{{ invoice.dueDate }}</td>
          <td class="px-4 py-3">
            <span :class="statusClass(invoice.status)"
              class="inline-flex items-center justify-center gap-1.5 w-20 h-8 text-xs font-medium rounded-lg">
              <img :src="getStatusIcon(invoice.status)" alt="status icon" class="w-3.5 h-3.5" />
              {{ invoice.status }}
            </span>
          </td>
          <td class="px-4 py-3 text-center">
            <div class="flex justify-center items-center gap-3">
              <a href="/invoice/print" title="Print">
                <img :src="'/icons/print.png'" alt="Print" class="w-4 h-4" />
              </a>
              <div class="relative">
                <img
                  :src="'/icons/Dots.png'"
                  alt="Lainnya"
                  class="w-4 h-4 cursor-pointer"
                  @click="toggleMenu(index)"
                />
                <div
                  v-if="activeMenu === index"
                  class="absolute right-0 mt-2 w-28 bg-white rounded-md shadow-md border z-10"
                >
                  <button
                    class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100"
                    @click="editInvoice(invoice)"
                  >
                    Edit
                  </button>
                  <button
                    class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-red-500"
                    @click="deleteInvoice(invoice.id)"
                  >
                    Delete
                  </button>
                </div>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="flex items-center justify-between px-4 py-5 text-sm text-gray-500 border-x-2 border-b-2 border-[#F5EFFC] rounded-b-xl">
      <div>
        Showing <span class="font-medium text-black">1</span> - <span class="font-medium text-black">5</span> from
        <span class="font-medium text-black">100</span> entries
      </div>

      <div class="flex justify-center items-center gap-3">
        <a href="#" title="" class="font-bold rounded-lg">
          <img :src="'/icons/dropdown.png'" alt="Prev" class="w-5 h-5" />
        </a>
        <a href="#" class="font-bold text-blue-500 border-2 border-blue-600 text-center w-8 h-8 rounded-lg flex items-center justify-center">1</a>
        <a href="#" class="font-bold text-[#D1D1D1] border-2 border-[#D1D1D1] text-center w-8 h-8 rounded-lg flex items-center justify-center">2</a>
        <a href="#" class="font-bold text-[#D1D1D1] border-2 border-[#D1D1D1] text-center w-8 h-8 rounded-lg flex items-center justify-center">3</a>
        <a href="#" title="" class="font-bold rounded-lg">
          <img :src="'/icons/dropdown.png'" alt="Next" class="w-5 h-5 rotate-180" />
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "InvoiceTable",
  data() {
    return {
      invoices: [
        { id: "#123456", date: "21/03/2021", amount: "$145.00", dueDate: "21/04/2021", status: "Paid" },
        { id: "#123457", date: "21/03/2021", amount: "$45.00", dueDate: "21/04/2021", status: "Unpaid" },
        { id: "#123458", date: "21/03/2021", amount: "$75.00", dueDate: "21/04/2021", status: "Paid" },
        { id: "#123459", date: "21/03/2021", amount: "$345.00", dueDate: "21/04/2021", status: "Unpaid" },
        { id: "#123460", date: "21/03/2021", amount: "$454.00", dueDate: "21/04/2021", status: "Paid" },
      ],
      activeMenu: null, // Index menu dropdown yang sedang aktif
    };
  },
  methods: {
    getStatusIcon(status) {
      return status === "Paid"
        ? '/icons/Check.png'
        : '/icons/close.png';
    },
    statusClass(status) {
      return status === "Paid"
        ? 'bg-[#4F45B61A] text-[#4F45B6]'
        : 'bg-[#F840401A] text-[#F84040]';
    },
    toggleMenu(index) {
      this.activeMenu = this.activeMenu === index ? null : index;
    },
    editInvoice(invoice) {
      alert(`Edit invoice ${invoice.id}`);
      this.activeMenu = null;
    },
    deleteInvoice(id) {
      if (confirm("Are you sure you want to delete this invoice?")) {
        this.invoices = this.invoices.filter(invoice => invoice.id !== id);
      }
      this.activeMenu = null;
    },
  },
};
</script>
