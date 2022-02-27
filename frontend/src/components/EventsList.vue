<template>
  <div>
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Team</th>
            <th class="text-left">Categoria</th>
            <th class="text-left">Punti</th>
            <th class="text-left">Creato da Team Leader</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="event in events" :key="event.id">
            <td>{{ event.team.name }}</td>
            <td>{{ event.category.description }}</td>
            <td>
              <span
                :style="{ color: event.category.is_bonus ? 'green' : 'red' }"
              >
                {{ event.category.points }}
              </span>
            </td>
            <td>
              <v-icon v-if="event.created_by_leader" color="green darken-2">
                mdi-check
              </v-icon>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>

<script>
export default {
  name: "EventsList",
  props: {
    events: {
      type: Array,
      required: true,
    },
  },
};
</script>
