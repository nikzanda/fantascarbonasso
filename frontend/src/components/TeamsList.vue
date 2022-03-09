<template>
  <div class="text-center">
    <v-chip v-for="team in teams" :key="team.id" class="ml-2">
      {{ team.name }} - {{ team.points }}
    </v-chip>
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "TeamsList",
  computed: mapState("team", ["teams"]),
};
</script>
