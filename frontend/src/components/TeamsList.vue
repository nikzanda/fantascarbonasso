<template>
  <div class="text-center">
    <v-chip v-for="team in teams" :key="team.id" class="ml-2">
      <v-icon v-if="team.showCrown" left color="orange">mdi-crown</v-icon>
      {{ team.name }}
      <v-avatar right class="green"> {{ team.points }} </v-avatar>
    </v-chip>
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "TeamsList",
  computed: {
    ...mapState("team", { teamsList: "teams" }),
    points() {
      return this.teamsList.map(({ points }) => points);
    },
    teams() {
      const indexMax = this.points.indexOf(Math.max(...this.points));
      return this.teamsList
        .map((team, index) => ({
          ...team,
          showCrown: index === indexMax,
        }))
        .sort((a, b) => b.points - a.points);
    },
  },
};
</script>
