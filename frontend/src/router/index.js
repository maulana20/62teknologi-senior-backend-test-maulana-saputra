import Vue from 'vue';
import Router from 'vue-router';
import store from "../store";

Vue.use(Router);

const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: "home",
      component: require("../views/Home.vue").default,
    },
    {
      path: "/dashboard",
      name: "dashboard",
      component: require("../views/Dashboard.vue").default,
      meta: { auth: true }
    },
    {
      path: "/business",
      name: "business",
      component: require("../views/business/Index.vue").default,
      meta: { auth: true }
    },
    {
      path: "/business/:id",
      name: "business/:id",
      component: require("../views/business/Detail.vue").default,
      meta: { auth: true }
    },
    {
      path: '/login',
      name: "login",
      component: require("../views/auth/Login.vue").default,
    }
  ]
});

const token = localStorage.getItem('token');
router.beforeEach((to, from, next) => {
  if (to.matched.some(route => route.meta.auth) && !token) {
    next({ name: 'login' });
  } else if (to.path === '/login' && token) {
    next({ name: 'dashboard' });
    return;
  } else {
    next({ name: to.params.pathMatch });
  }
});

export default router;
