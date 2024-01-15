<template>
    <div>
      <h2>Saldo da Conta</h2>
      <p>Seu saldo atual é: R$ {{ saldo.toFixed(2) }}</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        saldo: 0,
      };
    },
  };
  </script>
   