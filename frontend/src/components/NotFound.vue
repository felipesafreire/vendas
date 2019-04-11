<template>
    <b-container>
        <section>
            <h3>
                404 - Not Found
                <br>
                <b-button @click="$router.go(-1)">Voltar</b-button>
            </h3>
        </section>
    </b-container>
</template>

<script>
    export default {
        name: "NotFound"
    }
</script>

<style scoped>
    section{
        display: flex;
        justify-content: center;
    }
    h3 {
        position: absolute;
        top: 40%;
        max-width: 100%;
        height: 100%;
        text-align: center;
    }
</style>
