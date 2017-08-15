import { Component } from '@angular/core';

import { ProductService } from '../../services/product.service';
import { Product } from '../../entities/product.entities';

@Component({
	moduleId: module.id,
	templateUrl: 'mostviewed.component.html'
})

export class MostViewedComponent {
	
	products: Product[];
	
	constructor(private productService: ProductService ) {	
		this.productService.mostViewed().subscribe(data => this.products = data);
	}
	
}




