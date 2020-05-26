<template>
  <div>
    <modal
      v-if="modalImage"
      @close="modalImage = false"
      bgModal="transparent"
      :showClose="false"
      style="z-index:100000"
    >
      <div>
        <img class="mx-auto" :src="'/data_file/' + modalImageData" />
      </div>
    </modal>
    <div class="w-full">
      <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Latest Reports
      </p>
      <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white rounded">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Nama Penyumbang</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Jenis</th>
              <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Jumlah</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Keterangan Jumlah</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Foto</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Deskripsi</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm" v-if="isToken">Operasi</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <tr v-for="(table, index) in dataTable" :key="index">
              <td class="text-left py-3 px-4">{{table.nama}}</td>
              <td class="text-left py-3 px-4">
                <div>{{table.jenis}}</div>
              </td>
              <td class="text-left py-3 px-4">
                <div>{{table.jumlah}}</div>
              </td>
              <td class="text-left py-3 px-4">
                <div>{{table.keterangan_jumlah}}</div>
              </td>
              <td class="w-1/6 text-left py-3 px-4 bg-gray-200">
                <img
                  @click="showImage(table.file)"
                  style="cursor:pointer"
                  v-if="table.file !== 'no image'"
                  :src="'/data_file/' + table.file"
                />
                <div v-else>{{table.file}}</div>
              </td>
              <td class="text-left py-3 px-4 w-1/3">{{table.deskripsi}}</td>
              <td class="text-left py-3 px-4" v-if="isToken">
                <button
                  @click="deletePost(table.id)"
                  class="bg-gray-300 hover:bg-gray-400 bg-red-800 font-bold py-2 px-4 rounded inline-flex items-center"
                >
                  <span class="fas fa-trash text-gray-100" ></span>
                </button>
              </td>
            </tr>
            <!-- <tr class="bg-gray-200">
              <td class="w-1/3 text-left py-3 px-4">Emma</td>
              <td class="w-1/3 text-left py-3 px-4">Johnson</td>
              <td class="text-left py-3 px-4">
                <a class="hover:text-blue-500" href="tel:622322662">622322662</a>
              </td>
              <td class="text-left py-3 px-4">
                <a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a>
              </td>
            </tr>-->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import modal from "./modal";
import { mapState } from "vuex";
export default {
  components: {
    modal
  },
  data() {
    return {
      dataTable: [],
      modalImageData: "",
      modalImage: false
    };
  },
  mounted() {
    if (localStorage.getItem("users")) {
      this.$axios.get(`${this.$baseUrl}zakatall`).then(res => {
        if (this.isArray(res.data)) {
          this.dataTable = res.data;
        } else {
          this.dataTable.length = 0;
          this.dataTable.push(res.data);
        }
      });
    }
  },
  computed: {
    ...mapState({
      refreshForm: state => state.refreshForm
    }),
    isToken() {
      return localStorage.getItem("users") ? true : false;
    }
  },
  watch: {
    refreshForm(val) {
      this.$axios.get(`${this.$baseUrl}zakatall`).then(res => {
        if (this.isArray(res.data)) {
          this.dataTable = res.data;
        } else {
          this.dataTable.length = 0;
          this.dataTable.push(res.data);
        }
      });
    }
  },
  methods: {
    showImage(image) {
      this.modalImage = true;
      this.modalImageData = image;
    },
    isArray(obj) {
      return Object.prototype.toString.call(obj) === "[object Array]";
    },
    deletePost(id) {
      this.$axios.delete(`${this.$baseUrl}zakat/${id}`).then((res) => {
        if (this.isArray(res.data)) {
          this.dataTable = res.data;
        } else {
          this.dataTable.length = 0;
          this.dataTable.push(res.data);
        }
      })
    }
  }
};
</script>