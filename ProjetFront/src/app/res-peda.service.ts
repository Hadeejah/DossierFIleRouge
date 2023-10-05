import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ResPedaService {

  constructor(private http: HttpClient) { }

   url:string='http://127.0.0.1:8000/api/'
  store(data: any) {
    return this.http.post(this.url+'cours', data)
  }

  getModule() {
    return this.http.get(this.url+`module`)
  }
  
  getProf(id:number) {
    return this.http.get(this.url+`user/${id}`)
  }

  getClasse() {
    return this.http.get(this.url+`classe`)
  }
  getCours(){
    return this.http.get(this.url+`cours`)
  }
}

