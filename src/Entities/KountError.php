<?php


namespace PlacetoPay\Kount\Entities;


class KountError
{

    protected static $ERRORS_CODES = [
        201 => 'MISSING_VERS',
        202 => 'MISSING_MODE',
        203 => 'MISSING_MERC',
        204 => 'MISSING_SESS',
        205 => 'MISSING_TRAN',
        211 => 'MISSING_CURR',
        212 => 'MISSING_TOTL',
        221 => 'MISSING_EMAL',
        222 => 'MISSING_ANID',
        223 => 'MISSING_SITE',
        231 => 'MISSING_PTYP',
        232 => 'MISSING_CARD',
        233 => 'MISSING_MICR',
        234 => 'MISSING_PYPL',
        235 => 'MISSING_PTOK',
        241 => 'MISSING_IPAD',
        251 => 'MISSING_MACK',
        261 => 'MISSING_POST',
        271 => 'MISSING_PROD_TYPE',
        272 => 'MISSING_PROD_ITEM',
        273 => 'MISSING_PROD_DESC',
        274 => 'MISSING_PROD_QUANT',
        275 => 'MISSING_PROD_PRICE',
        301 => 'BAD_VERS',
        302 => 'BAD_MODE',
        303 => 'BAD_MERC',
        304 => 'BAD_SESS',
        305 => 'BAD_TRAN',
        311 => 'BAD_CURR',
        312 => 'BAD_TOTL',
        321 => 'BAD_EMAL',
        322 => 'BAD_ANID',
        323 => 'BAD_SITE',
        324 => 'BAD_FRMT',
        331 => 'BAD_PTYP',
        332 => 'BAD_CARD',
        333 => 'BAD_MICR',
        334 => 'BAD_PYPL',
        335 => 'BAD_GOOG',
        336 => 'BAD_BLML',
        337 => 'BAD_PENC',
        338 => 'BAD_GDMP',
        339 => 'BAD_HASH',
        340 => 'BAD_MASK',
        341 => 'BAD_IPAD',
        342 => 'BAD_GIFT',
        351 => 'BAD_MACK',
        362 => 'BAD_CART',
        371 => 'BAD_PROD_TYPE',
        372 => 'BAD_PROD_ITEM',
        373 => 'BAD_PROD_DESC',
        374 => 'BAD_PROD_QUANT',
        375 => 'BAD_PROD_PRICE',
        399 => 'BAD_OPTN',
        401 => 'EXTRA_DATA',
        404 => 'UNNECESSARY_PTOK',
        413 => 'REQUEST_ENTITY_TOO_LARGE',
        501 => 'UNAUTH_REQ',
        502 => 'UNAUTH_MERC',
        601 => 'SYS_ERR',
        602 => 'SYS_NOPROCESS',
        701 => 'NO_HDR',
    ];

    protected static $EN = [
        'MISSING_VERS' => 'Missing version of Kount, this is built into SDK but must be supplied by merchant if not using the SDK',
        'MISSING_MODE' => 'The mode type for post is missing Refer to Risk Inquiry Service Modes section of this document',
        'MISSING_MERC' => 'The six digit Merchant ID was not sent',
        'MISSING_SESS' => 'The unique session ID was not sent',
        'MISSING_TRAN' => 'Transaction ID number',
        'MISSING_CURR' => 'The currency was missing in the RIS submission',
        'MISSING_TOTL' => 'The total amount was missing',
        'MISSING_EMAL' => 'The email address was missing',
        'MISSING_ANID' => 'For MODE=P RIS inqueries the caller ID is missing',
        'MISSING_SITE' => 'The website identifier that was created in the Agent Web Console (’DEFAULT’ is the default website ID) is missing',
        'MISSING_PTYP' => 'The payment type is missing. Refer to the RIS Payment Types section of this document for details',
        'MISSING_CARD' => 'The credit card information is missing',
        'MISSING_MICR' => 'Missing Magnetic Ink Character Recognition string',
        'MISSING_PYPL' => 'The PayPal Payer ID is missing',
        'MISSING_PTOK' => 'The payment token is missing. Refer to the RIS Payment Types section of this document for details',
        'MISSING_IPAD' => 'The IP address is missing',
        'MISSING_MACK' => 'The merchant acknowledgement is missing',
        'MISSING_POST' => 'The RIS query submitted to Kount contained no data',
        'MISSING_PROD_TYPE' => 'The shopping cart data array attribute is missing. Refer to the Shopping Cart Data section of this document for details',
        'MISSING_PROD_ITEM' => 'The shopping cart data array attribute is missing. Refer to the Shopping Cart Data section of this document for details',
        'MISSING_PROD_DESC' => 'The shopping cart data array attribute is missing. Refer to the Shopping Cart Data section of this document for details',
        'MISSING_PROD_QUANT' => 'The shopping cart data array attribute is missing. Refer to the Shopping Cart Data section of this document for details',
        'MISSING_PROD_PRICE' => 'The shopping cart data array attribute is missing. Refer to the Shopping Cart Data section of this document for details',
        'BAD_VERS' => 'The version of Kount supplied by merchant does not fit the four integer parameter',
        'BAD_MODE' => 'The mode type is invalid. Refer to the RIS Inquiry Service Modes section of this document for details',
        'BAD_MERC' => 'The six digit Merchant ID is malformed or wrong',
        'BAD_SESS' => 'The unique session ID is invalid. Refer to the Data Collector Requirements and Section creation code example sections of this document for details',
        'BAD_TRAN' => 'Transaction ID number is malformed',
        'BAD_CURR' => 'The currency was wrong in the RIS submission',
        'BAD_TOTL' => 'The total amount is wrong. TOTL is the whole number amount charged to customer',
        'BAD_EMAL' => 'The email address does not meet required format or is greater than 64 characters in length',
        'BAD_ANID' => 'For MODE=P RIS inqueries the caller ID is malformed',
        'BAD_SITE' => 'The website identifier that was created in the Agent Web Console (’DEFAULT’ is the default website ID) does not match what was created in the AWC.',
        'BAD_FRMT' => 'The specified format is wrong. Format options are key value pairs, XML, JSON, YAML',
        'BAD_PTYP' => 'The payment type is wrong. Refer to the RIS Payment Types section of this document for details',
        'BAD_CARD' => 'The credit card information is malformed or wrong, test cards do not work in the production environment',
        'BAD_MICR' => 'Malformed or improper Magnetic Ink Character Recognition string. Refer to the RIS Payment Types section of this document for details',
        'BAD_PYPL' => 'The PayPal Payer ID is malformed or corrupt. Refer to the RIS Payment Types section of this document for details',
        'BAD_GOOG' => 'Malformed or improper Google Checkout Account ID string. Refer to the RIS Payment Types section of this document for details',
        'BAD_BLML' => 'Malformed or improper Bill Me Later account number. Refer to the RIS Payment Types section of this document for details',
        'BAD_PENC' => 'The encryption method specified is wrong',
        'BAD_GDMP' => 'The GreenDot payment token is not a valid payment token',
        'BAD_HASH' => 'When payment type equals ‘CARD’, [PTYP=CARD] and payment encryption type equals ‘KHASH’, [PENC=KHASH] the value must be 20 characters in length.',
        'BAD_MASK' => 'Invalid or excessive characters in the PTOK field',
        'BAD_IPAD' => 'The IP address does not match specifications',
        'BAD_GIFT' => 'The Gift Card payment token is invalid due to invalid characters, null, or exceeding character length',
        'BAD_MACK' => 'The merchant acknowledgement must be ’Y’ or ’N’',
        'BAD_CART' => 'There is a discrepancy in the shopping cart key count and the number of items actually being sent in the cart',
        'BAD_PROD_TYPE' => 'The shopping cart data array attribute is missing. Refer to the Shopping Cart Data section of this document for details',
        'BAD_PROD_ITEM' => 'The shopping cart data array attribute is corrupt or missing. Refer to the Shopping Cart Data section of this document for details',
        'BAD_PROD_DESC' => 'The shopping cart data array attribute is corrupt or missing. Refer to the Shopping Cart Data section of this document for details',
        'BAD_PROD_QUANT' => 'The shopping cart data array attribute is corrupt or missing. Refer to the Shopping Cart Data section of this document for details',
        'BAD_PROD_PRICE' => 'The shopping cart data array attribute is corrupt or missing. Refer to the Shopping Cart Data section of this document for details',
        'BAD_OPTN' => 'A UDF has been mistyped or does not exist in the Agent Web Console',
        'EXTRA_DATA' => 'RIS keys submitted by merchant were not part of SDK',
        'UNNECESSARY_PTOK' => 'When PTYP equals NONE and a PTOK is submitted',
        'REQUEST_ENTITY_TOO_LARGE' => 'The RIS Post to Kount exceeded the 4K limit. Refer to the Shopping Cart Data section for further details.',
        'UNAUTH_REQ' => 'Error regarding certificate • Using test certificate in prod',
        'UNAUTH_MERC' => 'Invalid Merchant ID has been entered',
        'SYS_ERR' => 'Unspecified system error - Contact Merchant Services',
        'SYS_NOPROCESS' => 'Kount will not process particular transaction',
        'NO_HDR' => 'This error occurs when a RIS request goes to the database and there is no data available in the reply',
    ];

    public static function errorKey($code)
    {
        if ($code) {
            return isset(self::$ERRORS_CODES[$code]) ? self::$ERRORS_CODES[$code] : null;
        }
        return self::$ERRORS_CODES;
    }

    public static function errorMessage($key = null)
    {
        if ($key) {
            return isset(self::$EN[$key]) ? self::$EN[$key] : null;
        }
        return self::$EN;
    }

}