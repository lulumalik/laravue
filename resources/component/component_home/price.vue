<template>
  <div class="bg-gray-100">
    <div class="container flex flex-wrap pt-4 pb-10 m-auto md:mt-15 lg:px-12 xl:px-16">
      <div class="w-full px-0 lg:px-4">
        <h2 class="px-12 text-base font-bold text-center md:text-2xl text-blue-700">Choose your plan</h2>
        <p
          class="py-1 text-sm text-center text-blue-700 mb-10"
        >It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
        <div class="flex flex-wrap items-center justify-center py-4 pt-0">
          <div
            v-for="(price, index) in dataPrice"
            :key="index"
            class="w-full p-4 md:w-1/2 lg:w-1/3 plan-card"
          >
            <label
              class="flex flex-col rounded-lg shadow-lg group relative cursor-pointer hover:shadow-2xl"
            >
              <div class="w-full px-4 py-6 rounded-t-lg card-section-1">
                <h3
                  class="mx-auto text-base font-semibold text-center underline text-blue-500 group-hover:text-white"
                >{{price.class_name}}</h3>
                <p
                  class="text-4xl font-bold text-center group-hover:text-white text-blue-500"
                >{{price.price > 0 ? 'Rp.' + tocomma(price.price) : 'FREE'}}</p>
                <!-- <p
                  class="text-xs text-center uppercase group-hover:text-white text-blue-500"
                >monthly</p>-->
              </div>
              <div
                class="flex flex-col items-center justify-center w-full h-full py-6 rounded-b-lg bg-blue-500"
              >
                <p class="text-xl text-white">Berlaku Selamanya</p>
                {{price}}
                <button
                  v-if="price.registered"
                  class="w-5/6 py-2 mt-2 font-semibold text-center uppercase bg-green-300 border border-transparent rounded text-gray-100"
                >Terdaftar</button>
                <button
                  v-else
                  @click="postPrice(price)"
                  class="w-5/6 py-2 mt-2 font-semibold text-center uppercase bg-white border border-transparent rounded text-blue-500"
                >Daftar</button>
              </div>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import jwt_decode from "jwt-decode";
export default {
  data() {
    return {
      dataPrice: [],
      price: [],
      jsonPackage: {}
    };
  },
  mounted() {
    var self = this;
    this.$axios.get(`${this.$baseUrl}package`).then(res => {
      this.price = res.data;
      if (localStorage.getItem("users")) {
        var idUser = jwt_decode(localStorage.getItem("users"));
        this.$axios
          .get(`${this.$baseUrl}user/${idUser.sub}`)
          .then(res => {
            // package yang tersimpan 
            var packageData = JSON.parse(res.data.package);
            packageData.registered.forEach(element => {
              self.$set(self.jsonPackage, element.id, element.name);
            });
            for (let index = 0; index < self.price.length; index++) {
              const element = self.price[index];
              console.log(element, self.jsonPackage, res.data)
              if (self.jsonPackage[element.id] === element.class_name) {
                self.dataPrice.push({
                  category: element.category,
                  class_name: element.class_name,
                  created_at: element.created_at,
                  id: element.id,
                  price: element.price,
                  updated_at: element.updated_at,
                  registered: true
                });
              } else {
                self.dataPrice.push(element);
              }
            }
            self.jsonPackage = {};
          })
          .catch(e => {
            this.dataPrice = this.price;
          });
      } else {
        this.dataPrice = this.price
      }
    });
  },
  computed: {
    isPackage() {
      return localStorage.getItem("users")
        ? localStorage.getItem("users")
        : false;
    }
  },
  methods: {
    tocomma(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },
    decode(data) {
      return jwt_decode(data).package;
    },
    postPrice(price) {
      var self = this;
      var id = price.id;
      if (localStorage.getItem("users")) {
        var idUser = jwt_decode(localStorage.getItem("users"));
        this.$axios.get(`${this.$baseUrl}user/${idUser.sub}`).then(res => {
          if (res.data.package !== null) {
            //
            self.jsonPackage = {};
            var packageData = JSON.parse(res.data.package),
              arrayPackage = [],
              postJSON = {
                id: id,
                created_at: new Date(),
                name: price.class_name
              };
            for (let index = 0; index < packageData.registered.length; index++) {
              const element = packageData.registered[index];
              arrayPackage.push(element)
            }
            arrayPackage.push(postJSON)
            this.$axios
              .post(`${this.$baseUrl}regpack`, {
                package: {
                  registered: arrayPackage
                }
              })
              .then(response => {
                localStorage.setItem("users", response.data.token);
                location.reload();
              });

          } else {
            this.$axios
              .post(`${this.$baseUrl}regpack`, {
                package: {
                  registered: [
                    {
                      id: id,
                      created_at: new Date(),
                      name: price.class_name
                    }
                  ]
                }
              })
              .then(response => {
                localStorage.setItem("users", response.data.token);
                location.reload();
              });
          }
        });
      } else {
        this.$router.push("/login");
      }
    }
  }
};
</script>