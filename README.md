# ToDoListShlagito

Une application basique de ToDoList en Laravel.

## Membres

- FRANCISCO-LEBLANC Sacha
- PANIC Nikola
- SABER Mehdi

## Installation

1) ``composer install && npm i && npm run dev``
2) Vérifier que `.env` existe, sinon copier ``.env.example`` dans `.env`
3) ``./vendor/bin/sail up -d --build``
4) ``./vendor/bin/sail artisan migrate:fresh --seed``

Protip: pour éviter de devoir taper la commande de sail à rallonge, créer un alias:

`alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`

Du coup ``./vendor/bin/sail up -d --build`` devient ``sail up -d --build``.

## Tests

[Documentation officielle de Laravel à ce sujet (en anglais)](https://laravel.com/docs/9.x/sail#running-tests)

### Si vous utilisez un Apple Silicon (puce M1)

Lancez vos tests avec Sail : 

- `sail test`
- `sail dusk`

### Sinon...

Vous allez devoir faire tourner vos tests sur votre machine en local. Pour cela:

- Installez la dernière version de [Google Chrome](https://www.google.com/chrome/)
- Lancez `php artisan dusk:install`
- `php artisan dusk:chrome-driver --detect`
- Si tout s'est bien passé, lancez Chrome et `php artisan dusk`

