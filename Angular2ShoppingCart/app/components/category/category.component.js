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
var category_service_1 = require("../../services/category.service");
var CategoryComponent = (function () {
    function CategoryComponent(activatedRoute, productService, categoryService) {
        this.activatedRoute = activatedRoute;
        this.productService = productService;
        this.categoryService = categoryService;
    }
    CategoryComponent.prototype.ngOnInit = function () {
        var _this = this;
        var params = this.activatedRoute.snapshot.params;
        this.productService.findByCategory(params.id).subscribe(function (data) { return _this.products = data; });
        this.categoryService.find(params.id).subscribe(function (data) { return _this.category = data; });
        this.sub = this.activatedRoute.params.subscribe(function (params) {
            var id = params['id'];
            _this.productService.findByCategory(id).subscribe(function (data) { return _this.products = data; });
            _this.categoryService.find(id).subscribe(function (data) { return _this.category = data; });
        });
    };
    return CategoryComponent;
}());
CategoryComponent = __decorate([
    core_1.Component({
        moduleId: module.id,
        templateUrl: 'category.component.html'
    }),
    __metadata("design:paramtypes", [router_1.ActivatedRoute, product_service_1.ProductService, category_service_1.CategoryService])
], CategoryComponent);
exports.CategoryComponent = CategoryComponent;
//# sourceMappingURL=category.component.js.map