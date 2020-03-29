# iPayTotal Hosted Page 
<p>This is iPaytotal Hosted Page API documentation. In this API, users details will be sent to iPaytotal server with curl request, whereas Credit card details page will be loaded over iPaytotal server. Follow bellow steps to integrate hosted page API with iPaytotal.</p>
## Step - 1 Using curl request.

### following parameters required in hosted page.
1.) api_key <br />
2.) response_url <br />
4.) first_name <br />
5.) last_name <br />
6.) address <br />
7.) country (must be 2 digit country code Ex.US) <br />
8.) state <br />
9.) city <br />
10.) zip <br />
11.) phone_no <br />
12.) email <br />
13.) currency (must be 3 digit currency code Ex. USD, EUR) <br />
14.) amount <br />
15.) ip_address <br />
16.) sulte_apt_no (optional) - this value will be return in your redirect url as a query string.<br />

<strong>1.) Send Curl request</strong>
<p>Curl request send with bellow parameters. Some parameters are optional but we recommend to send with request. All personal details should be of credit card holders. User here used for credit card holder.</p>
                                              
<p>Request URL: https://ipaytotal.solutions/api/hosted-pay/payment-request</p>
<p>Request type: POST</p>
    
### Response:
<p>After successful request, response will be sent in JSON format.</p>
<p>Successs Json Response type :</p>

    {
        "status": "success",
        "payment_redirect_url": "http://localhost:8000/transaction/flutterwave-checkout/form/JINS1585461334",
        "api_key": "api_key",
        "sulte_apt_no": null,
        "valid_till": "2020-03-29 07:55:34"
    }
    
<p>If the request data is in valid format, then above response will be sent. You will be need to redirect to “payment_redirect_url” for payment page before “valid_till”.</p>

<p>If there will be validation errors in request, response will be like:</p>
    
    {
        "status": "fail",
        "message": "Some parameters are missing or invalid request data.",
        "errors": {
            "country": [
                "The country field is required."
            ],
            "state": [
                "The state field is required."
            ]
        },
        "sulte_apt_no": null,
        "api_key": "api_key"
    }
 
 <p>After you redirect to url payment_redirect_url, bellow form will be loaded over iPaytotal payment page. You will need to fill credit card details</p>
 
 ### 3 Response from iPaytotal
 
 <p>After Credit card form fill up, user need to press Pay button. This request will take some time, if user card has 3D secure feature enabled, it will also redirect to 3D secure page, where user will asked to input PIN or OTP if asked. After all process complete, user will be redirect to merchant website according to transaction status.</p>
 
 <p>If transaction will be success, user will redirect to ”response_url” with response in query string as bellow:</p>
    
 <p>https://ipaytotal.solutions/success?status=success&message=Your%20transaction%20was%20success&order_id=20190000458521&sulte_apt_no=456789521365</p>
 
 <p>If the transaction will fail, user will redirect to also  “response_url” with response in query string as bellow:</p>
 
 <p>https://ipaytotal.solutions/fail?status=fail&message=Activity%20limit%20exceeded.&order_id=20190000458521&sulte_apt_no=456789521365</p>

 <p><b>For more details see <code>iPaytotal Hosted API.docx</code> file in the root of the project.</b></p>
    
## Method - 2 Using of simple form integration.
<p>If your website is unable to make curl request, there is also another way to integrate iPaytotal payment. In this way you should use following form code in your website and put <code>https://ipaytotal.solutions/hosted-pay/payment-request</code> this url in your html form's action with post method. after submit the form user will be redirect on our CC page form and fill all the CC details and make payment. then our server will be redirect to you on your redirect URl which you already pass in form hidden value(success/fail) URL.</p>


### hosted page code.
```html
<form action="https://ipaytotal.solutions/hosted-pay/payment-request" method="POST">
    <input type="hidden" name="api_key" value="api_key">
    <input type="hidden" name="response_url" value="">
    <input type="hidden" name="ip_address" value="192.168.0.3">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
    <label for="address">Address</label>
    <textarea class="form-control" id="address" name="address" placeholder="Enter Address"></textarea>
    <label for="country">Country</label>
    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
    <label for="zip">Zip</label>
    <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
    <label for="phone_no">Phone No</label>
    <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone No">
    <label for="currency">Currency</label>
    <input type="text" class="form-control" id="currency" name="currency" placeholder="ex. USD">
    <label for="amount">Amount</label>
    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
