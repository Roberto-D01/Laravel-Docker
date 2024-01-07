<template>
    <div>
      <h2>Realizar Depósito</h2>
      <input type="number" v-model="amount" placeholder="Informe o valor">
      <button @click="realizarDeposito">Depositar</button>
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
      realizarDeposito() {
        console.log(`Depósito de R$ ${this.amount.toFixed(2)} realizado.`);
      },
    },
  };
  </script>
  