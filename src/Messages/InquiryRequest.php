<?php


namespace PlacetoPay\Kount\Messages;


class InquiryRequest extends Request
{

    public function __construct($session, $data = [])
    {
        parent::__construct($session, $data);

        $this->mode = self::MODE_INQUIRY;
    }

    /**
     * @return array
     */
    public function asRequestData()
    {
        $requestData = [
            'VERS' => $this->version,
            'MODE' => $this->mode,
            'SDK' => $this->sdk,
            'SDK_VERSION' => $this->sdkVersion,
            'SITE' => $this->website,

            'MERC' => $this->merchant,
            'SESS' => $this->session,

            'ORDR' => $this->data['payment']['reference'],
            'CURR' => $this->data['payment']['amount']['currency'],
            'TOTL' => $this->parseAmount($this->data['payment']['amount']['total']),

            'UNIQ' => $this->data['payer']['documentType'] . $this->data['payer']['document'],
            'NAME' => $this->data['payer']['name'] . ' ' . $this->data['payer']['surname'],
            'EMAL' => $this->data['payer']['email'],
            'IPAD' => $this->data['ipAddress'],
            'UAGT' => $this->data['userAgent'],
        ];

        if (isset($this->data['mack'])) {
            $requestData['MACK'] = $this->data['mack'];
        }

        if (isset($this->data['cardNumber'])) {
            $cardExpiration = explode('/', $this->data['cardExpiration']);
            $requestData = array_merge($requestData, [
                'PTYP' => 'CARD',
                'LAST4' => substr($this->data['cardNumber'], -4),
                'PTOK' => $this->data['cardNumber'],
                'CCMM' => $cardExpiration[0],
                'CCYY' => '20' . $cardExpiration[1],
            ]);
            if (isset($this->data['cvvStatus'])) {
                $requestData['CVVR'] = $this->data['cvvStatus'];
            }
        }

        if (isset($this->data['gender'])) {
            $requestData['GENDER'] = $this->data['gender'];
        }

        if (isset($this->data['payer']['address'])) {
            $address = $this->data['payer']['address'];
            $requestData = array_merge($requestData, [
                'B2A1' => isset($address['street']) ? $address['street'] : null,
                'B2CI' => isset($address['city']) ? $address['city'] : null,
                'B2ST' => isset($address['state']) ? $address['state'] : null,
                'B2PC' => isset($address['postalCode']) ? $address['postalCode'] : null,
                'B2CC' => isset($address['country']) ? $address['country'] : null,
                'B2PN' => isset($address['phone']) ? $address['phone'] : null,
            ]);
        }

        if (isset($this->data['payment']['shipping'])) {
            $shipping = $this->data['payment']['shipping'];
            $address = isset($shipping['address']) ? $shipping['address'] : [];
            $requestData = array_merge($requestData, [
                'S2NM' => $shipping['name'] . ' ' . $shipping['surname'],
                'S2EM' => isset($shipping['email']) ? $shipping['email'] : null,
                'S2A1' => isset($address['street']) ? $address['street'] : null,
                'S2CI' => isset($address['city']) ? $address['city'] : null,
                'S2ST' => isset($address['state']) ? $address['state'] : null,
                'S2PC' => isset($address['postalCode']) ? $address['postalCode'] : null,
                'S2CC' => isset($address['country']) ? $address['country'] : null,
                'S2PN' => isset($address['phone']) ? $address['phone'] : null,
            ]);
        }

        if (isset($this->data['additional'])) {
            foreach ($this->data['additional'] as $key => $value) {
                $requestData['UDF[' . strtoupper($key) . ']'] = $value;
            }
        }

        if (isset($this->data['payment']['items'])) {
            foreach ($this->data['payment']['items'] as $index => $item) {
                $requestData = array_merge($requestData, [
                    'PROD_TYPE[' . $index . ']' => isset($item['sku']) ? $item['sku'] : null,
                    'PROD_ITEM[' . $index . ']' => isset($item['name']) ? $item['name'] : null,
                    'PROD_QUANT[' . $index . ']' => isset($item['qty']) ? $item['qty'] : null,
                    'PROD_PRICE[' . $index . ']' => isset($item['price']) ? $this->parseAmount($item['price']) : null,
                ]);
            }
        }



        return $requestData;
    }

}