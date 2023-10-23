import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AccueilPrincipalComponent } from './accueil-principal/accueil-principal.component';
import { ConnexionComponent } from './connexion/connexion.component';
import { ProfComponent } from './prof/prof.component';
import { ResPedaComponent } from './res-peda/res-peda.component';
import { SessionComponent } from './session/session.component';
import { InscriptionComponent } from './inscription/inscription.component';
import { AttacheComponent } from './attache/attache.component';
import { NotifDemandeComponent } from './notif-demande/notif-demande.component';

const routes: Routes = [
  { path: '', component: ConnexionComponent },
  // { path: 'accueil', component: AccueilPrincipalComponent },
  { path: 'connexion', component: ConnexionComponent },
  { path: 'prof', component: ProfComponent },
  { path: 'resPeda', component: ResPedaComponent },
  { path: 'planningSess', component: SessionComponent },
  { path: 'inscription', component: InscriptionComponent },
  { path: 'Attache' , component:AttacheComponent},
  { path: 'demande' , component:NotifDemandeComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
