
Vue.component('header-vue', {
  data:()=>( {
    searchValue: '',
  }),
  methods: {
    onClick(){
      this.$emit('filter-goods',this.searchValue);
    }
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
      <button class="cart-button" type="button" @click="onClick">Искать</button>
      <button class="cart-button" type="button"  @click="$emit('toggle-cart')">Корзина</button>
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


const API_URL = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';
const app = new Vue({
  
   el: '#app',
  
   data:()=>( {
    goods: [],
    filteredGoods: [],
    isVisibleCart:false,
  }),
    
    mounted() {
      this.makeGETRequest(`${API_URL}/catalogData.json`) 
    },
   
   
  
    methods: {
    
      makeGETRequest(url) {
       
          fetch(url)  
          .then((data)=>data.json())
          .then((data)=>{
              this.goods=data;
              this.filteredGoods=data;})},
     
          filterGoods(value) {
           const regexp = new RegExp(value, 'i');
           this.filteredGoods = this.goods.filter(good => regexp.test(good.product_name))},
           
           
      toggleCartStatus(){
        this.isVisibleCart= !this.isVisibleCart;},
      
        
        },
      });
   

console.log(app);


