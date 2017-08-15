import { Component } from '@angular/core';

import { ProductService } from '../../services/product.service';
import { Product } from '../../entities/product.entities';

@Component({
	moduleId: module.id,
	templateUrl: 'bestseller.component.html'
})

export class BestSellerComponent {
	
	products: Product[];
	
	constructor(private productService: ProductService ) {	
		this.productService.bestSeller().subscribe(data => this.products = data);
	}
	
}




