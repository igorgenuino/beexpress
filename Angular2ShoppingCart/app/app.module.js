"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var core_1 = require("@angular/core");
var platform_browser_1 = require("@angular/platform-browser");
var forms_1 = require("@angular/forms");
var http_1 = require("@angular/http");
var common_1 = require("@angular/common");
var ngx_pagination_1 = require("ngx-pagination");
var category_service_1 = require("./services/category.service");
var brand_service_1 = require("./services/brand.service");
var product_service_1 = require("./services/product.service");
var rest_service_1 = require("./services/rest.service");
var cart_service_1 = require("./services/cart.service");
var account_service_1 = require("./services/account.service");
var order_service_1 = require("./services/order.service");
var setting_service_1 = require("./services/setting.service");
var app_routing_1 = require("./app.routing");
var home_component_1 = require("./components/home/home.component");
var mostviewed_component_1 = require("./components/mostviewed/mostviewed.component");
var bestseller_component_1 = require("./components/bestseller/bestseller.component");
var cart_component_1 = require("./components/cart/cart.component");
var login_component_1 = require("./components/login/login.component");
var signup_component_1 = require("./components/signup/signup.component");
var category_component_1 = require("./components/category/category.component");
var brand_component_1 = require("./components/brand/brand.component");
var productdetail_component_1 = require("./components/productdetail/productdetail.component");
var search_component_1 = require("./components/search/search.component");
var success_component_1 = require("./components/success/success.component");
var orders_component_1 = require("./components/orders/orders.component");
var profile_component_1 = require("./components/profile/profile.component");
var ordersdetail_component_1 = require("./components/ordersdetail/ordersdetail.component");
var app_component_1 = require("./app.component");
var AppModule = (function () {
    function AppModule() {
    }
    return AppModule;
}());
AppModule = __decorate([
    core_1.NgModule({
        imports: [
            platform_browser_1.BrowserModule,
            forms_1.FormsModule,
            forms_1.ReactiveFormsModule,
            http_1.HttpModule,
            app_routing_1.routing,
            ngx_pagination_1.NgxPaginationModule
        ],
        declarations: [
            app_component_1.AppComponent,
            home_component_1.HomeComponent,
            mostviewed_component_1.MostViewedComponent,
            bestseller_component_1.BestSellerComponent,
            cart_component_1.CartComponent,
            login_component_1.LoginComponent,
            signup_component_1.SignUpComponent,
            category_component_1.CategoryComponent,
            brand_component_1.BrandComponent,
            productdetail_component_1.ProductDetailComponent,
            search_component_1.SearchComponent,
            success_component_1.SuccessComponent,
            orders_component_1.OrdersComponent,
            profile_component_1.ProfileComponent,
            ordersdetail_component_1.OrdersDetailComponent
        ],
        providers: [
            category_service_1.CategoryService,
            brand_service_1.BrandService,
            rest_service_1.RestService,
            brand_service_1.BrandService,
            product_service_1.ProductService,
            cart_service_1.CartService,
            account_service_1.AccountService,
            order_service_1.OrderService,
            setting_service_1.SettingService,
            { provide: common_1.LocationStrategy, useClass: common_1.HashLocationStrategy }
        ],
        bootstrap: [app_component_1.AppComponent]
    })
], AppModule);
exports.AppModule = AppModule;
//# sourceMappingURL=app.module.js.map