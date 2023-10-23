import { Component } from '@angular/core';
import { InscriptionService } from '../inscription.service';
import * as XLSX from 'xlsx';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-inscription',
  templateUrl: './inscription.component.html',
  styleUrls: ['./inscription.component.css']
})
export class InscriptionComponent {

  tableaux: any[] = []
  data= new FormData()
  file: any
  // myFormInscrip:FormGroup
  etudiants: [] = []

  constructor(private inscription: InscriptionService ,private toastr:ToastrService) {
  }

  chooseFile(event: any): void {
    this.file = event.target.files[0];
    this.data.append('file',this.file)
    this.data.append('classe_annee_id','1')
    if (this.file) {
      // const file = excel[0];
      let reader = new FileReader();
      reader.onload = (e: any) => {
        let value = reader.result;
        const jsonData = XLSX.read(value, { type: 'binary' })
        const sheetName = jsonData.SheetNames[0];
        const worksheet = jsonData.Sheets[sheetName];
        const Data = XLSX.utils.sheet_to_json(worksheet, { header: 1 });
        // console.log(Data);

        this.tableaux = Data
      }
      reader.readAsBinaryString(this.file);
    }
  }

  inscrireEtu() {
    this.inscription.import(this.data).subscribe((response:any)=>{
      // console.log(response.message);
      this.toastr.success(response.message)
    })
  }

}
