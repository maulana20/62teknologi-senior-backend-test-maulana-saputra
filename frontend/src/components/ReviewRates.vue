<template>
  <div class="review-rates-component">
    <font-awesome-icon icon="star" :style="{ color: rates >= 1 ? '#f5a302' : '#e0e0e0' }" />
    <font-awesome-icon icon="star-half" :style="{ color: rates >= 0.5 ? '#f5a302' : '#e0e0e0', marginLeft: '-12px' }" /> 
    <font-awesome-icon icon="star" :style="{ color: rates >= 2 ? '#f5a302' : '#e0e0e0' }" />
    <font-awesome-icon icon="star-half" :style="{ color: rates >= 1.5 ? '#f5a302' : '#e0e0e0', marginLeft: '-12px' }" />
    <font-awesome-icon icon="star" :style="{ color: rates >= 3 ? '#f5a302' : '#e0e0e0' }" />
    <font-awesome-icon icon="star-half" :style="{ color: rates >= 2.5 ? '#f5a302' : '#e0e0e0', marginLeft: '-12px' }" />
    <font-awesome-icon icon="star" :style="{ color: rates >= 4 ? '#f5a302' : '#e0e0e0' }" />
    <font-awesome-icon icon="star-half" :style="{ color: rates >= 3.5 ? '#f5a302' : '#e0e0e0', marginLeft: '-12px' }" />
    <font-awesome-icon icon="star" :style="{ color: rates >= 5 ? '#f5a302' : '#e0e0e0' }" />
    <font-awesome-icon icon="star-half" :style="{ color: rates >= 4.5 ? '#f5a302' : '#e0e0e0', marginLeft: '-12px' }" />
  </div>
</template>
<script>
export default
{
  name: 'ReviewRates',
  props: [
    'rates'
  ]
}
</script>
<style>
.review-rates-component {
  display: contents;
  font-size: 12px;
  .fa-star-half {
    margin-left: -30px;
  }
}
</style>
