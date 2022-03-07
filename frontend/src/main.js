import Vue from "vue";
import App from "./App.vue";
import vuetify from "./plugins/vuetify";
import axios from "axios";
import VueAxios from "vue-axios";
import store from "./store/store";

Vue.use(VueAxios, axios);
Vue.config.productionTip = false;

Vue.prototype.$axios = axios.create({
  baseURL: process.env.VUE_APP_API_BASE_URL,
});

new Vue({
  vuetify,
  store,
  render: (h) => h(App),
}).$mount("#app");
