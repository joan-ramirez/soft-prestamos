<template>
  <div class="container">
    <full-calendar :events="events" :editable="false"></full-calendar>
  </div>
</template>
<script>
export default {
  data() {
    return {
      events: [
        {
          title: "Joan ramirez",
          start: "2022-04-26 07:00",
          url: "#",
        },
        {
          title: "Randy ramirez",
          start: "2022-06-26 07:00",
          url: "#",
        },
      ],
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>