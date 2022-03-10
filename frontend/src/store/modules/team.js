export const namespaced = true;

export const state = {
  teams: [],
};

export const mutations = {
  MUTATE(state, payload) {
    state[payload.key] = payload.value;
  },
  UPDATE(state, updatedTeam) {
    const index = state.teams.findIndex(({ id }) => id === updatedTeam.id);
    if (~index) state.teams[index] = updatedTeam;
  },
};

export const actions = {
  getTeams({ commit }) {
    this._vm
      .$axios("/team")
      .then(({ data }) =>
        commit("MUTATE", {
          key: "teams",
          value: data.map((team) => ({ ...team, points: +team.points })),
        })
      )
      .catch(console.error);
  },
};
