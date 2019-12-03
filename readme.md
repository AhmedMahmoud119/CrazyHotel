<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## API's Docs

- http://127.0.0.1:8000/api/hotels/OurHotels?from_date=2011-12-03&to_date=1997-05-17&city=AUH&adults_number=3

this api Filter all Hotels in Project 

- http://127.0.0.1:8000/api/hotels/BestHotel?from_date=2011-12-03&to_date=1997-05-17&city=AUH&adults_number=3

the second api Filter Best Hotels 

- http://127.0.0.1:8000/api/hotels/TopHotel?from_date=2011-12-03T10:15:30Z&to_date=2011-12-03T10:15:30Z&city=AUH&adults_number=3

the second api Filter Top Hotels

You Can Filter by any Of This ( from_date , to_date , city And adults_number )
if you don't need any one you can remove it from URL

## Code Docs

- HotelsController

- ``` $providers ```

Providers Variable that Containing all Providers (BestHotel,TopHotel)

- ``` $hotels ```

hotels Variable that Containing all Hotels 

- ``` filter_hotels() ``` function

You will find function ``` filter_hotels() ``` that Filter the Hotels According to Request Parameters .
This Function Accepts Array of Hotels , Request And Provider (optional)

- ``` select_attributes() ``` function

You will find function ``` select_attributes() ``` that will select Attributes From Hotels Array
to send it in Json response



