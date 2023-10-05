import { TestBed } from '@angular/core/testing';

import { ResPedaService } from './res-peda.service';

describe('ResPedaService', () => {
  let service: ResPedaService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ResPedaService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
