<template>
  <div>
    <form class="w-full" @submit.prevent="postData">
      <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full px-3 mb-3 md:mb-0">
          <label
            class="block uppercase tracking-wide text-left text-gray-700 text-xs font-bold mb-2"
            for="grid-penerima"
          >Penyumbang</label>
          <input
            v-model="post.nama"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-penerima"
            type="text"
            placeholder="Nama Penyumbang"
          />
          <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
        </div>
        <div class="w-full md:w-1/4 px-3">
          <label
            class="block uppercase tracking-wide text-left text-gray-700 text-xs font-bold mb-2"
            for="grid-jenis"
          >Jenis</label>
          <div class="relative">
            <select
              v-model="post.jenis"
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-jenis"
            >
              <option>Uang</option>
              <option>Makanan Pokok</option>
            </select>
            <div
              class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
            >
              <svg
                class="fill-current h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/4 px-3">
          <label
            class="block uppercase tracking-wide text-left text-gray-700 text-xs font-bold mb-2"
            for="grid-jumlah"
          >Jumlah</label>

          <input
            v-model="post.jumlah"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-jumlah"
            type="text"
            placeholder="0"
          />
        </div>
        <div class="w-full md:w-1/4 px-3">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="grid-satuan"
          >Satuan</label>

          <div class="relative">
            <select
              v-model="satuan"
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-satuan"
            >
              <option>Kg</option>
              <option>Rp</option>
              <option>gram</option>
            </select>
            <div
              class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
            >
              <svg
                class="fill-current h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/4 px-3">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="grid-Keterangan"
          >Ket. Jumlah</label>

          <div class="relative">
            <select
              v-model="post.keterangan_jumlah"
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-Keterangan"
              disabled  
            >
              <!-- <option>Shadaqah</option> -->
              <option>Zakat</option>
            </select>
            <div
              class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
            >
              <svg
                class="fill-current h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full px-3 mb-6">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="grid-foto"
          >Foto</label>
          <input
            @change="fileUpload($event)"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-foto"
            type="file"
            placeholder="Albuquerque"
          />
        </div>
        <div class="w-full px-3 mb-6">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="grid-Deskripsi"
          >Deskripsi</label>
          <textarea
            v-model="post.deskripsi"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-Deskripsi"
            placeholder="Deskripsi"
          />
        </div>
        <div class="w-full px-3 mb-6">
          <input
            type="submit"
            value="Selesai"
            style="cursor:pointer"
            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
          />
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: {
        nama: "",
        jenis: "Uang",
        file: {},
        jumlah: "",
        keterangan_jumlah: "Zakat",
        deskripsi: ""
      },
      satuan: "Kg"
    };
  },
  methods: {
    postData() {
      if (this.post.jumlah.match(/^-?\d*(\.\d+)?$/)) {
        let data = new FormData();
        data.append("nama", this.post.nama);
        data.append("jenis", this.post.jenis);
        data.append(
          "file",
          this.post.file.target ? this.post.file.target.files[0] : null
        );
        data.append(
          "jumlah",
          this.satuan == "Rp"
            ? this.satuan + "." + this.tocomma(this.post.jumlah)
            : this.tocomma(this.post.jumlah) + " " + this.satuan
        );
        data.append("deskripsi", this.post.deskripsi);
        data.append("keterangan_jumlah", this.post.keterangan_jumlah);
        //   console.log(data);
        this.$axios.post(`${this.$baseUrl}zakat`, data).then(res => {
          this.$store.commit("dynamic", {
            key: "refreshForm",
            value: res.data
          });
          this.$emit("wantClose", res.data);
        });
      } else {
        alert("Jumlah harus berupa angka");
      }
    },
    fileUpload(e) {
      this.post.file = e;
    },
    regexFakePath(path) {
      return path.replace(/C:\\fakepath\\/, "");
    },
    tocomma(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
  }
};
</script>