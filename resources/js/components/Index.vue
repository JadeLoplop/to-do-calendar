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
              <CreateEvent @create="storeEvents" />
            </v-col>

            <v-col>
              <v-sheet min-height="70vh" rounded="lg">
                <Calendar :events="events" />
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
import moment from "moment";
export default {
  data() {
    return {
      events: "",
    };
  },
  components: {
    CreateEvent,
    Calendar,
  },
  created() {
    this.fetchEvents();
  },
  methods: {
    storeEvents(data) {
      axios.post("/api/create-event", data).then(this.fetchEvents());
    },

    fetchEvents() {
      axios.get("/api/get-events").then((res) => this.getAllEvents(res.data));
    },
    getAllEvents(data) {
      let events = [];
      data.forEach((element) => {
        var event_days = element["days"];
        event_days.forEach((day) => {
          if (day != "") {
            var date = this.getDates(
              moment(element["from"]),
              moment(element["to"]),
              day - 1
            );
          }

          date.forEach((e) => {
            events.push({
              title: element["name"],
              date: e,
            });
          });
        });
      });
      this.events = events;
    },

    getDates: function (start, end, day) {
      let result = [];
      let current = start.clone();

      while (current.day(7 + day).isBefore(end)) {
        result.push(current.clone().format("YYYY-MM-DD"));
      }
      console.log(result);
      return result;
    },
  },
};
</script>