<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row justify-content-end">
                    <img
                        src="https://img.favpng.com/17/2/25/iron-ingot-metal-clip-art-png-favpng-UJhXuz0HMXciFtc5WckEgx2VD_t.jpg"
                        height="64px"
                    />
                </div>
                <div class="row justify-content-end">
                    <img
                        src="https://previews.123rf.com/images/izakowski/izakowski1401/izakowski140100025/24902150-cartoon-illustration-of-wooden-plank-or-board-clip-art.jpg"
                        height="64px"
                    />
                </div>
            </div>
            <div class="col">
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
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3jADMM1UoiT6at21ewy4p5S1VcKtDTaXVLQ&usqp=CAU"
                            :width="32"
                            :height="32"
                        />
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row justify-content-start">
                    <img
                        src="https://media.istockphoto.com/vectors/traditional-woodworking-workshop-vector-id493281662?k=6&m=493281662&s=612x612&w=0&h=kBP0BAu8r8c51225b_GNCs0igGXfmHCpcGut-J8tltM="
                        height="64px"
                    />
                </div>
                <div class="row justify-content-start">
                    <img
                        src="https://d12oja0ew7x0i8.cloudfront.net/images/Article_Images/ImageForArticle_17588(1).jpg"
                        height="64px"
                    />
                </div>
                <div class="row justify-content-start">
                    <img
                        src="https://images-na.ssl-images-amazon.com/images/I/81mVeFWTerL._AC_SY355_.jpg"
                        height="80px"
                    />
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
    width: 32px;
    height: 32px;
    border: 1px solid lightgrey;
}
</style>
