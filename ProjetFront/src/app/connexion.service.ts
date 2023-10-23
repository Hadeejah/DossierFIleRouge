import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ConnexionService {

  constructor(private http: HttpClient) { }

  url: string = 'http://127.0.0.1:8000/api/'

  login(data: any) {
    return this.http.post(this.url + `login`, data)
  }

  getUser(){
    return JSON.parse(localStorage.getItem('response')!)
  }
  logout(data: any) {
    return this.http.post(this.url + `logout`, data)
  }
}
