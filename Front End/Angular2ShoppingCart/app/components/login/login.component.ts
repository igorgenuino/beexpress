import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import {Router} from '@angular/router';

import { AccountService } from '../../services/account.service';

@Component({
	moduleId: module.id,
	templateUrl: 'login.component.html'
})

export class LoginComponent implements OnInit {
	
	loginForm: any; 
    result: any;
    
    constructor(
        private formBuilder: FormBuilder, 
        private router: Router,
        private accountService: AccountService
    ) {}
    
    ngOnInit() {
        this.loginForm = this.formBuilder.group({
            username: ['', [Validators.required]], 
            password: ['', [Validators.required]]
        });
    }
    
    login(event: any) {
        this.accountService.login(this.loginForm.value.username, this.loginForm.value.password).subscribe(data => {
            data = JSON.parse(data);
            if(data.count == 1) {
                sessionStorage.setItem('username', this.loginForm.value.username);
                this.accountService.updateLoginedToTemplate(this.loginForm.value.username);
                this.router.navigate(['/orders']);
            } else {
                this.result = data
            }
        });
    }

}




