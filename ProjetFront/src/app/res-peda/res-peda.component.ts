import { Component, OnInit } from '@angular/core';
import { ResPedaService } from '../res-peda.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-res-peda',
  templateUrl: './res-peda.component.html',
  styleUrls: ['./res-peda.component.css']
})
export class ResPedaComponent implements OnInit {

  myFormcours: FormGroup
  modules: any
  classes: any
  profs: any
  cours: any

  constructor(private resPeda: ResPedaService, private fb: FormBuilder) {
    this.myFormcours = this.fb.group({
      module: ['choisir un module', Validators.required],
      prof_id: ['', Validators.required],
      classe_id: ['choisir un module', Validators.required],
      nbre_heure: ['', Validators.required],
    })
  }

  ngOnInit(): void {
    this.listerModule()
    this.listerClasse()
    this.listerCours()

  }

  listerCours() {
    this.resPeda.getCours().subscribe((response: any) => {
      this.cours = response.data
      console.log(this.cours);
      
    })
  }
  listerModule() {
    this.resPeda.getModule().subscribe((data1) => {
      this.modules = data1
      console.log(this.modules);
    })
  }

  listerClasse() {
    this.resPeda.getClasse().subscribe((data2) => {
      this.classes = data2
      console.log(this.classes);
    })
  }

  chargeProf() {
    const prof = this.myFormcours.get('module')?.value
    this.resPeda.getProf(prof).subscribe((data3) => {
      this.profs = data3
      console.log(this.profs);


    })
  }
  valideCours() {
    const donneeAddCours = this.myFormcours.value
    // console.log(donneeAddCours);
  
    this.resPeda.store(donneeAddCours).subscribe((response) => {
      console.log(response);

    })
  }
}
