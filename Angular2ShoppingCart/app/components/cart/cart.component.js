"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var core_1 = require("@angular/core");
var router_1 = require("@angular/router");
var product_service_1 = require("../../services/product.service");
var cart_service_1 = require("../../services/cart.service");
var setting_service_1 = require("../../services/setting.service");
var account_service_1 = require("../../services/account.service");
var CartComponent = (function () {
    function CartComponent(activatedRoute, productService, cartService, accountService, settingService) {
        this.activatedRoute = activatedRoute;
        this.productService = productService;
        this.cartService = cartService;
        this.accountService = accountService;
        this.settingService = settingService;
        this.items = [];
        this.s = 0;
        if (sessionStorage.getItem('username') != null) {
            accountService.userInfo.username = sessionStorage.getItem('username');
        }
        this.userInfo = accountService.userInfo;
    }
    CartComponent.prototype.ngOnInit = function () {
        var _this = this;
        var params = this.activatedRoute.snapshot.params;
        if (Object.keys(params).length > 0) {
            this.add(params.id);
        }
        else {
            if (sessionStorage.getItem('cart') != null) {
                var cartArr = JSON.parse(sessionStorage.getItem('cart'));
                for (var i = 0; i < cartArr.length; i++) {
                    var temp = JSON.parse(cartArr[i]);
                    this.items.push({
                        id: temp.id,
                        name: temp.name,
                        price: temp.price,
                        photo: temp.photo,
                        quantity: temp.quantity,
                        categoryId: temp.categoryId
                    });
                }
            }
        }
        this.settingService.find('paypal_business_email').subscribe(function (data) {
            _this.businessEmail = data.value;
        });
        this.settingService.find('paypal_return').subscribe(function (data) {
            _this.returnUrl = data.value;
        });
    };
    CartComponent.prototype.add = function (id) {
        var _this = this;
        this.productService.find(id).subscribe(function (data) {
            var item = {
                id: data.id,
                name: data.title,
                price: data.price,
                photo: data.photo,
                quantity: 1,
                categoryId: data.categoryId
            };
            if (sessionStorage.getItem('cart') == null) {
                var cart = [];
                cart.push(JSON.stringify(item));
                sessionStorage.setItem('cart', JSON.stringify(cart));
            }
            else {
                var cart = JSON.parse(sessionStorage.getItem('cart'));
                var cartArr_1 = JSON.parse(sessionStorage.getItem('cart'));
                var index = -1;
                for (var i = 0; i < cart.length; i++) {
                    var temp = JSON.parse(cartArr_1[i]);
                    if (temp.id == data.id) {
                        index = i;
                        break;
                    }
                }
                if (index == -1) {
                    cart.push(JSON.stringify(item));
                    sessionStorage.setItem('cart', JSON.stringify(cart));
                }
                else {
                    var temp = JSON.parse(cart[index]);
                    temp.quantity += 1;
                    cart[index] = JSON.stringify(temp);
                    sessionStorage.setItem('cart', JSON.stringify(cart));
                }
            }
            var cartArr = JSON.parse(sessionStorage.getItem('cart'));
            for (var i = 0; i < cartArr.length; i++) {
                var temp = JSON.parse(cartArr[i]);
                _this.items.push({
                    id: temp.id,
                    name: temp.name,
                    price: temp.price,
                    photo: temp.photo,
                    quantity: temp.quantity,
                    categoryId: temp.categoryId
                });
            }
            // Sum
            _this.s = _this.total();
            // Display Cart Info
            _this.cartService.update(_this.total_items(), _this.total());
        });
    };
    CartComponent.prototype.total = function () {
        var s = 0;
        var cart = JSON.parse(sessionStorage.getItem('cart'));
        for (var i = 0; i < cart.length; i++) {
            var temp = JSON.parse(cart[i]);
            s += temp.price * temp.quantity;
        }
        return s;
    };
    CartComponent.prototype.remove = function (id) {
        var result = confirm('Are you sure?');
        if (result) {
            var cart = JSON.parse(sessionStorage.getItem('cart'));
            var index = -1;
            for (var i = 0; i < cart.length; i++) {
                var temp = JSON.parse(cart[i]);
                if (temp.id == id) {
                    index = i;
                    break;
                }
            }
            cart.splice(index, 1);
            sessionStorage.setItem('cart', JSON.stringify(cart));
            this.items = [];
            cart = JSON.parse(sessionStorage.getItem('cart'));
            for (var i = 0; i < cart.length; i++) {
                var temp = JSON.parse(cart[i]);
                this.items.push({
                    id: temp.id,
                    name: temp.name,
                    price: temp.price,
                    photo: temp.photo,
                    quantity: temp.quantity,
                    categoryId: temp.categoryId
                });
            }
            // Sum
            this.s = this.total();
            // Display Cart Info
            this.cartService.update(this.total_items(), this.total());
        }
    };
    CartComponent.prototype.total_items = function () {
        var s = 0;
        if (sessionStorage.getItem('cart') != null) {
            var cart = JSON.parse(sessionStorage.getItem('cart'));
            s = cart.length;
        }
        return s;
    };
    return CartComponent;
}());
CartComponent = __decorate([
    core_1.Component({
        moduleId: module.id,
        templateUrl: 'cart.component.html'
    }),
    __metadata("design:paramtypes", [router_1.ActivatedRoute,
        product_service_1.ProductService,
        cart_service_1.CartService,
        account_service_1.AccountService,
        setting_service_1.SettingService])
], CartComponent);
exports.CartComponent = CartComponent;
//# sourceMappingURL=cart.component.js.map