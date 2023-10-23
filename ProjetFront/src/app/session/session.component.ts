import { Component, OnInit } from '@angular/core';
import { SessionService } from '../session.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { initFlowbite } from 'flowbite';
import { CalendarEvent, CalendarView } from 'angular-calendar';
import { isSameDay, isSameMonth } from 'date-fns';
import { Subject } from 'rxjs';

@Component({
  selector: 'app-session',
  templateUrl: './session.component.html',
  styleUrls: ['./session.component.css']
})
export class SessionComponent implements OnInit {
  viewDate: Date = new Date()
  view: CalendarView = CalendarView.Week
  CalendarView = CalendarView
  events: CalendarEvent[] = []
  activeDayIsOpen: boolean = false
  refresh = new Subject<void>
  constructor(private session: SessionService, private fb: FormBuilder) { }
  ngOnInit() {
    this.getSession()
    initFlowbite()
  }



  theView(view: CalendarView) {
    this.view = view
  }

  dayClicked({ date, events }: { date: Date; events: CalendarEvent[] }): void {
    if (isSameMonth(date, this.viewDate)) {
      if (
        (isSameDay(this.viewDate, date) && this.activeDayIsOpen === true) ||
        events.length === 0
      ) {
        this.activeDayIsOpen = false;
      } else {
        this.activeDayIsOpen = true;
      }
      this.viewDate = date;
    }
  }

  getSession() {
    this.session.getSession().subscribe((response: any) => {
      // console.log(response);

      response.data.forEach((element: any) => {
        // console.log(element);
        const eventSession = {
          title: `Module:${element.cours_id.module_prof_id.module} <br> Professeur:${element.cours_id.module_prof_id.prof} <br> Classe:${element.cours_id.classe_id}<br> Salle:${element.salle_id.nom}`,
          start: new Date(element.date + 'T' + element.hDebut),
          end: new Date(element.date + 'T' + element.hFin),
          draggable: true,
          resizable: {
            beforeStart: true,
            afterEnd: true,
          }
        }
        this.events.push(eventSession)
      });
    })
  }

  eventClicked(event: any) {
    console.log(event);

  }
  eventTimeChanged(event: any) {
    // console.log(event);
    event.event.start = event.newStart
    event.event.start = event.newStart
    this.refresh.next()
  }

}
// myFormSession: FormGroup
// salles: any
// salleSelectionnee!: boolean
// constructor(private session: SessionService, private fb: FormBuilder) {
//   this.myFormSession = fb.group({
//     date: [],
//     hDebut: [],
//     hFin: [],
//     Duree: [],
//     salle_id: [],
//     cours_id: [],
//     statutSalle: [],
//   })
// }

// getSalle() {
//   this.session.getSalle().subscribe((response) => {
//     // console.log(response);
//     this.salles = response
//     console.log(this.salles);

//   })
// }

// // getCours() {
// //   this.session.getCours().subscribe((response:any)=>{
// //     console.log(response.data);

// //   })
// // }
// ngOnInit() {
//   this.getSalle()
//   initFlowbite()
//   // this.getCours()

// }

// selectSalle(): void {
//   let stat = this.myFormSession.get('statutSalle')?.value
//   if (stat == 'Presentiel') {
//     this.salleSelectionnee = true
//   }
//   else if (stat == 'En ligne') {
//     this.salleSelectionnee = false
//   }

// }

// addSession() {
//   const sessions = this.myFormSession.value
//   // console.log(sessions);



//   this.session.store(sessions).subscribe((response) => {

//     console.log(response);
//   })

//   // this.session.store()
// }

