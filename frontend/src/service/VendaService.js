import {http} from "../http/Http";

export class VendaService {

    salvar(data){
        return http('post', `venda`, data);
    }

}
