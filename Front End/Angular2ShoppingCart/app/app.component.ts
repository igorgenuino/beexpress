import { Component, ElementRef, OnInit } from '@angular/core';
import {Router} from '@angular/router'
import {Title} from "@angular/platform-browser"; 

import { Category } from './entities/category.entities';
import { Product } from './entities/product.entities';
import { BrandService } from './services/brand.service';
import { ProductService } from './services/product.service';
import { CategoryService } from './services/category.service';
import { CartService } from './services/cart.service';
import { SettingService } from './services/setting.service';
import { AccountService } from './services/account.service';

import { CartInfo } from './entities/cartinfo.entities';
import { UserInfo } from './entities/userinfo.entities';

import * as $ from 'jquery';
window['$'] = window['jQuery'] = $;

@Component({
	moduleId: module.id, 
	selector: 'app', 
	templateUrl: 'template.component.html',
	providers : [Title]
})

export class AppComponent implements OnInit {
	
	categories = {};
	brands = {};
	keyword: string;
	products: Product[];
	sub: any;
	cartInfo: CartInfo;
	userInfo: UserInfo;
	logo: string;
		
	constructor(
		private elementRef : ElementRef, 
		private categoryService: CategoryService, 
		private brandService: BrandService, 
		private productService: ProductService,
		private router: Router,
		private cartService: CartService,
		private accountService: AccountService,
		private settingService: SettingService,
		private title: Title
	) {
		this.cartInfo = cartService.cartInfo;
		if(sessionStorage.getItem('username') != null) {
            accountService.userInfo.username = sessionStorage.getItem('username');
        }
		this.userInfo = accountService.userInfo;
	}
	
	ngOnInit() {
		this.categoryService.findAllLevel().subscribe(data => this.categories = data);		
		this.brandService.findAll().subscribe(data => this.brands = data);	
		this.settingService.find('path_logo').subscribe(data => {
			this.logo = data.value;
		});
		this.settingService.find('app_name').subscribe(data => {
			this.title.setTitle(data.value);
		});
	}

	logout() {
        this.accountService.userInfo.username = '';
        if(sessionStorage.getItem('username') != null) {
            sessionStorage.removeItem('username');
        }
        this.router.navigate(['/login']);
    }
	
	ngAfterViewInit() {
	
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

	}
	
	search(): void {
		this.router.navigate(['/search', { keyword:this.keyword }]);
	}
	
}




