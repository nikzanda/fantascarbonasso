<template>
  <v-card class="mx-auto">
    <v-form v-model="valid" ref="form">
      <v-card-text>
        <!-- Team -->
        <v-autocomplete
          v-model="form.team_id"
          :items="teams"
          :rules="[(v) => !!v || 'Team obbligatorio']"
          label="Team"
          item-text="name"
          item-value="id"
          required
        />

        <!-- Category -->
        <v-autocomplete
          v-model="form.category_id"
          :items="categories"
          :rules="[(v) => !!v || 'Categoria obbligatoria']"
          label="Categoria"
          item-text="description"
          item-value="id"
          required
        />

        <!-- Created by Team Leader -->
        <v-checkbox
          v-model="form.created_by_leader"
          label="Creato dal Team Leader"
        />
      </v-card-text>

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
  created() {
    this.getTeams();
    this.getCategories();
  },
  methods: {
    getTeams() {
      this.$axios("/team")
        .then(({ data }) => (this.teams = data))
        .catch(console.error);
    },
    getCategories() {
      this.$axios("/category")
        .then(({ data }) => (this.categories = data))
        .catch(console.error);
    },
    reset() {
      this.$refs.form.reset();
    },
    submit() {
      if (!this.$refs.form.validate()) return;

      this.$axios
        .post("/event", this.form)
        .then(() => this.$emit("refresh"))
        .catch(console.error);
    },
  },
};
</script>
