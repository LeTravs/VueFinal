<template>
    <div>
      <div v-for="sale in sales" :key="sale.id">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title fw-bold">Date: {{ sale.date }}</h1>
            <p class="card-text fw-bold">Is Credit: {{ sale.is_credit ? 'Yes' : 'No' }}</p>
            <p class="card-text fw-bold">Customer ID: {{ sale.customer_id }}</p>
            <button class="btn btn-danger" @click="deleteSale(sale.id)">Delete</button>
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
        sales: [],
      };
    },
    mounted() {
      this.fetchSales();
    },
    methods: {
      fetchSales() {
        axios.get('/api/sales')
          .then(response => {
            this.sales = response.data;
          })
          .catch(error => {
            console.error('Error fetching sales', error);
          });
      },
      deleteSale(saleId) {
        axios.delete(`/api/sales/${saleId}`)
          .then(response => {
            console.log('Sale deleted successfully', response);
            this.sales = this.sales.filter(sale => sale.id !== saleId);
          })
          .catch(error => {
            console.error('Error deleting sale', error);
          });
      },
    },
  };
  </script>
  
  <style scoped>
  .sale-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    align-items: center; 
  }
  
  .sale-card {
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
  </style>
  