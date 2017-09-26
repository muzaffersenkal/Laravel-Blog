import VueRouter from 'vue-router';

let routes=[
    {
        path:'/',
        component:require('./components/Example')
    },
    {
        path:'/about',
        component:require('./components/Example2')
    }
];

export default new VueRouter({
    mode:'history',
    routes
})
