<template>
  <div class="container">
    <full-calendar  defaultView="basicWeek" :events="events[0]" :editable="false"></full-calendar>
  </div>
</template>
<script>
export default {
    props: ["urlCuotas"],
  data() {
    return {
      events: [],
    };
  },
  mounted() {
    axios
      .get(this.urlCuotas)
      .then((response) => {
        this.events.push(response.data);
      });

    console.log("Component mounted.");
  },
};
</script>