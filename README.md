# a1excode-source


``` php
// uncomment code in file \app\Providers\AppServiceProvider.php

View::share(
    'categories',
    Category::orderBy('id', 'desc')->get()
);

```

``` bash
cd public || rm -r storage

php artisan storage:link

php artisan migrate
```
