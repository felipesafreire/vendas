<template>

    <b-container>

        <b-row>
            <b-col>
                <h3>
                    Cadastro de Vendas
                </h3>
            </b-col>
        </b-row>

        <b-row>
            <b-col md="10">
                <b-form-group label="Vendedor:">
                    <b-form-select v-model="venda.vendedor">
                        <option :value="vendedor.id" v-for="vendedor in vendedores">
                            {{vendedor.nome}}
                        </option>
                    </b-form-select>
                </b-form-group>
            </b-col>
            <b-col md="2">
                <b-form-group label="Valor da venda:" class="2">
                    <b-form-input v-model="venda.valor" type="number"
                                  placeholder="Digite o valor da venda"></b-form-input>
                </b-form-group>
            </b-col>
        </b-row>

        <b-row>
            <b-col style="text-align: right">
                <b-button @click="salvar" variant="primary">Salvar</b-button>
            </b-col>
        </b-row>


    </b-container>


</template>

<script>
    import {VendedorService} from "../service/VendedorService";
    import {VendaService} from "../service/VendaService";

    export default {
        name: "CadastroVenda",
        mounted() {
            this.buscaVendedores()
        },
        data: () => {
            return {
                venda: {vendedor: '', valor: 0},
                vendedores: [],
                serviceVendedor: new VendedorService(),
                serviceVenda: new VendaService()
            }
        },
        methods: {
            buscaVendedores() {
                this.serviceVendedor
                    .todos()
                    .then(success => this.vendedores = success)
                    .catch(() => this.vendedores = [])
            },
            salvar() {
                if (this.venda.vendedor == '') {
                    alert('Vendedor não selecionado');
                    return;
                }
                if (parseFloat(this.venda.valor) <= 0) {
                    alert("Valor da venda não pode ser 0.");
                    return;
                }
                this.serviceVenda
                    .salvar(this.venda)
                    .then(() => this.$router.push({name: 'venda', params: {idVendedor: this.venda.vendedor}}))
                    .catch(() => this.vendedores = []);
            }
        }
    }
</script>

<style scoped>

</style>
