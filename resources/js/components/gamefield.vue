<template>
  <div class="container xy">
	  <div class="x0 y0" data-x='0' data-y='0'></div>
	  <div class="x1 y0" data-x='1' data-y='0'></div>
	  <div class="x2 y0" data-x='2' data-y='0'></div>
	  <div class="x3 y0" data-x='3' data-y='0'></div>
	  <div class="x4 y0" data-x='4' data-y='0'></div>
	  <div class="x5 y0" data-x='5' data-y='0'></div>
	  <div class="x0 y1" data-x='0' data-y='1'></div>
	  <div class="x0 y2" data-x='0' data-y='2'></div>
	  <div class="x0 y3" data-x='0' data-y='3'></div>
	  <div class="x0 y4" data-x='0' data-y='4'></div>
	  <div class="x0 y5" data-x='0' data-y='5'></div>
  </div>
</template>

<script>
    export default {
		name: "gamefield",
		inheritAttrs: false,
		props: {
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
.xy {
	display: grid;
	grid-template-columns: repeat(5, 1fr);
	grid-template-rows: repeat(5, 1fr);
	grid-column-gap: 0px;
	grid-row-gap: 0px;
}
.x0 {
	background: lightblue;
	height: 10px;
	width: 10px;
}
.y0 {
	background: lightcoral;
	height: 10px;
	width: 10px;
}
</style>