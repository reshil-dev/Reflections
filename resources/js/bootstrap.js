import Vue from 'vue';
import Form from './core/Form.js';

window.Vue = Vue;
window.Form = Form;

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
