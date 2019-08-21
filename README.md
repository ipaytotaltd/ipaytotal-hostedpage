# iPayTotal Hosted Page 
<p>This is iPaytotal Hosted Page API documentation. In this API, users details will be sent to iPaytotal server with curl request, whereas Credit card details page will be loaded over iPaytotal server. Follow bellow steps to integrate hosted page API with iPaytotal.</p>
## Step - 1 Using curl request.
<strong>1.) Send Curl request</strong>
<p>Curl request send with bellow parameters. Some parameters are optional but we recommend to send with request. All personal details should be of credit card holders. User here used for credit card holder.</p>
| Parameters           | Data Type | Required | Description                                                                          |
|----------------------|-----------|----------|--------------------------------------------------------------------------------------|
| api_key              | string    | Y        | API key from iPaytotal account                                                       |
| first_name           | string    | Y        | First Name of user                                                                   |
| last_name            | string    | Y        | Last Name of user                                                                    |
| address              | string    | Y        | Address of user                                                                      |
| country              | string    | Y        | 2 letter Country, eg US                                                              |
| state                | string    | Y        | State Name, 2 letter for US states, eg CA                                            |
| city                 | string    | Y        | City Name                                                                            |
| zip                  | string    | Y        | Zip Code                                                                             |
| ip_address           | string    | Y        | IP address of user device, eg 94.104.7.296                                           |
| email                | string    | Y        | Valid email id                                                                       |
| phone_no             | string    | Y        | Phone No.                                                                            |
| amount               | decimal   | Y        | Amount value eg. 10, 10.00                                                           |
| currency             | string    | Y        | 3 Digit format, eg USD                                                               |
| redirect_url_success | string    | Y        | Merchant site URL where we redirect from 3DS complete if transaction will be success |
| redirect_url_fail    | string    | Y        | Merchant site URL where we redirect from 3DS complete if transaction will be decline |
| sulte_apt_no         | string    | N        | Order number of Merchant Transaction                                                 |
|                      |           |          |                                                                                      |

## Step - 2 Using of simple form integration.
<p>in this way you should use following form code in your website and put <code>https://ipaytotal.solutions/hosted-pay/payment-request</code> this url in your html form's action with post method. after submit the form user will be redirect on our CC page form and fill all the CC details and make payment. then our server will be redirect to you on your redirect URl which you already pass in form hidden value(success/fail) URL.</p>
### following parameters required in hosted page.
1.) api_key <br />
2.) redirect_url_success <br />
3.) redirect_url_fail <br />
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

### hosted page code.
```html
<form action="https://ipaytotal.solutions/hosted-pay/payment-request" method="POST">
    <input type="hidden" name="api_key" value="api_key">
    <input type="hidden" name="redirect_url_success" value="">
    <input type="hidden" name="redirect_url_fail" value="">
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
