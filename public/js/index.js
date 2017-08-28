import Vue from 'vue';
import VueResource from 'vue-resource';

import router from '../routers';
import App from '../App';

Vue.use(VueResource);

Vue.config.productionTip = false;

window.vm = new Vue({
    el: "#main",
    router,
    data: {
        eventHub: new Vue()
    },
    render: h => h(App),
    watch: {

    }
});
