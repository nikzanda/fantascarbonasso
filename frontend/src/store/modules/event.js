export const namespaced = true;

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
  createEvent({ commit, rootState }, payload) {
    return this._vm.$axios
      .post("/event", payload)
      .then(({ data }) => {
        commit("ADD", data);

        const team = rootState.team.teams.find(({ id }) => id === data.team_id);
        if (team) {
          team.points +=
            data.category.points *
            (data.category.is_bonus ? 1 : -1) *
            (data.created_by_leader ? 2 : 1);

          commit("team/UPDATE", team, { root: true });
        }

        return data;
      })
      .catch(Promise.reject);
  },
};
