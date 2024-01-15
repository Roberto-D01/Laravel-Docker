<template>
    <div>
      <h2>Realizar Saque</h2>
      <input type="number" v-model="amount" placeholder="Informe o valor">
      <button @click="realizarSaque">Sacar</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        amount: 0,
      };
    },
    methods: {
      realizarSaque() {
        // Lógica para realizar o saque
        console.log(`Saque de R$ ${this.amount.toFixed(2)} realizado.`);
        // Atualizar saldo e histórico de transações
      },
    },
  };
  </script>
  