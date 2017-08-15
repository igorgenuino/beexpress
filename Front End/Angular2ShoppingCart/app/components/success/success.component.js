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
var order_service_1 = require("../../services/order.service");
var rest_service_1 = require("../../services/rest.service");
var SuccessComponent = (function () {
    function SuccessComponent(activatedRoute, orderService, restService) {
        this.activatedRoute = activatedRoute;
        this.orderService = orderService;
        this.restService = restService;
    }
    SuccessComponent.prototype.ngOnInit = function () {
        var tx = this.activatedRoute.snapshot.queryParams['tx'];
        var total = this.activatedRoute.snapshot.queryParams['amt'];
        // Add new order		
        var order = { id: tx, name: 'Order Online', username: sessionStorage.getItem('username') };
        // Add order detail
        var orderDetails = [];
        if (sessionStorage.getItem('cart') != null) {
            var cart = JSON.parse(sessionStorage.getItem('cart'));
            for (var i = 0; i < cart.length; i++) {
                var cart_row = JSON.parse(cart[i]);
                orderDetails.push({
                    articleId: cart_row.id,
                    ordersId: tx,
                    quantity: cart_row.quantity,
                    price: cart_row.price
                });
            }
            order['orderDetails'] = orderDetails;
        }
        this.orderService.create(order).subscribe(function (result) {
            // Remove cart
            if (sessionStorage.getItem('cart') != null) {
                sessionStorage.removeItem('cart');
            }
        });
    };
    return SuccessComponent;
}());
SuccessComponent = __decorate([
    core_1.Component({
        moduleId: module.id,
        templateUrl: 'success.component.html'
    }),
    __metadata("design:paramtypes", [router_1.ActivatedRoute,
        order_service_1.OrderService,
        rest_service_1.RestService])
], SuccessComponent);
exports.SuccessComponent = SuccessComponent;
//# sourceMappingURL=success.component.js.map