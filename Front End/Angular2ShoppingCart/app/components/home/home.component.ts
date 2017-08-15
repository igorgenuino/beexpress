import { Component, OnInit } from '@angular/core';

import { ProductService } from '../../services/product.service';
import { Product } from '../../entities/product.entities';

@Component({
	moduleId: module.id,
	templateUrl: 'home.component.html'
})

export class HomeComponent {
	
	products: Product[];
	
	constructor(private productService: ProductService ) {
	}
	
	ngOnInit() {
		this.productService.latest().subscribe(data => this.products = data);	
	}
	
}




