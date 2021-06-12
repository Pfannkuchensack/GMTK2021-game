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
                <span v-if="x - 1 == playerXProp && y - 1 == playerYProp"
                    >X</span
                >
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
    width: 40px;
    height: 40px;
}
</style>
