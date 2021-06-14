

Vue.component('header-vue', {
  data:()=>( {
    searchValue: '',
  }),
  methods: {
    onClick(){
      this.$emit('filter-goods',this.searchValue);
    },
  
   
    
  },
  watch:{
    searchValue(){
      this.onClick();
  },

},
  template: `
  <header>
  <div class="nav">
      <input type="text" class="goods-search" v-model="searchValue"/>
      <button class="cart-button" type="button" @Click="onClick">Искать</button>
      <button class="cart-button" type="button" @Click="$emit('toggle-cart')"  >Корзина</button>
  </div>
</header>  
  `
})

Vue.component('cart-vue', {
 props:{
  isVisibleCart:{
      type: Boolean,
      default:false,
    }
 },
 
  template: `
  <div v-show="isVisibleCart" class="cart">
  <h3>Корзина:</h3>
  <div   class="cart-list"></div>
</div>    
  `
})   


const API_URL = 'http://localhost:3000';
const app = new Vue({

   el: '#app',

   data:()=>( {
    goods: [],
    cartGoods:[],
    filteredGoods: [],
    isVisibleCart:false,
    
  }),

    mounted() {
      this.getGoods();
      this.getCart();
    },



    methods: {
      toggleCartStatus(){
        this.isVisibleCart= !this.isVisibleCart;},
      noClick(item){
        this.$emit('add-to-cart',item)
      },
      addToCart(item){
        this.makePOSTRequest(`${API_URL}/addToCart`,item)
        .then(()=>this.getCart())
      },
        getGoods(){
          this.makeGETRequest(`${API_URL}/catalogData`) 
          .then((data)=>{
            this.goods=data;
            this.filteredGoods=data;})
        },
        getCart(){
           this.makeGETRequest(`${API_URL}/cartData`)
           .then((data)=>{
             this.cartGoods=data
           })
        },
        makePOSTRequest(url,data) {

          return fetch(url,{
            method:'POST',
            headers:{
              'Content-Type':'application/json'
            },
            body:JSON.stringify(data),
          })  
           .then((data)=>data.json())
           },
      makeGETRequest(url) {

         return fetch(url)  
          .then((data)=>data.json())
          },

          filterGoods(value) {
           const regexp = new RegExp(value, 'i');
           this.filteredGoods = this.goods.filter(good => regexp.test(good.product_name))},


      

        },
      });
