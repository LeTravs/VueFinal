<template>
  <div>
    <h2>Customer List</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Balance</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="customer in customers" :key="customer.id">
          <td>{{ customer.id }}</td>
          <td>{{ customer.name }}</td>
          <td>{{ customer.address }}</td>
          <td>{{ customer.phone }}</td>
          <td>{{ customer.balance }}</td>
          <td>
            <button @click="deleteCustomer(customer.id)">Delete</button>
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
    const customers = ref([]);

    const loadCustomers = async () => {
      try {
        const response = await fetch('http://localhost:8000/api/customers');
        const data = await response.json();
        customers.value = data;
      } catch (error) {
        console.error('Error loading customers:', error);
      }
    };

    const deleteCustomer = async (customerId) => {
      try {
        // Send a request to your backend API to delete the customer
        await fetch(`http://localhost:8000/api/customers/${customerId}`, {
          method: 'DELETE',
        });

        // Remove the deleted customer from the local list
        customers.value = customers.value.filter((customer) => customer.id !== customerId);
      } catch (error) {
        console.error('Error deleting customer:', error);
      }
    };

    onMounted(() => {
      loadCustomers();
    });

    return {
      customers,
      deleteCustomer,
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
