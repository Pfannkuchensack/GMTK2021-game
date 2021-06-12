<template>
    <div class="container">
        <div v-for="y in 8" :key="y - 1" class="row">
            <div
                v-for="x in 8"
                :key="x - 1"
                :x="x - 1"
                :y="y - 1"
                class="fieldTile"
            >
                <img
                    v-if="x - 1 == playerXProp && y - 1 == playerYProp"
                    src="https://png.pngtree.com/png-clipart/20201212/ourmid/pngtree-car-clipart-small-red-car-png-image_2537665.jpg"
                    :width="40"
                    :height="40"
                />
            </div>
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
    width: 40px;
    height: 40px;
    border: 1px solid black;
}
</style>
