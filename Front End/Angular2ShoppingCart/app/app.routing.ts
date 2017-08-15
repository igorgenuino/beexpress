import { Routes, RouterModule } from '@angular/router';

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

const routes: Routes = [
	{ path: '', component: HomeComponent }, 
	{ path: 'home', component: HomeComponent }, 
	{ path: 'most-viewed', component: MostViewedComponent },
	{ path: 'best-seller', component: BestSellerComponent },
	{ path: 'cart', component: CartComponent },
	{ path: 'login', component: LoginComponent },
	{ path: 'sign-up', component: SignUpComponent },
	{ path: 'category', component: CategoryComponent },
	{ path: 'brand', component: BrandComponent },
	{ path: 'product-detail', component: ProductDetailComponent },
	{ path: 'search', component: SearchComponent },
	{ path: 'success', component: SuccessComponent },
	{ path: 'orders', component: OrdersComponent },
    { path: 'profile', component: ProfileComponent },
    { path: 'order-detail', component: OrdersDetailComponent },
	{ path: '**', redirectTo: '' }
];

export const routing = RouterModule.forRoot(routes);


