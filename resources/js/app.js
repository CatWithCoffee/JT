import './bootstrap';

import Alpine from 'alpinejs';

import { MaskInput } from 'maska';

new MaskInput("[data-maska]", { mask: "+7 (###) ###-##-##" });

window.Alpine = Alpine;

Alpine.start();
