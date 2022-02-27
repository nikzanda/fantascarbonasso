<template>
  <v-app>
    <v-main>
      <v-row align="center" justify="center">
        <v-col xl="6" lg="6" md="12">
          <h1>Inserisci evento</h1>
          <CreateEvent />
        </v-col>
      </v-row>
    </v-main>
  </v-app>
</template>

<script>
import CreateEvent from "./components/CreateEvent";

export default {
  name: "App",
  components: {
    CreateEvent,
  },
  data: () => ({
    //
  }),
};
</script>
