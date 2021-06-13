<template>
    <div class="container">
        <div class="gamefield">
            <div>
                <div>
                    <img src="images/metal-bar.png" height="64px" />
                </div>
                <div>
                    <img src="images/blank.png" height="64px" />
                </div>
                <div>
                    <img src="images/log.png" height="64px" />
                </div>
                <div>
                    <img src="images/blank.png" height="64px" />
                </div>
                <div>
                    <img src="images/trash-can.png" height="64px" />
                </div>
            </div>
            <div class="gridField">
                <div
                    v-for="index in 25"
                    :key="index - 1"
                    :x="(index - 1) % 5"
                    :y="Math.floor((index - 1) / 5)"
                    :class="[
                        'fieldTile',
                        isInteractionLocation(
                            (index - 1) % 5,
                            Math.floor((index - 1) / 5)
                        )
                            ? 'interactionTile'
                            : 'other',
                    ]"
                >
                    <img
                        v-if="
                            (index - 1) % 5 == playerXProp &&
                                Math.floor((index - 1) / 5) == playerYProp
                        "
                        src="images/fat-white.png"
                        width="64"
                        height="64"
                    />
                </div>
            </div>
            <div>
                <div>
                    <img src="images/toolbox.png" height="64px" />
                </div>
                <div>
                    <img src="images/blank.png" height="64px" />
                </div>
                <div>
                    <img src="images/furnace.png" height="64px" />
                </div>
                <div>
                    <img src="images/cleaver.png" height="64px" />
                </div>
                <div>
                    <img src="images/anvil.png" height="64px" />
                </div>
            </div>
            <div>
                <div class="locationInventory">
                    <div class="row">
                        <div class="col">
                            <div class="locationInventoryItem">
                                <img
                                    v-for="(item,
                                    i) in interactionLocationsProp[6].inventory"
                                    :key="i"
                                    :src="item.icon"
                                    width="31px"
                                    height="31px"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="images/blank.png" height="64px" />
                </div>
                <div class="locationInventory">
                    <div class="row">
                        <div class="col">
                            <div class="locationInventoryItem">
                                <img
                                    v-for="(item,
                                    i) in interactionLocationsProp[3].inventory"
                                    :key="i"
                                    :src="item.icon"
                                    width="31px"
                                    height="31px"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="locationInventory">
                    <div class="row">
                        <div class="col">
                            <div class="locationInventoryItem">
                                <img
                                    v-for="(item,
                                    i) in interactionLocationsProp[4].inventory"
                                    :key="i"
                                    :src="item.icon"
                                    width="31px"
                                    height="31px"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="locationInventory">
                    <div class="row">
                        <div class="col">
                            <div class="locationInventoryItem">
                                <img
                                    v-for="(item,
                                    i) in interactionLocationsProp[5].inventory"
                                    :key="i"
                                    :src="item.icon"
                                    width="31px"
                                    height="31px"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <span>Score: {{ playerScoreProp }}</span>
        </div>
        <div class="row">
            <img
                v-bind:src="
                    itemTypesProp.find((e) => e.type == playerInventoryProp)
                        .icon
                "
                height="64px"
            />
        </div>
    </div>
</template>

<script>
export default {
    name: "gamefield",
    inheritAttrs: false,
    props: {
        playerXProp: Number,
        playerYProp: Number,
        playerScoreProp: Number,
		playerInventoryProp: Number,
        itemTypesProp: Array,
        interactionLocationsProp: Array,
    },
    data: () => {
        return {
            fieldWidth: 10,
            fieldHeight: 10,
        };
    },
    methods: {
        isInteractionLocation(x, y) {
            let interactionLocation = false;
            this.interactionLocationsProp.forEach((location) => {
                if (location.x == x && location.y == y) {
                    interactionLocation = true;
                }
            });
            return interactionLocation;
        },
    },
    mounted() {},
};
</script>

<style scoped>
.fieldTile {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    border: 1px solid rgb(66, 5, 5);
}

.gamefield {
    display: flex;
    justify-content: center;
    padding: 0px 0px 0px 0px;
    margin: 0px 0px 0px 0px;
}

.gridField {
    display: flex;
    flex-wrap: wrap;
    width: 320px;
}

.interactionTile {
    background: rgb(77, 77, 146);
}

.locationInventory {
    overflow: hidden;
    width: 64px;
    height: 64px;
    border: 1px solid rgb(66, 5, 5);
}

.locationInventoryItem {
    float: left;
}
</style>
