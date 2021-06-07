<template>
  <v-col cols="12">
    <v-card shaped elevation="24" color="secondary" class="pb-5">
      <v-form v-model="valid">
        <v-card-title>Create Event</v-card-title>
        <v-container fluid>
          <v-row dense>
            <v-text-field
              dark
              label="Event name"
              v-model="event_name"
              :rules="eventNameRule"
              hide-details="auto"
              outlined
            ></v-text-field>
          </v-row>
          <v-row class="mt-2">
            <v-col cols="12" lg="6">
              <v-menu
                v-model="menu1"
                :close-on-content-click="false"
                max-width="290"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    dark
                    :value="from"
                    clearable
                    label="From"
                    readonly
                    v-bind="attrs"
                    v-on="on"
                    @click:clear="date = null"
                    prepend-icon="mdi-calendar"
                  ></v-text-field>
                </template>
                <v-date-picker
                  v-model="from"
                  @change="menu1 = false"
                ></v-date-picker>
              </v-menu>
            </v-col>

            <v-col cols="12" lg="6">
              <v-menu
                v-model="menu2"
                :close-on-content-click="false"
                max-width="290"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    dark
                    :value="to"
                    clearable
                    label="To"
                    readonly
                    v-bind="attrs"
                    v-on="on"
                    @click:clear="date = null"
                    prepend-icon="mdi-calendar"
                  ></v-text-field>
                </template>
                <v-date-picker
                  v-model="to"
                  @change="menu2 = false"
                ></v-date-picker>
              </v-menu>
            </v-col>
          </v-row>
          <v-row align="center" justify="center">
            <v-checkbox
              dark
              v-model="days"
              v-for="item in items"
              :key="item"
              :label="item"
              :value="item"
              class="mr-3"
            ></v-checkbox>
          </v-row>
          <v-row dense class="mt-5">
            <v-btn
              depressed
              color="primary"
              class="mr-3"
              v-on:click="createEvent"
            >
              Create
            </v-btn>
          </v-row>
        </v-container>
      </v-form>
    </v-card>
  </v-col>
</template>
<script>
import moment from "moment";
import { format, parseISO } from "date-fns";

export default {
  data: () => ({
    valid: false,
    eventNameRule: [
      (value) => !!value || "Required.",
      (value) => (value && value.length >= 3) || "Min 3 characters",
    ],
    from: format(parseISO(new Date().toISOString()), "yyyy-MM-dd"),
    to: format(parseISO(new Date().toISOString()), "yyyy-MM-dd"),
    menu1: false,
    menu2: false,
    checkbox: false,
    items: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    event_name: "",
    days: [],
  }),

  methods: {
    createEvent: function () {
      const eventData = {
        event_name: this.event_name,
        from: this.from,
        to: this.to,
        days: this.days,
      };
      axios
        .post("/api/create-event", eventData)
        .then((response) => console.log(response));
    },
  },

  computed: {
    fromDate() {
      return this.from ? moment(this.from).format("dddd, MMMM Do YYYY") : "";
    },
    toDate() {
      return this.to ? moment(this.to).format("dddd, MMMM Do YYYY") : "";
    },
  },
};
</script>