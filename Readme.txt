# Centro Estético M&P - Sitio Web

## Descripción
Sitio web profesional para centro estético con:
- Diseño moderno y responsive
- Formulario de contacto con Netlify Forms
- Integración con Google Maps
- Botón flotante de WhatsApp
- Efectos de scroll animados

## Características Técnicas
✔ Diseño responsive (mobile, tablet, desktop)  
✔ Formulario con protección anti-spam  
✔ Optimizado para SEO básico  
✔ Tiempo de carga optimizado  
✔ Validación HTML5/CSS3  

## Estructura de Archivos
css/
  main.css       # Estilos principales  
  mobil.css      # Media queries para móviles  
  tablet.css     # Media queries para tablets  

js/
  main.js        # Funcionalidades JS  

assets/
  img/           # Todas las imágenes  
  icons/         # Íconos SVG y favicon  

## Configuración Netlify
1. En el panel de Netlify ve a:  
   Site settings > Forms > Form notifications  
2. Agrega tu email como destinatario  
3. Configura el asunto personalizado:  
   "Nuevo mensaje de {{form_data.name}}"

## Personalización
### Cambiar colores
Editar en css/main.css:
```css
:root {
  --accent-color: #ff6b9e;     /* Color principal */
  --heading-color: #222222;    /* Títulos */
  --default-color: #444444;    /* Texto normal */
}

Créditos

Desarrollado por Alan Agustin Quiroga
© 2023 Centro Estético M&P - Todos los derechos reservados
Soporte Técnico

Contacto: centroesteticamyp@gmail.com
Tel: +54 9 11 3301-8464
Horario: Lunes a Viernes 9-18hs