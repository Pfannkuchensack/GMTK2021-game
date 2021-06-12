<template>
<div>
  <orders
  :ordersProp="orders"
  ></orders>
  <gamefield></gamefield>
</div>
</template>

<script>
    export default {
  		components: {},
		name: "game",
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
				this.intervalid1 = setInterval(function(){
					this.addorder()
				}.bind(this), 5000);
			}
	}
</script>
