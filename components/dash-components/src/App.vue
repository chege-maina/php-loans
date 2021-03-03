<template>
  <div>
    <PercentageLarge />
    <CreditCards />
  </div>
</template>

<script>
import PercentageLarge from "./components/PercentageLarge.vue";
import CreditCards from "./components/CreditCards.vue";

export default {
  name: "App",
  components: {
    PercentageLarge,
    CreditCards,
  },
};
</script>
