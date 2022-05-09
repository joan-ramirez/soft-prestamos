<template>
  <div v-if="chartData">
    <select
      @change="filtrar_estadistica($event)"
      class="select-filter-charts"
      v-if="fecha_inicio_app"
    >
      <option value="" disabled>Selecciona un año</option>

      <option :value="parseInt(fecha_inicio_app)">
        Estadística del año {{ parseInt(fecha_inicio_app) }}
      </option>

      <option
        :value="parseInt(fecha_inicio_app) + i"
        v-for="i in dif_fecha_incio_app_fecha_presente"
        :key="i"
        :selected="fecha_actual == parseInt(fecha_inicio_app) + i"
      >
        Estadística del año {{ parseInt(fecha_inicio_app) + i }}
      </option>
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
import moment from "moment";

export default {
  props: ["urlEstadisticas"],
  data() {
    return {
      fecha_inicio_app: null,
      dif_fecha_incio_app_fecha_presente: null,
      fecha_actual: moment().format("yyyy"),

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
  methods: {
    obtener_estadistica(year) {
      axios
        .get(this.urlEstadisticas, { params: { year: year } })
        .then((response) => {
  
          this.chartData.push(
            ["Titulo", "Prestado", "Cobrado", "Pendiente", "Ganancia"],
            response.data.estadistica
          );

          this.fecha_inicio_app = moment(response.data.fecha_inicio_app).format(
            "YYYY"
          );

          this.dif_fecha_incio_app_fecha_presente = moment(
            moment().format("yyyy-MM-DD")
          ).diff(moment(response.data.fecha_inicio_app), "years");
    
       });
    },

    filtrar_estadistica(event) {
      this.chartData = [];
      this.obtener_estadistica(event.target.value);
    },
  },

  mounted() {

    this.obtener_estadistica(moment().format("yyyy"));
    
  },
};
</script>
