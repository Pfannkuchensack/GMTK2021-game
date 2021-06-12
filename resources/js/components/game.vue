<template>
  <div>
    <orders :ordersProp="orders"></orders>
    <gamefield :playerXProp="playerX" :playerYProp="playerY" :playerIventoryProp="playerIventory"></gamefield>
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
	  playerIventory: 0,
      itemstypes: [
		{ type: 0, name: "Nix" },
        { type: 1, name: "Eisen" },
        { type: 2, name: "schmelzendes Eisen" },
        { type: 3, name: "Geschmolzendes Eisen" },
        { type: 4, name: "zerschmolzendes Eisen" },
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
        { type: 100, type1: 20, type2: 11, name: "Schwert", time: 2000 },
        { type: 101, type1: 21, type2: 12, name: "Axe", time: 4000 },
        { type: 102, type1: 22, type2: 14, name: "Hammer", time: 1000 },
        { type: 103, type1: 23, type2: 13, name: "Harke", time: 3000 },
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
      return Object.assign({}, tmp);
    },
    deleteorder() {
      this.orders.shift();
    },
    stoporder() {
      clearInterval(this.intervalid1);
      //clearTimeout((this.intervalid1);
    },
    ordersystem() {
      let neworder = this.addorder();
      let min = 2000;
      let max = 10000;
      if (this.orders.length > 4) min = 5000;
      if (this.orders.length > 7) min = 10000;
      max = max + neworder.time;
      min = min + neworder.time;
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
