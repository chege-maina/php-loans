<template>
  <div class="card overflow-hidden" style="min-width: 12rem">
    <div
      class="bg-holder bg-card"
      style="
        background-image: url(https://qonsolidated-solutions.github.io/falcon-assets/assets/img/illustrations/corner-2.png);
      "
    ></div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
      <h6>
        {{ title }}
        <span class="badge badge-soft-info rounded-pill ml-2">
          {{ title_chip }}
        </span>
      </h6>
      <div
        class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
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
  mounted() {
    const falcon_js = document.createElement("script");
    falcon_js.setAttribute(
      "src",
      "https://qonsolidated-solutions.github.io/falcon-assets/assets/js/theme.min.js"
    );
    const anchor_js = document.createElement("script");
    anchor_js.setAttribute(
      "src",
      "https://qonsolidated-solutions.github.io/falcon-assets/vendors/anchorjs/anchor.min.js"
    );
    const popper = document.createElement("script");
    popper.setAttribute(
      "src",
      "https://qonsolidated-solutions.github.io/falcon-assets/vendors/popper/popper.min.js"
    );
    const bootstrap = document.createElement("script");
    bootstrap.setAttribute(
      "src",
      "https://qonsolidated-solutions.github.io/falcon-assets/vendors/bootstrap/bootstrap.min.js"
    );
    const is_js = document.createElement("script");
    is_js.setAttribute(
      "src",
      "https://qonsolidated-solutions.github.io/falcon-assets/vendors/is/is.min.js"
    );
    const prism = document.createElement("script");
    prism.setAttribute(
      "src",
      "https://qonsolidated-solutions.github.io/falcon-assets/vendors/prism/prism.js"
    );
    const fontawesome = document.createElement("script");
    fontawesome.setAttribute(
      "src",
      "https://qonsolidated-solutions.github.io/falcon-assets/vendors/fontawesome/all.min.js"
    );
    const lodash = document.createElement("script");
    lodash.setAttribute(
      "src",
      "https://qonsolidated-solutions.github.io/falcon-assets/vendors/lodash/lodash.min.js"
    );
    const polyfill = document.createElement("script");
    polyfill.setAttribute(
      "src",
      "https://polyfill.io/v3/polyfill.min.js?features,window.scroll"
    );
    const list_js = document.createElement("script");
    list_js.setAttribute(
      "src",
      "https://qonsolidated-solutions.github.io/falcon-assets/vendors/list.js/list.min.js"
    );
    const config_js = document.createElement("script");
    config_js.setAttribute(
      "src",
      "https://qonsolidated-solutions.github.io/falcon-assets/assets/js/config.js"
    );
    const countup = document.createElement("script");
    countup.setAttribute(
      "src",
      "https://qonsolidated-solutions.github.io/falcon-assets/vendors/countup/countUp.umd.js"
    );

    this.$el.prepend(config_js);
    this.$el.append(
      countup,
      anchor_js,
      popper,
      bootstrap,
      is_js,
      prism,
      fontawesome,
      lodash,
      polyfill,
      list_js,
      falcon_js
    );
  },
};
</script>
<style>
@import "https://qonsolidated-solutions.github.io/falcon-assets/assets/css/theme.min.css";
</style>

