
## Installation

Like any other packages in the packagist you'll need to add serviceProvider and Facade aliases into your config/app.php using following lines:

first add this as a serviceProvider in "providers" array:
```bash
  BladeBundler\ServiceProviders\BladeBundlerServiceProvider::class,
```


then add this as a aliases in "aliases" array:
```bash
  'BB' => BladeBundler\BB::class
```

never forget to use following commands in terminal because you have changed config files.


```bash
  php artisan optimize
```
```bash
  composer du
```
