<template>
  <div v-if="chartData">
    <select name="" id="" class="select-filter-charts">
      <option value="">Seleciona un año</option>
      <option value="">Año 2022</option>
    </select>
    <GChart
      class="charts-vue"
      type="ColumnChart"
      :data="chartData"
      :options="chartOptions"
    />
  </div>
</template>

<script>
import { GChart } from "vue-google-charts";

export default {
  data() {
    return {
      // Array will be automatically processed with visualization.arrayToDataTable function
      chartData: [],
      chartOptions: {
        chart: {
          title: "Company Performance",
          subtitle: "Sales, Expenses, and Profit: 2014-2017",
        },
      },
    };
  },

  mounted() {
    axios
      .get("http://localhost/soft-prestamos/public/estadistica")
      .then((response) => {
        console.log(response.data);
        this.chartData.push(
          ["Titulo", "Prestado", "Cobrado", "Pendiente"],
          response.data
        );
      });

    console.log("Component mounted.");
  },
};
</script>
