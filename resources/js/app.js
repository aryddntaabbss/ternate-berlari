import './bootstrap';
import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.Alpine = Alpine;

Alpine.start();


// Inisialisasi AOS
AOS.init( {
    duration: 800,  // Durasi animasi
    offset: 50,  // Offset animasi
    once: false,  // Animasi hanya berjalan sekali
} );
