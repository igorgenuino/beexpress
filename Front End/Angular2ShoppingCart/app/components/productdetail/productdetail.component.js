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
var router_2 = require("@angular/router");
var product_service_1 = require("../../services/product.service");
var rest_service_1 = require("../../services/rest.service");
var ProductDetailComponent = (function () {
    function ProductDetailComponent(activatedRoute, productService, router, restService) {
        this.activatedRoute = activatedRoute;
        this.productService = productService;
        this.router = router;
        this.restService = restService;
    }
    ProductDetailComponent.prototype.ngOnInit = function () {
        var _this = this;
        var params = this.activatedRoute.snapshot.params;
        this.productService.find(params.id).subscribe(function (data) { return _this.product = data; });
        this.productService.findRelated(params.catid, params.id).subscribe(function (data) { return _this.products = data; });
        this.sub = this.activatedRoute.params.subscribe(function (params) {
            var id = params['id'];
            var catid = params['catid'];
            _this.productService.find(id).subscribe(function (data) { return _this.product = data; });
            _this.productService.findRelated(catid, id).subscribe(function (data) { return _this.products = data; });
        });
        var proInfo = { id: params.id, X_API_KEY: this.restService.getKey() };
        this.productService.updateView(proInfo).subscribe(function (result) { });
    };
    return ProductDetailComponent;
}());
ProductDetailComponent = __decorate([
    core_1.Component({
        moduleId: module.id,
        templateUrl: 'productdetail.component.html'
    }),
    __metadata("design:paramtypes", [router_1.ActivatedRoute,
        product_service_1.ProductService,
        router_2.Router,
        rest_service_1.RestService])
], ProductDetailComponent);
exports.ProductDetailComponent = ProductDetailComponent;
//# sourceMappingURL=productdetail.component.js.map