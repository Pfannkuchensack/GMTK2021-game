<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <div
          id="orders"
          v-for="order in this.orders"
          :key="order.id"
        >
		<img :src="order.icon" height="100px" width="100px"/>
		</div>
		<button @click="addorder()" name="add" value="add">Add</button>
		<button @click="deleteorder()" name="delete" value="delete">delete</button>
		<button @click="stoporder()" name="stop" value="stop">stop</button>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
		name: "orders",
		inheritAttrs: false,
		props: {
		},
		data: () => {
			return {
			orders: [],
			cnt: 1,
			intervalid1: false,
			}
		},
		methods:
		{
			addorder()
			{
				this.cnt = this.cnt+1;
				this.orders.push({'id': this.cnt, 'name': 'schwert', 'icon': 'https://scratchwars.com/photos/zbrane_avatar/f/0/9.png?m=1485025836'});
			},
			deleteorder()
			{
				this.orders.shift();
			},
			stoporder()
			{
				clearInterval(this.intervalid1);
				//clearTimeout((this.intervalid1);
			},
		},
		mounted() {
				console.log("Mounted");
				this.intervalid1 = setInterval(function(){
					this.addorder()
				}.bind(this), 5000);
			}
	}
</script>
