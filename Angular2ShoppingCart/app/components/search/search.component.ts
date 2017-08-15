import { Component, OnInit  } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { ProductService } from '../../services/product.service';
import { Product } from '../../entities/product.entities';

@Component({
	moduleId: module.id,
	templateUrl: 'search.component.html'
})

export class SearchComponent implements OnInit {
	
	products: Product[];
	sub: any;
	
	constructor(
		private activatedRoute: ActivatedRoute, 
		private productService: ProductService) {	
		
	}
	
	ngOnInit() {
		let params: any = this.activatedRoute.snapshot.params;
		this.productService.search(params.keyword).subscribe(data => this.products = data);
		this.sub = this.activatedRoute.params.subscribe(params => {
			let keyword = params['keyword'];
			this.productService.search(keyword).subscribe(data => this.products = data);
       });
	}
	
	
	
}




