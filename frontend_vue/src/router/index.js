import { createRouter, createWebHistory } from 'vue-router'
import Dashboard from '../views/Dashboard.vue'
import Customers from '../views/Customers.vue'
import Sales from '../views/Sales.vue'
import Suppliers from '../views/Suppliers.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'dashboard',
      component: Dashboard
    },

    {
      path: '/customers',
      name: 'customer',
      component: Customers
    },

    {
      path: '/sales',
      name: 'sales',
      component: Sales
    },

    {
      path: '/suppliers',
      name: 'suppliers',
      component: Suppliers
    },
  ]
})

export default router
