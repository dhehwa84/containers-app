 ## About

 This is a laravel api for calculating containers needed for transports

 ## Set Up

 ### Requirements
  <ol>
   <li>Laravel set up, you can check this link </li>
   <li>In the project folder on console, run `composer install`</li>
   <li>Run `php artisan serve`</li>
 </ol>
 
 ### End points
  - The project has one end point which does the calculations `...api/calculate`
  - The end point takes a JSON object with the followig properties:
  ```json
  {
    "transport": [
        {
            "radius": 100
        },
        {
            "length": 400,
            "width": 400
        }
    ], 
    "containers": [
        {
            "length": 300,
            "width": 200
        },
        {
            "length": 100,
            "width": 100
        }
    ] 
}
  ```
  
   - The `transport` property takes all the transports in an array format. The trasports must have recognised properties like the `radius` for a circle and `width` and `length` for a square.
   - The `containers` property takes all containers available for the transportation. Needed properties are `length` and `width`


The response will look like the following:

 - Every container will have an array of transports that will fit in it
##### Note: Solution not perfect
```json
{
    "success": true,
    "data": [
        {
            "transports": [
                [],
                [
                    {
                        "radius": 100,
                        "name": "Circle",
                        "volume": 200
                    }
                ]
            ],
            "name": "Container",
            "width": 200,
            "length": 300,
            "volume": 60000
        },
        {
            "transports": [
                [],
                [
                    {
                        "radius": 100,
                        "name": "Circle",
                        "volume": 200
                    }
                ]
            ],
            "name": "Container",
            "width": 100,
            "length": 100,
            "volume": 10000
        }
    ]
}

```


 


