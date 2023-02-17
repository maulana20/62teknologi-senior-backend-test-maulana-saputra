<template>
  <div>
    <label>Image Upload</label>
    <div class="row">
      <div class="col-sm" v-for="(data, index) in existImages" v-bind:key="index">
        <div style="position: relative;">
          <img :src="data.image" alt="Image Upload" class="img-fluid">
          <input type="hidden" class="form-control" name="update_images[]" :value="data.id"/>
          <button type="button" class="btn btn-sm btn-nooutline btn-nooutline-main" style="position: absolute; top: 0px; right: 0px;" @click="deleteExistImage(index)">
            <font-awesome-icon icon="times" />
          </button>
        </div>
      </div>
    </div>
    <div class="mb-3" v-for="(data, index) in images" v-bind:key="index">
      <div class="p-1 border d-inline-block">
        <input class="p-1 border d-inline-block" type="file" name="insert_images[]" accept="image/*" required>
        <button type="button" class="btn btn-sm btn-nooutline btn-nooutline-main" @click="deleteImage(index)">
          <font-awesome-icon icon="times" />
        </button>
      </div>
    </div>
    <div class="mb-3">
      <button type="button" class="btn btn-outline-secondary" @click="addImage">Add More Image</button>
    </div>
  </div>
</template>
<script>
export default {
  name: 'ImageUpload',
  props: [
    'list'
  ],
  data: function() {
    return {
      existImages : [],
      images : [],
    }
  },
  watch: {
    list: function() {
      this.setExistImages();
    }
  },
  methods: {
    setExistImages: function() {
      this.existImages = this.list.map(data => {
        data.image = window.location.origin + "/api/image/" + data.image;
        return data;
      });
    },
    deleteExistImage: function(index) {
      this.existImages.splice(index, 1);
    },
    addImage: function() {
      this.images.push({});
    },
    deleteImage(index) {
      this.images.splice(index, 1);
    }
  }
}
</script>
