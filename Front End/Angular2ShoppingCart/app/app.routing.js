"use strict";
var router_1 = require("@angular/router");
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
var routes = [
    { path: '', component: home_component_1.HomeComponent },
    { path: 'home', component: home_component_1.HomeComponent },
    { path: 'most-viewed', component: mostviewed_component_1.MostViewedComponent },
    { path: 'best-seller', component: bestseller_component_1.BestSellerComponent },
    { path: 'cart', component: cart_component_1.CartComponent },
    { path: 'login', component: login_component_1.LoginComponent },
    { path: 'sign-up', component: signup_component_1.SignUpComponent },
    { path: 'category', component: category_component_1.CategoryComponent },
    { path: 'brand', component: brand_component_1.BrandComponent },
    { path: 'product-detail', component: productdetail_component_1.ProductDetailComponent },
    { path: 'search', component: search_component_1.SearchComponent },
    { path: 'success', component: success_component_1.SuccessComponent },
    { path: 'orders', component: orders_component_1.OrdersComponent },
    { path: 'profile', component: profile_component_1.ProfileComponent },
    { path: 'order-detail', component: ordersdetail_component_1.OrdersDetailComponent },
    { path: '**', redirectTo: '' }
];
exports.routing = router_1.RouterModule.forRoot(routes);
//# sourceMappingURL=app.routing.js.map