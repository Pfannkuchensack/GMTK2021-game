<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <div
          id="bestellungen"
          v-for="bestellung in this.bestellungen"
          :key="bestellung.id"
        >
		<img :src="bestellung.icon" height="100px" width="100px"/>
		</div>
		<button @click="addBestellung()" name="add" value="add">Add</button>
		<button @click="deleteBestellung()" name="delete" value="delete">delete</button>
		<button @click="stopBestellung()" name="stop" value="stop">stop</button>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
		name: "",
		inheritAttrs: false,
		props: {
		},
		data: () => {
			return {
			bestellungen: [],
			cnt: 1,
			intervalid1: false,
			}
		},
		methods:
		{
			addBestellung()
			{
				this.cnt = this.cnt+1;
				this.bestellungen.push({'id': this.cnt, 'name': 'schwert', 'icon': 'https://scratchwars.com/photos/zbrane_avatar/f/0/9.png?m=1485025836'});
			},
			deleteBestellung()
			{
				this.bestellungen.shift();
			},
			stopBestellung()
			{
				clearInterval(this.intervalid1);
				//clearTimeout((this.intervalid1);
			},
		},
		mounted() {
				console.log("Mounted");
				this.intervalid1 = setInterval(function(){
					this.addBestellung()
				}.bind(this), 5000);
			}
	}
</script>
