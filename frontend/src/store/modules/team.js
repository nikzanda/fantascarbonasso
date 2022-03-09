export const namespaced = true;

export const state = {
  teams: [],
};

export const mutations = {
  MUTATE(state, payload) {
    state[payload.key] = payload.value;
  },
};

export const actions = {
  getTeams({ commit }) {
    this._vm
      .$axios("/team")
      .then(({ data: value }) => commit("MUTATE", { key: "teams", value }))
      .catch(console.error);
  },
};
