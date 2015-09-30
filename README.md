# PHP REST Micro Framework

A simplistic micro framework for building an application providing a RESTful API.

## Prerequsites

- PHP 5.5+
- [PHP mbstring extension](http://php.net/manual/en/book.mbstring.php) (which is usually built into most distributions of PHP)

## Usage

Have a look at ```/example/application.php``` for a quick start. It creates a  ```Router``` and the ```Application```, sets up a ```Route for``` ```/``` that will return a JSON response containing "Hello World!" to the client.

You can use PHP's [builtin webserver](http://php.net/manual/en/features.commandline.webserver.php) to test it for yourself!

Start the server by running ```php -S localhost:8000 example/application.php```:

```
$ php -S localhost:8000 example/application.php
PHP 5.6.2 Development Server started at Tue Sep 22 14:50:29 2015
Listening on http://localhost:8000
Document root is /Users/sebastian/projects/php/restframework
Press Ctrl-C to quit.
```

Send a request to ```http://localhost:8000/```:

```
$ curl http://localhost:8000/
{
    "message": "Hello World!"
}
```

Sending requests to other routes or with other HTTP methods will result in a 404 response:

```
$ curl -X PUT http://localhost:8000/
{
    "error": {
        "code": 404,
        "message": "No route for put \/"
    }
}

$ curl http://localhost:8000/foo
{
    "error": {
        "code": 404,
        "message": "No route for get \/foo"
    }
}
```
