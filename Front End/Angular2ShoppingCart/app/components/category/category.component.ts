import { Component, OnInit  } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { ProductService } from '../../services/product.service';
import { CategoryService } from '../../services/category.service';
import { Product } from '../../entities/product.entities';
import { Category } from '../../entities/category.entities';

@Component({
	moduleId: module.id,
	templateUrl: 'category.component.html'
})

export class CategoryComponent implements OnInit {
	
	products: Product[];
	category: Category;
	sub: any;
	
	constructor(private activatedRoute: ActivatedRoute, private productService: ProductService, private categoryService: CategoryService) {		
	}
	
	ngOnInit() {
		let params: any = this.activatedRoute.snapshot.params;
		this.productService.findByCategory(params.id).subscribe(data => this.products = data);
		this.categoryService.find(params.id).subscribe(data => this.category = data);
		this.sub = this.activatedRoute.params.subscribe(params => {
			let id = params['id'];
			this.productService.findByCategory(id).subscribe(data => this.products = data);
			this.categoryService.find(id).subscribe(data => this.category = data);
       });
	}
	
	
	
}




