<template>
  <div>
    <v-data-table :headers="headers" :items="events">
      <template #[`item.category.points`]="{ item }">
        <span v-if="item.category.is_bonus" style="color: green">
          + {{ item.category.points }}
        </span>
        <span v-else style="color: red"> - {{ item.category.points }} </span>

        <span
          v-if="item.created_by_leader"
          :style="{ color: item.category.is_bonus ? 'green' : 'red' }"
        >
          x 2
          <v-icon color="yellow">mdi-star</v-icon>
        </span>
      </template>

      <template #[`item.created_at`]="{ item: { created_at: createdAt } }">
        {{ new Date(createdAt).toLocaleString() }}
      </template>
    </v-data-table>
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "EventsList",
  data: () => ({
    headers: [
      { text: "Team", value: "team.name" },
      { text: "Categoria", value: "category.description" },
      { text: "Punti", value: "category.points" },
      { text: "Creato il", value: "created_at" },
    ],
  }),
  computed: mapState("event", ["events"]),
};
</script>
