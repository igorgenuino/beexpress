import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import {Router} from '@angular/router';

import { AccountService } from '../../services/account.service';
import { Account } from '../../entities/account.entities';

@Component({
	moduleId: module.id,
	templateUrl: 'profile.component.html'
})

export class ProfileComponent implements OnInit {
	
    signUpForm: any; 
    account: Account;
    result: string = '';
    
    constructor(
        private formBuilder: FormBuilder, 
        private accountService: AccountService,
        private router: Router
    ) {}
    
    ngOnInit() {
        this.accountService.profile(sessionStorage.getItem('username')).subscribe(data => {
            this.account = data;
            this.signUpForm = this.formBuilder.group({
                username: [data.username, [Validators.required]], 
                password: ['', [Validators.required]],
                fullName: [data.fullName, [Validators.required]],
                email: [data.email, [Validators.required]]
            });
        });
    }
    
    save(event: any) {
        this.accountService.saveProfile(this.signUpForm.value).subscribe(data => {
            var data = JSON.parse(data);
            if(data.count == 1) {
                 this.result = data.count;
            }
        });
    }
    
    
}




