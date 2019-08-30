# NEON Architecture
An architecture for building Laravel applications, taking influence from the IODA Architecture


Add `Neondigital\NeonArchitecture\Traits\RunActions` trait to your controllers, or just add to base controller ;-)

## Artisan Commands

```
php artisan make:action LoadOrderAction Orders

php artisan make:process PlaceOrder Orders
```

You can customise the suffixing of generated classes by publishing the config file.
`php artisan vendor:publish --provider="Neondigital\NeonArchitecture\NeonServiceProvider"`


## Run stuff

```
class ExampleController extends Controller
{
    use RunActions;

    public function index()
    {
        return $this->run(new \App\Processes\Orders\PlaceOrder);
    }

```

## Actions to get you started

`Neondigital\NeonArchitecture\Actions\MakeViewAction`

Example usage: `return $this->run(new MakeViewAction('admin.products.index', ['products' => $products, 'breadcrumb' => $breadcrumb, 'user' => $user]));`


## Guidance for usage

Coming soon!!