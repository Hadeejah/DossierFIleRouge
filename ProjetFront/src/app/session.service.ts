import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class SessionService {

  constructor(private http: HttpClient) { }
  url: string = 'http://127.0.0.1:8000/api/'

  getSession(){
    return this.http.get(this.url+`session`)
  }
}
