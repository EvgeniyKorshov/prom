'use strict'
//const goods = [
//  { title: 'Shirt', price: 150 },
//  { title: 'Socks', price: 50 },
//  { title: 'Jacket', price: 350 },
//  { title: 'Shoes', price: 250 },
//];

//let renderGoodsItem = (title='title', price=0) =>  `<div class="goods-item"><h3>Товар:${title}</h3><p>Цена:${price}</p></div>`;
//const renderGoodsList = (cartlist=[]) => {
//  let goodsList =  cartlist.flatMap( item => renderGoodsItem(item.title, item.price)) ;
//document.querySelector('.cart-list').innerHTML = goodsList.join('');}
//document.querySelector('.cart-button').onclick = () => renderGoodsList(goods);

class catalogItem {
  constructor(title='Название товара',price=0) {
    this.title=title, 
    this.price=price
                  }
  render() { 
    return `<div class="item">
            <img src="https://picsum.photos/id/1010/100/100" alt="img">
            <p>${this.title}</p>
            <p>Цена:${this.price}</p>
            <button class="good-button" type="button">Добавить</button>
            </div>`
          }
  }
  class GoodsItem {
    
    constructor(title,price) {
      this.title=title, 
      this.price=price
    }
    render() { 
      return `<div class="goods-item"><h3>Товар:${this.title}</h3><p>Цена:${this.price}</p></div>`
      }
              
  addOne() {}

  removeOne() {}
  }
  class GoodsList {
    constructor() {
      this.goods=[];
    }
  fetchGoods(){
    this.goods = [
      { title: 'Shirt', price: 150 },
      { title: 'Socks', price: 50 },
      { title: 'Jacket', price: 350 },
      { title: 'Shoes', price: 250 },
    ];
  }
  getTotalSum() {
    const totalSum = this.goods.reduce((acc, item) => {
      if (!item.price) return acc;
      return acc + item.price;
    }, 0);
    document.querySelector('.cart').insertAdjacentHTML ('afterBegin',`Товаров в корзине на сумму: ${totalSum} рублей`); 
  }
    renderBasket ()  {
      let htmlString = '';
      this.goods.forEach(good=>{
        const goodItem = new GoodsItem(good.title, good.price);
        htmlString+=goodItem.render();
        
      });
      document.querySelector('.cart-list').innerHTML = htmlString;
      
      }
      renderCatalog(){
        const pipi = new catalogItem();
        for(let i=1;i<13;i++){document.querySelector('.goods-list').insertAdjacentHTML ('afterBegin',pipi.render());
      }
      }
      clearAll() {}

      addItem() {}
    
      removeItem() {}
    }
const list = new GoodsList()
list.fetchGoods();
list.renderBasket();
list.getTotalSum()
list.renderCatalog();