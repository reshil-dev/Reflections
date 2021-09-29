import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from "./views/Home.vue";
import Tasks from "./views/Tasks.vue";
import PriorityTask from "./views/GetTask.vue";

Vue.use(VueRouter);

let routes = [
    {
        path: '/',
        component: Home
    },
    {
        name: 'tasks',
        path: '/tasks',
        component: Tasks
    },
     {
        name: 'prioritytask',
        path: '/tasks/priority',
        component: PriorityTask
    },
]

let router = new VueRouter({
    routes,
    // mode: 'history'
});

export default router;
