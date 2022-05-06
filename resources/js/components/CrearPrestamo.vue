<template>
  <form @submit="guardarPrestamo" method="post">
    <div class="input">
      <label for="">Cliente</label>
      <div>
        <input
          type="search"
          name="cliente"
          v-model="cliente"
          @input="escribir"
          placeholder="Busca cliente por nombre o cedula de identidad"
          :class="this.errors[0].cliente.length ? 'invalid-input' : ''"
        />

        <label
          for=""
          v-if="restul_clientes.length && cliente"
          style="font-size: 13px"
          >Selecione un cliente:</label
        >
        <select
          v-model="cliente"
          name="cliente"
          class="result_busqueda_clientes"
          v-if="restul_clientes.length && cliente"
        >
          <option
            :value="cliente.cedula_de_identidad"
            v-for="(cliente, index) in restul_clientes"
            :key="index"
          >
            {{ cliente.nombre }} -
            {{ cliente.cedula_de_identidad }}
          </option>
        </select>
      </div>
    </div>

    <ul v-if="this.errors[0].cliente.length" class="errores">
      <div></div>
      <div>
        <li v-for="(error, index) in this.errors[0].cliente" :key="index">
          {{ error }}
        </li>
      </div>
    </ul>

    <div class="input">
      <label for="">Importe de Crédito</label>
      <input
        :class="this.errors[0].importe_de_credito.length ? 'invalid-input' : ''"
        type="number"
        name="importe_de_credito"
        v-model="importe_de_credito"
        @input="escribir"
        placeholder="Importe de Crédito"
      />
    </div>

    <ul v-if="this.errors[0].importe_de_credito.length" class="errores">
      <div></div>
      <div>
        <li
          v-for="(error, index) in this.errors[0].importe_de_credito"
          :key="index"
        >
          {{ error }}
        </li>
      </div>
    </ul>

    <div class="select">
      <label for="">Modalidad</label>
      <select
        :class="this.errors[0].modalidad.length ? 'invalid-input' : ''"
        name="modalidad"
        v-model="modalidad"
        @input="escribir"
      >
        <option value="">-- Seleccione una Modalidad --</option>
        <option value="dia">Dia</option>
        <option value="semanal">Semenal</option>
        <option value="mensual">Mensual</option>
      </select>
    </div>

    <ul v-if="this.errors[0].modalidad.length" class="errores">
      <div></div>
      <div>
        <li v-for="(error, index) in this.errors[0].modalidad" :key="index">
          {{ error }}
        </li>
      </div>
    </ul>

    <div class="input">
      <label for="">Tasa de Interes</label>
      <input
        :class="this.errors[0].tasa_de_interes.length ? 'invalid-input' : ''"
        type="number"
        name="tasa_de_interes"
        v-model="tasa_de_interes"
        @input="escribir"
        placeholder="Tasa de Interes"
      />
    </div>

    <ul v-if="this.errors[0].tasa_de_interes.length" class="errores">
      <div></div>
      <div>
        <li
          v-for="(error, index) in this.errors[0].tasa_de_interes"
          :key="index"
        >
          {{ error }}
        </li>
      </div>
    </ul>

    <div class="input">
      <label for="">Nº Cuotas</label>
      <input
        :class="this.errors[0].numero_de_cuotas.length ? 'invalid-input' : ''"
        type="number"
        name="numero_de_cuotas"
        v-model="numero_de_cuotas"
        @input="escribir"
        placeholder="Nº Cuotas"
      />
    </div>

    <ul v-if="this.errors[0].numero_de_cuotas.length" class="errores">
      <div></div>
      <div>
        <li
          v-for="(error, index) in this.errors[0].numero_de_cuotas"
          :key="index"
        >
          {{ error }}
        </li>
      </div>
    </ul>

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
        :class="this.errors[0].fecha_de_inicio.length ? 'invalid-input' : ''"
        type="date"
        name="fecha_de_inicio"
        v-model="fecha_de_inicio"
        @input="escribir"
      />
    </div>

    <ul v-if="this.errors[0].fecha_de_inicio.length" class="errores">
      <div></div>
      <div>
        <li
          v-for="(error, index) in this.errors[0].fecha_de_inicio"
          :key="index"
        >
          {{ error }}
        </li>
      </div>
    </ul>

    <div class="input">
      <div></div>
      <button class="btn_submit" type="submit">Crear Prestamo</button>
    </div>
  </form>
</template>

<script>
import VueSimpleAlert from "vue-simple-alert";
import moment from "moment";

Vue.use(VueSimpleAlert);

export default {
  props: ["urlBuscarCliente", "urlGuardarPrestamo"],
  mounted() {
    let urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has("cliente")) {
      this.cliente = urlParams.get("cliente");
    }
  },

  data() {
    return {
      restul_clientes: [],
      cliente: "",
      importe_de_credito: "",
      modalidad: "",
      tasa_de_interes: "",
      numero_de_cuotas: "",
      importe_de_cuota: "",
      total_a_pagar: "",
      interes_generado: "",
      fecha_de_inicio: "",

      errors: [
        {
          cliente: [],
          importe_de_credito: [],
          modalidad: [],
          tasa_de_interes: [],
          numero_de_cuotas: [],
          fecha_de_inicio: [],
        },
      ],
    };
  },
  methods: {
    alertSuccess() {
      this.$fire({
        title: "Prestamo fue exitoso",
        text: "text",
        type: "success",
        timer: 3500,
      });
    },

    escribir(e) {
      if (e.target.name === "cliente") {
        axios
          .get(this.urlBuscarCliente, {
            params: {
              cliente: this.cliente,
            },
          })
          .then((response) => {
            this.restul_clientes = response.data.clientes.data;
            // console.log(response.data.clientes.data);
          });
      }

      if (e.target.name === "modalidad") {
        if (e.target.value === "") {
          this.fecha_de_inicio = null;
        }
        if (e.target.value === "dia") {
          this.fecha_de_inicio = moment().add(1, "days").format("yyyy-MM-DD");
        }
        if (e.target.value === "semanal") {
          this.fecha_de_inicio = moment().add(1, "weeks").format("yyyy-MM-DD");
        }
        if (e.target.value === "mensual") {
          this.fecha_de_inicio = moment().add(1, "months").format("yyyy-MM-DD");
        }
      }

      if (
        e.target.name === "importe_de_credito" ||
        e.target.name === "tasa_de_interes" ||
        e.target.name === "numero_de_cuotas"
      ) {
        if (
          Number(this.importe_de_credito) > 0 &&
          Number(this.tasa_de_interes) > 0 &&
          Number(this.numero_de_cuotas) > 0
        ) {
          this.total_a_pagar =
            Number(this.importe_de_credito) +
            Number((this.importe_de_credito * this.tasa_de_interes) / 100);
          this.interes_generado = Number(
            (this.importe_de_credito * this.tasa_de_interes) / 100
          );
          this.importe_de_cuota = Number(
            this.total_a_pagar / this.numero_de_cuotas
          );
        } else {
          this.total_a_pagar = "";
          this.interes_generado = "";
          this.importe_de_cuota = "";
        }
      }
    },

    guardarPrestamo(e) {
      axios
        .post(this.urlGuardarPrestamo, {
          cliente: this.cliente,
          importe_de_credito: this.importe_de_credito,
          modalidad: this.modalidad,
          tasa_de_interes: this.tasa_de_interes,
          numero_de_cuotas: this.numero_de_cuotas,
          importe_de_cuota: this.importe_de_cuota,
          total_a_pagar: this.total_a_pagar,
          interes_generado: this.interes_generado,
          fecha_de_inicio: this.fecha_de_inicio,
        })
        .then((response) => {
          // Reset todos los errores
          this.errors = [
            {
              cliente: [],
              importe_de_credito: [],
              modalidad: [],
              tasa_de_interes: [],
              numero_de_cuotas: [],
              fecha_de_inicio: [],
            },
          ];

          // Verificacando si se encuentran nuevos errores
          if (response.data.code != 200) {
            console.log(response.data);
            if (response.data.mensaje?.cliente) {
              this.errors[0].cliente = response.data.mensaje?.cliente;
            }

            if (response.data.mensaje?.importe_de_credito) {
              this.errors[0].importe_de_credito =
                response.data.mensaje?.importe_de_credito;
            }

            if (response.data.mensaje?.modalidad) {
              this.errors[0].modalidad = response.data.mensaje?.modalidad;
            }

            if (response.data.mensaje?.tasa_de_interes) {
              this.errors[0].tasa_de_interes =
                response.data.mensaje?.tasa_de_interes;
            }

            if (response.data.mensaje?.numero_de_cuotas) {
              this.errors[0].numero_de_cuotas =
                response.data.mensaje?.numero_de_cuotas;
            }

            if (response.data.mensaje?.fecha_de_inicio) {
              this.errors[0].fecha_de_inicio =
                response.data.mensaje?.fecha_de_inicio;
            }

            return;
          }
          // Guardado con exito.
          this.alertSuccess();

          // Reset Formulario
          this.cliente = "";
          this.importe_de_credito = "";
          this.modalidad = "";
          this.tasa_de_interes = "";
          this.numero_de_cuotas = "";
          this.importe_de_cuota = "";
          this.total_a_pagar = "";
          this.interes_generado = "";
          this.fecha_de_inicio = new Date().toISOString().split("T")[0];
        });

      e.preventDefault();
    },
  },
};
</script>
