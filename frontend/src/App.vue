<template>
  <v-app>
    <v-main>
      <h1 class="text-center">FANTASCARBONASSO</h1>
      <v-container fluid>
        <CreateEvent :dialog="dialog" @close="dialog = false" />

        <TeamsList />
        <EventsList />

        <v-fab-transition>
          <v-btn
            fab
            dark
            bottom
            right
            fixed
            color="success"
            @click="dialog = true"
          >
            <v-icon>mdi-plus</v-icon>
          </v-btn>
        </v-fab-transition>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import CreateEvent from "./components/CreateEvent";
import TeamsList from "./components/TeamsList";
import EventsList from "./components/EventsList";

export default {
  name: "App",
  components: {
    CreateEvent,
    TeamsList,
    EventsList,
  },
  data: () => ({
    speedDial: false,
    dialog: false,
  }),
};
</script>
