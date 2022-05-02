<template>
  <div class="container">
    <full-calendar :events="events[0]" :editable="false"></full-calendar>
  </div>
</template>
<script>
export default {
  data() {
    return {
      events: [],
    };
  },
  mounted() {
    axios
      .get("http://localhost/soft-prestamos/public/deudas")
      .then((response) => {
        this.events.push(response.data.events);
      });

    console.log("Component mounted.");
  },
};
</script>