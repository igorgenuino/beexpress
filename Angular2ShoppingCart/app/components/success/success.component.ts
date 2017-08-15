import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';

import { OrderService } from '../../services/order.service';
import { RestService } from '../../services/rest.service';

@Component({
	moduleId: module.id,
	templateUrl: 'success.component.html'
})

export class SuccessComponent implements OnInit {
	
	constructor(
		private activatedRoute: ActivatedRoute, 
		private orderService: OrderService,
		private restService: RestService
	) {}
	
	ngOnInit() {
	
		let tx: any = this.activatedRoute.snapshot.queryParams['tx'];
		let total: any = this.activatedRoute.snapshot.queryParams['amt'];
			
		// Add new order		
		let order:any = {id: tx, name: 'Order Online', username: sessionStorage.getItem('username') };
		
		// Add order detail
		let orderDetails: any = [];
		if(sessionStorage.getItem('cart') != null) {
			let cart = JSON.parse(sessionStorage.getItem('cart'));
			for(var i = 0; i < cart.length; i++) {
				let cart_row = JSON.parse(cart[i]);
				orderDetails.push({
					articleId: cart_row.id,
					ordersId: tx,
					quantity: cart_row.quantity,
					price: cart_row.price
				});	
			}
			order['orderDetails'] = orderDetails;
		}
		
		this.orderService.create(order).subscribe(
			result => {				
				// Remove cart
				if(sessionStorage.getItem('cart') != null) {
					sessionStorage.removeItem('cart');
				}				
			}
		);
		
		
	}
}




