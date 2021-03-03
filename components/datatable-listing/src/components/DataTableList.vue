<template>
  <table class="table is-striped is-hoverable is-fullwidth">
    <thead>
      <tr>
        <th scope="col">#</th>
        <template v-for="(item, key) in header">
          <th
            scope="col"
            v-bind:class="{ 'col-sm-1': item.editable }"
            :key="key"
            v-if="item.key !== 'key'"
          >
            {{ item.name }}
          </th>
        </template>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in table_data" :key="item.key" class="py-0">
        <th scope="row" class="align-middle py-1">
          {{ table_data_relative_index[item.key].index }}
        </th>

        <template v-for="(value, key) in item">
          <td v-bind:key="key" v-if="key !== 'key'" class="align-middle py-1">
            <span v-if="header_object[key].editable" class="control">
              <input
                class="input is-small"
                type="number"
                v-model="table_data[item.key][key]"
              />
            </span>
            <span v-else-if="header_object[key].computed">{{
              computeField(header_object[key].operation, item.key, key)
            }}</span>
            <span v-else>{{ value }}</span>
          </td>
        </template>

        <td class="align-middle py-1">
          <button
            class="button is-link is-small"
            v-on:click="manageItem(item.key)"
          >
            Manage
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  mounted() {
    // HACK: This is to accomadate xampp devs
    const path = window.location.pathname.split("/");
    let xampp_offset = "";
    if (path.length > 3) {
      xampp_offset = "/" + path[1];
    }

    const baseurl =
      window.location.href.split(window.location.host)[0] +
      window.location.host +
      xampp_offset;

    // Import the css
    const url = baseurl + "/external/bulma/bulma.min.css";
    // Create new link Element
    const link = document.createElement("link");
    link.rel = "stylesheet";
    link.type = "text/css";
    link.href = url;
    this.$el.prepend(link);
  },
  created() {
    // Init the object that will hold the table values
    this.table_data = this.body_object;
    window.addEventListener("storage", (event) => {
      // If our table data in the session storage has been changed
      if (event.key == this.session_key) {
        this.table_data = JSON.parse(
          window.sessionStorage.getItem(this.session_key)
        );
      }
    });
  },
  props: {
    json_header: {
      type: String,
      default: () => "[]",
    },
    json_items: {
      type: String,
      default: () => "[]",
    },
    // TODO: This can be done better
    //e.g. using arrays
    manage_key: {
      type: String,
      default: () => "",
    },
    manage_key_2: {
      type: String,
      default: () => "",
    },
    redirect: {
      type: String,
      default: () => "",
    },
  },
  data: () => ({
    person: {
      name: "Jean",
    },
    table_data: {},
    session_key: "table_data",
  }),
  watch: {
    table_data: {
      handler() {
        window.sessionStorage.setItem(
          this.session_key,
          JSON.stringify(this.table_data)
        );
      },
      // TODO: receive this as a prop
      deep: true,
    },
  },
  computed: {
    baseurl: function () {
      const url =
        window.location.href.split(window.location.host)[0] +
        window.location.host;
      return url;
    },
    style: function () {
      let s = this.baseurl + "/external/bulma/bulma.min.css";
      return s;
    },
    header: function () {
      return JSON.parse(this.json_header);
    },
    header_object: function () {
      let header_object = {};
      this.header.forEach((row) => {
        header_object[row.key] = {
          editable: row.editable,
          computed: row.computed,
          operation: row.operation,
          name: row.name,
        };
      });
      return header_object;
    },
    body: function () {
      return JSON.parse(this.json_items);
    },
    body_object: function () {
      let body_object = {};
      this.body.forEach((row) => {
        body_object[row.key] = row;
      });
      return body_object;
    },
    table_data_relative_index: function () {
      let tmp = {};
      let i = 1;
      for (let key in this.table_data) {
        tmp[key] = {
          index: i,
        };
        i++;
      }
      return tmp;
    },
  },
  methods: {
    import_css() {
      const s = document.createElement("style");
      s.appendChild(document.createTextNode(this.style));
      document.head.append(s);
    },
    computeField(expression, index, col) {
      // It computes from left to right =======>
      //so organize them in the order the calculation should be done
      //so as to respect bodmas rules
      // Rule of thumb: Don't set a computed field to be dependent on
      //another computed field.
      // TODO:The behaviour hasn't been tested yet
      const [...expanded] = expression.split(" ");
      let cumulative_total = 0;
      for (let i = 0; i < expanded.length; i += 2) {
        // Check if the value is numeric
        const value = isNaN(expanded[i])
          ? Number(this.table_data[index][expanded[i]])
          : Number(expanded[i]);

        if (i == 0) {
          cumulative_total = value;
          continue;
        }
        switch (expanded[i - 1]) {
          case "*":
            cumulative_total *= value;
            break;
          case "+":
            cumulative_total += value;
            break;
          case "/":
            cumulative_total /= value;
            break;
          case "-":
            cumulative_total -= value;
            break;
        }
      }
      this.table_data[index][col] = cumulative_total.toFixed(2);
      return cumulative_total.toFixed(2);
    },
    removeRow(row) {
      const replacement_table = {};
      for (let key in this.table_data) {
        if (key == row) {
          continue;
        }
        replacement_table[key] = this.table_data[key];
      }
      this.table_data = replacement_table;
    },
    manageItem(row) {
      window.sessionStorage.setItem(
        this.manage_key,
        this.table_data[row][this.manage_key]
      );

      if (this.manage_key_2 !== "") {
        window.sessionStorage.setItem(
          this.manage_key_2,
          this.table_data[row][this.manage_key_2]
        );
      }

      window.location.href = this.redirect;
    },
  },
};
</script>
