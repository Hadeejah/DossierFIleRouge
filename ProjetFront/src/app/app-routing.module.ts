import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AccueilPrincipalComponent } from './accueil-principal/accueil-principal.component';
import { ConnexionComponent } from './connexion/connexion.component';
import { ProfComponent } from './prof/prof.component';

const routes: Routes = [
  { path: '', component: AccueilPrincipalComponent },
  { path: 'accueil', component: AccueilPrincipalComponent },
  { path: 'connexion', component: ConnexionComponent },
  { path: 'prof', component: ProfComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
