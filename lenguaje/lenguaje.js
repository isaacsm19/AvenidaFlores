var arrLang = {
    'es': {
      'inicio': 'Inicio',
      'reservar': 'Reservar',
      'apartamentos': 'Apartamentos',
      'sobrenosotros': 'Sobre Nosotros',
      'Ubicación': 'Ubicación',
      'mapa': 'Mapa',
      'costarica': 'Costa rica',
      'atenas': 'Atenas',
      'reservacion': 'Reservación',
      'galeria': 'Galeria',
      'bienvenido': 'Bienvenido a Avenida Flores',
      'idioma': 'Idioma',
      'reservas': 'Reserva un apartamento'
     
    },
    'en': {
      'inicio': 'Home',
      'reservar': 'Book',
      'apartamentos': 'Apartments',
      'sobrenosotros': 'About us',
      'Ubicación': 'Location',
      'mapa': 'Map',
      'costarica': 'Costa rica',
      'atenas': 'Atenas',
      'reservacion': 'Book',
      'galeria': 'Gallery',
      'bienvenido': 'Welcome to Avenida Flores',
      'idioma': 'Language',
      'reservas': 'Book an apartment'


      
    }
  };

  // Process translation
  $(function() {
    $('.translate').click(function() {
      var idioma = $(this).attr('id');

      $('.idioma').each(function(index, item) {
        $(this).text(arrLang[idioma][$(this).attr('key')]);
      });
    });
  });

 

