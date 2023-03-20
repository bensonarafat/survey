import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/home.vue';
import Dashboard from '../pages/dashboard.vue';
import Survey from '../pages/survey.vue';
import Question from '../pages/question.vue';

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
    },
    {
        page: '/survey',
        path: '/survey/:id',
        component: Survey,
        name: "Survey",
        meta: {
            title: "Survey",
        }
    },
    {
        page: '/question',
        path: '/question/:id',
        component: Question,
        name: "Question",
        meta: {
            title: "Question",
        }
    },
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
