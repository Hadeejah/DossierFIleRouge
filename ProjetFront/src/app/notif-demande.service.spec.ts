import { TestBed } from '@angular/core/testing';

import { NotifDemandeService } from './notif-demande.service';

describe('NotifDemandeService', () => {
  let service: NotifDemandeService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(NotifDemandeService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
