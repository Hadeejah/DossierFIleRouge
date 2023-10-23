import { Component } from '@angular/core';
import { ConnexionService } from '../connexion.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-connexion',
  templateUrl: './connexion.component.html',
  styleUrls: ['./connexion.component.css']
})
export class ConnexionComponent {

  myFormLogin: FormGroup
  constructor(private connexion: ConnexionService, private fb: FormBuilder, private route: Router, private toastr: ToastrService) {
    this.myFormLogin = this.fb.group({
      email: ['', Validators.required],
      password: ['', Validators.required],
    })
  }

  login() {
  const log = this.myFormLogin.value;

  // Réinitialisez les messages d'erreur
  this.toastr.clear();

  if (!this.myFormLogin.get('email')?.value || !this.myFormLogin.get('password')?.value) {
    this.toastr.error('Veuillez remplir les champs email et password');
  }  else {
    this.connexion.login(log).subscribe((response) => {
      localStorage.setItem('response', JSON.stringify(response));
      const obj = JSON.parse(localStorage.getItem('response')!);
 
      if (obj.role == 'RP') {
        this.route.navigate(['/resPeda']);
        this.toastr.success('Bienvenu cher RP,connexion reussie');
      } else if (obj.role == 'Attache') {
        this.route.navigate(['/Attache']);
        this.toastr.success('Bienvenu cher Attache,connexion reussie');
      } else if (obj.role == 'Prof') {
        this.route.navigate(['/prof']);
        this.toastr.success('Bienvenu cher Prof,connexion reussie');
      }
    });
  }
}
  misAjourForm() {
    this.myFormLogin.reset()
  }
 
}
