import Vue from "vue";
import Vuex from "vuex";
import * as event from "@/store/modules/event";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    event,
  },
});
