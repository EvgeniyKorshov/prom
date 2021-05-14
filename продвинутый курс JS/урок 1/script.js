'use strict'
const goods = [
  { title: 'Shirt', price: 150 },
  { title: 'Socks', price: 50 },
  { title: 'Jacket', price: 350 },
  { title: 'Shoes', price: 250 },
];

let renderGoodsItem = (title, price) =>  `<div class="goods-item"><h3>Товар:${title}</h3><p>Цена:${price}</p></div>`;
const renderGoodsList = (cartlist) => {let goodsList =  cartlist.flatMap( item => renderGoodsItem(item.title, item.price)) ;
document.querySelector('.cart-list').innerHTML = goodsList;}
document.querySelector('.cart-button').onclick = () => renderGoodsList(goods);


 


  