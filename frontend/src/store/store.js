import Vue from "vue";
import Vuex from "vuex";
import * as event from "@/store/modules/event.js";
import * as team from "@/store/modules/team.js";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    event,
    team,
  },
});
