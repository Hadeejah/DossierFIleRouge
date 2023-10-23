import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class InscriptionService {

  constructor(private http: HttpClient) { }

  url: string = 'http://127.0.0.1:8000/api/'

  import(data: any) {
    return this.http.post(this.url + 'import', data)
  }

}
