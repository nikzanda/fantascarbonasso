<template>
  <v-row>
    <v-card
      v-for="team in teams"
      :key="team.id"
      class="mx-auto my-3"
      min-width="10%"
    >
      <v-card-title>
        <v-avatar right :class="team.points >= 0 ? 'green' : 'red'">
          {{ team.name.charAt(0) }}
        </v-avatar>
        <p class="ml-3">{{ team.name }}</p>
      </v-card-title>

      <v-card-text class="text-center">
        <v-icon v-if="team.showCrown" left color="orange">mdi-crown</v-icon>
        <span>{{ team.points }}</span>
      </v-card-text>
    </v-card>
  </v-row>
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
