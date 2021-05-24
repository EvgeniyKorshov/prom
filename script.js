//! 1. Переделайте makeGETRequest() так, чтобы она использовала промисы.
//! 2. Добавьте в соответствующие классы методы добавления товара в корзину, удаления товара из корзины и получения списка товаров корзины.

// https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses – адрес API;
// /catalogData.json – получить список товаров;

const API_URL = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses'

const makeGETRequest = (url, callback) => {
  return new Promise((resolve, reject) => {
    let xhr;

    if (window.XMLHttpRequest) {
      xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { 
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) callback(xhr.responseText)
        else reject('Error')
      }
    }

    xhr.open('GET', url, true);
    xhr.send();
  })
}

class GoodsItem {
  constructor(product_name, price, id_product) {
    this.product_name = product_name;
    this.price = price;
    this.id_product = id_product;
  }

  render() {
    // создаем датасет
    let data = {
      "price": this.price,
      "product_name": this.product_name,
      id_product: this.id_product,
    };

    data = JSON.stringify(data);

    // пишем его в код
    return `<div class='goods-item'>
              <h3>${this.product_name}</h3>
              <p>${this.price}</p>
              <button data-product='${data}' id='add-btn-${this.id_product}'>В корзину</button>
            </div>`;
  }
}

class GoodsList {
  _basket = new Basket();

  constructor() {
    this.goods = [];
    this.filteredGoods = [];
  }

  fetchGoods(cb) {
    makeGETRequest(`${API_URL}/catalogData.json`, (goods) => {
      this.goods = JSON.parse(goods);
      this.filteredGoods = JSON.parse(goods);
      cb();
    })
  }

  filterGoods(value) {
    const regexp = new RegExp(value, 'i');
    this.filteredGoods = this.goods.filter(good => regexp.test(good.product_name));
    this.render();
  }

  render() {
    let listHtml = '';
    this.filteredGoods.forEach(good => {
      const goodItem = new GoodsItem(good.product_name, good.price, good.id_product);
      listHtml += goodItem.render();
    });
    document.querySelector('.goods-list').innerHTML = listHtml;
    this._basket.setAddListeners(this.filteredGoods);
  }

  getTotalSum() {
    const totalSum = this.goods.reduce((acc, item) => {
      if (!item.price) return acc;
      return acc + item.price;
    }, 0);
    console.log(totalSum);
  }
}

class Basket {
  constructor() {
    this.goods = [];
  }

  clearAll() {
    this.goods = [];
  }

  addItem(event) {
    const { target } = event;
    const { product = {} } = target.dataset;
    this.goods.push(JSON.parse(product));
    this.render();
  }

  removeItem({ target }) {
    // через датасет получаем id товара который хотим удалить
    const { id } = target.dataset;
    // через метод filter убираем этот товар из списка и перезаписваем его
    this.goods = this.goods.filter((item) => String(item.id_product) !== String(id));
    // рендерим корзину с новым списком
    this.render();
  }

  setAddListeners(list = [{ id_product: 123 }, { id_product: 456 }]) {
    list.forEach((item) => {
      document.getElementById(`add-btn-${item.id_product}`).addEventListener('click', (e) => this.addItem(e));
    })
  }

  setDeleteListeners() {
    this.goods.forEach((item) => {
      document.getElementById(`delete-btn-${item.id_product}`).addEventListener('click', (e) => this.removeItem(e));
    })
  }

  render() {
    let listHtml = '';
    this.goods.forEach(good => {
      const goodItem = new BasketItem(good.product_name, good.price, good.id_product);
      listHtml += goodItem.render();
    });
    document.querySelector('.cart-list').innerHTML = listHtml;
    this.setDeleteListeners();
  }
}

class BasketItem extends GoodsItem {
  constructor(...args) {
    super(...args);
    this.count = 0;
  }

  addOne() {}

  removeOne() {}

  render() {
    return `<div class='goods-item'>
              <h3>${this.product_name}</h3>
              <p>${this.price}</p>
              <button data-id='${this.id_product}' id='delete-btn-${this.id_product}'>Удалить</button>
            </div>`;
  }
}

const list = new GoodsList();
list.fetchGoods(() => {
  list.render();
});

const searchButton = document.querySelector('.search-button')
const searchInput = document.querySelector('.goods-search')
searchButton.addEventListener('click', (e) => {
  const value = searchInput.value;
  list.filterGoods(value);
});
searchInput.addEventListener('keydown', (e) => {
  const value = searchInput.value;
  list.filterGoods(value);
});

// 1. Создаем экземпляр списка товаров
// 2. В момент создания экземпляра списка, создается экземпляр корзины и пишется в локальную переменную _basket
// 3. запросили товары и отрендерили их в дом
// 4. Вешаем слушатели (листнеры) которые по нажатию добавят товары в корзину
// 5. Нажатие на кнопку "В корзину"
// 6. Листнер получит наш товар через data атрибут и запишет в список товаров корзины
// 7. Вызовет рендер элементов корзины
// 8. Установит листнеры на удаление товаров из корзины