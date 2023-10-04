import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AccueilPrincipalComponent } from './accueil-principal/accueil-principal.component';
import { NavebarComponent } from './navebar/navebar.component';
import { ConnexionComponent } from './connexion/connexion.component';
import { ProfComponent } from './prof/prof.component';
import { AttacheComponent } from './attache/attache.component';
import { ResPedaComponent } from './res-peda/res-peda.component';

@NgModule({
  declarations: [
    AppComponent,
    AccueilPrincipalComponent,
    NavebarComponent,
    ConnexionComponent,
    ProfComponent,
    AttacheComponent,
    ResPedaComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
