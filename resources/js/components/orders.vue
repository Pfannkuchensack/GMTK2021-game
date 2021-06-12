<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col orders">
        <div
          id="orders"
          v-for="order in this.ordersProp"
          :key="order.id"
		  class="order"
        >
		<img :src="order.icon" height="100px" width="100px"/>
		</div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
		name: "orders",
		inheritAttrs: false,
		props: {
			ordersProp: Array,
		},
		data: () => {
			return {
			
			}
		},
		methods:
		{
		},
		mounted() {
		}
	}
</script>

<style scoped>
 .order {
	 float:left;
 }
 .orders {
	 overflow: hidden;
	 height: 100px;
 }
</style>