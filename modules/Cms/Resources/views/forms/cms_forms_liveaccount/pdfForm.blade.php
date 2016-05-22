<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font: normal 12px Arial, Helvetica, sans-serif;
            color: #333333;
        }

        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        html {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        *, *:before, *:after {
            -webkit-box-sizing: inherit;
            -moz-box-sizing: inherit;
            box-sizing: inherit;
        }

        .page {
            width: 837px;
            height: 1305px;
            margin: 0 auto 10px;
            background: transparent url('{{'http://'.Request::getHost()}}/cms_assets/houseofborse/images/pdf_page.png') no-repeat 0 0;
            position: relative;
            padding: 240px 70px 100px 60px;
        }

        h1, h2, h3, h4, h5 {
            text-transform: uppercase;
            margin: 0 0 5px 0;
            padding: 0;
        }

        h4 {
            background: #e6e8e8;
            padding: 5px;
        }

        h5 {
            background: #faf2d6;
            padding: 5px;
        }

        p {
            padding: 5px 0;
            margin: 0;
            text-align: justify;
        }

        p.red {
            color: #d85432;
        }

        .capitalise {
            text-transform: uppercase;
        }

        ul {
            margin: 10px 0 10px 20px;
            padding: 0;
            list-style-type: none;
        }

        ul.list-inline li {
            display: inline-block;
        }

        .app-proccess {
            background: #e4e5e6;
        }

        .app-proccess ul {
            text-align: center;
            overflow: hidden;
            vertical-align: middle;
            display: table;
        }

        .app-proccess ul li {
            width: 20%;
            position: relative;
            padding: 20px 0;
            display: table-cell;
            vertical-align: middle;
        }

        .app-proccess ul li:after {
            content: "›";
            font-size: 4rem;
            color: #fff;
            float: right;
            position: absolute;
            right: -20px;
            top: 50%;
            margin-top: -2.7rem;
        }

        .app-proccess ul li strong, .app-proccess ul li span {
            display: block;
        }

        .app-proccess ul li strong {
            font-size: 1.4rem;
        }

        .col-box {
            clear: both;
            overflow: hidden;
        }

        .col-box:before, .col-box:after {
            content: " ";
            display: table;
        }

        .col-box .col-50 {
            width: 50%;
            float: left;
            padding-right: 10px;
        }

        .col-box .col-33 {
            width: 33.3%;
            float: left;
            padding-right: 10px;
        }

        .col-box .col-col-66 {
            width: 66.6%;
            float: left;
            padding-right: 10px;
        }

        .rectangle {
            border: 1px solid #333;
        }

        .bg-white {
            background: #fff;
        }

        table {
            border: 0;
            border-collapse: collapse;
        }

        table thead th {
            background: #ddd;
            color: #000;
            padding: 5px;
        }

        table tbody td {
            background: #fff;
        }

        table th, table td {
            border: 1px solid #999;
        }

        .margin-top-10 {
            margin-top: 10px;
        }

        .margin-top-20 {
            margin-top: 20px;
        }

        .margin-top-30 {
            margin-top: 30px;
        }

        .margin-top-40 {
            margin-top: 40px;
        }

        .margin-top-50 {
            margin-top: 50px;
        }

        .margin-top-60 {
            margin-top: 60px;
        }

        .margin-top-70 {
            margin-top: 70px;
        }

        .margin-bottom-10 {
            margin-bottom: 10px;
        }

        .margin-bottom-20 {
            margin-bottom: 20px;
        }

        .margin-bottom-30 {
            margin-bottom: 30px;
        }

        .margin-bottom-40 {
            margin-bottom: 40px;
        }

        .margin-bottom-50 {
            margin-bottom: 50px;
        }

        .margin-bottom-60 {
            margin-bottom: 60px;
        }

        .margin-bottom-70 {
            margin-bottom: 70px;
        }

        .padding-10 {
            padding: 1px 0px 1px 8px;
        }

        .padding-10:after {
            content: '|';
            color: #ffffff;
        }

        .padding-20 {
            padding: 20px;
        }

        .padding-30 {
            padding: 30px;
        }

        .padding-40 {
            padding: 40px;
        }

        .padding-50 {
            padding: 50px;
        }

        .padding-60 {
            padding: 60px;
        }

        .padding-right-10 {
            padding-right: 10px;
        }

        .padding-left-10 {
            padding-left: 10px;
        }

        .padding-bottom-10 {
            padding-bottom: 10px;
        }

        .no-margin {
            margin: 0 !important;
        }

        .no-padding {
            padding: 0 !important;
        }

        .footer {
            position: absolute;
            bottom: 17px;
            left: 50px;
            font-size: 10px;
            color: #999;
        }

        .address {
            position: absolute;
            bottom: 17px;
            right: 50px;
            font-size: 10px;
            color: #999;
            line-height: 2px;
        }

        .footer p {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>


<div class="page">
    <h2>Personal Account opening Form</h2>

    <h3>instructions to the application Form for the Personal account</h3>

    <p>In order to open a personal trading account with House of Borse Limited (“House of Borse”) please complete the
        application form fully and ensure that the following are in order:</p>
    <ul>
        <li>&rsaquo; all pages of the application form are initialised by you.</li>
        <li>&rsaquo; Page 6 is signed by you.</li>
        <li>&rsaquo; all documentation listed in Appendix C are provided together with the signed application form.</li>
        <li>&rsaquo; limited Power of attorney in Appendix D is signed by you and the Fund manager (if applicable).</li>
    </ul>
    <h3 class="margin-top-20">ApplicAtion process</h3>

    <p>When opening a personal account with House of Borse, your application form will be reviewed together with the
        provided documentation as listed in Appendix c. Please therefore ensure that when submitting this application
        form to us, you have submitted all the requested documents to enable us to assess your application in a timely
        manner and revert back to you in due course.</p>

    <div class="app-proccess">
        <ul>
            <li>
                <strong>1</strong>
                <span>submission of application form<br>and supporting documents</span>
            </li>
            <li>
                <strong>2</strong>
                <span>review of the<br>application</span>
            </li>
            <li>
                <strong>3</strong>
                <span>issue of the<br>notice letter</span>
            </li>
            <li>
                <strong>4</strong>
                <span>return of the duly<br>signed notice letter</span>
            </li>
            <li>
                <strong>5</strong>
                <span>approval of the<br>account</span>
            </li>
        </ul>
    </div>
    <!--.app-proccess-->
    <h3 class="margin-top-20">FAst processing oF the ApplicAtion</h3>

    <p>For a faster processing of your application to open a personal account with House of Borse, please return a
        scanned copy of the duly completed application form and supporting documentation (please refer to Appendix c for
        the full list) directly to House of Borse:</p>

    <p><strong>Email:</strong> support@houseofborse.com</p>

    <p>Please note that in the event you submit your application to House of Borse in a scanned copy as per above, you
        will also need to submit the original signed application form and documentation to us by post or courier within
        seven (7) days of approval of the account.</p>

    <h3 class="margin-top-20">return oF originAl Documents</h3>

    <p>It is a requirement, as specified above, that we receive all of documents (as listed in Appendix C) in original
        within seven (7) days of approval of the account.<br>
        Therefore, please kindly return this application form in original to the following address:</p>
    <address class="margin-top-70">
        <strong>House of Borse Limited</strong><br>
        MayFair<br>
        23 Hanover Square<br>
        London, W1S 1JB<br>
        United Kingdom<br>
        Attn.: Client Onboarding
    </address>
    <div class="footer"><p style="float:left;margin-right:2px">Page 1 of 21</p>

        <p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b>
        </p>
    </div>
    <div class="address" style="float:right">
        <p>info@houseofborse.com</p>

        <p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>

        <p>+44 (0) 203-714-8715</p>

        <p>FCA Register Number: 631382</p>
    </div>
</div>
<!--.page 1-->


<div class="page">
    <h2>personAl Account opening Form</h2>

    <h3>application Form for the Personal account</h3>
    <h4>1. BAsic inFormAtion</h4>

    <div class="col-box margin-bottom-20">
        <div class="col-50">
            <h5>A. account type</h5>

            <p>Please indicate below the account type(s) you wish to open with House of Borse Limited:</p>
            <ul class="no-margin">
                <li>@if($var->account_type =='Self-trading') &check; @else &#9744;@endif Self-trading</li>
                <li>@if($var->account_type =='Managed investor')  &check; @else &#9744;@endif Managed investor (managed
                    account under a fund manager)
                </li>
                <li>@if($var->account_type =='Referring Partner') &check; @else &#9744;@endif Referring Partner</li>
                <li>@if($var->account_type =='Fund manager')  &check; @else &#9744;@endif Fund manager</li>
            </ul>
        </div>
        <!--.col-50-->
        <div class="col-50 no-padding">
            <h5>B. trading account currency</h5>

            <p>Please indicate the base currency for the account(s) with House of Borse Limited:</p>

            <div class="rectangle padding-20">{{$var->base_currency_limit}}</div>
        </div>
        <!--.col-50-->
    </div>
    <!--.col-box-->

    <div class="col-box margin-bottom-20">
        <h5>C. Platforms</h5>

        <p>Please select which platform you wish to utilise for trading with House of Borse Limited:</p>
        <ul class="no-margin list-inline">
            <li class="padding-right-10">@if($var->default_platform =='MT4') &check; @else &#9744;@endif MT4</li>
            <li class="padding-right-10">@if($var->default_platform =='Multi-products')  &check; @else &#9744;@endif
                Multi-products
            </li>
            <li class="padding-right-10">@if($var->default_platform =='Both' ) &check; @else &#9744;@endif Both</li>
        </ul>
    </div>
    <!--.col-box-->

    <div class="col-box margin-bottom-20">
        <h4>2. introDuction(s)</h4>

        <p>Please only complete this section in the event you have been introduced to House of Borse by a third party.
            Please ensure to provide the full name of the third party introducer.</p>

        <div class="col-box">
            <div class="col-50">
                <p> @if($var->referring_partner!='') &check; @else &#9744;@endif Referring Partner</p>

                <div class="rectangle padding-10">{{ $var->referring_partner}}&ensp;</div>
            </div>
            <!--.col-50-->
            <div class="col-50">
                <p>@if($var->fund_manager!='') &check; @else &#9744;@endif Fund manager</p>

                <div class="rectangle padding-10">{{ $var->fund_manager}}&ensp;</div>
            </div>
            <!--.col-50-->
        </div>
        <!--.col-box-->
    </div>
    <!--.col-box-->

    <div class="col-box margin-bottom-20">
        <h4>3. personAl DetAils</h4>

        <p>I/ We are opening the following account with House of Borse:<br>
            @if($var->sole_joint_account=='Sole personal account' ) &check; @else &#9744;@endif Sole personalaccount<br>
            @if($var->sole_joint_account_joint=='Joint account') &check; @else &#9744;@endif Joint account
            (please also complete Appendix D for the secondary account holder)<br>
            Please note that if you are opening a joint account with House of Borse, the following parts of this
            application form should be completed by the primary joint account holder, and the attached Appendix D (Joint
            account Holder Form) should be completed for the secondary joint account holder.</p>
	</div><!--.col-box-->

<div class="col-box margin-bottom-10">
<h5>A. Personal Details (hereafter “client”)</h5>
<ul class="no-margin list-inline">
<li class="padding-right-10">@if($var->title=='Mr') &check; @else&#9744;@endif Mr.</li>
<li class="padding-right-10">@if($var->title=='Ms') &check; @else&#9744;@endif Ms.</li>
<li class="padding-right-10">@if($var->title=='Mrs') &check; @else&#9744;@endif Mrs.</li>
<li class="padding-right-10">@if($var->title=='Dr') &check; @else&#9744;@endif Dr.</li>
</ul>
<div class="col-box margin-bottom-10">
<div class="col-33">
<p>First Name</p>
<div class="rectangle padding-10">{{$var->first_name}}</div>
</div><!--.col-33-->
<div class="col-33">
<p>Middle Name (if applicable)</p>
<div class="rectangle padding-10">{{$var->second_name}}</div>
</div><!--.col-33-->
<div class="col-33">
<p>Last Name</p>
<div class="rectangle padding-10">{{$var->last_name}}</div>
</div><!--.col-33-->

</div><!--.col-box-->
</div><!--.col-box-->

<div class="col-box margin-bottom-10">
<div class="col-33">
<p>Date of Birth (DD/MM/YYYY)</p>
<div class="rectangle padding-10">{{$var->date_of_birth|date('Y-m-d')}}</div>
</div><!--.col-33-->
<div class="col-33">
<p>Nationality</p>
<div class="rectangle padding-10">{{$var->nationality }}</div>
</div><!--.col-33-->
<div class="col-33">
<p>Gender</p>
<ul class="no-margin list-inline">
<li class="padding-right-10">@if($var->gender=='Male') &check; @else&#9744;@endif  Male</li>
<li class="padding-right-10">@if($var->gender=='Female') &check; @else&#9744;@endif  Female</li>
</ul>
</div><!--.col-33-->
</div><!--.col-box-->

<div class="col-box margin-bottom-10">
<div class="col-33">
<p>Marital Status</p>
<ul class="no-margin list-inline">

<li class="padding-right-10">@if($var->marital_status=='Single') &check; @else&#9744;@endif Single</li>
<li class="padding-right-10">@if($var->marital_status=='Married') &check; @else&#9744;@endif Married</li>
</ul>
</div><!--.col-33-->
<div class="col-66">
<p>Status</p>
            <ul class="no-margin list-inline">
                <ul class="no-margin list-inline">
<li class="padding-right-10">@if($var->resident_status=='Non Resident') &check; @else&#9744;@endif  Non Resident</li>
<li class="padding-right-10">@if($var->resident_status=='Resident Individual') &check; @else&#9744;@endif Resident Individual</li>
<li class="padding-right-10">@if($var->resident_status=='Foreign National') &check; @else&#9744;@endif Foreign National</li>
</ul>
</div><!--.col-66-->

</div><!--.col-box-->


<div class="footer"><p style="float:left;margin-right:2px">Page 2 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 2-->


<div class="page">
<h5>B. residential address</h5>
<p>Street and Number</p>
<div class="rectangle padding-10">{{ $var->street_and_number}}</div>
<p>Post Code</p>
<div class="rectangle padding-10">{{$var->postal_code}}</div>
<div class="col-box margin-bottom-30">
<div class="col-50">
<p>City</p>
<div class="rectangle padding-10">{{ $var->city}}</div>
</div><!--.col-50-->
<div class="col-50 no-padding">
<p>Country</p>
<div class="rectangle padding-10">{{$var->country}}</div>
</div><!--.col-50-->
</div><!--.col-box-->

<h5>C. contact Details</h5>
<div class="col-box margin-bottom-10">
<div class="col-50">
<p>Main Phone Number (incl. country code)</p>
<div class="rectangle padding-10">{{ $var->main_phone}}</div>
</div><!--.col-50-->
<div class="col-50 no-padding">
<p>Secondary Phone Number (incl. country code)</p>
<div class="rectangle padding-10">{{ $var->secondary_phone}}</div>
</div><!--.col-50-->
</div><!--.col-box-->

<div class="col-box margin-bottom-10">
<div class="col-50">
<p>Primary Email</p>
<div class="rectangle padding-10">{{ $var->primary_email}}</div>
</div><!--.col-50-->
<div class="col-50 no-padding">
<p>Secondary Email</p>
<div class="rectangle padding-10">{{ $var->secondary_email}}</div>
</div><!--.col-50-->
</div><!--.col-box-->

<div class="col-box margin-bottom-30">
<div class="col-50">
<p>Fax</p>
<div class="rectangle padding-10">{{$var->fax}}</div>
</div><!--.col-50-->
</div><!--.col-box-->
<h5>D. Postal address (if different from residential address)</h5>
<div class="col-box margin-bottom-10">
<div class="col-50">
<p>Street and number</p>
<div class="rectangle padding-10">{{$var->postal_street_and_number}}</div>
</div><!--.col-50-->
<div class="col-50 no-padding">
<p>Post code</p>
<div class="rectangle padding-10">{{$var->postal_post_code}}</div>
</div><!--.col-50-->
</div><!--.col-box-->
<div class="col-box margin-bottom-10">
<div class="col-50">
<p>City</p>
<div class="rectangle padding-10">{{$var->postal_city}}</div>
</div><!--.col-50-->
<div class="col-50 no-padding">
<p>Country</p>
<div class="rectangle padding-10">{{$var->postal_country}}</div>
</div><!--.col-50-->
</div><!--.col-box-->

<div class="footer"><p style="float:left;margin-right:2px">Page 3 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 3-->


<div class="page">
<h4>4. FinAnciAl inFormAtion</h4>
<h5>A. Financial Background</h5>
<p>Please specify your financial details.<br><small>Size of financial instrument portfolio<br>
(incl. cash deposits and financial instruments, excl. property) (in EUR)</small></p>
<div class="rectangle padding-10 margin-bottom-20">{{$var->financial_instrument_portfolio}}</div>
<h5>B. source of Funds deposited with House of Borse (if you select “other” please specify)</h5>
<p>Please specify the source of funds deposited with House of Borse by you. Please note that House of Borse may at its sole discretion request for documentation of the source of funds.</p>
<ul>
<li>@if($var->source_funds_deposited==0) &check; @else&#9744;@endif Employment inheritance investment</li>
<li>@if($var->source_funds_deposited==1) &check; @else&#9744;@endif Previous employment real estate</li>
<li>@if($var->source_funds_deposited==2) &check; @else&#9744;@endif Sale of investments savings</li>
<li>@if($var->source_funds_deposited==3) &check; @else&#9744;@endif Other (specify below)</li>
</ul>
    <div class="rectangle padding-10 margin-bottom-30">{{$var->other_source_funds_deposited}} </div>
<h4>5. trADing eXperience</h4>
<h5>A. trading experience</h5>
<p class="red">Forex and contract for Difference are leveraged products. They may not be suitable for you as they carry a high degree of risk to your capital and you can lose more than your initial investment. You must ensure that you understand all of the risks as furthermore elaborated on in Appendix A (High risk investment notice).</p>
<p>Do you understand the nature and risks of trading leveraged products</p>
<ul class="list-inline margin-bottom-20">
<li class="padding-right-10">@if($var->understand_risks==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_risks==1) &check; @else&#9744;@endif No</li>
</ul>
<h5>B. Financial markets experience</h5>
<p>Please indicate below the financial market(s) you have traded in within the past 3 years.</p>
<ul class="no-margin padding-left-10">
<li>@if($var->number_of_years_cfd!=0) &check; @else&#9744;@endif Contracts for Difference (CFDs) - if yes, please complete section C</li>
<li>@if($var->number_of_years_commodities!=0) &check; @else&#9744;@endif Commodities - if yes, please complete section D</li>
<li>@if($var->number_of_years_forex!=0) &check; @else&#9744;@endif Forex - if yes, please complete section E</li>
<li>@if($var->number_of_years_futures!=0) &check; @else&#9744;@endif Futures - if yes, please complete section F</li>
<li>@if($var->number_of_years_options!=0) &check; @else&#9744;@endif Options - if yes, please complete section G</li>
<li>@if($var->number_of_years_securities!=0) &check; @else&#9744;@endif Securities - if yes, please complete section H</li>
</ul>
<div class="footer"><p style="float:left;margin-right:2px">Page 4 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 4-->

<div class="page">
<div style="@if($var->number_of_years_cfd==0)   @endif">
<h5>C. contract for Differences (CFDs) trading experience</h5>
<p><strong>Number of years you have been trading in CFDs</strong></p>

<ul class="padding-left-10 margin-bottom-20" style="">
<li>@if($var->number_of_years_cfd==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_cfd==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_cfd==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_cfd==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>
<p><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="padding-left-10 margin-bottom-20">
<li>@if($var->number_of_transactions_cfd==0 and $var->number_of_years_cfd!=0) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_cfd==1 and $var->number_of_years_cfd!=0 ) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_cfd==2  and $var->number_of_years_cfd!=0) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>
<p><strong>Average trading volume per month</strong></p>
<ul class="padding-left-10 margin-bottom-30">
<li>@if($var->average_trading_cfd==0 and $var->number_of_years_cfd !=0 ) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_cfd==1  and $var->number_of_years_cfd !=0) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_cfd==2  and $var->number_of_years_cfd !=0) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_cfd==3 and $var->number_of_years_cfd !=0 ) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>
</div>

<div style="@if($var->number_of_years_commodities==0)   @endif">
<h5>D. commodities trading experience</h5>
<p><strong>Number of years you have been trading in commodities</strong></p>
<ul class="padding-left-10 margin-bottom-30">
<li>@if($var->number_of_years_commodities==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_commodities==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_commodities==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_commodities==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>
</ul>
<p><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="padding-left-10 margin-bottom-30">
<li>@if($var->number_of_transactions_commodities==0  and $var->number_of_years_commodities!=0 ) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_commodities==1  and $var->number_of_years_commodities!=0  ) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_commodities==2   and $var->number_of_years_commodities!=0 ) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>

<p><strong>Average trading volume per month</strong></p>
<ul class="padding-left-10 margin-bottom-30">
<li>@if($var->average_trading_commodities==0  and $var->number_of_years_commodities!=0  ) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_commodities==1  and $var->number_of_years_commodities!=0  ) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_commodities==2   and $var->number_of_years_commodities!=0 ) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_commodities==3   and $var->number_of_years_commodities!=0 ) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>

    </div>
<div class="footer"><p style="float:left;margin-right:2px">Page 5 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 5-->

<div class="page">
<div style="@if($var->number_of_years_forex==0)   @endif">
<h5>E. Forex (spot or Forward) trading experience</h5>
<p><strong>Number of years you have been trading in forex</strong></p>
<ul class="padding-left-10 margin-bottom-10">
<li>@if($var->number_of_years_forex==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_forex==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_forex==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_forex==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>
<p><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="padding-left-10 margin-bottom-10">
<li>@if($var->number_of_transactions_forex==0 and  $var->number_of_years_forex!=0 ) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_forex==1 and  $var->number_of_years_forex!=0 ) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_forex==2  and  $var->number_of_years_forex!=0) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>
<p><strong>Average trading volume per month</strong></p>
<ul class="padding-left-10 margin-bottom-30">
<li>@if($var->average_trading_forex==0  and  $var->number_of_years_forex!=0) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_forex==1  and  $var->number_of_years_forex!=0) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_forex==2  and  $var->number_of_years_forex!=0) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_forex==3 and   $var->number_of_years_forex!=0 ) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>
</div>

<div style="@if($var->number_of_years_futures==0)   @endif">
<h5>F. Futures trading experience</h5>
<p><strong>Number of years you have been trading in futures</strong></p>
<ul class="padding-left-10 margin-bottom-10">
<li>@if($var->number_of_years_futures==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_futures==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_futures==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_futures==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>
</ul>
<p><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="padding-left-10 margin-bottom-10">
<li>@if($var->number_of_transactions_futures==0 and  $var->number_of_years_futures!=0) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_futures==1  and  $var->number_of_years_futures!=0) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_futures==2  and  $var->number_of_years_futures!=0) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>
<p><strong>Average trading volume per month</strong></p>
<ul class="padding-left-10 margin-bottom-10">
<li>@if($var->average_trading_futures==0  and  $var->number_of_years_futures!=0) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_futures==1  and  $var->number_of_years_futures!=0) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_futures==2  and  $var->number_of_years_futures!=0) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_futures==3  and  $var->number_of_years_futures!=0) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>
</div>
<div class="footer"><p style="float:left;margin-right:2px">Page 6 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 6-->


<div class="page">

<div style="@if($var->number_of_years_options==0)   @endif">
<h5>G. Options trading experience</h5>
<p><strong>Number of years you have been trading in Options</strong></p>
<ul class="padding-left-10 margin-bottom-10">
<li>@if($var->number_of_years_options==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_options==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_options==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_options==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>
<p><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="padding-left-10 margin-bottom-10">
<li>@if($var->number_of_transactions_options==0 and  $var->number_of_years_options!=0 ) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_options==1 and  $var->number_of_years_options!=0 ) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_options==2 and  $var->number_of_years_options!=0 ) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>
<p><strong>Average trading volume per month</strong></p>
<ul class="padding-left-10 margin-bottom-30">
<li>@if($var->average_trading_options==0 and  $var->number_of_years_options!=0 ) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_options==1 and  $var->number_of_years_options!=0 ) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_options==2 and  $var->number_of_years_options!=0 ) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_options==3 and  $var->number_of_years_options!=0 ) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>
</div>

<div style="@if($var->number_of_years_securities==0)   @endif">
<h5>H. Securities trading experience</h5>
<p><strong>Number of years you have been trading in Securities</strong></p>
<ul class="padding-left-10 margin-bottom-10">
<li>@if($var->number_of_years_securities==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_securities==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_securities==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_securities==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>
</ul>
<p><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="padding-left-10 margin-bottom-10">
<li>@if($var->number_of_transactions_securities==0 and  $var->number_of_years_securities!=0 ) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_securities==1 and  $var->number_of_years_securities!=0  ) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_securities==2 and  $var->number_of_years_securities!=0  ) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>
<p><strong>Average trading volume per month</strong></p>
<ul class="padding-left-10 margin-bottom-10">
<li>@if($var->average_trading_securities==0 and  $var->number_of_years_securities!=0  ) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_securities==1 and  $var->number_of_years_securities!=0  ) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_securities==2 and  $var->number_of_years_securities!=0  ) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_securities==3 and  $var->number_of_years_securities!=0  ) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>
</div>
<div class="footer"><p style="float:left;margin-right:2px">Page 7 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 7-->


<div class="page">
<h5>I. understanding of the markets</h5>
<p>I have worked, or I am currently working in a professional position in the financial sector which requires knowledge of the transactions envisaged with House of Borse in the following markets (tick boxes):</p>
<div class="col-box margin-bottom-10">
<div class="col-33">
<p><strong>Contracts for difference (CFDs)</strong></p>
<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_cfd==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_cfd==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_cfd}}</div>
</div><!--.col-33-->

<div class="col-33">
<p><strong>Forex (Spot and Forward)</strong></p>
<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_forex==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_forex==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_forex}}</div>

</div><!--.col-33-->

<div class="col-33">
<p><strong>Securities</strong></p>
<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_securities==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_securities==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_securities}}</div>
</div><!--.col-33-->

</div><!--.col-box-->

<div class="col-box margin-bottom-10">
<div class="col-33">
<p><strong>Futures</strong></p>

<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_futures==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_futures==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_futures}}</div>
</div><!--.col-33-->

<div class="col-33">
<p><strong>Commodities</strong></p>
<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_commodities==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_commodities==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_commodities}}</div>
</div><!--.col-33-->

<div class="col-33">
<p><strong>Options</strong></p>
<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_options==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_options==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_options}}</div>
</div><!--.col-33-->

</div><!--.col-box-->

<div class="footer"><p style="float:left;margin-right:2px">Page 8 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 8-->

<div class="page">
<h4>6. signature and consent</h4>
<h5 class="margin-bottom-20">i/ We, the undersigned, hereby certify that:</h5>
<ul class="no-margin padding-left-10">
<li class="padding-bottom-10">@if($var->agreem_check_1==1) &check; @else&#9744;@endif This application form is completed by and on behalf of me/ us and not by a third party.</li>
<li class="padding-bottom-10">@if($var->agreem_check_2==1) &check; @else&#9744;@endif I/We have carefully read and completed this application form and affixed my/our initials to attest this on all pages of this application form submitted to House of Borse.</li>
<li class="padding-bottom-10">@if($var->agreem_check_3==1) &check; @else&#9744;@endif All information provided in this application form is correct and I/ we shall be obliged to inform House of Borse immediately should any of the provided information change.</li>
<li class="padding-bottom-10">@if($var->agreem_check_4==1) &check; @else&#9744;@endif I/ We acknowledge and understand that House of Borse may in its sole discretion request additional information and/ or documentation than what is listed in this application form in order to open the account. I/ We furthermore understand and accept that House of Borse may not accept my/ our application based on the provided documents/ information.</li>
<li class="padding-bottom-10">@if($var->agreem_check_5==1) &check; @else&#9744;@endif I/ We am/ are aged 18 years or older.</li>
<li class="padding-bottom-10">@if($var->agreem_check_6==1) &check; @else&#9744;@endif I/ We consent to electronic communication.</li>
<li class="padding-bottom-10">@if($var->agreem_check_7==1) &check; @else&#9744;@endif I/ We have read and understood the risk warnings attached Appendix A to this application form.</li>
<li class="padding-bottom-10">@if($var->agreem_check_8==1) &check; @else&#9744;@endif Any damages suffered by House of Borse as a result of House of Borse relying on the information in this application form that is inaccurate or false shall be borne by me/ us.</li>
</ul>
<p><u>Personal information submitted by me/ us to House of Borse may:</u></p>
<ul class="no-margin padding-left-10">
<li class="padding-bottom-10">@if($var->agreem_check_9==1) &check; @else&#9744;@endif Be used with and by any entity within House of Borse and its group companies.</li>
<li class="padding-bottom-10">@if($var->agreem_check_10==1) &check; @else&#9744;@endif Be shared with a third party introducer (where I/ we have indicated such a third party introducer in this application form) for the purpose of completing due diligence and approving my/ our application.</li>
<li class="padding-bottom-10">@if($var->agreem_check_11==1) &check; @else&#9744;@endif Be used to undertake a search with credit reference agencies or other organisations to reduce the incidence of fraud and/ or in the course of carrying out identity fraud prevention or credit control checks.</li>
<li class="padding-bottom-10">@if($var->agreem_check_12==1) &check; @else&#9744;@endif This application form is signed in one (1) original copy which shall at all times be kept with House of Borse.</li>
</ul>

<div class="col-box bg-white" style="padding:20px;">
<p><strong>For joint account holders please also sign below with the joint account holder.</strong></p>
<div class="col-50">
<p><strong>Date:</strong></p>
<div class="rectangle padding-10">{{ date("m/d/Y") }}</div>
</div><!--.col-50-->

<div class="col-50 no-padding">
<p><strong>Date:</strong></p>
<div class="rectangle padding-10">{{ date("m/d/Y") }}</div>
</div><!--.col-50-->


<div class="col-50">
<p><strong>Full Name:</strong></p>
<div class="rectangle padding-10">{{ $var->first_name }} {{ $var->last_name }}</div>
</div><!--.col-50-->

<div class="col-50 no-padding">
<p><strong>Full Name:</strong></p>
<div class="rectangle padding-10">{{ $var->first_name_joint }} {{ $var->last_name_joint }}</div>
</div><!--.col-50-->

<div class="col-50">
<p><strong>Title:</strong></p>
<div class="rectangle padding-10">{{ $var->title }}</div>
</div><!--.col-50-->

<div class="col-50 no-padding">
<p><strong>Title:</strong></p>
<div class="rectangle padding-10">{{ $var->title_joint }}</div>
</div><!--.col-50-->

<div class="col-50">
<p><strong>Signature:</strong></p>
<div class="rectangle padding-30"></div>
</div><!--.col-50-->

<div class="col-50 no-padding">
<p><strong>Signature:</strong></p>
<div class="rectangle padding-30"></div>
</div><!--.col-50-->

</div><!--.col-box-->

<div class="footer"><p style="float:left;margin-right:2px">Page 9 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 9-->

<div class="page">
<h2>AppenDiX A</h2>
<h3 class="margin-bottom-20">High risk investment notice</h2>
<p><strong class="capitalise">DeFinitions AnD interpretAtion</strong><br>
“You” shall mean the client; and<br>
“We”, “us”, “our” shall mean House of Borse Limited.</p><br>
<p><strong class="capitalise">generAl inFormAtion</strong><br>
This high-risk investment notice (“Notice”) is provided to you in compliance with the Financial Conduct Authority rules, and it is a requirement that you acknowledge it, understand it and agree to it before you open an account with us.<br><br>
This Notice does not disclose all the risks and other significant aspects that may exist when trading in the financial markets, and before opening an account with us, we will make an assessment of whether the services are appropriate for you, and notify you where we do not deem the services appropriate for you; however, it is your responsibility to ensure that you fully understand the nature of the transactions you are entering into and the extent of your exposure to risk before opening an account with us.<br><br>
Before entering into any transactions with us, you should furthermore be satisfied that the contract is suitable for you in the light of your circumstances and financial position. In the event you have any doubts in respect of the risks or appropriateness of any investment, please seek professional advice from an independent financial advisor.<br><br>
Should you decide to open an account with us, it is important that you remain aware of the risks involved with the services provided hereunder; that you have adequate financial resources to bear such risks; and that you monitor your open positions carefully at all times. The value of the investments can increase and fall, and any income from them is not guaranteed. When trading margined transactions it is possible to lose more than your initial investment with us and your entire account balance. You should only trade with funds that you can afford to lose. It must also be noted that past performance is not a guide to future performance.<br><br><br>
<strong class="capitalise">eXecution only</strong><br>
Our services enable you to trade in financial products in the relevant markets via the internet and trading platform on an execution-only basis. We will therefore not provide you with any form of investment and/ or tax advice, or advice you on the merits of a particular transaction. Any decisions on investments are purely your own decision. in the provision of the services, we are not required to assess the suitability for you of the services provided or offered to you.<br><br>
Please therefore ensure you carefully read and understand the risks involved in any trading decision you make. If you have any doubt whether an investment is suitable for you, you should obtain independent expert advice.<br><br><br>

<strong class="capitalise">contingent liABility trAnsActions</strong><br>
Contingent liability transactions, such as contract for differences (CFDs), rolling spot forex and other fnancial products traded on margin will require you to make a series of payments against the purchase price, instead of paying the whole purchase price immediately.<br><br>
If you trade in CFDs, rolling spot forex, futures or other products traded on margin you may sustain a total loss of the margin you deposit to establish or maintain an open position. In the event the market moves against you, you may be called upon to pay substantial additional funds or margin at short notice to maintain the open position with us. if you fail to do so within the time required, your open position may be liquidated at a loss and you will be liable for any resulting deficit.<br><br>
Even if a transaction is not margined, It may still carry an obligation to make further payments, and in certain circumstances over and above any amount paid when you executed the transaction.<br><br>
CFD transactions will be carried out for you whenever possible on or under the rules of a recognised or designated investment exchange. However, contingent liability transactions entered into by you, that are not traded on or under the rules of a recognised or designated investment exchange (such as rolling spot forex transactions, may expose you to substantially greater risks).</p>
<div class="footer"><p style="float:left;margin-right:2px">Page 10 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 10-->

<div class="page">
<p><strong  class="capitalise">rolling spot ForeX</strong><br>
Transactions in rolling spot forex contracts carry a high degree of risk, and may not be suitable for all investors. The “gearing” or “leverage” often obtainable in rolling spot forex trading means that a relatively small market movement can lead to a proportionately much larger movement in the value of your liability. Before deciding to trade rolling spot forex contracts you should carefully consider your investment objectives, level of experience, and risk appetite. The possibility exists that you could sustain a loss of some or all of your initial investment and therefore you should not invest money that you cannot afford to lose. Margined currency trading is one of the riskiest forms of investment available in the financial markets and is only suitable for experienced individuals and institutions. Given the possibility of losing an entire investment, speculation in the precious metals or foreign exchange market should only be conducted with risk capital funds that if lost will not significantly affect your personal or institution’s financial wellbeing.<br><br>
<strong  class="capitalise">contrActs For DiFFerence</strong><br>
By transacting in CFDs, you are subject to a higher level of risks than the risks associated with transactions in traditional shares. You may not get back the amount initially invested and may be required to make additional payments by way of margin payments on a frequent basis. Investors in CFDs may be subject to unlimited losses.<br><br>
You should not deal in CFDs unless you understand their nature and the extent of your exposure to risk. You should also be satisfied that the product is suitable for you in the light of your circumstances and financial position. Although CFDs can be utilised for the management of investment risk, it may not be suitable for some investors.<br><br>
<strong  class="capitalise">CFDs settleD in cAsh</strong><br>
Investing in a CFD carries the same risks as investing in a future, option or other derivative product. Transactions in CFDs may also have a contingent liability (as elaborated on above) and you should be aware of the implications of this.<br><br>
<strong  class="capitalise">VolAtile mArkets AnD closeD mArkets</strong><br>
Various situations, developments or events may arise over a weekend when the markets for the underlying instruments are closed for trading. These events may cause the CFD markets to open at a significantly different price from when the CFD markets were closed. There is a substantial risk that stop orders left top protect open positions held over the periods when the CFD markets are closed, will be executed at levels significantly worse than their specified price.<br><br>
Under certain trading conditions it may be difficult or impossible to liquidate an open position. This may occur, for example, at times of rapid price movement if the price rises or falls in one trading session to such an extent that trading in the underlying market is suspended or restricted.<br><br>
<strong  class="capitalise">non-guArAnteeD stops</strong>
Placing non-guaranteed stop order will not necessarily limit your losses to the intended amounts, because market conditions may make it impossible to execute such an order if the underlying market moves straight through the stipulated price.<br><br>
<strong  class="capitalise">equities</strong><br>
Transactions in equities will expose you to the volatility of the various stock exchange markets in which the shares, stocks, bonds, debentures, notes, debts and other securities are traded. In particular, the value of equities may experience downward movements and may under some circumstances even become valueless. Hence, there is an inherent risk that losses rather than profits may be incurred as a result of investing in equities. Owing to the volatility of the stock exchange markets, you may be exposed to risks of bad delivery of the equities purchased.<br><br>
<strong  class="capitalise">Futures</strong><br>
Transactions in futures involve the obligation to make, or to take delivery of the underlying asset of the contract at a future date, or in some cases to settle your open position with cash. Futures carry a high degree of risk. the “gearing” or “leverage” often obtainable in futures trading means that a small deposit or down payment can lead to large losses as well as gains. It also means that a relatively small market movement can lead to a proportionately much larger movement in the value of your investment, and this can work against you as well as for you. Futures transactions have a contingent liability, and you should be aware of the implications of this, in particular the margin requirements.<br><br>
<strong  class="capitalise">options</strong><Br>
There are many different types of options with different characteristics subject to different conditions:</p>
<ul>
<li>&rsaquo; Buying options</li>
<li>&rsaquo; Writing options</li>
<li>&rsaquo; Traditional options</li>
</ul>
<div class="footer"><p style="float:left;margin-right:2px">Page 11 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 11-->

<div class="page">
<p><strong  class="capitalise">Buying options</strong><br>
Buying options involves less risk than selling options because, if the price of the underlying asset moves against you, you can simply allow the option to lapse. the maximum loss is limited to the premium, plus any commission or other transaction charges. However, if you buy a call option on a futures contract and you later exercise the option, you will acquire the future. this will expose you to the risks described under “futures” above.<br><br>
<strong  class="capitalise">Writing options</strong><br>
If you write an option, the risk involved is considerably greater than buying options. You may be liable for margin to maintain your open position and a loss may be sustained well in excess of any premium received. By writing an option, you accept a legal obligation to purchase or sell the underlying asset if the option is exercised against you, however far the market price has moved away from the exercise price. In the event you already own the underlying asset which you have contracted to sell (known as “covered call options”) the risk is reduced. in the event you do not own the underlying asset (known as “uncovered call options”) the risk can be unlimited. Only experienced individuals should contemplate writing uncovered options, and then only after securing full details of the applicable conditions and potential risk exposure.<br><br>
<strong  class="capitalise">trADitionAl options</strong><br>
A particular type of option called a “traditional option” is written by certain London Stock Exchange firms under special exchange rules. These may involve greater risk than other options. two-way prices are not usually quoted and there is no exchange market on which to close out an open position or to effect an equal and opposite transaction to reverse an open position. It may be difficult to assess its value or for the seller of such an option to manage the exposure to risk.<br>
Certain options markets operate on a margined basis, under which buyers do not pay the full premium on their option at the time they purchase it. In this situation you may subsequently be called upon to pay margin on the option up to the level of your premium. If you fail to do so as required, your position may be closed or liquidated in the same way as a futures position. You must also release that the limited risk in buying future and/ or options means you could lose the entire option investment should the option expire worthless.<br><br>
<strong  class="capitalise">WeekenD risk</strong><br>
Various situations, developments or events may arise over a weekend (Friday 21.30 gmt – sunday 23.00 gmt (gmt +1 as applicable during the summer period)) when the currency markets generally close for trading, that may cause the currency markets to open at a significantly different price from where they closed on Friday afternoon. Our customers will not be able to use the trading platform to place or change orders over the weekend and at other times when the markets are generally closed. There is a substantial risk that stop-loss orders left to protect open positions held over the weekend will be executed at levels significantly worse than their specified price.<br><br>
<strong  class="capitalise">liquiDity risk</strong><br>
Trading in the otc market carries a high degree of liquidity risk. You acknowledge that liquidity risk resulting from decreased liquidity is usually due to unanticipated changes in economic and/ or political conditions. You acknowledge that liquidity risk can affect the general market in that all participants experience the same lack of buyers and/ or sellers. it can also be due to changes in liquidity available to us from our inter-bank liquidity providers. When liquidity decreases, you can expect, at the minimum, to have wider bid/ask spreads as the supply for available bid/ask prices outstrip demand. Decreases in liquidity can also result in a “fast market” conditions where the price moves sharply higher or lower or in a volatile up/down pattern without trading in an ordinary step-like fashion. It is therefore important to note that our prices, bid/ask spreads and liquidity will reflect the prevailing inter-bank market liquidity.<br>
Our prices are independent of prices of other institutions. Therefore prices reported by us are independent and can differ from prices displayed elsewhere or from other liquidity providers in the interbank market. Differences can result from, but are not limited to, changes in liquidity from interbank market makers, resulting in an unbalanced position or exposure, or differing expectations of price movements. We expect that in most cases the prices provided to you will be in line with the interbank market but we cannot represent, warrant or covenant, explicitly or implicitly, that this will always be the case.<br><br>
<strong  class="capitalise">electronic trADing</strong><br>
Trading through the trading platform as an electronic trading system may differ from trading in a conventional or open market. customers that trade on an electronic trading system are exposed to risks associated with the system, including the failure of hardware and software and system down time, including without limitation the individual customer’s systems and the communication infrastructure connecting the trading platform with the customers.<br><br>
You understand that by choosing to conduct trading via our trading platform, you assume and accept certain risks as highlighted in our prevailing standard terms of Business and for which you agree that neither us nor our third party service providers shall be liable, including but not limited to the risk of: power outages, broken connections, network circuit obstruction or congestion, transmission failures, transmission delays, the risk of delayed communications during period of increased market volatility, delay and/ or rejection by a third party broker involved in your transaction and/ or other occurrences outside our direct control (collectively, “technical issues”). You hereby agree to indemnify and hold us harmless with respect to any and all losses you many sustain in connection with any and all of the technical issues. in no event will we be liability for your inability to engage in trading via our trading platform and we shall not be responsibility for any losses or missed opportunities by you due to the delay or non-delivery of any order or instruction via the trading platform.</p>
<div class="footer"><p style="float:left;margin-right:2px">Page 12 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 12-->

<div class="page">
<p><strong  class="capitalise">risk reDucing orDers or strAtegies</strong><br>
The placing of certain orders (e.g., stop-loss orders, where permitted under local law, or “stop-limit” orders), which are intended to limit losses to certain amounts may not be effective because market conditions may make it impossible to execute such orders. strategies using combinations of positions, such as “spread” and “straddle” positions, may be as risky as taking simple “long” or “short” positions.<br><br>
<strong  class="capitalise">electronic communicAtion</strong><br>
We offer you the opportunity to trade and communicate with us via electronic means, for example by our trading platform and email. although electronic communication is often a reliable way to communicate, no electronic communication is entirely reliable or always available. in the event you choose to deal with us via electronic communication, you should be aware that electronic communications can fail, can be delayed, may not be secure and/ or may not reach the intended destination.<br><br>
<strong  class="capitalise">Foreign mArkets</strong><br>
Foreign markets involve different risks than those in the United Kingdom markets. In some cases the risks will be greater. The potential for profit or loss from transactions on foreign markets or in foreign denominated contracts will also be affected by fluctuations in the foreign exchange rates. Such enhanced risks include the risks of political or economic policy changes, which may substantially and permanently alter the conditions terms, and price of a foreign currency.<br><br>
<strong  class="capitalise">collAterAl</strong><br>
If you deposit collateral as security with us, the way in which it will be treated will vary according to the type of transaction and where it is traded. There could be significant differences in the treatment of your collateral depending on whether you are trading on a recognised or designated investment exchange, with the rules of that exchange (and associated clearing house) applying, or trading off exchange. Deposited collateral may lose its identity as your property once dealings on your behalf are undertaken. Even if your dealings should ultimately prove profitable, you may not get back the same assets which you deposited and may have to accept payment in cash or equivalent.<br><br>
<strong  class="capitalise">prices</strong><br>
The prices quoted on the trading platform are independent of prices of other institutions. Therefore prices reported by us are independent and can differ from prices displayed elsewhere or from other liquidity providers in the interbank market. Differences can result from, but are not limited to, changes in liquidity from interbank market makers, resulting in an unbalanced position or exposure, or differing expectations of price movements. We expect that in most cases the prices provided to you will be in line with the interbank market but we cannot represent, warrant or covenant, explicitly or implicitly, that this will always be the case. consequently, we may exercise considerable discretion in setting margin requirements and collecting margin deposits.<br><br>
<strong  class="capitalise">commissions</strong><br>
Before you commence trading, you should obtain details of all commissions and other charges for which you will be liable. In the event any charges are not expressed in monetary terms (but, for example, as a percentage of contract value), you should obtain a clear written explanation, including appropriate examples, to establish what such charges are likely to mean in specific monetary terms. In the case of futures, when commission is charged as a percentage, it will normally be as a percentage of the total contract value, and not simply as a percentage of your initial payment.<br><br>
<strong  class="capitalise">suspensions oF trADing</strong><br>
Under certain trading conditions it may be difficult or impossible to liquidate an open position. This may occur, for example, at times of rapid price movement if the price rises or fall in one trading session to such an extent that without limitation under the rules of the relevant exchange, or third party liquidity provider, trading is suspended or restricted. Placing a stop-loss order will not necessarily limit your losses to the intended amounts, as market conditions may make it impossible to execute such an order at the stipulated price.<br><br>
<strong  class="capitalise">liquiDAtion oF open positions</strong><br>
Positions may be liquidated or closed out without your consent in the event you fail to meet a margin call warning. Additionally, the insolvency, default or any market condition affecting any broker involved in your transaction may lead to positions being liquidated or closed out without your prior consent. In certain circumstances, you may not get back the actual assets which you lodged as collateral and you may have to accept any available payment in cash.<br><br>
<strong  class="capitalise">trADing ViA A FunD mAnAger</strong><br>
We do not take any responsibility for third party fund managers, and you agree to hold us, our employees, agents, officers, directors and shareholders harmless from any losses sustained by you as a result of actions undertaken by such third party fund managers. should you grant a third party fund manager discretionary trading authority, you grant such authority at your sole and full risk.</p>
<div class="footer"><p style="float:left;margin-right:2px">Page 13 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 13-->

<div class="page">
<p><strong  class="capitalise">insolVency</strong><br>
Any insolvency or default may lead to positions being liquidated or closed out without your consent. In certain circumstances, you may not get back the actual assets, which you lodged as collateral and you may have to accept any available payment in cash. Additionally and unless you are a retail client, you transfer full ownership and title to a portion or all of the money you deposit with us representing an amount necessary to secure your open positions or cover your actual of future contingent or prospective obligations (which will be calculated daily at our sole discretion based on your daily open positions and trading and which may be greater than the margin required to maintain your open positions, as market conditions may dictate). You will not have a proprietary claim over that portion or any of your money and that portion or any of your money will not be segregated, and you will rank only as a general creditor of ours with respect to any claim for the payment of such portion of the above described money you deposit which may therefore be irrecoverable in the event of any insolvency or default.</p>
<p class="red">
You should only engage in the above investments if you are prepared to accept a high degree of risk, and in particular the risks outlined in this Notice. You must be prepared to sustain the total loss of all amounts you may have deposited with us as well as any losses, charges (such as interest) and any other amounts (such as costs) we incur in recovering any payment from you. given the possibility of losing an entire investment, or more, therefore speculation in certain investments should only be conducted with risk capital funds that if lost will not significantly affect your personal or institution’s financial well-being.</p>
<div class="footer"><p style="float:left;margin-right:2px">Page 14 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 14-->

<div class="page">
<h2>AppenDiX B</h2>
<h3 class="margin-bottom-20">Discretionary charges Disclosure</h3>
<p>Where you have been introduced to House of Borse Limited by an referring Partner and/ or a Fund manager (“Third Party Introducer”) discretionary charges* may be incurred on your trading account due to the added value of service of the third Party introducer. a proportion of the charges levied will be paid directly to the Third Party Introducer.</p>
<p>In the event you would like more details of these discretionary charges, Please contact your Third Party Introducer directly at the first instance and should you have any further questions, please contact House of Borse at support@houseofborse.com.</p>
<p>Please note that the Third Party Introducer and House of Borse are entirely separate entities and act independently from one another. The Third Party Introducer is not an agent or employee of House of Borse and we accept no responsibility for their actions.</p>

<p><strong>In respect of the Third Party Introducer, Especially note the following:</strong></p>
<ul>
<li>&rsaquo; We cannot endorse or guarantee any advice or information given to you by the Third Party Introducer. In the event your Third Party Introducer, or any other third party provides you with information or advice regarding your trading activities, we will in no respect be held responsible for any loss to you resulting from your use of such information or advice.
<li>&rsaquo; We remind you that we may compensate the Third Party Introducer for introducing you to us. Such compensation to the Third Party Introducer may be on a rebate basis per trade or may require you to incur a mark-up, in addition to the spread normally provided by us. You have the right to be informed of the exact way in which any compensation is calculated and paid, and in the event you require this information, please contact us at support@houseofborse.com.
<li>&rsaquo; You understand and acknowledge that your Third Party Introducer may or may not be regulated by an authority, and you may not be covered by the same regulatory protections as when dealing with a regulated entity.
</ul>
<p><strong>* Discretionary charges may be a combination of the following: additional fee(s), commission(s) and / or wider spread(s).</strong></p>
<p class="red">We trust that this is clear; however, in the event it is not, please do not hesitate to contact us at support@houseofborse.com or your Third Party Introducer directly.</p>
<div class="footer"><p style="float:left;margin-right:2px">Page 15 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 15-->

<div class="page">
<h2>AppenDiX C</h2>
<h3 class="margin-bottom-20">required Documentation for the Personal account</h3>
<p>In order to open a personal trading account with House of Borse Limited (“House of Borse”), we require you to provide us with a photo ID and address verification (as specified below). Depending on your country of residence, Please send us the following for each account holder:</p>
<table align="center" cellpadding="0" cellspacing="0" width="100%">
<thead>
<tr>
<th>Residing in EU</th>
<th>Residing outside EU</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<ul>
    <li>&rsaquo; One (1) photo ID</li>
    <li>&rsaquo; One (1) proof of residency document</li>
</ul>
</td>

<td>
<ul>
    <li>&rsaquo; Two (2) photo ID documents</li>
    <li>&rsaquo; One (1) proof of residency document</li>
</ul>
</td>

</tr>
</tbody>
</table>
<p>For questions related to country specific certification requirements, Please contact House of Borse directly.<br>
Please note that in order to transfer/ withdraw funds from your account, you will need to have submitted all requested documents to House of Borse.</p>
<table align="center" cellpadding="0" cellspacing="0" width="100%" class="margin-bottom-20">
<thead>
<tr>
<th>Photo ID Verification</th>
<th>Proof of Residency Verification</th>
</tr>
</thead>
<tbody>
<tr>
<td width="50%">
<p style="padding:5px;">An ID verification document is a government issued photo identifcation document (ID), where it is not expired, the photo clearly displays the individual in question, the signature is present and readable on the photo ID and the full name and birthdate is present. this can be provided with any of the following documents:</p>
<ul>
    <li>&rsaquo; Passport;</li>
    <li>&rsaquo; Driver’s license; or</li>
    <li>&rsaquo; National ID with photo.</li>
</ul>
<p style="padding:5px;">Other types of ID verification documents will be assessed on a case by case basis.</p>
</td>

<td width="50%">
<p style="padding:5px;">A document confirming the residency of the individual in question. this can be provided with any of the following documents which are issued within the past three (3) months:</p>
<ul>
    <li>&rsaquo;  Utility bill (e.g. gas, water, electricity, land line phone, oil, internet or cable TV connection);</li>
    <li>&rsaquo; Bank statement;</li>
    <li>&rsaquo; Driver’s license with address(If not provided as photo ID);or</li>
    <li>&rsaquo; National iD with address (If not provided as photo ID).</li>
</ul>
<p style="padding:5px;">Other types of address verification documents will be assessed on a case by case basis.</p>
</td>
</tr>
</tbody>
</table>
<h5>certiFicAtion</h5>
<p>Where indicated, all documents submitted to House of Borse must be certificed by a lawyer, solicitor, accountant, bank manager or notary public as a “true copy of the original”. It must furthermore include the below:</p>
<ul>
<li>&rsaquo; Stamp of the individual certifying the document</li>
<li>&rsaquo; Full name, title and email or phone number</li>
<li>&rsaquo; registration/ employee number</li>
<li>&rsaquo; Date</li>
<li>&rsaquo; signature</li>
</ul>
<p>A template for certification can be provided by House of Borse on request.<br>
In order to ensure that we receive the most recent and valid documents, all certifications must have been carried out within three (3) months of submitting the account application to us, and the person certifying the document must be independent and have no connection to the individual whose document is being certificed.</p>
<p class="red">Please scan full and clear copies of the required documents and send them by email to support@houseofborse.com with the original certified document(s) following by cost or courier within seven (7) days of approval of the account:
</p>
<address class="margin-top-20">
<strong>House of Borse Limited</strong><br>
MayFair<br>
23 Hanover Square<br>
London, W1S 1JB<br>
United Kingdom<br>
Attn.: Client Onboarding
</address>
<div class="footer"><p style="float:left;margin-right:2px">Page 16 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 16-->

<div class="page">
<h2>AppenDiX D</h2>
<h3 class="margin-bottom-20">Joint account Holder Form</h3>
<p>In the event you are opening a joint trading account with House of Borse limited, we require you to provide us with the following additional information for the second joint account holder</p>
<h4>1. personAl DetAils</h4>
<div class="col-box margin-bottom-20">
<div class="col-50">
<h5>A. Personal Details (hereafter “client”)</h5>
<p><strong>First Name(s)</strong></p>
<ul class="no-margin list-inline">
<li class="padding-right-10">@if($var->title_joint=='Mr') &check; @else&#9744;@endif Mr.</li>
<li class="padding-right-10">@if($var->title_joint=='Ms') &check; @else&#9744;@endif Ms.</li>
<li class="padding-right-10">@if($var->title_joint=='Mrs') &check; @else&#9744;@endif Mrs.</li>
<li class="padding-right-10">@if($var->title_joint=='Dr') &check; @else&#9744;@endif Dr.</li>
</ul>
<div class="rectangle padding-10">{{$var->first_name_joint}}</div>
<p><strong>Middle Name(s) (if applicable)</strong></p>
<div class="rectangle padding-10">{{$var->second_name_joint}}</div>
<p><strong>Last Name(s)</strong></p>
<div class="rectangle padding-10">{{$var->last_name_joint}}</div>
<p><strong>Date of Birth (DD/MM/YYYY)</strong></p>
<div class="rectangle padding-10">{{$var->date_of_birth_joint|date('Y-m-d')}}</div>
</div><!--.col-50-->

<div class="col-50 no-padding">
<h5>B. residential address</h5>
<br>
<p><strong>Street and Number</strong></p>
<div class="rectangle padding-10">{{ $var->street_and_number_joint}}</div>
<p><strong>Post Code</strong></p>
<div class="rectangle padding-10">{{$var->postal_code_joint}}</div>
<p><strong>City</strong></p>
<div class="rectangle padding-10">{{ $var->city_joint}}</div>
<p><strong>Country</strong></p>
<div class="rectangle padding-10">{{$var->country_joint}}</div>
</div><!--.col-50-->

</div><!--.col-box-->

<div class="col-box margin-bottom-20">
<div class="col-50">
<h5>C. contact Details</h5>
<p><strong>Main Phone Number (incl. country code)</strong></p>
<div class="rectangle padding-10">{{ $var->main_phone_joint}}</div>
<p><strong>Secondary Phone Number (incl. country code)</strong></p>
<div class="rectangle padding-10">{{ $var->secondary_phone_joint}}</div>
<p><strong>Primary Email</strong></p>
<div class="rectangle padding-10">{{ $var->primary_email_joint}}</div>
<p><strong>Secondary Email</strong></p>
<div class="rectangle padding-10">{{ $var->secondary_email_joint}}</div>
<p><strong>Fax</strong></p>
<div class="rectangle padding-10">{{$var->fax_joint}}</div>
</div><!--.col-50-->
<div class="col-50">
<h5>B. residential address</h5>
<p><strong>Street and Number</strong></p>
<div class="rectangle padding-10">{{$var->postal_street_and_number_joint}}</div>
<p><strong>Post Code</strong></p>
<div class="rectangle padding-10">{{$var->postal_post_code_joint}}</div>
<p><strong>City</strong></p>
<div class="rectangle padding-10">{{$var->postal_city_joint}}</div>
<p><strong>Country</strong></p>
<div class="rectangle padding-10">{{$var->postal_country_joint}}</div>
</div><!--.col-50-->
</div><!--.col-box-->
<h4>2. FinAnciAl inFormAtion</h4>
<div class="col-box margin-bottom-20">
<div class="col-50">
<h5>Financial Background</h5>
<p>Please specify the financial details of the Client.<br>
Size of financial instrument portfolio<br>(incl. cash deposits and financial instruments, excl. property) (in EUR)</p>
<div class="rectangle padding-20">{{$var->financial_instrument_portfolio_joint}}</div>
</div><!--.col-50-->
<div class="col-50">
<h5>source of Funds deposited with House of Borse <small>(if you select “other” please specify)</small></h5>
<p>Please specify the source of funds deposited with House of Borse by the client. Please note that House of Borse may at its sole discretion request for documentation of the source of funds.</p>
<div class="col-box margin-bottom-20">
<div class="col-50">
<ul>
    <li>@if($var->source_funds_deposited_joint==0) &check; @else&#9744;@endif Employment</li>
    <li>@if($var->source_funds_deposited_joint==1) &check; @else&#9744;@endif Inheritance</li>
    <li>@if($var->source_funds_deposited_joint==2) &check; @else&#9744;@endif Investment</li>
    <li>@if($var->source_funds_deposited_joint==3) &check; @else&#9744;@endif Previous Employment</li>
    <li>@if($var->source_funds_deposited_joint==4) &check; @else&#9744;@endif Real Estate</li>

</ul>
</div><!--.col-50-->
<div class="col-50">
<ul>
        <li>@if($var->source_funds_deposited_joint==5) &check; @else&#9744;@endif Sale of investments</li>
    <li>@if($var->source_funds_deposited_joint==6) &check; @else&#9744;@endif Savings</li>
    <li>@if($var->source_funds_deposited_joint==7) &check; @else&#9744;@endif Other (specify below)</li>
    <div class="rectangle padding-10">{{  $var->other_source_funds_deposited_joint }}</div>
</ul>
</div><!--.col-50-->
</div><!--.col-box-->
</div><!--.col-50-->
</div><!--.col-box-->
<div class="footer"><p style="float:left;margin-right:2px">Page 17 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 17-->

<div class="page">
<h4>3. trADing eXperience</h4>
<h5>A. trading experience</h5>
<p>Forex and contract for Difference are leveraged products. they may not be suitable for you as they carry a high degree of risk to your capital and you can lose more than your initial investment. You must ensure that you understand all of the risks as furthermore elaborated on in Appendix A (High risk investment notice).<br><br>
<strong>Do you understand the nature and risks of trading leveraged products</strong></p>
<ul class="no-margin list-inline">
<li class="padding-right-10">@if($var->understand_risks_joint==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_risks_joint==1) &check; @else&#9744;@endif No</li>
</ul>

<h5 class="margin-top-20">B. Financial markets experience</h5>
<p>Please indicate below the financial market(s) you have traded in within the past 3 years.</p>
<ul class="no-margin">
<li>@if($var->number_of_years_cfd_joint!=0) &check; @else&#9744;@endif Contracts for Difference (CFDs) - if yes, please complete section C</li>
<li>@if($var->number_of_years_commodities_joint!=0) &check; @else&#9744;@endif Commodities - if yes, please complete section D</li>
<li>@if($var->number_of_years_forex_joint!=0) &check; @else&#9744;@endif Forex - if yes, please complete section E</li>
<li>@if($var->number_of_years_futures_joint!=0) &check; @else&#9744;@endif Futures - if yes, please complete section F</li>
<li>@if($var->number_of_years_options_joint!=0) &check; @else&#9744;@endif Options - if yes, please complete section G</li>
<li>@if($var->number_of_years_securities_joint!=0) &check; @else&#9744;@endif Securities - if yes, please complete section H</li>
</ul>
     <div style="@if($var->number_of_years_cfd_joint==0)   @endif">

<h5 class="margin-top-20">C. contract for Differences (CFDs) trading experience</h5>
<p><strong>Number of years you have been trading in CFDs</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_years_cfd_joint==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_cfd_joint==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_cfd_joint==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_cfd_joint==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>
<p class="margin-top-10"><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_transactions_cfd_joint==0 and  $var->number_of_years_cfd_joint!=0) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_cfd_joint==1  and  $var->number_of_years_cfd_joint!=0) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_cfd_joint==2  and  $var->number_of_years_cfd_joint!=0) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>
<p class="margin-top-10"><strong>Average trading volume per month</strong></p>
<ul class="no-margin">
<li>@if($var->average_trading_cfd_joint==0 and  $var->number_of_years_cfd_joint!=0 ) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_cfd_joint==1  and  $var->number_of_years_cfd_joint!=0) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_cfd_joint==2  and  $var->number_of_years_cfd_joint!=0) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_cfd_joint==3  and  $var->number_of_years_cfd_joint!=0) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>
     </div>
<div class="footer"><p style="float:left;margin-right:2px">Page 18 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 18-->

<div class="page">
<div style="@if($var->number_of_years_commodities_joint==0)   @endif">

<h4>D. commodities trading experience</h4>
<p><strong>Number of years you have been trading in commodities</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_years_commodities_joint==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_commodities_joint==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_commodities_joint==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_commodities_joint==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>

<p class="margin-top-10"><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_transactions_commodities_joint==0 and  $var->number_of_years_commodities_joint!=0) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_commodities_joint==1  and  $var->number_of_years_commodities_joint!=0) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_commodities_joint==2 and  $var->number_of_years_commodities_joint!=0 ) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>

<p class="margin-top-10"><strong>Average trading volume per month</strong></p>
<ul class="no-margin">
<li>@if($var->average_trading_commodities_joint==0 and  $var->number_of_years_commodities_joint!=0 ) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_commodities_joint==1 and  $var->number_of_years_commodities_joint!=0 ) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_commodities_joint==2 and  $var->number_of_years_commodities_joint!=0 ) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_commodities_joint==3  and  $var->number_of_years_commodities_joint!=0) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>
</div>
<div style="@if($var->number_of_years_forex_joint==0)   @endif">

<h5 class="margin-top-20">E. Forex (spot or Forward) trading experience</h5>
<p><strong>Number of years you have been trading in forex</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_years_forex_joint==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_forex_joint==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_forex_joint==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_forex_joint==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>
<p class="margin-top-10"><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_transactions_forex_joint==0 and  $var->number_of_years_forex_joint!=0 ) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_forex_joint==1 and  $var->number_of_years_forex_joint!=0 ) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_forex_joint==2 and  $var->number_of_years_forex_joint!=0 ) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>

<p class="margin-top-10"><strong>Average trading volume per month</strong></p>
<ul class="no-margin">
<li>@if($var->average_trading_forex_joint==0 and  $var->number_of_years_forex_joint!=0 ) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_forex_joint==1  and  $var->number_of_years_forex_joint!=0) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_forex_joint==2  and  $var->number_of_years_forex_joint!=0) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_forex_joint==3  and  $var->number_of_years_forex_joint!=0) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>
</div>
<div class="footer"><p style="float:left;margin-right:2px">Page 19 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 19-->

<div class="page">
<div style="@if($var->number_of_years_futures_joint==0)   @endif">

<h5>F. Futures trading experience</h5>
<p><strong>Number of years you have been trading in futures</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_years_futures_joint==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_futures_joint==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_futures_joint==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_futures_joint==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>

<p class="margin-top-10"><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_transactions_futures_joint==0 and  $var->number_of_years_futures_joint!=0 ) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_futures_joint==1  and  $var->number_of_years_futures_joint!=0) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_futures_joint==2  and  $var->number_of_years_futures_joint!=0) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>

<p class="margin-top-10"><strong>Average trading volume per month</strong></p>
<ul class="no-margin">
<li>@if($var->average_trading_futures_joint==0  and  $var->number_of_years_futures_joint!=0) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_futures_joint==1  and  $var->number_of_years_futures_joint!=0) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_futures_joint==2  and  $var->number_of_years_futures_joint!=0) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_futures_joint==3 and  $var->number_of_years_futures_joint!=0 ) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>
</div>
<div style="@if($var->number_of_years_options_joint==0)   @endif">

<h5 class="margin-top-20">G. options trading experience</h5>
<p class="margin-top-10"><strong>Number of years you have been trading in options</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_years_options_joint==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_options_joint==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_options_joint==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_options_joint==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>
<p class="margin-top-10"><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_transactions_options_joint==0 and  $var->number_of_years_options_joint!=0 ) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_options_joint==1 and  $var->number_of_years_options_joint!=0  ) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_options_joint==2 and  $var->number_of_years_options_joint!=0  ) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>

<p class="margin-top-10"><strong>Average trading volume per month</strong></p>
<ul class="no-margin">
<li>@if($var->average_trading_options_joint==0  and  $var->number_of_years_options_joint!=0 ) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_options_joint==1 and  $var->number_of_years_options_joint!=0  ) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_options_joint==2  and  $var->number_of_years_options_joint!=0 ) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_options_joint==3 and  $var->number_of_years_options_joint!=0  ) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>
</div>
<div class="footer"><p style="float:left;margin-right:2px">Page 20 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 20-->

<div class="page">
<div style="@if($var->number_of_years_securities_joint==0)   @endif">

<h5>H. securities trading experience</h5>
<p><strong>Number of years you have been trading in securities</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_years_securities_joint==1) &check; @else&#9744;@endif Less than 1 year</li>
<li>@if($var->number_of_years_securities_joint==2) &check; @else&#9744;@endif 1 to 3 years</li>
<li>@if($var->number_of_years_securities_joint==3) &check; @else&#9744;@endif 3 to 5 years</li>
<li>@if($var->number_of_years_securities_joint==4) &check; @else&#9744;@endif More than 5 years</li>
</ul>

<p class="margin-top-10"><strong>Number of transactions of significant size carried out per quarter in the past 12 months</strong></p>
<ul class="no-margin">
<li>@if($var->number_of_transactions_securities_joint==0 and  $var->number_of_years_securities_joint!=0 ) &check; @else&#9744;@endif Less than 10 transactions</li>
<li>@if($var->number_of_transactions_securities_joint==1 and  $var->number_of_years_securities_joint!=0 ) &check; @else&#9744;@endif 10 to 20 transactions</li>
<li>@if($var->number_of_transactions_securities_joint==2  and  $var->number_of_years_securities_joint!=0) &check; @else&#9744;@endif More than 20 transactions</li>
</ul>

<p class="margin-top-10"><strong>Average trading volume per month</strong></p>
<ul class="no-margin">
<li>@if($var->average_trading_securities_joint==0  and  $var->number_of_years_securities_joint!=0) &check; @else&#9744;@endif Less than 30,000 GBP</li>
<li>@if($var->average_trading_securities_joint==1  and  $var->number_of_years_securities_joint!=0) &check; @else&#9744;@endif 30,000 to 60,000 GBP</li>
<li>@if($var->average_trading_securities_joint==2  and  $var->number_of_years_securities_joint!=0) &check; @else&#9744;@endif 60,000 to 300,000 GBP</li>
<li>@if($var->average_trading_securities_joint==3  and  $var->number_of_years_securities_joint!=0) &check; @else&#9744;@endif More than 300,000 GBP</li>
</ul>
</div>
<h5 class="margin-top-20">I. understanding of the markets</h5>
<p>I have worked, or I am currently working in a professional position in the financial sector which requires knowledge of the transactions envisaged with House of Borse in the following markets (tick boxes).</p>
<div class="col-box margin-bottom-10">
<div class="col-33">
<p><strong>Contracts for difference (CFDs)</strong></p>
<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_cfd_joint==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_cfd_joint==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_cfd_joint}}</div>
</div><!--.col-33-->

<div class="col-33">
<p><strong>Forex (Spot or Forward)</strong></p>
<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_joint_forex==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_joint_forex==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_forex_joint}}</div>
</div><!--.col-33-->

<div class="col-33">
<p><strong>Securities</strong></p>
<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_securities_joint==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_securities_joint==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_securities_joint}}</div>
</div><!--.col-33-->
</div><!--.col-box-->

<div class="col-box margin-bottom-10">
<div class="col-33">
<p><strong>Futures</strong></p>
<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_futures_joint==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_futures_joint==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_futures_joint}}</div>
</div><!--.col-33-->

<div class="col-33">
<p><strong>Commodities</strong></p>
<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_commodities_joint==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_commodities_joint==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_commodities_joint}}</div>
</div><!--.col-33-->

<div class="col-33">
<p><strong>Options</strong></p>
<ul class="list-inline no-margin">
<li class="padding-right-10">@if($var->understand_market_options_joint==0) &check; @else&#9744;@endif Yes</li>
<li class="padding-right-10">@if($var->understand_market_options_joint==1) &check; @else&#9744;@endif No</li>
</ul>
<p>If “Yes”, please specify number of years</p>
<div class="rectangle padding-10">{{$var->understand_market_years_options_joint}}</div>
</div><!--.col-33-->
</div><!--.col-box-->
<h4 class="margin-top-10">4. signature anD consent</h4>

<div class="col-box bg-white" style="padding:20px;">
<p><strong>For joint account holders please also sign below with the joint account holder.</strong></p>
<div class="col-50">
<p><strong>Date:</strong></p>
<div class="rectangle padding-10">{{ date("m/d/Y") }}</div>
</div><!--.col-50-->

<div class="col-50 no-padding">
<p><strong>Date:</strong></p>
<div class="rectangle padding-10">{{ date("m/d/Y") }}</div>
</div><!--.col-50-->


<div class="col-50">
<p><strong>Full Name:</strong></p>
<div class="rectangle padding-10">{{ $var->first_name }} {{ $var->last_name }} </div>
</div><!--.col-50-->

<div class="col-50 no-padding">
<p><strong>Full Name:</strong></p>
<div class="rectangle padding-10">{{ $var->first_name_joint }} {{ $var->last_name_joint }}</div>
</div><!--.col-50-->

<div class="col-50">
<p><strong>Title:</strong></p>
<div class="rectangle padding-10">{{ $var->title }} </div>
</div><!--.col-50-->

<div class="col-50 no-padding">
<p><strong>Title:</strong></p>
<div class="rectangle padding-10">{{ $var->title_joint}}</div>
</div><!--.col-50-->

<div class="col-50">
<p><strong>Signature:</strong></p>
<div class="rectangle padding-30"></div>
</div><!--.col-50-->

<div class="col-50 no-padding">
<p><strong>Signature:</strong></p>
<div class="rectangle padding-30"></div>
</div><!--.col-50-->

</div><!--.col-box-->

<div class="footer"><p style="float:left;margin-right:2px">Page 21 of 21</p>
<p style="float:right;padding-left:2px; border-left: 2px solid #ddd;">Personal Account Opening<br><b> Form</b></p>
</div>
<div class="address" style="float:right">
<p>info@houseofborse.com</p>
<p>MayFair, 23 Hanover Square,London, W1S 1JB, UK</p>
<p>+44 (0) 203-714-8715</p>
<p>FCA Register Number: 631382</p>
</div>
</div><!--.page 21-->
</body>


</html>