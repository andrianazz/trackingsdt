import './bootstrap';
import "../css/app.css";

import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'

import {library} from '@fortawesome/fontawesome-svg-core';
import {
    faRightToBracket,
    faSearch,
    faFile,
    faUsersGear,
    faTruckFast,
    faCheckToSlot
} from '@fortawesome/free-solid-svg-icons';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';

import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';

library.add(
    faRightToBracket,
    faSearch,
    faFile,
    faUsersGear,
    faTruckFast,
    faCheckToSlot
);

createInertiaApp({
    title: title => `${title}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        return pages[`./Pages/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el)
    },
})
