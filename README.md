# shortner-service
A Service for shortening url links.

# System Architecture
![image](https://github.com/user-attachments/assets/d18da042-f13f-4762-8663-f1edd5ab53f3)


## Installing the Dependencies.
Change the directory to the laravel project. use composer to install the dependecies.
```shell
cd url-shortener && composer install
```

To run the migrations

```shell
php artisan migrate
```

Start the application.

```shell
php artisan serve
```
To test the system run the command below
```shell
php artisan  test
```

# Routes

- /api/v1/encode

## Expected Request for Creation of a Short url
```curl
curl --location 'https://8000-idx-shortner-service-1743505012037.cluster-l6vkdperq5ebaqo3qy4ksvoqom.cloudworkstations.dev/api/v1/encode' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data '{
  "url":"https://google.com"
}'
```
## Expected Response for Creation of a Short url
```json
{
    "short_url": "https://8000-idx-shortner-service-1743505012037.cluster-l6vkdperq5ebaqo3qy4ksvoqom.cloudworkstations.dev/Cqv1H4",
    "code": "Cqv1H4",
    "long_url": "https://google.com"
}
```
- /api/v1/decode
## Expected Request for Retrieval of the long url.
```curl
curl --location 'https://8000-idx-shortner-service-1743505012037.cluster-l6vkdperq5ebaqo3qy4ksvoqom.cloudworkstations.dev/api/v1/decode' \
--header 'Content-Type: application/json' \
--data '{
  "short_code":"yxvzYD"
}'
```
## Expected Response for Retrieval of the long url.
```json
{
    "long_url": "https://google.com"
}
```

## Possible Issues

if any of the requests have you redirected back to the homepage, ensure you have the Accept header set to `application/json`.That way you can get request validation errors shown.




