<template>
    <div class="container">
        <div class="gamefield">
            <div>
                <div>
                    <img src="/images/metal-bar.png" height="64px" />
                </div>
                <div>
                    <img src="/images/blank.png" height="64px" />
                </div>
                <div>
                    <img src="/images/log.png" height="64px" />
                </div>
            </div>
            <div class="gridField">
                <div
                    v-for="index in 25"
                    :key="index - 1"
                    :x="(index - 1) % 5"
                    :y="Math.floor((index - 1) / 5)"
                    class="fieldTile"
                >
                    <img
                        v-if="
                            (index - 1) % 5 == playerXProp &&
                                Math.floor((index - 1) / 5) == playerYProp
                        "
                        src="/images/fat.png"
                        width="64"
                        height="64"
                    />
                </div>
            </div>
            <div>
                <div>
                    <img src="/images/toolbox.png" height="64px" />
                </div>
                <div>
                    <img src="/images/blank.png" height="64px" />
                </div>
                <div>
                    <img src="/images/furnace.png" height="64px" />
                </div>
                <div>
                    <img src="/images/cleaver.png" height="64px" />
                </div>
                <div>
                    <img src="/images/anvil.png" height="64px" />
                </div>
            </div>
        </div>
        <div class="row">
            <span>Inventory: {{ playerInventoryProp }}</span>
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
        playerInventoryProp: Number,
    },
    data: () => {
        return {
            fieldWidth: 10,
            fieldHeight: 10,
        };
    },
    methods: {},
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
</style>
