import { Component, OnInit } from '@angular/core';
import { ConnexionService } from '../connexion.service';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';


@Component({
  selector: 'app-navebar',
  templateUrl: './navebar.component.html',
  styleUrls: ['./navebar.component.css']
})
export class NavebarComponent implements OnInit {

  role: string = ''

  constructor(private connexion: ConnexionService,private route:Router, private toastr:ToastrService) { }

  ngOnInit() {
    let user = JSON.parse(localStorage.getItem('response')!)
    this.role = user.role
  }

  logout() {
    const data = {}
    this.connexion.logout(data).subscribe((response)=>{
     
      localStorage.removeItem('response')
      this.route.navigate(['/'])
      // this.toastr.success('sdfghj')
      
    })
  }
}
