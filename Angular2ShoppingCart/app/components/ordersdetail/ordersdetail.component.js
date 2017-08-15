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
var OrdersDetailComponent = (function () {
    function OrdersDetailComponent(activatedRoute, orderService) {
        this.activatedRoute = activatedRoute;
        this.orderService = orderService;
    }
    OrdersDetailComponent.prototype.ngOnInit = function () {
        var _this = this;
        var params = this.activatedRoute.snapshot.params;
        this.orderService.find(params.id).subscribe(function (data) { return _this.orderDetails = data; });
        this.orderService.sum(params.id).subscribe(function (data) { return _this.sum = data; });
    };
    return OrdersDetailComponent;
}());
OrdersDetailComponent = __decorate([
    core_1.Component({
        moduleId: module.id,
        templateUrl: 'ordersdetail.component.html'
    }),
    __metadata("design:paramtypes", [router_1.ActivatedRoute,
        order_service_1.OrderService])
], OrdersDetailComponent);
exports.OrdersDetailComponent = OrdersDetailComponent;
//# sourceMappingURL=ordersdetail.component.js.map