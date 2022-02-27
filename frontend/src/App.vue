<template>
  <v-app>
    <v-main>
      <h1>FANTASCARBONASSO</h1>
      <v-row align="center" justify="center">
        <v-col xl="6" lg="6" md="12">
          <h2>Inserisci evento</h2>
          <CreateEvent @refresh="getEvents" />
        </v-col>
      </v-row>
      <br />
      <v-divider></v-divider>
      <br />
      <EventsList :events="events" />
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
    events: [],
  }),
  created() {
    this.getEvents();
  },
  methods: {
    getEvents() {
      this.$axios("/event")
        .then(({ data }) => (this.events = data))
        .catch(console.error);
    },
  },
};
</script>
