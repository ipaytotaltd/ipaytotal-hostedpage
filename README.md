# iPayTotal Hosted Page 
<p>We provide payment hosted page for easy payment solution. hosted page integration you can done with your website following two way.</p>
#### Step - 1 Using of simple form integration.
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
