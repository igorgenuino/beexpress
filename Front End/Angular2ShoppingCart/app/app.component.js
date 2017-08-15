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
var platform_browser_1 = require("@angular/platform-browser");
var brand_service_1 = require("./services/brand.service");
var product_service_1 = require("./services/product.service");
var category_service_1 = require("./services/category.service");
var cart_service_1 = require("./services/cart.service");
var setting_service_1 = require("./services/setting.service");
var account_service_1 = require("./services/account.service");
var $ = require("jquery");
window['$'] = window['jQuery'] = $;
var AppComponent = (function () {
    function AppComponent(elementRef, categoryService, brandService, productService, router, cartService, accountService, settingService, title) {
        this.elementRef = elementRef;
        this.categoryService = categoryService;
        this.brandService = brandService;
        this.productService = productService;
        this.router = router;
        this.cartService = cartService;
        this.accountService = accountService;
        this.settingService = settingService;
        this.title = title;
        this.categories = {};
        this.brands = {};
        this.cartInfo = cartService.cartInfo;
        if (sessionStorage.getItem('username') != null) {
            accountService.userInfo.username = sessionStorage.getItem('username');
        }
        this.userInfo = accountService.userInfo;
    }
    AppComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.categoryService.findAllLevel().subscribe(function (data) { return _this.categories = data; });
        this.brandService.findAll().subscribe(function (data) { return _this.brands = data; });
        this.settingService.find('path_logo').subscribe(function (data) {
            _this.logo = data.value;
        });
        this.settingService.find('app_name').subscribe(function (data) {
            _this.title.setTitle(data.value);
        });
    };
    AppComponent.prototype.logout = function () {
        this.accountService.userInfo.username = '';
        if (sessionStorage.getItem('username') != null) {
            sessionStorage.removeItem('username');
        }
        this.router.navigate(['/login']);
    };
    AppComponent.prototype.ngAfterViewInit = function () {
        // link to css		
        var css_bootstrap = document.createElement("link");
        css_bootstrap.type = "text/css";
        css_bootstrap.href = "./app/assets/css/bootstrap.min.css";
        css_bootstrap.rel = "stylesheet";
        this.elementRef.nativeElement.appendChild(css_bootstrap);
        var css_awesome = document.createElement("link");
        css_awesome.type = "text/css";
        css_awesome.href = "./app/assets/css/font-awesome.min.css";
        css_awesome.rel = "stylesheet";
        this.elementRef.nativeElement.appendChild(css_awesome);
        var css_prettyPhoto = document.createElement("link");
        css_prettyPhoto.type = "text/css";
        css_prettyPhoto.href = "./app/assets/css/prettyPhoto.css";
        css_prettyPhoto.rel = "stylesheet";
        this.elementRef.nativeElement.appendChild(css_prettyPhoto);
        var css_PriceRange = document.createElement("link");
        css_PriceRange.type = "text/css";
        css_PriceRange.href = "./app/assets/css/price-range.css";
        css_PriceRange.rel = "stylesheet";
        this.elementRef.nativeElement.appendChild(css_PriceRange);
        var css_animate = document.createElement("link");
        css_animate.type = "text/css";
        css_animate.href = "./app/assets/css/animate.css";
        css_animate.rel = "stylesheet";
        this.elementRef.nativeElement.appendChild(css_animate);
        var css_main = document.createElement("link");
        css_main.type = "text/css";
        css_main.href = "./app/assets/css/main.css";
        css_main.rel = "stylesheet";
        this.elementRef.nativeElement.appendChild(css_main);
        var css_responsive = document.createElement("link");
        css_responsive.type = "text/css";
        css_responsive.href = "./app/assets/css/responsive.css";
        css_responsive.rel = "stylesheet";
        this.elementRef.nativeElement.appendChild(css_responsive);
        // link to javascript
        var jquery = document.createElement("script");
        jquery.type = "text/javascript";
        jquery.src = "./app/assets/js/jquery.js";
        this.elementRef.nativeElement.appendChild(jquery);
        var bootstrap = document.createElement("script");
        bootstrap.type = "text/javascript";
        bootstrap.src = "./app/assets/js/bootstrap.min.js";
        this.elementRef.nativeElement.appendChild(bootstrap);
        var scrollUp = document.createElement("script");
        scrollUp.type = "text/javascript";
        scrollUp.src = "./app/assets/js/jquery.scrollUp.min.js";
        this.elementRef.nativeElement.appendChild(scrollUp);
        var priceRange = document.createElement("script");
        priceRange.type = "text/javascript";
        priceRange.src = "./app/assets/js/price-range.js";
        this.elementRef.nativeElement.appendChild(priceRange);
        var prettyPhoto = document.createElement("script");
        prettyPhoto.type = "text/javascript";
        prettyPhoto.src = "./app/assets/js/jquery.prettyPhoto.js";
        this.elementRef.nativeElement.appendChild(prettyPhoto);
        /*var main = document.createElement("script");
        main.type = "text/javascript";
        main.src = "./app/assets/js/main.js";
        this.elementRef.nativeElement.appendChild(main);*/
    };
    AppComponent.prototype.search = function () {
        this.router.navigate(['/search', { keyword: this.keyword }]);
    };
    return AppComponent;
}());
AppComponent = __decorate([
    core_1.Component({
        moduleId: module.id,
        selector: 'app',
        templateUrl: 'template.component.html',
        providers: [platform_browser_1.Title]
    }),
    __metadata("design:paramtypes", [core_1.ElementRef,
        category_service_1.CategoryService,
        brand_service_1.BrandService,
        product_service_1.ProductService,
        router_1.Router,
        cart_service_1.CartService,
        account_service_1.AccountService,
        setting_service_1.SettingService,
        platform_browser_1.Title])
], AppComponent);
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map