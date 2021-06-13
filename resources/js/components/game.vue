<template>
    <div class="main">
        <orders :ordersProp="orders"></orders>
        <gamefield
            :playerXProp="playerX"
            :playerYProp="playerY"
            :playerInventoryProp="playerInventory"
			:furnaceInventoryProp="interactionLocations[2].inventory"
			:cleaverInventoryProp="interactionLocations[3].inventory"
			:anvilInventoryProp="interactionLocations[3].inventory"
        ></gamefield>
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
            setinterval: false,
            playerX: 0,
            playerY: 0,
            playerInventory: 0,
            itemstypes: [
                { type: 0, name: "Leer" },
                { type: 1, name: "Eisen", ticks: 2, nexttype: 2 },
                { type: 2, name: "Schmelzendes Eisen", ticks: 10, nexttype: 3 },
                {
                    type: 3,
                    name: "Geschmolzendes Eisen",
                    ticks: 20,
                    nexttype: 4,
                },
                {
                    type: 4,
                    name: "Zerschmolzendes Eisen",
                    ticks: 1,
                    nexttype: 0,
                },
                { type: 10, name: "Holz", ticks: 10 },
                { type: 11, name: "Schwert Schaft", ticks: -1 },
                { type: 12, name: "Axt Schaft", ticks: -1 },
                { type: 13, name: "Harke Schaft", ticks: -1 },
                { type: 14, name: "Werkzeug Schaft", ticks: -1 },
                { type: 20, name: "Schwertklinge", ticks: -1 },
                { type: 21, name: "Axtklinge", ticks: -1 },
                { type: 22, name: "Hammerkopf", ticks: -1 },
                { type: 23, name: "Harkenkopf", ticks: -1 },
            ],
            ordertypes: [
                {
                    type: 100,
                    type1: 20,
                    type2: 11,
                    name: "Schwert",
                    time: 2000,
                },
                { type: 101, type1: 21, type2: 12, name: "Axe", time: 4000 },
                { type: 102, type1: 22, type2: 14, name: "Hammer", time: 1000 },
                //{ type: 103, type1: 23, type2: 13, name: "Harke", time: 3000 },
            ],
            icons: [
                {
                    name: "Schwert",
                    icon: "/images/items/broad-dagger.png",
                },
                {
                    name: "Axe",
                    icon: "/images/items/battle-axe.png",
                },
                {
                    name: "Hammer",
                    icon: "/images/items/claw-hammer.png",
                },
                {
                    name: "Harke",
                    icon:
                        "https://scratchwars.com/photos/zbrane_avatar/f/0/9.png?m=1485025836",
                },
            ],
            //Actions:
            // PICKUP_ACTION: 0,
            // PLACE_ACTION: 1,
            // BOTH_ACTION: 2,
            // interaction positions
            interactionLocations: [
                {
                    name: "Eisen",
                    actionType: 0,
                    x: 0,
                    y: 0,
                    pickupType: 1,
                },
                {
                    name: "Holz",
                    actionType: 0,
                    x: 0,
                    y: 2,
                    pickupType: 10,
                },
                {
                    name: "Ofen",
                    actionType: 2,
                    x: 4,
                    y: 2,
                    inventory: [],
                    inventorySize: 1,
                    acceptTypes: [1, 2, 3, 4],
                },
                {
                    name: "Säge",
                    actionType: 2,
                    x: 4,
                    y: 0,
                    inventory: [],
                    inventorySize: 1,
                    acceptTypes: [10],
                },
            ],
        };
    },
    methods: {
        addorder() {
            this.cnt = this.cnt + 1;
            let tmp = _.sample(this.ordertypes); //[Math.floor(Math.random()*this.ordertypes.length) | 0];
            tmp.id = this.cnt;
            tmp.icon = this.icons.find((e) => e.name == tmp.name).icon;
            this.orders.push(Object.assign({}, tmp));
            return Object.assign({}, tmp);
        },
        deleteorder() {
            this.orders.shift();
        },
        stoporder() {
            clearInterval(this.setinterval);
            //clearTimeout((this.settimeout);
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
            //console.log(next);
            this.settimeout = setTimeout(
                function() {
                    this.ordersystem();
                }.bind(this),
                next
            );
        },
        ticksystem() {
            console.log("tick");
            this.interactionLocations.forEach((location) => {
                if (
                    typeof location.inventory != "undefined" &&
                    location.inventory.length > 0
                ) {
                    location.inventory.forEach((item, i, a) => {
                        item.ticks--;
                        if (item.ticks == 0) {
                            if (
                                this.itemstypes.find((e) => e.type == item.type)
                                    .nexttype == 0
                            )
                                a.splice(i, 1);
                            item.type = this.itemstypes.find(
                                (e) => e.type == item.type
                            ).nexttype;
                            item.ticks = this.itemstypes.find(
                                (e) => e.type == item.type
                            ).ticks;
                        }
                    });
                }
            });
        },
    },
    mounted() {
        this.settimeout = setTimeout(
            function() {
                this.ordersystem();
            }.bind(this),
            2000
        );
        this.setinterval = setInterval(
            function() {
                this.ticksystem();
            }.bind(this),
            1000
        );

        this._keyDownListener = function(e) {
            if (e.key === "w") {
                e.preventDefault();
                this.playerY = this.playerY - 1 < 0 ? 0 : this.playerY - 1;
            }
            if (e.key === "s") {
                e.preventDefault();
                this.playerY = this.playerY + 1 > 4 ? 4 : this.playerY + 1;
            }
            if (e.key === "a") {
                e.preventDefault();
                this.playerX = this.playerX - 1 < 0 ? 0 : this.playerX - 1;
            }
            if (e.key === "d") {
                e.preventDefault();
                this.playerX = this.playerX + 1 > 4 ? 4 : this.playerX + 1;
            }
            if (e.key === " ") {
                this.interactionLocations.forEach((location) => {
                    if (
                        location.x == this.playerX &&
                        location.y == this.playerY
                    ) {
                        if (
                            location.actionType == 0 &&
                            this.playerInventory == 0
                        ) {
                            // PickupAction
                            this.playerInventory = location.pickupType;
                        } else if (
                            location.actionType == 1 &&
                            this.playerInventory != 0
                        ) {
                            // PlaceAction
                            if (
                                location.acceptTypes.includes(
                                    this.playerInventory
                                )
                            ) {
                                location.inventory = this.playerinventory;
                                this.playerInventory = 0;
                            }
                        } else if (location.actionType == 2) {
                            // BothAction
                            if (this.playerInventory != 0) {
                                // PlaceAction
                                if (
                                    location.acceptTypes.includes(
                                        this.playerInventory
                                    )
                                ) {
                                    if (
                                        location.inventorySize >
                                        location.inventory.length
                                    ) {
                                        // Gibt noch Platz -> Ja
                                        location.inventory.push({
                                            type: this.playerInventory,
                                            ticks: this.itemstypes.find(
                                                (e) =>
                                                    e.type ==
                                                    this.playerInventory
                                            ).ticks,
                                        });
                                        this.playerInventory = 0;
                                    }
                                }
                            } else if (
                                // PickupAction
                                this.playerInventory == 0 &&
                                location.inventory.length > 0
                            ) {
                                let tmp = location.inventory.shift();
                                this.playerInventory = tmp.type;
                            }
                        }
                    }
                });
            }
        };

        document.addEventListener("keydown", this._keyDownListener.bind(this));
    },
    beforeDestroy() {
        document.removeEventListener("keydown", this._keyDownListener);
    },
};
</script>

<style scoped>
.main {
    background: rgb(155, 37, 37);
}
</style>
