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
var SignUpComponent = (function () {
    function SignUpComponent(formBuilder, accountService, router) {
        this.formBuilder = formBuilder;
        this.accountService = accountService;
        this.router = router;
    }
    SignUpComponent.prototype.ngOnInit = function () {
        this.signUpForm = this.formBuilder.group({
            username: ['', [forms_1.Validators.required]],
            password: ['', [forms_1.Validators.required]],
            fullName: ['', [forms_1.Validators.required]],
            email: ['', [forms_1.Validators.required]]
        });
    };
    SignUpComponent.prototype.save = function (event) {
        var _this = this;
        this.accountService.create(this.signUpForm.value).subscribe(function (data) {
            var resultR = JSON.parse(data);
            if (resultR.count == 0) {
                _this.router.navigate(['/login']);
            }
            else {
                _this.result = resultR;
            }
        });
    };
    return SignUpComponent;
}());
SignUpComponent = __decorate([
    core_1.Component({
        moduleId: module.id,
        templateUrl: 'signup.component.html'
    }),
    __metadata("design:paramtypes", [forms_1.FormBuilder,
        account_service_1.AccountService,
        router_1.Router])
], SignUpComponent);
exports.SignUpComponent = SignUpComponent;
//# sourceMappingURL=signup.component.js.map