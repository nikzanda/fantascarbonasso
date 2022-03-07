export const namespaces = true;

export const state = {
  events: [],
};

export const mutations = {
  MUTATE(state, payload) {
    state[payload.key] = payload.value;
  },
  ADD(state, newEvent) {
    state.events.push(newEvent);
  },
};

export const actions = {
  getEvents({ commit }) {
    this._vm
      .$axios("/event")
      .then(({ data: value }) => commit("MUTATE", { key: "events", value }))
      .catch(console.error);
  },
  createEvent({ commit }, payload) {
    return this._vm.$axios
      .post("/event", payload)
      .then(({ data }) => {
        commit("ADD", data);
        return data;
      })
      .catch(Promise.reject);
  },
};
