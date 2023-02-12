<template>
  <div class="card card-default">
    <div class="card-header">
      <div class="d-flex flex-nowrap">
        <div class="p-2">
          <b>{{ business.name }}</b>
        </div>
        <div>
          <Rates :rates="rates" />
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-8">
          <form name="form" @submit.prevent="handleSave">
            <div class="form-group">
              <label for="name">Name</label>
              <input v-model="business.name" v-validate="'required'" type="text" class="form-control" name="name" />
              <div v-if="errors.has('name')" class="alert alert-danger" role="alert">Name is required!</div>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea v-model="business.address" v-validate="'required'" type="text" class="form-control" name="address" rows="3">
                {{ business.address }}
              </textarea>
              <div v-if="errors.has('address')" class="alert alert-danger" role="alert">Address is required!</div>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" :disabled="loading">
                <span v-show="loading" class="spinner-border spinner-border-sm"></span>
                <span>Save</span>
              </button>
              &nbsp;
              <button class="btn btn-secondary" @click="getBack()">Back</button>
            </div>
            <div class="form-group">
              <div v-if="message" class="alert alert-danger" role="alert">{{ message }}</div>
            </div>
          </form>
        </div>
        <div class="col-4">
          <span class="label label-default" style="font-weight: bold">Reviews</span>
          <ul style="padding: 0; list-style-type: none;">
            <li v-for="review in reviews">
              <div class="d-flex flex-nowrap">
                <div class="p-2" style="font-size: 12px;">
                  {{ review.body }}
                </div>
                <div>
                  <ReviewRates :rates="review.rates" />
                </div>
              </div>
              <hr style="margin-top: 5px;" />
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import BusinessService from '../../services/business.service';
import Rates from '../../components/Rates.vue';
import ReviewRates from '../../components/ReviewRates.vue';
export default {
  name: 'BusinessDetail',
  components: {
    Rates,
    ReviewRates
  },
  data() {
    return {
      business: {
        name: "",
        address: "",
        locale: "",
        latitude: "",
        longitude: "",
        limit: 0
      },
      rates: 0,
      reviews: [],
      loading: false,
      message: ''
    };
  },
  mounted: function() {
    this.getDetail();
  },
  methods: {
    getDetail: function() {
      BusinessService.detail(this.$route.params.id).then(response => {
        this.business.name = response.data.name;
        this.business.address = response.data.address;
        this.business.locale = response.data.locale;
        this.business.latitude = response.data.latitude;
        this.business.longitude = response.data.longitude;
        this.business.limit = response.data.limit;
        
        this.rates = response.data.rates;
        this.reviews = response.data.reviews;
      });
    },
    handleSave: function() {
    },
    getBack: function() {
      window.location.href = '/business';
    }
  }
};
</script>
