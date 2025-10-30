import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ShrekImage } from './shrek-image';

describe('ShrekImage', () => {
  let component: ShrekImage;
  let fixture: ComponentFixture<ShrekImage>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ShrekImage]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ShrekImage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
