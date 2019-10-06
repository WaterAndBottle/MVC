<?php
return array(
    'Buyer/([a-z]+)'=>'Buyer/addBuyer', // Метод AddBuyerAction в BuyerController
    'Buyer/Edit/([a-z]+)'=>'Buyer/editProfileInfo', // Метод EditBuyerAction в BuyerController
    'Book/Edit/([a-z]+)'=>'Book/EditBook',// Метод EditBookAction в BookController
    'Book/Add/([a-z]+)'=>'Book/AddBook',// Метод AddBookAction в BookController
    'Book/Show/([a-z]+)'=>'Book/ShowBookInfo',// Метод ShowBookInfoAction в BookController
    'Book/GroupByPrice/([a-z]+)'=>'Book/GroupByPrice',// Метод GroupByPriceAction в BookController
);
