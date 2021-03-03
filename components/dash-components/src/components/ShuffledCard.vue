<template>
  <div>
    <div class="relative h-96 w-96">
      <div
        class="card bg-cyan-400 shadow-md inline-block w-96 h-96 rounded-3xl absolute bottom-0 transform -rotate-12"
      ></div>
      <div
        class="card bg-indigo-400 shadow-lg inline-block w-96 h-96 rounded-3xl absolute bottom-0 transform -rotate-6"
      ></div>
      <div
        class="card bg-pink-500 shadow-lg inline-block w-96 h-96 rounded-3xl absolute bottom-0 transform rotate-6"
      ></div>
      <div
        class="card bg-white transition shadow-xl w-96 h-96 rounded-3xl absolute bottom-0 z-10 grid place-items-center"
      >
        <div
          class="card bg-white shadow-inner h-4/5 w-3/4 rounded-2xl overflow-hidden relative"
        >
          <h1
            class="shadow-md text-xl font-thin text-center text-gray-600 uppercase p-3"
          >
            Nonsense card
          </h1>
          Some Body
          <button
            class="card bg-gray-700 hover:bg-gray-600 transition text-white w-full h-1/6 absolute bottom-0"
          >
            Learn more
          </button>
        </div>
      </div>
    </div>
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
