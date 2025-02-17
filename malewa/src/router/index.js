import { createWebHistory, createRouter } from 'vue-router'
import HomeView from '../views/acceuil/HomeView.vue'
import Login from '@/views/auth/Login.vue'
import Users from '@/views/admin/Users.vue'
import CreateUser from '@/views/admin/CreateUser.vue'
import Depots from '@/views/users/Depots.vue'
import Depot from '@/views/users/Depot.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
  },
  {
    path: '/users',
    name: 'Utilisateurs',
    component: Users
  },
  {
    path: '/depots',
    name: 'Enregistrements',
    component: Depots
  },
  {
    path: '/depot',
    name: 'Nouveau dépot',
    component: Depot
  },
  {
    path: '/users/create',
    name: 'Nouvel Utilisateur',
    component: CreateUser
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (About.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import('../views/acceuil/AboutView.vue'),
  },
]
const router = createRouter({
  history: createWebHistory(),
  routes
});


export default router
