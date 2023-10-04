import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ResPedaComponent } from './res-peda.component';

describe('ResPedaComponent', () => {
  let component: ResPedaComponent;
  let fixture: ComponentFixture<ResPedaComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ResPedaComponent]
    });
    fixture = TestBed.createComponent(ResPedaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
