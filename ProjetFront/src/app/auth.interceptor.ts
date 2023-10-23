import { Injectable } from '@angular/core';
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpInterceptor
} from '@angular/common/http';
import { Observable } from 'rxjs';
import { ConnexionService } from './connexion.service';

@Injectable()
export class AuthInterceptor implements HttpInterceptor {

  constructor(private connexion:ConnexionService) {}

  intercept(request: HttpRequest<unknown>, next: HttpHandler): Observable<HttpEvent<unknown>> {
    let token=this.connexion.getUser();
    if (token) {
      request =request.clone({
        headers:request.headers.set('Authorization',`Bearer ${token.token}`)
      })
    }
    return next.handle(request);
    
  }

}
