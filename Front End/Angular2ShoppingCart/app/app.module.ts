import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule, ReactiveFormsModule  }    from '@angular/forms';
import { HttpModule } from '@angular/http';
import { LocationStrategy, HashLocationStrategy } from '@angular/common';
import {NgxPaginationModule} from 'ngx-pagination';

import { CategoryService } from './services/category.service';
import { BrandService } from './services/brand.service';
import { ProductService } from './services/product.service';
import { RestService } from './services/rest.service';
import { CartService } from './services/cart.service';
import { AccountService } from './services/account.service';
import { OrderService } from './services/order.service';
import { SettingService } from './services/setting.service';

import { routing } from './app.routing';

import { HomeComponent } from './components/home/home.component';
import { MostViewedComponent } from './components/mostviewed/mostviewed.component';
import { BestSellerComponent } from './components/bestseller/bestseller.component';
import { CartComponent } from './components/cart/cart.component';
import { LoginComponent } from './components/login/login.component';
import { SignUpComponent } from './components/signup/signup.component';
import { CategoryComponent } from './components/category/category.component';
import { BrandComponent } from './components/brand/brand.component';
import { ProductDetailComponent } from './components/productdetail/productdetail.component';
import { SearchComponent } from './components/search/search.component';
import { SuccessComponent } from './components/success/success.component';
import { OrdersComponent } from './components/orders/orders.component';
import { ProfileComponent } from './components/profile/profile.component';
import { OrdersDetailComponent } from './components/ordersdetail/ordersdetail.component';

import { AppComponent } from './app.component';

@NgModule({
    imports: [
        BrowserModule,
		FormsModule,
        ReactiveFormsModule ,
        HttpModule, 
		routing,
		NgxPaginationModule
    ],
    declarations: [
		AppComponent,
		HomeComponent,
		MostViewedComponent,
		BestSellerComponent,
		CartComponent,
		LoginComponent,
		SignUpComponent,
		CategoryComponent,
		BrandComponent,
		ProductDetailComponent,
		SearchComponent,
		SuccessComponent,
		OrdersComponent,
        ProfileComponent,
        OrdersDetailComponent
    ],
    providers: [
		CategoryService,
		BrandService,
		RestService,
		BrandService,
		ProductService,
		CartService,
		AccountService,
		OrderService,
		SettingService,
		{provide: LocationStrategy, useClass: HashLocationStrategy}
    ],
    bootstrap: [AppComponent]
})

export class AppModule { }