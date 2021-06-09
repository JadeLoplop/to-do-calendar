<template>
  <FullCalendar :options="calendarOptions" />
</template>
<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import moment from "moment";

export default {
  components: {
    FullCalendar, // make the <FullCalendar> tag available
  },
  data() {
    return {
      calendarOptions: {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: "dayGridMonth",
        dateClick: this.handleDateClick,
        events: "",
      },
    };
  },
  mounted() {
    this.getAllEvents();
  },

  methods: {
    handleDateClick: function (arg) {
      alert("date click! " + arg.dateStr);
    },

    getAllEvents() {
      //fetch the product and their attached categories from the api
      axios
        .get("/api/get-events")
        .then((response) => {
          var events = [];
          var data = response.data;
          data.forEach((element) => {
            var event_days = element["days"];
            event_days.forEach((day) => {
              if (day != "") {
                var date = this.getDates(
                  moment(element["from"]),
                  moment(element["to"]),
                  day
                );
              }

              date.forEach((e) => {
                events.push({
                  title: element["name"],
                  date: e,
                });
              });
            });
            console.log(event_days);
          });
          this.calendarOptions.events = events;
          this.getAllEvents;
        })
        .catch((error) => console.log(error));
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
