import { Component, OnInit  } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { OrderService } from '../../services/order.service';

import { Order } from '../../entities/order.entities';

@Component({
	moduleId: module.id,
	templateUrl: 'ordersdetail.component.html'
})

export class OrdersDetailComponent implements OnInit {
	
    orderDetails: any;
    sum: number;
    
	constructor(
        private activatedRoute: ActivatedRoute, 
        private orderService: OrderService
    ) {}
	
	ngOnInit() {
        let params: any = this.activatedRoute.snapshot.params;
        this.orderService.find(params.id).subscribe(data => this.orderDetails = data);    
        this.orderService.sum(params.id).subscribe(data => this.sum = data);    
	}
	
	
	
}




