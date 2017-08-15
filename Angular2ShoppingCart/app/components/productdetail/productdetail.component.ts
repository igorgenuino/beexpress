import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Router } from '@angular/router';

import { ProductService } from '../../services/product.service';
import { RestService } from '../../services/rest.service';
import { Product } from '../../entities/product.entities';

@Component({
	moduleId: module.id,
	templateUrl: 'productdetail.component.html'
})

export class ProductDetailComponent implements OnInit {
	
	product: Product;
	products: Product[];
	sub: any;
	
	constructor(
		private activatedRoute: ActivatedRoute, 
		private productService: ProductService, 
		private router: Router,
		private restService: RestService
	) {}
	
	ngOnInit() {
		let params: any = this.activatedRoute.snapshot.params;
		this.productService.find(params.id).subscribe(data => this.product = data);
		this.productService.findRelated(params.catid, params.id).subscribe(data => this.products = data);
		this.sub = this.activatedRoute.params.subscribe(params => {
			let id = params['id'];
			let catid = params['catid'];
			this.productService.find(id).subscribe(data => this.product = data);
			this.productService.findRelated(catid, id).subscribe(data => this.products = data);	
       });
	   let proInfo:any = {id: params.id, X_API_KEY: this.restService.getKey() };
	   this.productService.updateView(proInfo).subscribe(
			result => {}
		);
	}
	
	
}




