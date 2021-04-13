//с помощью функции генерируется строка и значение возвращается в переменную
const cartItem = {
    render(product) {
        return `<div class="product">
                    <div><b>Наименование</b>: ${product.product_name}</div>
                    <div><b>Цена за шт.</b>: ${product.price}</div>
                    <div><b>Количество</b>: ${product.quantity}</div>
                    <div><b>Стоимость</b>: ${product.quantity * product.price}</div>
                </div>`;
    }
}
//создан объект где есть объекты и методы
const cart = {
    cartListBlock: null,
    cartItem,
    products: [
        {
            id_product: 123,
            product_name: 'Samsung',
            price: 20000,
            quantity: 1,
        },
        {
            id_product: 456,
            product_name: 'Apple',
            price: 15000,
            quantity: 1,
        },
        {
            id_product: 305,
            product_name: 'Huawei',
            price: 10000,
            quantity: 1,
        },
    ],
    //подготовка и запуск
    init() {
        cart.cartListBlock = document.querySelector('.cart-list');
        cart.render();
    },
    //метод запуска ,условие длина массива то в корзине выводится надпись о товарах и добавил строку с помощью insertAdjacentHTML,
    //'еще' то корзина пуста
    render() {
        if (cart.products.length) {
            cart.products.forEach(product => {
                cart.cartListBlock.insertAdjacentHTML('beforeend', cart.cartItem.render(product));
            });
            cart.cartListBlock.insertAdjacentHTML('beforeend', `В корзине ${cart.products.length} позиций(а) стоимостью ${cart.getCartPrice()}`);
        } else {
            cart.cartListBlock.textContent = 'Корзина пуста';
        }
    },
    // метод подсчета товаров в корзине
    getCartPrice() {
        return cart.products.reduce(function (price, product) {
            return price + product.price * product.quantity;
        }, 0);
    },
    
};
//вызов
cart.init();
