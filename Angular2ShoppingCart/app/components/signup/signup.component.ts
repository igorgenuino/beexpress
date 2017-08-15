import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import {Router} from '@angular/router';

import { AccountService } from '../../services/account.service';

@Component({
	moduleId: module.id,
	templateUrl: 'signup.component.html'
})

export class SignUpComponent implements OnInit {
	
    signUpForm: any; 
    result: any;
    
    constructor(
        private formBuilder: FormBuilder, 
        private accountService: AccountService,
        private router: Router
    ) {}
    
    ngOnInit() {
        this.signUpForm = this.formBuilder.group({
            username: ['', [Validators.required]], 
            password: ['', [Validators.required]],
            fullName: ['', [Validators.required]],
            email: ['', [Validators.required]]
        });
    }
    
    save(event: any) {
        
        this.accountService.create(this.signUpForm.value).subscribe(data => {
            var resultR = JSON.parse(data);
            if(resultR.count == 0) {
                 this.router.navigate(['/login']);
            } else {
                this.result = resultR
            }
        });
    }
    
    
}




