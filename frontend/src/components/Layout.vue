<template>
    <div>
        <Menu></Menu>
        <b-container>
            <router-view></router-view>
        </b-container>
    </div>
</template>

<script>
    import Menu from "./Menu";
    export default {
        name: "Layout",
        components: {Menu}
    }
</script>

<style scoped>

</style>
