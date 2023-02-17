<template>
  <div class="card card-default">
    <div class="card-header">
      <div class="row">
        <div class="col-6">
          <div class="d-flex flex-nowrap">
            <div class="p-2">
              <b>{{ name }}</b>
            </div>
            <div>
              <Rates :rates="rates" />
            </div>
          </div>
        </div>
        <div class="col-6">
          <button class="btn btn-danger float-right" :disabled="loading_delete" @click="handleDelete">
            <span v-show="loading_delete" class="spinner-border spinner-border-sm"></span>
            <span>Delete</span>
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-8">
          <form name="form" @submit.prevent="handleSave">
            <div class="form-group">
              <Alert :errors="alert_errors" :success="alert_success"></Alert>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input v-model="business.name" v-validate="'required'" type="text" class="form-control" name="name" />
              <div v-if="errors.has('name')" class="alert alert-danger" role="alert">Name is required!</div>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea v-model="business.address" v-validate="'required'" type="text" class="form-control" name="address" rows="3" />
              <div v-if="errors.has('address')" class="alert alert-danger" role="alert">Address is required!</div>
            </div>
            <div class="form-group">
              <LocaleSelect :code="business.location" @set-locale="setLocale" />
            </div>
            <div class="form-group">
              <label for="limit">Limit</label>
              <input v-model="business.limit" v-validate="'required'" type="text" class="form-control" name="limit" />
              <div v-if="errors.has('limit')" class="alert alert-danger" role="alert">Limit is required!</div>
            </div>
            <div class="form-group">
              <GoogleMap :latitude="business.latitude" :longitude="business.longitude" @set-map="setMap" />
            </div>
            <div class="form-group">
              <ImageUpload :list="images" />
            </div>
            <hr />
            <div class="form-group">
              <button class="btn btn-primary" :disabled="loading">
                <span v-show="loading" class="spinner-border spinner-border-sm"></span>
                <span>Save</span>
              </button>
              &nbsp;
              <button class="btn btn-secondary" @click="getBack()">Back</button>
            </div>
          </form>
        </div>
        <div class="col-4">
          <ImageCarousel v-if="images.length" :images="images" />
          <span class="label label-default" style="font-weight: bold">Reviews</span>
          <ul style="padding: 0; list-style-type: none;">
            <li v-for="review in reviews" v-bind:key="review.id">
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
import ImageCarousel from '../../components/ImageCarousel.vue';
import GoogleMap from '../../components/GoogleMap.vue';
import LocaleSelect from '../../components/LocaleSelect.vue';
import ImageUpload from '../../components/ImageUpload.vue';
import Alert from '../../components/Alert.vue';
export default {
  name: 'BusinessDetail',
  components: {
    Rates,
    ReviewRates,
    ImageCarousel,
    GoogleMap,
    LocaleSelect,
    ImageUpload,
    Alert
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
      name: "",
      rates: 0,
      images: [],
      reviews: [],
      loading: false,
      loading_delete: false,
      alert_success: "",
      alert_errors: []
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
        this.business.location = response.data.locale;
        this.business.latitude = response.data.latitude;
        this.business.longitude = response.data.longitude;
        this.business.limit = response.data.limit;
        this.business.update_images = [];
        this.business.insert_images = [];
        
        this.name = response.data.name;
        this.rates = response.data.rates;
        this.images = response.data.images;
        this.reviews = response.data.reviews;
      });
    },
    setLocale: function(value) {
     this.business.location = value;
    },
    setMap: function(position) {
     this.business.latitude = position.lat;
     this.business.longitude = position.lng;
    },
    handleSave: function() {
      this.loading = true;
      this.$validator.validateAll().then(isValid => {
        if (!isValid) {
          this.loading = false;
          return;
        }
        
        this.business.update_images = Object.entries(document.getElementsByName('update_images[]')).map(el => el[1].value);
        this.business.insert_images = Object.entries(document.getElementsByName('insert_images[]')).map(el => el[1].files[0]);
        
        const data = new FormData();
        data.append('_method', 'PUT');
        Object.keys(this.business).map(key => {
          if (typeof this.business[key] === 'object') {
            Object.values(this.business[key]).map(el => data.append(key + "[]", el));
          } else {
            data.append(key, this.business[key]);
          }
        });
        
        BusinessService.update(this.$route.params.id, data).then(response => {
          this.loading = false;
          this.alert_success = response.message;
        }, error => {
          this.loading = false;
          this.alert_errors = error.response.data.errors;
        });
      });
    },
    handleDelete: function() {
      if (confirm("Are you sure delete " + this.name + " ?") == true) {
        this.loading_delete = true;
        BusinessService.delete(this.$route.params.id).then(() => {
          window.location.href = '/business';
        });
      }
    },
    getBack: function() {
      window.location.href = '/business';
    }
  }
};
</script>
