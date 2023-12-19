<template>
    <div>
      <h2>Supplier List</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Company Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Contact Person</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="supplier in suppliers" :key="supplier.id">
            <td>{{ supplier.id }}</td>
            <td>{{ supplier.company_name }}</td>
            <td>{{ supplier.address }}</td>
            <td>{{ supplier.phone }}</td>
            <td>{{ supplier.contact_person }}</td>
            <td>
              <button @click="deleteSupplier(supplier.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import { onMounted, ref } from 'vue';
  
  export default {
    setup() {
      const suppliers = ref([]);
  
      const loadSuppliers = async () => {
        try {
          const response = await fetch('http://localhost:8000/api/suppliers');
          const data = await response.json();
          suppliers.value = data;
        } catch (error) {
          console.error('Error loading suppliers:', error);
        }
      };
  
      const deleteSupplier = async (supplierId) => {
        try {
          // Send a request to your backend API to delete the supplier
          await fetch(`http://localhost:8000/api/suppliers/${supplierId}`, {
            method: 'DELETE',
          });
  
          // Remove the deleted supplier from the local list
          suppliers.value = suppliers.value.filter((supplier) => supplier.id !== supplierId);
        } catch (error) {
          console.error('Error deleting supplier:', error);
        }
      };
  
      onMounted(() => {
        loadSuppliers();
      });
  
      return {
        suppliers,
        deleteSupplier,
      };
    },
  };
  </script>
  
  <style scoped>
  .wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    overflow-x: auto;
  }
  
  table {
    width: 80%;
    border-collapse: collapse;
    margin-top: 20px;
    border-radius: 8px; 
    overflow: hidden; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    background: linear-gradient(to bottom, #ffffff, #f0f0f0); 
  }
  
  th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
  }
  
  th {
    background-color: #f2f2f2;
  }
  
  button {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
  }
  
  button:hover {
    background-color: #c0392b;
  }
  
  
  table {
    margin: 0 auto;
    margin-left: 20%;
  }
  
  h2 {
    font-size: 28px;
    color: #333; 
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
  }
  </style>
  
