<!doctype html>
<html lang="en" >
  <head>
    {{-- CSS AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{--  CDN GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anta&family=Assistant:wght@200..800&family=Mallanna&family=Michroma&family=Nova+Square&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Ojuju:wght@200..800&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Play:wght@400;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Rajdhani:wght@300;400;500;600;700&family=Zen+Kaku+Gothic+New&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anta&family=Assistant:wght@200..800&family=Mallanna&family=Michroma&family=Nova+Square&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
{{-- FINE CDN GOOGLE FONT --}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Post Scriptum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
     
    
    
   {{$slot}}    
   <x-footer/>
   {{-- AOS JS --}}
  
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 
   <script>
    AOS.init();
  </script>
  </body>
</html>