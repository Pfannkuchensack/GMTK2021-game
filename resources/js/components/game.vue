<template>
  <div>
    <orders :ordersProp="orders"></orders>
    <gamefield :playerXProp="playerX" :playerYProp="playerY"></gamefield>
  </div>
</template>

<script>
export default {
  components: {},
  name: "game",
  inheritAttrs: false,
  props: {},
  data: () => {
    return {
      orders: [],
      cnt: 0,
      settimeout: false,
      playerX: 0,
      playerY: 0,
      items: [
        { type: 0, name: "Eisen" },
        { type: 1, name: "schmelzendes Eisen" },
        { type: 2, name: "Geschmolzendes Eisen" },
        { type: 3, name: "zerschmolzendes Eisen" },
        { type: 10, name: "Holz" },
        { type: 11, name: "Schwert Schaft" },
        { type: 12, name: "Axe Schaft" },
        { type: 13, name: "Harke Schaft" },
        { type: 14, name: "Tool Schaft" },
        { type: 20, name: "Schwertklinge" },
        { type: 21, name: "Axeklinge" },
        { type: 22, name: "Hammerkopf" },
        { type: 23, name: "Harkekopf" },
      ],
      ordertypes: [
        { type: 100, type1: 20, type2: 11, name: "Schwert" },
        { type: 101, type1: 21, type2: 12, name: "Axe" },
        { type: 102, type1: 22, type2: 14, name: "Hammer" },
        { type: 103, type1: 23, type2: 13, name: "Harke" },
      ],
      icons: [
        {
          name: "Schwert",
          icon: "https://scratchwars.com/photos/zbrane_avatar/f/0/9.png?m=1485025836",
        },
        {
          name: "Axe",
          icon: "https://scratchwars.com/photos/zbrane_avatar/f/0/9.png?m=1485025836",
        },
        {
          name: "Hammer",
          icon: "https://scratchwars.com/photos/zbrane_avatar/f/0/9.png?m=1485025836",
        },
        {
          name: "Harke",
          icon: "https://scratchwars.com/photos/zbrane_avatar/f/0/9.png?m=1485025836",
        },
      ],
    };
  },
  methods: {
    addorder() {
      this.cnt = this.cnt + 1;
      let tmp = _.sample(this.ordertypes); //[Math.floor(Math.random()*this.ordertypes.length) | 0];
      tmp.id = this.cnt;
      tmp.icon = this.icons.find((element) => element.name == tmp.name).icon;
      this.orders.push(Object.assign({}, tmp));
    },
    deleteorder() {
      this.orders.shift();
    },
    stoporder() {
      clearInterval(this.intervalid1);
      //clearTimeout((this.intervalid1);
    },
    ordersystem() {
      this.addorder();
	  let min = 2000;
	  let max = 10000;
	  if(this.orders.length > 4)
	  	min = 5000;
	  if(this.orders.length > 7)
	  	min = 10000;
      let next = Math.floor(Math.random() * (max - min + 1) + min);
      console.log(next);
      this.settimeout = setTimeout(
        function () {
          this.ordersystem();
        }.bind(this),
        next
      );
    },
  },
  mounted() {
    this.settimeout = setTimeout(
      function () {
        this.ordersystem();
      }.bind(this),
      2000
    );

    this._keyDownListener = function (e) {
      if (e.key === "w") {
        e.preventDefault(); // present "Save Page" from getting triggered.
        this.playerY = this.playerY - 1 < 0 ? 0 : this.playerY - 1;
      }
      if (e.key === "s") {
        e.preventDefault(); // present "Save Page" from getting triggered.
        this.playerY = this.playerY + 1 > 7 ? 7 : this.playerY + 1;
      }
      if (e.key === "a") {
        e.preventDefault(); // present "Save Page" from getting triggered.
        this.playerX = this.playerX - 1 < 0 ? 0 : this.playerX - 1;
      }
      if (e.key === "d") {
        e.preventDefault(); // present "Save Page" from getting triggered.
        this.playerX = this.playerX + 1 > 7 ? 7 : this.playerX + 1;
      }
    };

    document.addEventListener("keydown", this._keyDownListener.bind(this));
  },
  beforeDestroy() {
    document.removeEventListener("keydown", this._keyDownListener);
  },
};
</script>
