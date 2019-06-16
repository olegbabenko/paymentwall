# Paymentwall
Test task for Paymentwall

API to validate payment information supports data in 2 formats: JSON and XML

Supported payment types: 

* Credit card

 JSON format:
>  '{
     "id": 1,
     "payment_type": "card",
     "hash": "593dd062791f8616937dcc6ab2675d1a",
     "timestamp": "1560666140",
     "payment_data": 
     {
         "number": "5555444422223333",
         "date": "09/22",
         "cvv": "111",
         "email": "test@test.com"
   }';


XML format: 
> <data>
      <id>1</id>,
      <payment_type>card</payment_type>,
      <hash>593dd062791f8616937dcc6ab2675d1a</hash>,
      <timestamp>1560666140</timestamp>,
      <payment_data>
          <number>5555111122223333</number>,
          <date>05/22</date>,
          <cvv>111</cvv>,
          <email>test@test.com</email>
      </payment_data>
  </data>;
  
  
  * Mobile
  
  JSON format:
  > '{
         "id": 1,
         "payment_type": "mobile",
         "hash": "593dd062791f8616937dcc6ab2675d1a",
         "timestamp": "1560666140",
         "payment_data": 
         {
             "number": "380442221111"
       }';
       
   XML format: 
   > <data>
         <id>1</id>,
         <payment_type>card</payment_type>,
         <hash>593dd062791f8616937dcc6ab2675d1a</hash>,
         <timestamp>1560666140</timestamp>,
         <payment_data>
             <number>380442221111</number>
         </payment_data>
    