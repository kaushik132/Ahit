<?php return array (
  'botman/botman' => 
  array (
    'providers' => 
    array (
      0 => 'BotMan\\BotMan\\BotManServiceProvider',
    ),
    'aliases' => 
    array (
      'BotMan' => 'BotMan\\BotMan\\Facades\\BotMan',
    ),
  ),
  'botman/driver-web' => 
  array (
    'providers' => 
    array (
      0 => 'BotMan\\Drivers\\Web\\Providers\\WebServiceProvider',
    ),
  ),
  'encore/laravel-admin' => 
  array (
    'providers' => 
    array (
      0 => 'Encore\\Admin\\AdminServiceProvider',
    ),
    'aliases' => 
    array (
      'Admin' => 'Encore\\Admin\\Facades\\Admin',
    ),
  ),
  'facade/ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'fruitcake/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Fruitcake\\Cors\\CorsServiceProvider',
    ),
  ),
  'laravel-admin-ext/ckeditor' => 
  array (
    'providers' => 
    array (
      0 => 'Encore\\CKEditor\\CKEditorServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'maatwebsite/excel' => 
  array (
    'providers' => 
    array (
      0 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
    ),
    'aliases' => 
    array (
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'spatie/laravel-cookie-consent' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\CookieConsent\\CookieConsentServiceProvider',
    ),
  ),
  'yoeunes/toastr' => 
  array (
    'providers' => 
    array (
      0 => 'Yoeunes\\Toastr\\ToastrServiceProvider',
    ),
    'aliases' => 
    array (
      'Toastr' => 'Yoeunes\\Toastr\\Facades\\Toastr',
    ),
  ),
);