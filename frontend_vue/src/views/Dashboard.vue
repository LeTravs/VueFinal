<template>
  <div class="wrapper">
    <div class="dashboard">
      <h1 class="title">Inventory Dashboard</h1>
      <h2>Welcome My Inventory Management System!</h2>
      <div class="features">
  <div class="feature">
    <h3>Manage Customers</h3>
    <p>Efficiently organize and keep track of your customer relationships.</p>
  </div>
  <div class="feature">
    <h3>Track Sales</h3>
    <p>Keep tabs on sales transactions and ensure business success.</p>
  </div>
  <div class="feature">
    <h3>Supplier Management</h3>
    <p>Organize and monitor all your supplier relationships with ease and precision.</p>
  </div>
</div>
      <router-link to="/customers" class="button">Explore Inventory</router-link>
    </div>
  </div>
  
</template>

<style scoped>
.wrapper {
  text-align: center;
  margin-top: 20vh;
  margin-left: 10%;
  width: 1400px;
}

.dashboard {
  background-color: #3498db;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
  padding: 20px;
  transform: perspective(1000px) rotateX(20deg);
  transition: transform 0.5s;
}

.dashboard:hover {
  transform: perspective(1000px) rotateX(0deg);
}

.title {
  font-size: 2em;
  font-family: 'Arial', sans-serif;
  color: #2c3e50;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

h2 {
  font-size: 1.5em;
  color: #ecf0f1;
  margin-top: 5vh;
}

.features {
  display: flex;
  justify-content: space-around;
  margin-top: 20px;
}

.feature {
  flex: 1;
  background-color: #2c3e50;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
  margin: 0 10px;
}

h3 {
  font-size: 20px;
  color: #bdc3c7;
  margin-bottom: 10px;
}

p {
  color: #ecf0f1;
}

a {
  text-decoration: none;
}

.button {
  border-radius: 5px;
  color: white;
  background-color: #3498db;
  font-family: 'Arial', sans-serif;
  border: none;
  padding: 10px;
  width: 150px;
  display: inline-block;
  margin-top: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.button:hover {
  background-color: #2980b9;
}
</style>
