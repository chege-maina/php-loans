<template>
  <div>
    <PercentageLarge />
    <CreditCards />
    <ShuffledCard />
  </div>
</template>

<script>
import PercentageLarge from "./components/PercentageLarge.vue";
import CreditCards from "./components/CreditCards.vue";
import ShuffledCard from "./components/ShuffledCard.vue";

export default {
  name: "App",
  components: {
    PercentageLarge,
    CreditCards,
    ShuffledCard,
  },
};
</script>
