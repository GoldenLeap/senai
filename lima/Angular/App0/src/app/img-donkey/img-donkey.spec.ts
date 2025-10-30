import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ImgDonkey } from './img-donkey';

describe('ImgDonkey', () => {
  let component: ImgDonkey;
  let fixture: ComponentFixture<ImgDonkey>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ImgDonkey]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ImgDonkey);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
