<template>
    <div>
      <h2>Histórico de Transações</h2>
      <ul>
        <li v-for="transaction in transactions" :key="transaction.id">
          {{ transaction.type }} de R$ {{ transaction.amount.toFixed(2) }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        transactions: [],
      };
    },
  };
  </script>
  