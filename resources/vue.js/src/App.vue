<template>
  <h1>Firmenliste</h1>
<!--  <ul id="firmen">
    <div v-for="(firma) in firmenListe" :key="firma.id">
      <li @click="getMitarbeiter(firma.id)">{{ firma.firmenname }}</li>
      <div v-if="aktFirma != firma.id"></div>
      <div v-else>
        <ul>
          <div v-for="mitarbeiter in mitarbeiterListe" :key="mitarbeiter.id">
            <li>{{ mitarbeiter.nachname }}, {{ mitarbeiter.vorname }} ({{ mitarbeiter.email }})</li>
          </div>
        </ul>
      </div>
    </div>
  </ul>
  -->
  <table>
    <thead>
      <tr>
        <th>Firmenname</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(firma) in firmenListe" :key="firma.id" @click="getMitarbeiter(firma.id)">
        <td><h3>{{ firma.firmenname }}</h3><br /></td>
        <table v-if="aktFirma == firma.id">
          <thead>
            <tr>
              <th>Nachname</th>
              <th>Vorname</th>
              <th>EMail-Adresse</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="mitarbeiter in mitarbeiterListe" :key="mitarbeiter.id">
              <td>{{ mitarbeiter.nachname }}</td>
              <td>{{ mitarbeiter.vorname }}</td>
              <td>{{ mitarbeiter.email }}</td>
            </tr>
          </tbody>
        </table>
      </tr>
    </tbody>
  </table>
  <label>Vorname<input type="text" id="vorname" v-model="neuVorname" /></label><label>Nachname<input type="text" id="nachname" v-model="neuNachname" /></label><label>EMail<input type="text" id="email" v-model="neuEmail" /></label><button @click="storeMitarbeiter">Mitarbeiter hinzufügen</button>
</template>

<script>
import axios from 'axios'

export default {
  name: 'App',
  data() {
    return {
      aktFirma: 0,
      neuVorname: '',
      neuNachname: '',
      neuEmail: '',
      firmenListe: [],
      mitarbeiterListe: [],
    };
  },
  created() {
    this.getFirmen();
  },    
  methods: {
    getFirmen() {
      const t = this;
      axios
        .get('/firmen')
        .then((response) => {
          t.firmenListe = response.data;
          console.log(t.firmenListe);
        });
    },
    getMitarbeiter(index) {
      const t = this;
      t.aktFirma = index;
      axios
        .get('/mitarbeiter/' + index)
        .then((response) => {
          t.mitarbeiterListe = response.data;
          console.log(t.mitarbeiterListe);
        });
    },
    storeMitarbeiter() {
      const t = this;
      const data = {
        "firmen_id": t.aktFirma,
        "vorname": t.neuVorname,
        "nachname": t.neuNachname,
        "email": t.neuEmail,
      }
      axios
        .post("/mitarbeiter", data, )
        .then((response) => {
          console.log(response);
          this.getMitarbeiter(response.data.firmen_id);
          t.neuVorname = "";
          t.neuNachname = "";
          t.neuEmail = "";
          const inputs = document.getElementsByTagName("input");
          for(const input of inputs) {
            input.style.backgroundColor = "#fff";
          }
        })
        .catch((error) => {
          const errors = error.response.data.errors;
          const inputs = document.getElementsByTagName("input");
          for(const input of inputs) {
            input.style.backgroundColor = "#fff";
          }
          for (let error in errors) {
            document.getElementById(error).style.backgroundColor="#fbb";
          }
          console.log(errors);
          console.log(error.response.data.errors);
        });
    },
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
ul li {
  margin: 3px;
  text-align: left;
}
ul li ul {
  margin-left: 20px;
}
table {
  width: 80%;
  border: 1px gray solid;
}
table tbody tr td {
  border: 1px lightgray solid;
}
td table tbody tr td {
  border: none;
}
h3 {
  display: block;
}
label {
  margin: 0 10px;
}
</style>
