<template>
  <div>
    <div v-for="customer in customers" :key="customer.id">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title fw-bold">Name: {{ customer.name }}</h1>
          <p class="card-text fw-bold">Address: {{ customer.address }}</p>
          <p class="card-text fw-bold">Phone: {{ customer.phone }}</p>
          <p class="card-text fw-bold">Balance: {{ customer.balance }}</p>
          <button class="btn" @click="deleteCustomer(customer.id)">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      customers: [],
    };
  },
  mounted() {
    this.fetchCustomers();
  },
  methods: {
    fetchCustomers() {
      axios.get('/api/customers')
        .then(response => {
          this.customers = response.data;
        })
        .catch(error => {
          console.error('Error fetching customers', error);
        });
    },
    deleteCustomer(customerId) {
      axios.delete(`/api/customers/${customerId}`)
        .then(response => {
          console.log('Customer deleted successfully', response);
          this.customers = this.customers.filter(customer => customer.id !== customerId);
        })
        .catch(error => {
          console.error('Error deleting customer', error);
        });
    },
  },
};
</script>

<style scoped>
.customer-list {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  align-items: center; /* Center vertically */
}

.customer-card {
  flex: 1;
  max-width: 300px;
}

.card {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-body {
  padding: 20px;
}

.card-title {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.card-text {
  margin-bottom: 8px;
}

.btn {
  padding: 8px 16px;
  cursor: pointer;
}

.btn-danger {
  background-color: #dc3545;
  color: #fff;
  border: none;
}

.btn-danger:hover {
  background-color: #c82333;
}
</style>
