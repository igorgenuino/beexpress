import { Component, OnInit  } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { OrderService } from '../../services/order.service';

import { Order } from '../../entities/order.entities';

@Component({
	moduleId: module.id,
	templateUrl: 'orders.component.html'
})

export class OrdersComponent implements OnInit {
	
    orders: Order[];
    
	constructor(
        private orderService: OrderService
    ) {}
	
	ngOnInit() {
        this.orderService.findByUsername(sessionStorage.getItem('username')).subscribe(data => this.orders = data);    
	}
	
	
	
}




