<template>
  <v-app>
    <v-main>
      <h1 class="text-center">FANTASCARBONASSO</h1>
      <v-container fluid>
        <CreateEvent :dialog="dialog" @close="dialog = false" />

        <EventsList />

        <v-speed-dial
          v-model="speedDial"
          bottom
          right
          fixed
          direction="top"
          transition="slide-y-reverse-transition"
        >
          <template #activator>
            <v-btn
              v-model="speedDial"
              :color="speedDial ? 'error' : 'primary'"
              dark
              fab
            >
              <v-icon v-if="speedDial">mdi-close</v-icon>
              <v-icon v-else>mdi-plus</v-icon>
            </v-btn>
          </template>
          <v-btn fab dark small color="success" @click="dialog = true">
            <v-icon>mdi-plus</v-icon>
          </v-btn>
        </v-speed-dial>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import CreateEvent from "./components/CreateEvent";
import EventsList from "./components/EventsList";

export default {
  name: "App",
  components: {
    CreateEvent,
    EventsList,
  },
  data: () => ({
    speedDial: false,
    dialog: false,
  }),
};
</script>
