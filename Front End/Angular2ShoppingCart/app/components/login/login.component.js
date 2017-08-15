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
var forms_1 = require("@angular/forms");
var router_1 = require("@angular/router");
var account_service_1 = require("../../services/account.service");
var LoginComponent = (function () {
    function LoginComponent(formBuilder, router, accountService) {
        this.formBuilder = formBuilder;
        this.router = router;
        this.accountService = accountService;
    }
    LoginComponent.prototype.ngOnInit = function () {
        this.loginForm = this.formBuilder.group({
            username: ['', [forms_1.Validators.required]],
            password: ['', [forms_1.Validators.required]]
        });
    };
    LoginComponent.prototype.login = function (event) {
        var _this = this;
        this.accountService.login(this.loginForm.value.username, this.loginForm.value.password).subscribe(function (data) {
            data = JSON.parse(data);
            if (data.count == 1) {
                sessionStorage.setItem('username', _this.loginForm.value.username);
                _this.accountService.updateLoginedToTemplate(_this.loginForm.value.username);
                _this.router.navigate(['/orders']);
            }
            else {
                _this.result = data;
            }
        });
    };
    return LoginComponent;
}());
LoginComponent = __decorate([
    core_1.Component({
        moduleId: module.id,
        templateUrl: 'login.component.html'
    }),
    __metadata("design:paramtypes", [forms_1.FormBuilder,
        router_1.Router,
        account_service_1.AccountService])
], LoginComponent);
exports.LoginComponent = LoginComponent;
//# sourceMappingURL=login.component.js.map