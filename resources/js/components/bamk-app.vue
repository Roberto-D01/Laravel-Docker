<template>
    <div>
      <h1>Minha Aplicação Bancária</h1>
  
      <!-- Saldo -->
      <balance></balance>
  
      <!-- Histórico de Transações -->
      <transaction-history></transaction-history>
  
      <!-- Realizar Depósito -->
      <deposit></deposit>
  
      <!-- Realizar Saque -->
      <withdraw></withdraw>
    </div>
  </template>
  
  <script>
  // Importe os componentes Vue necessários
  import Balance from './components/Balance.vue';
  import TransactionHistory from './components/TransactionHistory.vue';
  import Deposit from './components/Deposit.vue';
  import Withdraw from './components/Withdraw.vue';
  
  export default {
    components: {
      Balance,
      TransactionHistory,
      Deposit,
      Withdraw,
    },
  };
  </script>
  