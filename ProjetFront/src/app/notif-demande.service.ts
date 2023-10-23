import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ht } from 'date-fns/locale';

@Injectable({
  providedIn: 'root'
})
export class NotifDemandeService {

  constructor(private http: HttpClient) { }

  url: string = 'http://127.0.0.1:8000/api/'

  getDemande() {
    return this.http.get(this.url + `demande`)
  }
}
