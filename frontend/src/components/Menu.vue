<template>
    <nav class="sidebar">
        <b-container>
            <b-navbar toggleable="lg" type="dark" variant="primary">
                <b-navbar-brand :to="{name: 'vendedores'}">Vendas</b-navbar-brand>

                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav>
                    <b-navbar-nav>
                        <b-nav-item :to="{name: 'vendedores'}">Vendedores</b-nav-item>
                        <b-nav-item :to="{name: 'venda-cadastro'}">Vendas</b-nav-item>
                    </b-navbar-nav>
                </b-collapse>

            </b-navbar>
        </b-container>
    </nav>
</template>

<script>
    export default {
        name: "Menu"
    }
</script>

<style scoped>

    .sidebar{
        background-color: #007bff;
        margin-bottom: 20px;
    }

</style>
