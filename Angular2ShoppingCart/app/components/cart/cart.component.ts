import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Router } from '@angular/router';

import { ProductService } from '../../services/product.service';
import { CartService } from '../../services/cart.service';
import { SettingService } from '../../services/setting.service';
import { AccountService } from '../../services/account.service';

import { Item } from '../../entities/item.entities';
import { CartInfo } from '../../entities/cartinfo.entities';
import { UserInfo } from '../../entities/userinfo.entities';

@Component({
	moduleId: module.id,
	templateUrl: 'cart.component.html'
})

export class CartComponent implements OnInit {
	
	items:any = [];
	s:number = 0;
	cartInfo: CartInfo;
	businessEmail: string;
	returnUrl: string;
	userInfo: UserInfo;
	
	constructor(
		private activatedRoute: ActivatedRoute, 
		private productService: ProductService,
		public cartService: CartService,
        private accountService: AccountService,
		private settingService: SettingService
	) {
		if(sessionStorage.getItem('username') != null) {
            accountService.userInfo.username = sessionStorage.getItem('username');
        }
		this.userInfo = accountService.userInfo;
	}
	
	ngOnInit() {
		let params: any = this.activatedRoute.snapshot.params;
		if(Object.keys(params).length > 0) {
			this.add(params.id);	
		} else {
			if(sessionStorage.getItem('cart') != null) {
				let cartArr = JSON.parse(sessionStorage.getItem('cart'));	
				for(var i = 0; i < cartArr.length; i++) {
					let temp = JSON.parse(cartArr[i]);
					this.items.push({
						id: temp.id,
						name: temp.name,
						price: temp.price,
						photo: temp.photo,
						quantity: temp.quantity,
						categoryId: temp.categoryId
					});
				}
			}
		}		
		this.settingService.find('paypal_business_email').subscribe(data => {
			this.businessEmail = data.value;
		});
		this.settingService.find('paypal_return').subscribe(data => {
			this.returnUrl = data.value;
		});
	}
	
	add(id: number) {
		this.productService.find(id).subscribe(data => {
			let item: Item = {
				id: data.id,
				name: data.title,
				price: data.price,
				photo: data.photo,
				quantity: 1,
				categoryId: data.categoryId
			};
			if(sessionStorage.getItem('cart') == null) {
				let cart = [];
				cart.push(JSON.stringify(item));
				sessionStorage.setItem('cart', JSON.stringify(cart));
			} else {
				let cart: any = JSON.parse(sessionStorage.getItem('cart'));
				let cartArr = JSON.parse(sessionStorage.getItem('cart'));	
				let index: number = -1;
				for(var i = 0; i < cart.length; i++) {
					let temp = JSON.parse(cartArr[i]);
					if(temp.id == data.id) {
						index = i;
						break;
					}
				}
				
				if(index == -1) {
					cart.push(JSON.stringify(item));
					sessionStorage.setItem('cart', JSON.stringify(cart));
				} else {
					let temp = JSON.parse(cart[index]);
					temp.quantity += 1;
					cart[index] = JSON.stringify(temp);
					sessionStorage.setItem('cart', JSON.stringify(cart));
				}
			}
			let cartArr = JSON.parse(sessionStorage.getItem('cart'));	
			for(var i = 0; i < cartArr.length; i++) {
				let temp = JSON.parse(cartArr[i]);
				this.items.push({
					id: temp.id,
					name: temp.name,
					price: temp.price,
					photo: temp.photo,
					quantity: temp.quantity,
					categoryId: temp.categoryId
				});
			}
			
			// Sum
			this.s = this.total();
			
			// Display Cart Info
			this.cartService.update(this.total_items(), this.total());
			
		});
	}
	
	total(): number {
		let s: number = 0;
		let cart = JSON.parse(sessionStorage.getItem('cart'));	
		for(var i = 0; i < cart.length; i++) {
			let temp = JSON.parse(cart[i]);
			s += temp.price * temp.quantity;
		}
		return s;
	}
	
	remove(id: number): void {
		var result = confirm('Are you sure?');
		if(result) {
			let cart = JSON.parse(sessionStorage.getItem('cart'));	
			let index: number = -1;
			for(var i = 0; i < cart.length; i++) {
				let temp = JSON.parse(cart[i]);
				if(temp.id == id) {
					index = i;
					break;
				}
			}
			cart.splice(index, 1);
			sessionStorage.setItem('cart', JSON.stringify(cart));
			
			this.items = [];
			cart = JSON.parse(sessionStorage.getItem('cart'));
			for(var i = 0; i < cart.length; i++) {
				let temp = JSON.parse(cart[i]);
				this.items.push({
					id: temp.id,
					name: temp.name,
					price: temp.price,
					photo: temp.photo,
					quantity: temp.quantity,
					categoryId: temp.categoryId
				});
			}
			
			// Sum
			this.s = this.total();
			
			// Display Cart Info
			this.cartService.update(this.total_items(), this.total());
		}		
	}
	
	total_items(): number {
		let s: number = 0;
		if(sessionStorage.getItem('cart') != null) {
			let cart = JSON.parse(sessionStorage.getItem('cart'));
			s = cart.length;
		}
		return s;
	}
	
	
	
}




