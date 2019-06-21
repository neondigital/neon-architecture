# NEON Architecture
An architecture for building Laravel applications, taking influence from the IODA Architecture


Add `Neondigital\NeonArchitecture\Traits\RunActions` trait to your controllers, or just add to base controller ;-)

## Artisan Commands

```
php artisan make:action LoadOrderAction Orders

php artisan make:process PlaceOrder Orders
```

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

Example usage: `return $this->run(new MakeViewAction('admin.products.index', $products, $breadcrumb, $user));`


---

## Random thoughts that need writing up properly!

```

app
    Http
        Controllers
        Requests



Request
Validation
Do stuff
Response - view



function placeOrder(PlaceOrderRequest $request)
{
    $order = Order::find($id);

    $orderService->place($order);

    $success = true;

    $orderArray = [
        'id' => $order->ref,
        'email' => $order->customer->email
    ];

    return view('thank_you', [
        'order' => $orderArray,
        'success' => $success
    ]);
}



function viewOrder($id)
{
    $order = Order::find($id);

    return view('order', ['order' => $order]);
}


//-----------------------------------------------------

function placeOrder(PlaceOrderRequest $request)
{
    $order = $this->run(new GetOrderAction($id));

    $success = $this->run(new PlaceOrderProcess($order));

    return $this->run(new ThankYouViewAction($order, $success));
}

function viewOrder($id)
{
    $order = $this->run(new GetOrderAction($id));

    return $this->run(new ViewAction('view_order', $order));
}


AbstractClasses, Default Actions, e.g. ViewAction
Artisan helper functions to create Actions & Processes


/app
    /Domains
        /Inventory
            /Skus
                GenerateSkuAction.php
            /Locations
                GetLocationByCodeAction.php
            GetInventoryByIdAction.php
            Events
                StockMovedEvent.php
            Exceptions
                StockMoveException.php
        /Orders
            GetOrderByIdAction.php
        /Email
            OrderThankYouEmailAction.php
        /Http
            ViewAction.php <<-- Default
            ThankYouViewAction.php


    /Processes
        Orders
            PlaceOrderProcess.php << reuse

```