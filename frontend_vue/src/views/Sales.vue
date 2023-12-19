<template>
    <div>
      <h2>Sales List</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Is Credit</th>
            <th>Customer ID</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="sale in sales" :key="sale.id">
            <td>{{ sale.id }}</td>
            <td>{{ sale.date }}</td>
            <td>{{ sale.is_credit ? 'Yes' : 'No' }}</td>
            <td>{{ sale.customer_id }}</td>
            <td>
              <button @click="deleteSale(sale.id)">Delete</button>
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
      const sales = ref([]);
  
      const loadSales = async () => {
        try {
          const response = await fetch('http://localhost:8000/api/sales');
          const data = await response.json();
          sales.value = data;
        } catch (error) {
          console.error('Error loading sales:', error);
        }
      };
  
      const deleteSale = async (saleId) => {
        try {
          // Send a request to your backend API to delete the sale
          await fetch(`http://localhost:8000/api/sales/${saleId}`, {
            method: 'DELETE',
          });
  
          // Remove the deleted sale from the local list
          sales.value = sales.value.filter((sale) => sale.id !== saleId);
        } catch (error) {
          console.error('Error deleting sale:', error);
        }
      };
  
      onMounted(() => {
        loadSales();
      });
  
      return {
        sales,
        deleteSale,
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
  margin-left: 10%;
}

h2 {
  font-size: 28px;
  color: #333; 
  margin-bottom: 20px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}
</style>