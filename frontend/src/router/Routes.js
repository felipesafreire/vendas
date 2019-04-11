const NotFound = () => System.import("../components/NotFound");
const Layout = () => System.import("../components/Layout");
const Vendedor = () => System.import("../components/Vendedor");
const CadastroVenda = () => System.import("../components/CadastroVenda");
const Venda = () => System.import("../components/VendasVendedor");

export const routes = [
    {path: '*', component: NotFound},
    {
        path: '/', component: Layout,
        children: [
            {path: "", component: Vendedor, name: 'vendedores'},
            {path: "venda/cadastro", component: CadastroVenda, name: 'venda-cadastro'},
            {path: "venda/:idVendedor", component: Venda, name: 'venda'}
        ]
    }
];
