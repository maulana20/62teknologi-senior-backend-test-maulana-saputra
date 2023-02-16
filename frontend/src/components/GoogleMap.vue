<template>
  <div>
    <GmapMap
      v-if="Object.keys(center).length"
      :center="center"
      :zoom="20"
      style="width: 100%; height: 300px"
    >
      <GmapMarker
        :position="center"
        :clickable="true"
        :draggable="true"
        @dragend="dragEnd($event)"
      />
    </GmapMap>
  </div>
</template>
<script>
export default
{
  name: 'GoogleMap',
  props: [
    'latitude',
    'longitude'
  ],
  data: function() {
    return {
      center: {}
    }
  },
  watch: {
    latitude: function() {
      this.setMaps();
    }
  },
  methods: {
    setMaps: function() {
      this.center = {
        lat: parseFloat(this.latitude),
        lng: parseFloat(this.longitude)
      }
    },
    dragEnd: function(event) {
      this.$emit('set-map', {
        lat: event.latLng.lat(),
        lng: event.latLng.lng()
      });
    }
  }
}
</script>
