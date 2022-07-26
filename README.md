<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Aplicación implementada en Heroku
- [https://probandoeasybroker.herokuapp.com/](https://probandoeasybroker.herokuapp.com/).


Aquí se está implementando el paquete joshybadev/easybroker, todo se implementó en un controlador.

##El BackEnd
Ejemplo de uso en el método que obtiene la primera página:
```php
    public function contact_req_getall()
    {
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        $contactosResponsePagination = $easy->client()->contact_requests()->search("");
        session()->put("contactosResponsePagination",$contactosResponsePagination);
        if(!$contactosResponsePagination->error())
        {
            $content=$contactosResponsePagination->content();
            $paginator=$this->paginator($contactosResponsePagination->page(),$contactosResponsePagination->total());
            return view("contact_request/contactoscontent",compact('content','paginator'));
        }
        else
        {
            return AlertError($contactosResponsePagination->response()["error"]);
        }
    }
```

## El FrontEnd

- Contact Request es la opción de obtener la primera página (Get Page 1) del listado en una tabla,cuenta con su paginador y la capacidad de crear uno nuevo (New Contac).

- Properties de igual manera obtenemos la primera página (Get Page 1) del listado con su paginador, aquí podemos visualizar la imagen y ver el detalle de la propiedad.

- Mls Properties al ser una versión demo nos marca el siguiente mensaje: "Necesitas tener un plan MLS API para usar este endpoint "

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
