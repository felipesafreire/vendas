<template>
    <div>

        <b-container class="bv-example-row">

            <b-row style="margin: 10px 0;">
                <b-col>
                    <h3>
                        Vendedores
                    </h3>
                </b-col>
                <b-col style="text-align: right">
                    <b-button v-b-modal.modal-cadastro variant="success">
                        Cadastrar Vendedor
                    </b-button>
                </b-col>
            </b-row>

            <b-row>
                <b-col>
                    <b-table responsive striped hover :items="data" :fields="fields">
                        <template slot="comissao" slot-scope="data">
                            {{ data.item.comissao }}%
                        </template>
                        <template slot="venda" slot-scope="data">
                            <b-button size="sm" :to="{name:'venda', params:{idVendedor: data.item.id}}" variant="primary">
                                Vendas
                            </b-button>
                        </template>
                        <div slot="table-busy" class="text-center text-danger my-2">
                            <b-spinner class="align-middle"></b-spinner>
                            <strong>Carregando...</strong>
                        </div>
                    </b-table>
                </b-col>
            </b-row>

        </b-container>

        <b-modal hide-footer ref="modal-cadastro" id="modal-cadastro" title="Cadastro de Vendedor">
            <b-form-group label="Nome:">
                <b-form-input autofocus v-model="cadastro.nome" type="text"
                              placeholder="Digite o nome do vendedor"></b-form-input>
            </b-form-group>
            <b-form-group label="E-mail:">
                <b-form-input v-model="cadastro.email" type="email"
                              placeholder="Digite o e-mail do vendedor"></b-form-input>
            </b-form-group>
            <b-row>
                <b-col style="text-align: right">
                    <b-button @click="cancelar" style="margin-right: 10px;">Cancelar</b-button>
                    <b-button @click="salvar" variant="primary">Salvar</b-button>
                </b-col>
            </b-row>
        </b-modal>

    </div>
</template>

<script>
    import {VendedorService} from "../service/VendedorService";
    import {validateEmail} from "../helper/usuario";

    export default {
        name: "Vendedor",
        mounted: function () {
            this.buscaVendedores();
        },
        data: () => {
            return {
                service: new VendedorService(),
                data: [],
                cadastro: {nome: '', email: ''},
                fields: {
                    nome: {label: "Nome"},
                    email: {label: "E-mail"},
                    comissao: {label: "Comissão", key: 'comissao'},
                    venda: {label: "Venda"}
                }
            }
        },
        methods: {
            buscaVendedores() {
                this.service
                    .todos()
                    .then(success => this.data = success)
                    .catch(() => {
                        alert('Erro ao trazer os vendedores');
                        this.data = [];
                    })
            },
            cancelar() {
                this.$refs['modal-cadastro'].hide();
                this.cadastro.nome = '';
                this.cadastro.email = '';
            },
            salvar() {

                if (this.cadastro.nome == '' && this.cadastro.email == '') {
                    alert("Todos os campos são obrigatórios");
                    return;
                }

                if (!validateEmail(this.cadastro.email)) {
                    alert("E-mail inválido.");
                    return;
                }

                this.service
                    .salvar(this.cadastro)
                    .then(() => {
                        this.cancelar();
                        this.buscaVendedores();
                    })
                    .catch(err => alert(err))
            }
        }
    }
</script>

<style scoped>

</style>
