<template>
    <div class="d-flex justify-content-center p-2">
        <div class="d-flex main p-1">
            <div class="row orders">
                <div class="col">
                    <div
                        id="orders"
                        v-for="order in this.ordersProp"
                        :key="order.id"
                        class="order p-1"
                    >
                        <img
                            :key="order.id + '-img'"
                            :src="order.icon"
                            height="64px"
                            width="64px"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "orders",
    inheritAttrs: false,
    props: {
        ordersProp: Array,
    },
    data: () => {
        return {};
    },
    methods: {},
    mounted() {},
};
</script>

<style scoped>
.main {
    background: rgb(66, 61, 61);
    width: 512px;
}

.order {
    float: left;
}

.orders {
    overflow: hidden;
    height: 70px;
    width: 512px;
}
</style>
