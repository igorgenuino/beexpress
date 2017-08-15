import { Component, OnInit  } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { ProductService } from '../../services/product.service';
import { BrandService } from '../../services/brand.service';
import { Product } from '../../entities/product.entities';
import { Brand } from '../../entities/brand.entities';

@Component({
	moduleId: module.id,
	templateUrl: 'brand.component.html'
})

export class BrandComponent implements OnInit {
	
	products: Product[];
	brand: Brand;
	sub: any;
	
	constructor(private activatedRoute: ActivatedRoute, private productService: ProductService, private brandService: BrandService) {		
	}
	
	ngOnInit() {
		let params: any = this.activatedRoute.snapshot.params;
		this.productService.findByBrand(params.id).subscribe(data => this.products = data);
		this.brandService.find(params.id).subscribe(data => this.brand = data);
		this.sub = this.activatedRoute.params.subscribe(params => {
			let id = params['id'];
			this.productService.findByBrand(id).subscribe(data => this.products = data);
			this.brandService.find(id).subscribe(data => this.brand = data);
       });
		
		
	}
	
	
	
}




