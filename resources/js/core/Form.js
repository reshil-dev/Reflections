import Errors from "./Error";
import axios from 'axios';

class Form {

    constructor(data) {

        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();

    }

    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }

    reset() {
        for (let field in this.originalData) {
            this[field] = ''
        }
        this.errors.clear();
    }

    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            //axios.get('/sanctum/csrf-cookie').then(response => {
                axios[requestType](url, this.data())
                    .then(response => {
                        this.onSuccess(response.data);

                        resolve(response.data);
                    })
                    .catch(error => {
                        this.onFail(error.response.data);

                        reject(error.response.data);
                    });
            //}).catch(response =>console.log(response));
        });
    }

    onSuccess(response) {
        console.log(response.message);
        this.reset();
    }

    onFail(data) {
        this.errors.record(data.errors);
    }

    get(url) {
        return this.submit('get', url);
    }

    post(url) {
        return this.submit('post', url);
    }

    put(url) {
        return this.submit('put', url);
    }

    patch(url) {
        return this.submit('patch', url);
    }

    delete(url) {
        return this.submit('delete', url);
    }
}

export default Form;
