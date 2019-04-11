import axios from 'axios';

export function http(metodo, url, data = null) {

    let http;

    if (metodo.toLowerCase() == "get") {

        return axios({
            headers: {
                'Content-Type': 'application/json'
            },
            responseType: 'json',
            method: metodo,
            url: url,
            params: data ? data : '',
        }).then(function (response) {
            return response.data;
        }).catch(function (error) {
            return error;
        });

    } else {

        return axios({
            responseType: 'json',
            method: metodo,
            url: url,
            data: data ? data : '',
        }).then(function (response) {
            return response.data;
        }).catch(function (error) {
            return error.data;
        });

    }

}
