
## Installation

```sh
git clone https://github.com/firefoxuz/linkshortener
cd linkshortener
composer install
php artisan migrate
```
## Demo
You can try this service on demo server: https://linkshortener.firefox.uz/api

## Example

##### To shorten new url, similar query should be sent to the service.
#### Request
```graphql
mutation {
    createUrl(long_url: "http://yourlink.com") {
        id
        long_url
        short_url
        views
   }
}
```
#### Response
```json
{
    "data": {
        "createUrl": {
            "id": "23",
            "long_url": "http://yourlink.com",
            "short_url": "http://l.uz/nUjNYg",
            "views": 0
        }
    }
}
```

------------


##### To access information of exact shortened url, similar query should be sent to the service.
#### Request
```graphql
{
  url(id: 11) {
    id
    long_url
    short_url
    views
  }
}
```
#### Response
```json
{
  "data": {
    "url": {
      "id": "11",
      "long_url": "https://firefox.uzz",
      "short_url": "http://l.uz/l13MYg",
      "views": 0
    }
  }
}
```

------------


##### To access information of all shortened url with pagination, similar query should be sent to the service.
#### Request
```graphql
{
  urls(first: 5, page: 3) {
    data {
      id
      long_url
      short_url
      views
    }
    paginatorInfo {
      currentPage
      lastPage
    }
  }
}
```
#### Response
```json
{
  "data": {
    "urls": {
      "data": [
        {
          "id": "11",
          "long_url": "https://firefox.uzz",
          "short_url": "http://l.uz/l13MYg",
          "views": 0
        },
        {
          "id": "12",
          "long_url": "https://firefox.uzz",
          "short_url": "http://l.uz/oV3MYg",
          "views": 1
        },
        {
          "id": "13",
          "long_url": "https://firefox.ru",
          "short_url": "http://l.uz/mSrNYg",
          "views": 1
        },
        {
          "id": "14",
          "long_url": "https://firefox.kz",
          "short_url": "http://l.uz/tirNYg",
          "views": 0
        }
      ],
      "paginatorInfo": {
        "currentPage": 3,
        "lastPage": 3
      }
    }
  }
}
```
## Contact
If you have any related questions, please contact me. daler.sultonov.00@gmail.com
