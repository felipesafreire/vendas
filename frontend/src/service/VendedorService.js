import {http} from "../http/Http";

export class VendedorService {

    todos() {
        return http('get', `vendedor/todos`);
    }

    salvar(data){
        return http('post', `vendedor`, data);
    }

    vendas(idVendedor){
        return http('get', `vendedor/${idVendedor}/vendas`);
    }

}
