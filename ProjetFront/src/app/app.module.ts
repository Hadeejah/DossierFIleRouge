import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AccueilPrincipalComponent } from './accueil-principal/accueil-principal.component';
import { NavebarComponent } from './navebar/navebar.component';
import { ConnexionComponent } from './connexion/connexion.component';
import { ProfComponent } from './prof/prof.component';
import { AttacheComponent } from './attache/attache.component';
import { ResPedaComponent } from './res-peda/res-peda.component';
import { ReactiveFormsModule } from '@angular/forms';
import {HTTP_INTERCEPTORS, HttpClientModule} from '@angular/common/http';
import { SessionComponent } from './session/session.component';
import { CalendarDateFormatter, CalendarModule, CalendarNativeDateFormatter, DateAdapter, DateFormatterParams } from 'angular-calendar';
import { adapterFactory } from 'angular-calendar/date-adapters/date-fns';
import localFr from '@angular/common/locales/fr'
import { registerLocaleData } from '@angular/common';
import { InscriptionComponent } from './inscription/inscription.component';
import { ToastrModule } from 'ngx-toastr';
import { AuthInterceptor } from './auth.interceptor';
import { NotifDemandeComponent } from './notif-demande/notif-demande.component';

registerLocaleData(localFr,'Fr')
class CustomDateFormatter extends CalendarNativeDateFormatter {
  public override dayViewHour({ date, locale }: DateFormatterParams): string {
   return new Intl.DateTimeFormat(locale,{hour:'numeric',minute:'numeric'}).format(date)
  }
  public override weekViewHour({ date, locale }: DateFormatterParams): string {
   return new Intl.DateTimeFormat(locale,{hour:'numeric',minute:'numeric'}).format(date)
    
  }
}



@NgModule({
  declarations: [
    AppComponent,
    AccueilPrincipalComponent,
    NavebarComponent,
    ConnexionComponent,
    ProfComponent,
    AttacheComponent,
    ResPedaComponent,
    SessionComponent,
    InscriptionComponent,
    NotifDemandeComponent,
    
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
    HttpClientModule,
    ToastrModule.forRoot(),
    BrowserAnimationsModule,
    CalendarModule.forRoot({ provide: DateAdapter, useFactory: adapterFactory })
  ],
  providers: [
        {provide: CalendarDateFormatter,useClass: CustomDateFormatter},
        { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptor, multi: true },


  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
