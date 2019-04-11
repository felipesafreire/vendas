<template>

    <b-container class="bv-example-row">

        <b-row style="margin: 10px 0;">
            <b-col>
                <h3>
                    Vendas - {{vendedor.nome}}
                </h3>
                <p>{{vendedor.email}}</p>
            </b-col>
            <b-col style="text-align: right">
                <b-button :to="{name:'venda-cadastro'}" variant="success">
                    Cadastrar Venda
                </b-button>
            </b-col>
        </b-row>

        <b-row>
            <b-col>
                <b-table responsive striped hover :items="vendedor.vendas" :fields="fields">
                    <template slot="valor_venda" slot-scope="data">
                        {{ data.item.valor_venda | currency }}
                    </template>
                    <template slot="comissao" slot-scope="data">
                        {{ data.item.comissao | currency }}
                    </template>
                    <div slot="table-busy" class="text-center text-danger my-2">
                        <b-spinner class="align-middle"></b-spinner>
                        <strong>Carregando...</strong>
                    </div>
                </b-table>
            </b-col>
        </b-row>

    </b-container>

</template>

<script>
    import {VendedorService} from "../service/VendedorService";

    export default {
        name: "VendasVendedor",
        mounted() {
            this.buscaVendas();
        },
        data: () => {
            return {
                vendedor: {vendas: [], nome: '', email: ''},
                fields: {
                    data_venda: {label: "Data Venda"},
                    valor_venda: {label: "Valor"},
                    comissao: {label: "Comissão Vendedor"},
                },
                data: [],
                serviceVendedor: new VendedorService()
            }
        },
        methods: {
            buscaVendas() {
                this.serviceVendedor
                    .vendas(this.$route.params.idVendedor)
                    .then(success => {
                        this.vendedor = success
                    })
                    .catch(() => {
                        alert("Erro ao buscar vendas.");
                        this.$router.go(-1);
                    })
            }
        }

    }
</script>

<style scoped>

</style>
