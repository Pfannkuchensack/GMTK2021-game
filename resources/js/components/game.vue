<template>
    <div @keyup="onKeyPress">
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
            cnt: 1,
            intervalid1: false,
            playerX: 0,
            playerY: 0,
        };
    },
    methods: {
        addorder() {
            this.cnt = this.cnt + 1;
            this.orders.push({
                id: this.cnt,
                name: "schwert",
                icon:
                    "https://scratchwars.com/photos/zbrane_avatar/f/0/9.png?m=1485025836",
            });
        },
        deleteorder() {
            this.orders.shift();
        },
        stoporder() {
            clearInterval(this.intervalid1);
            //clearTimeout((this.intervalid1);
        },
        onKeyPress(event) {
            console.log(event);
            //if(event.which ==
        },
    },
    mounted() {
        this.intervalid1 = setInterval(
            function() {
                this.addorder();
            }.bind(this),
            500
        );

        this._keyDownListener = function(e) {
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
