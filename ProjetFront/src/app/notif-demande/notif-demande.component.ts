import { Component, OnInit } from '@angular/core';
import { NotifDemandeService } from '../notif-demande.service';
import { de } from 'date-fns/locale';

@Component({
  selector: 'app-notif-demande',
  templateUrl: './notif-demande.component.html',
  styleUrls: ['./notif-demande.component.css']
})
export class NotifDemandeComponent implements OnInit {

  demandes: any
  constructor(private notif: NotifDemandeService) { }
  ngOnInit() {
    this.getDemande()
  }

  getDemande() {

    this.notif.getDemande().subscribe((data:any) => {
      this.demandes = data.data
      console.log(this.demandes);
      

    })
  }
}
