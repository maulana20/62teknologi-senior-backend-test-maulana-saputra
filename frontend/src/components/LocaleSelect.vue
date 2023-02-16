<template>
  <div>
    <label for="locale">Locale</label>
    <select v-model="locale" class="form-control">
      <option v-for="(data, index) in locales" :value="data.code" v-bind:key="index">{{ data.name }}</option>
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
    this.getLocales();
  },
  watch: {
    code: function(code) {
      this.locale = code;
    },
    locale: function(locale) {
      this.$emit('set-locale', locale);
    }
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
