import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/home.vue';
import Dashboard from '../pages/dashboard.vue';

const routes = [
    {
        page: '/',
        path: '/',
        component: Home, 
        name: "Home", 
        meta: {
            title : "Home"
        }
    }, 
    {
        page: '/dashboard', 
        path: '/dashboard',
        component: Dashboard, 
        name: "Dashboard", 
        meta: {
            title: "Dashboard",
        }
    }
];

const router = createRouter(
    {
        history: createWebHistory(), 
        routes: routes, 
        scrollBehavior() {
            return { top: 0, behavior: 'smooth', }
        }
    }
)

router.beforeEach((to, from,next) => {
    document.title = to.meta.title;
    next();
});

export default router;