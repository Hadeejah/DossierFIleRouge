import { Component, OnInit } from '@angular/core';
import { ResPedaService } from '../res-peda.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { initFlowbite } from 'flowbite';
import { ToastrService } from 'ngx-toastr';

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
  openModal: boolean = true
  myFormSession: FormGroup
  salles: any
  salleSelectionnee!: boolean
  dataCour: any
  message: string = ""
  // erreur:boolean=true
  // courId:any




  constructor(private resPeda: ResPedaService, private fb: FormBuilder, private toastr: ToastrService) {
    this.myFormcours = this.fb.group({
      module: ['choisir un module', Validators.required],
      module_prof_id: ['', Validators.required],
      classe_id: ['choisir un module', Validators.required],
      nbre_heure: ['', Validators.required],
      etatCours: ['']
    })
    this.myFormSession = this.fb.group({
      date: ['', Validators.required],
      hDebut: ['', Validators.required],
      hFin: ['', Validators.required],
      // Duree: ['', Validators.required],
      salle_id: [''],
      cours_id: ['', Validators.required],
      statutSalle: [''],
    })
  }

  ngOnInit(): void {
    this.listerModule();
    this.listerClasse();
    this.listerCours();
    this.chargeSalle()
    initFlowbite();
  }

  chargeSalle() {
    this.resPeda.chargeSalle().subscribe((donnee) => {
      this.salles = donnee
      console.log(donnee);

    })
  }

  selectSalle(): void {
    let stat = this.myFormSession.get('statutSalle')?.value
    if (stat == 'Presentiel') {
      this.salleSelectionnee = true
    }
    else if (stat == 'En ligne') {
      this.salleSelectionnee = false
      this.myFormSession.get('salle_id')?.setValue(null)

    }

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
    // console.log(prof);
    
    this.resPeda.getProf(prof).subscribe((data3:any) => {
      this.profs = data3
      console.log(this.profs);
      
      
    })
    // console.log(data3);
  }
  valideCours() {
    const donneeAddCours = this.myFormcours.value
    // console.log(donneeAddCours);
    this.resPeda.store(donneeAddCours).subscribe((response: any) => {
      // console.log(response.message);
      this.toastr.success(response.message)

    }, error => {
      this.toastr.error(error.error.message)
    })

  }
  addSession() {

    const courId = this.myFormSession.get('cours_id')?.value

    this.myFormSession.get('cours_id')?.setValue(courId.id)

    this.resPeda.addSession(this.myFormSession.value).subscribe((response: any) => {
      // console.log(response.message);
      this.toastr.success(response.message)

    }, error => {
      this.toastr.error(error.error.message)
    })

  }
  openMyModal(cour: any) {
    this.dataCour = cour

    this.myFormSession.get('cours_id')?.setValue(cour)
    this.openModal = false
  }
  closeMyModal() {
    this.openModal = true
  }
  ValideHeure() {
    const hD = this.myFormSession.get('hDebut')?.value
    const hF = this.myFormSession.get('hFin')?.value
    if (hD >= hF) {
      this.myFormSession.get('hDebut')?.setErrors({
        invalidHdebut: true
      })
    }
    else {
      this.myFormSession.get('hDebut')?.setErrors(null)
    }
  }


  videChamp() {
    this.myFormSession.reset()
  }
}
