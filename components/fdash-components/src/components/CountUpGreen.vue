<template>
  <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
    <div
      class="bg-holder bg-card"
      style="
        background-image: url(https://qonsolidated-solutions.github.io/falcon-assets/assets/img/illustrations/corner-3.png);
      "
    ></div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
      <h6>
        {{ title }}
        <span class="badge badge-soft-success rounded-pill ml-2">{{
          title_chip
        }}</span>
      </h6>
      <div
        class="display-4 fs-4 mb-2 fw-normal font-sans-serif"
        v-bind:data-countup="countup_json"
      >
        {{ prefix }} {{ end_value }}
      </div>
      <a class="fw-semi-bold fs--1 text-nowrap">{{ footer }} &raquo; </a>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: { type: String, default: "Rays" },
    title_chip: { type: String, default: "10.1%" },
    end_value: { type: Number, default: 53421 },
    prefix: { type: String, default: "KSh." },
    footer: { type: String, default: "Photons" },
  },
  computed: {
    countup_json: function () {
      let tmp = {
        endValue: this.end_value,
        prefix: this.prefix,
      };
      return JSON.stringify(tmp);
    },
  },
};
</script>
<style>
@import "https://qonsolidated-solutions.github.io/falcon-assets/assets/css/theme.min.css";
</style>


