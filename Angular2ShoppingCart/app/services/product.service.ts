﻿import { Injectable } from '@angular/core';
import { Http, Response, Headers, Request, RequestOptions } from '@angular/http';
import 'rxjs/add/operator/map';

import { RestService } from './rest.service';

@Injectable()
export class ProductService {
	
	constructor (
		private http: Http,
		public restService: RestService
	) {}
	
	latest() {	
		return this.http.get(this.restService.baseURLKey('article', 'find_latest')).map((res:Response) => res.json());		
	}
	
	mostViewed() {	
		return this.http.get(this.restService.baseURLKey('article', 'find_most_viewed')).map((res:Response) => res.json());		
	}
	
	bestSeller() {	
		return this.http.get(this.restService.baseURLKey('article', 'find_best_seller')).map((res:Response) => res.json());		
	}
	
	findByCategory(categoryId: number) {	
		return this.http.get(this.restService.baseURLKey('article', 'search_by_category_id/' + categoryId)).map((res:Response) => res.json());		
	}
	
	findByBrand(brandId: number) {	
		return this.http.get(this.restService.baseURLKey('article', 'search_by_brand_id/' + brandId)).map((res:Response) => res.json());		
	}
	
	find(id: number) {	
		return this.http.get(this.restService.baseURLKey('article', 'find_by_id/' + id)).map((res:Response) => res.json());		
	}
	
	findRelated(categoryId: number, productId: number) {
		return this.http.get(this.restService.baseURLKey('article', 'search_related_by_category_id/' + categoryId + '/' + productId)).map((res:Response) => res.json());		
	}
	
	search(keyword: string) {	
		return this.http.get(this.restService.baseURLKey('article', 'search/' + keyword)).map((res:Response) => res.json());		
	}
	
	updateView(param: any) {	
		let headers = new Headers({ 'Content-Type': 'application/json'});
		let options = new RequestOptions({ headers: headers });
		let body = JSON.stringify(param);
		return this.http.post(this.restService.baseURLNoKey('article', 'update_view'), body, options);	
	}
	
}