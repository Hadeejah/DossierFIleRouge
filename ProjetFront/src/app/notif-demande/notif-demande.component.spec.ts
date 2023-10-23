import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NotifDemandeComponent } from './notif-demande.component';

describe('NotifDemandeComponent', () => {
  let component: NotifDemandeComponent;
  let fixture: ComponentFixture<NotifDemandeComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [NotifDemandeComponent]
    });
    fixture = TestBed.createComponent(NotifDemandeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
