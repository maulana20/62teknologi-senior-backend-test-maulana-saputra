<template>
  <div>
    <label for="locale">Locale</label>
    <select v-model="locale" class="form-control" v-if="locales.length">
      <option v-for="data in locales" :value="data.code">{{ data.name }}</option>
    </select>
  </div>
</template>
<script>
import BusinessService from '../services/business.service';
export default
{
  name: 'LocaleSelect',
  props: [
    'code'
  ],
  data: function() {
    return {
      locale: "",
      locales: []
    }
  },
  mounted: function() {
    this.locale = this.code;
    this.getLocales();
  },
  methods: {
    getLocales: function() {
      BusinessService.locales().then(response => {
        const locales = response.data;
        this.locales = Object.keys(locales).map(code => {
          return { code: code, name: locales[code] };
        });
      });
    }
  }
}
</script>
