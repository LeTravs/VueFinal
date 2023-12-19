<script>
import { RouterLink, RouterView } from 'vue-router';
import CustomerList from './components/CustomerList.vue';
import SaleList from './components/SaleList.vue';
import App from './App.vue';


export default {
  components: {
    CustomerList, SaleList,
  },
};
</script>


<template>
  
  <div>
    <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezP1U+9uPtoAZ3f7bD5PZVMKq4PjKyFRI3fvlE+Iu6ZB7bRv8sOcXgq0jzjfe5Pd" crossorigin="anonymous">
      <title>Inventory Management</title>
    </head>
    
    <div class="container">
      <div class="Sidebar">
        <div class="Header">
          <img src="https://cdn-icons-png.flaticon.com/512/7527/7527289.png">
          <div class="title">Inventory Management</div>
        </div>
        <nav class="Sidebar-link">
          <ul class="nav-list">
            <li>
              <router-link to="/" class="nav-link">Dashboard</router-link>
            </li>
            <li>
              <router-link to="/customers" class="nav-link">Customer</router-link>
            </li>
            <li>
              <router-link to="/sales" class="nav-link">Sales</router-link>
            </li>
            <li>
              <router-link to="/suppliers" class="nav-link">Suppliers</router-link>
            </li>
          </ul>
        </nav>
        <div class="inventory">
          Optimizing inventory management is essential for minimizing costs, 
          preventing stockouts, and enhancing overall supply chain efficiency. <br /> <br />
        <small>Created <br>Lee C. Traveros.</small>
      </div>
      </div>
      <div class="main-content">
        <router-view />
      </div>
    </div>
  </div>
</template>

<style scoped>
.container {
  display: flex;
  height: 100vh;
  background-color: #b5d9f7; 

}

.Sidebar {
  width: 240px;
  background: linear-gradient(to right, #3498db, #2980b9); 
  padding: 20px;
  height: 95.8%;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); 
  flex-direction: column;
}

img {
  height: 110px;
  border-radius: 50%;
  margin: 0 auto; 
  display: block;
}

.Header {
  margin-bottom: 20px;
}

.title {
  font-size: 28px; 
  font-weight: bold;
  color: #ecf0f1; 
  text-align: center;
  font-family: 'Pacifico', cursive; 
}

.Sidebar-link .nav-list {
  list-style: none;
  padding: 0;
  margin-top: 20px;
}

.nav-link {
  display: flex;
  align-items: center;
  color: #ecf0f1;
  padding: 12px;
  font-size: 18px; 
  font-family: 'Raleway', sans-serif; 
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.nav-link i {
  margin-right: 10px;
}

.nav-link:hover {
  background-color: #e74c3c; 
}




.main-content {
  width: 50%;
  background-color: #b5d9f7; 
  color: #000000; 
  padding: 20px;
}

.inventory {
  color: #000000; 
  font-size: 16px; 
  line-height: 1.6;
  margin-top: 100%; 
}

.inventory small {
  display: block;
  margin-top: 10px;
  color: #000000;
  font-size: 30px;
}
</style>


