<template>
  <v-app>
    <v-main>
      <h1>FANTASCARBONASSO</h1>
      <v-row align="center" justify="center">
        <v-col xl="6" lg="6" md="12">
          <h2>Inserisci evento</h2>
          <CreateEvent />
        </v-col>
      </v-row>
      <br />
      <v-divider></v-divider>
      <br />
      <EventsList />
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
};
</script>
