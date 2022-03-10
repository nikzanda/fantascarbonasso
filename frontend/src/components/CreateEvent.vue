<template>
  <v-dialog v-model="dialog" max-width="500" persistent>
    <v-card class="mx-auto">
      <v-card-title>
        <h4>Inserisci evento</h4>
      </v-card-title>

      <v-card-text>
        <v-form v-model="valid" ref="form" :disabled="loading">
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
        </v-form>
      </v-card-text>

      <v-card-actions>
        <v-spacer />
        <v-btn color="error" class="mr-4" @click="close" text> Chiudi </v-btn>
        <v-btn
          :disabled="!valid"
          color="success"
          @click="submit"
          text
          :loading="loading"
        >
          Invia
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import { mapActions, mapState } from "vuex";

export default {
  name: "CreateEvent",
  props: {
    dialog: {
      type: Boolean,
      required: true,
    },
  },
  data: () => ({
    categories: [],
    valid: false,
    loading: false,
    form: {
      team_id: undefined,
      category_id: undefined,
      created_by_leader: false,
    },
  }),
  computed: mapState("team", ["teams"]),
  created() {
    this.getCategories();
  },
  methods: {
    ...mapActions("event", ["createEvent"]),
    getCategories() {
      this.$axios("/category")
        .then(({ data }) => (this.categories = data))
        .catch(console.error);
    },
    close() {
      this.$refs.form.reset();
      this.$emit("close");
    },
    submit() {
      if (!this.$refs.form.validate()) return;

      this.loading = true;
      this.createEvent(this.form)
        .then(() => this.$emit("close"))
        .catch(console.error)
        .finally(() => (this.loading = false));
    },
  },
};
</script>
