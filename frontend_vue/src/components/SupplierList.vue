<template>
    <div class="supplier-list">
      <div v-for="supplier in suppliers" :key="supplier.id" class="supplier-card">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title fw-bold">Company Name: {{ supplier.company_name }}</h1>
            <p class="card-text fw-bold">Address: {{ supplier.address }}</p>
            <p class="card-text fw-bold">Phone: {{ supplier.phone }}</p>
            <p class="card-text fw-bold">Contact Person: {{ supplier.contact_person }}</p>
            <button class="btn btn-danger" @click="deleteSupplier(supplier.id)">Delete</button>
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
        suppliers: [],
      };
    },
    mounted() {
      this.fetchSuppliers();
    },
    methods: {
      fetchSuppliers() {
        axios.get('/api/suppliers')
          .then(response => {
            this.suppliers = response.data;
          })
          .catch(error => {
            console.error('Error fetching suppliers', error);
          });
      },
      deleteSupplier(supplierId) {
        axios.delete(`/api/suppliers/${supplierId}`)
          .then(response => {
            console.log('Supplier deleted successfully', response);
            this.suppliers = this.suppliers.filter(supplier => supplier.id !== supplierId);
          })
          .catch(error => {
            console.error('Error deleting supplier', error);
          });
      },
    },
  };
  </script>
  
  <style scoped>
  .supplier-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    align-items: center; /* Center vertically */
  }
  
  .supplier-card {
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
  