<template>
  <v-data-table
    :headers="headers"
    :items="events"
    :page.sync="page"
    :items-per-page="itemsPerPage"
    @page-count="pageCount = $event"
    hide-default-footer
    class="events"
  >
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

    <template #footer>
      <div class="text-center">
        <!-- <v-select v-model="itemsPerPage" :items="[5, 10, 25, 50, -1]" /> -->
        <v-pagination
          v-model="page"
          :length="pageCount"
          :total-visible="7"
          circle
        />
      </div>
    </template>
  </v-data-table>
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
    page: 1,
    pageCount: 0,
    itemsPerPage: 10,
  }),
  computed: mapState("event", ["events"]),
};
</script>

<style scoped>
.events >>> tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05);
}
</style>