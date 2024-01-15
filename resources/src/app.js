const { VueElement } = require("vue")

const MyNameApp = {
    data(){
        return{
            name: "Roberto"
        }
    }
}

Vue.createapp(MyNameApp).mount("#app");