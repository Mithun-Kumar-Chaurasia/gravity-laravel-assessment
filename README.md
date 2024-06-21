Step to run the project:-

1. Download the project from git url
2. run project using php artisan serve command
3. use any 3rd party to run API, Ex:- PostMan
4. run http://127.0.0.1:8000/api/offer with get method
5. In headers use content-type:application/json
6. in body select raw and pass body of inputs, Ex:-
   {
    "rule":3,
    "products":[5, 5, 10, 20, 30, 40, 50, 50, 50, 60]
}
7. run http://127.0.0.1:8000/api/offer API in postman & see response. Response Ex:-   {"Discounted Items":[50,50,30,10,5],"Payable Items":[60,50,40,20,5]}
