<template>
  <v-app id="inspire">
    <v-main class="grey lighten-3">
      <v-container>
        <v-sheet rounded="xl">
          <h1>Calendar Event</h1>
          <hr />
          <v-spacer></v-spacer>
          <v-row dense>
            <v-col cols="4">
              <CreateEvent />
            </v-col>

            <v-col>
              <v-sheet min-height="70vh" rounded="lg">
                <Calendar />
              </v-sheet>
            </v-col>
          </v-row>
        </v-sheet>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import CreateEvent from "./CreateEvent.vue";
import Calendar from "./Calendar.vue";

export default {
  data: () => ({
    links: ["Dashboard", "Messages", "Profile", "Updates"],
  }),
  components: {
    CreateEvent,
    Calendar,
  },
};
</script>