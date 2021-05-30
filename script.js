

Vue.component('todo-item', {
    template:`
    
    ` ,


   })

   
   const API_URL = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';
const app = new Vue({
  
   el: '#app',
  
   data:()=>( {
    goods: [ ],
    filteredGoods: [],
    searchLine: '',
    isVisibleCart: false,}),
    
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
   
    toogleCartStatus(){
        this.isVisibleCart= !this.isVisibleCart;},
      
        filterGoods() {
         const regexp = new RegExp(this.searchLine, 'i');
         this.filteredGoods = this.goods.filter(good => regexp.test(good.product_name))},
         
         watch:()=>({
          searchLine(){
            this.filterGoods();
        }
      }),
     
  }
 
    });
   

console.log(app);


