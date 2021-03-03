<template>
  <div class="font-sans text-center py-10 max-w-sm">
    <h5 class="text-sm text-indigo-800">{{ top_str }}</h5>
    <div class="text-8xl font-medium my-3 text-indigo-900">{{ val }}%</div>
    <div class="text-sm text-indigo-800">{{ bottom_str }}</div>
  </div>
</template>

<script>
export default {
  props: {
    bottom_str: { type: String, default: "Done by Jean" },
    top_str: { type: String, default: "Transactions" },
    val: { type: Number, default: 87 },
  },
};
</script>

<style>
/* @import url("https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"); */
@import url("https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.3/tailwind.min.css");

.text-8xl {
  font-size: 6em;
}
</style>
