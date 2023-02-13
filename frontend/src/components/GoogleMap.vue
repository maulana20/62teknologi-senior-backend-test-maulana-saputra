<template>
  <div>
    <GmapMap
      v-if="Object.keys(center).length"
      :center="center"
      :zoom="20"
      style="width: 700px; height: 300px"
    >
      <GmapMarker
        :position="center"
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
  mounted: function() {
    this.setMaps();
  },
  methods: {
    setMaps: function() {
      this.center = {
        lat: parseFloat(this.latitude),
        lng: parseFloat(this.longitude)
      }
    }
  }
}
</script>
