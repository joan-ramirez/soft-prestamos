<template>
  <form action="" @submit="guardarPrestamo" method="post">
    <div class="input">
      <label for="">Cliente</label>
      <input
        type="search"
        v-model="cliente"
        @input="escribir"
        placeholder="Busca cliente por nombre"
      />
    </div>

    <div class="input">
      <label for="">Importe de Crédito</label>
      <input
        type="number"
        v-model="importe_de_credito"
        @input="escribir"
        placeholder="Importe de Crédito"
      />
    </div>

    <div class="select">
      <label for="">Modalidad</label>
      <select name="modalidad" v-model="modalidad" @input="escribir">
        <option value="">-- Seleccione una Modalidad --</option>
        <option value="dia">Dia</option>
        <option value="semanal">Semenal</option>
        <option value="mensual">Mensual</option>
      </select>
    </div>

    <div class="input">
      <label for="">Tasa de Interes</label>
      <input
        type="number"
        name="tasa_de_interes"
        v-model="tasa_de_interes"
        @input="escribir"
        placeholder="Tasa de Interes"
      />
    </div>

    <div class="input">
      <label for="">Nº Cuotas</label>
      <input
        type="number"
        name="numero_de_cuotas"
        v-model="numero_de_cuotas"
        @input="escribir"
        placeholder="Nº Cuotas"
      />
    </div>

    <div class="input">
      <label for="">Importe de la Cuota</label>
      <input
        type="number"
        name="importe_de_cuota"
        v-model="importe_de_cuota"
        @input="escribir"
        placeholder="Importe de la Cuota"
        readonly
        disabled
      />
    </div>

    <div class="input">
      <label for="">Total a Pagar</label>
      <input
        type="number"
        name="total_a_pagar"
        v-model="total_a_pagar"
        @input="escribir"
        placeholder="Total a Pagar"
        disabled
      />
    </div>

    <div class="input">
      <label for="">Interes Generado</label>
      <input
        type="number"
        name="interes_generado"
        v-model="interes_generado"
        @input="escribir"
        placeholder="Interes Generado"
        disabled
      />
    </div>

    <div class="input">
      <label for="">Fecha de Inicio</label>
      <input
        type="date"
        name="fecha_de_inicio"
        v-model="fecha_de_inicio"
        @input="escribir"
      />
    </div>


    <div class="input" v-if="errors.length">
      <div></div>
      <div>
        <b>Por favor corrige los siguientes error(es):</b>
        <ul>
          <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
        </ul>
      </div>
    </div>


    <div class="input">
      <div></div>
      <button class="btn_submit" type="submit">Crear Prestamo</button>
    </div>
  </form>
</template>

<script>
export default {
  mounted() {},
  data() {
    return {
      errors: [],
      cliente: "",
      importe_de_credito: "",
      modalidad: "",
      tasa_de_interes: "",
      numero_de_cuotas: "",
      importe_de_cuota: "",
      total_a_pagar: "",
      interes_generado: "",
      fecha_de_inicio: "01/08/2000",
    };
  },
  methods: {
    escribir(e) {
      console.log(e.target.name);
    },

    guardarPrestamo(e) {
      e.preventDefault();
    },
  },
};
</script>
