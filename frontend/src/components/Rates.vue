<template>
  <div class="rates-component">
    <font-awesome-icon icon="star" :style="{ color: rates >= 1 ? '#f5a302' : '#e0e0e0' }" />
    <font-awesome-icon icon="star-half" :style="{ color: rates >= 0.5 ? '#f5a302' : '#e0e0e0', marginLeft: '-18px' }" /> 
    <font-awesome-icon icon="star" :style="{ color: rates >= 2 ? '#f5a302' : '#e0e0e0' }" />
    <font-awesome-icon icon="star-half" :style="{ color: rates >= 1.5 ? '#f5a302' : '#e0e0e0', marginLeft: '-18px' }" />
    <font-awesome-icon icon="star" :style="{ color: rates >= 3 ? '#f5a302' : '#e0e0e0' }" />
    <font-awesome-icon icon="star-half" :style="{ color: rates >= 2.5 ? '#f5a302' : '#e0e0e0', marginLeft: '-18px' }" />
    <font-awesome-icon icon="star" :style="{ color: rates >= 4 ? '#f5a302' : '#e0e0e0' }" />
    <font-awesome-icon icon="star-half" :style="{ color: rates >= 3.5 ? '#f5a302' : '#e0e0e0', marginLeft: '-18px' }" />
    <font-awesome-icon icon="star" :style="{ color: rates >= 5 ? '#f5a302' : '#e0e0e0' }" />
    <font-awesome-icon icon="star-half" :style="{ color: rates >= 4.5 ? '#f5a302' : '#e0e0e0', marginLeft: '-18px' }" />
  </div>
</template>
<script>
export default
{
  name: 'Rates',
  props: [
    'rates'
  ]
}
</script>
<style>
.rates-component {
  display: contents;
  .fa-star-half {
    margin-left: -30px;
  }
}
</style>
