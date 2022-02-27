<template>
  <v-card class="mx-auto">
    <v-form v-model="valid" ref="form">
      <!-- Team -->
      <v-autocomplete
        v-model="form.team_id"
        :items="teams"
        :rules="[(v) => !!v || 'Team obbligatorio']"
        label="Team"
        required
      />

      <!-- Category -->
      <v-autocomplete
        v-model="form.category_id"
        :items="categories"
        :rules="[(v) => !!v || 'Categoria obbligatoria']"
        label="Categoria"
        required
      />

      <!-- Created by Team Leader -->
      <v-checkbox
        v-model="form.created_by_leader"
        label="Creato dal Team Leader"
      />

      <v-card-actions>
        <v-btn :disabled="!valid" color="success" class="mr-4" @click="submit">
          Invia
        </v-btn>

        <v-btn color="error" class="mr-4" @click="reset"> Annulla </v-btn>
      </v-card-actions>
    </v-form>
  </v-card>
</template>

<script>
export default {
  name: "CreateEvent",
  data: () => ({
    teams: [],
    categories: [],
    valid: false,
    form: {
      team_id: undefined,
      category_id: undefined,
      created_by_leader: false,
    },
  }),
  methods: {
    reset() {
      this.$refs.form.reset();
    },
    submit() {
      this.$refs.form.validate();
    },
  },
};
</script>
