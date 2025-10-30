import { Component, signal } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { Logo } from "./logo/logo";
import { ImgDonkey } from "./img-donkey/img-donkey";
import { ShrekImage } from "./shrek-image/shrek-image";

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, Logo, ImgDonkey, ShrekImage],
  templateUrl: './app.html',
  styleUrl: './app.css'
})
export class App {
  protected readonly title = signal('Bem vindo ao pantano do Shrek!');
  protected readonly desc = signal('Cuidado com o ogro.'); 
}
