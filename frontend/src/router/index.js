import Vue from 'vue';
import Router from 'vue-router';
import store from "../store";

Vue.use(Router);

const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/*',
      redirect: { name: 'login' }
    },
    {
      path: "/dashboard",
      name: "dashboard",
      component: require("../views/Home.vue").default,
      meta: { auth: true }
    },
    {
      path: '/login',
      name: "login",
      component: require("../views/auth/Login.vue").default,
    }
  ]
});

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token');
  if (to.matched.some(route => route.meta.auth) && !token) {
    next({ name: 'login' });
  } else if (to.path === '/login' && token) {
    next({ name: 'dashboard' });
  } else {
    next();
  }
});

export default router;
