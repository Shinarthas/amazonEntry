<?php

return [
	'store' => [
	    //AKIA5JWLHDN7IKVWUFUP
        //TCx5ji4vKh+avv8XWIOctlDJWdJW+ZKLLo0Ij1UP
        //arn:aws:iam::914180479870:user/OrderManager
        //Atzr|IwEBINhECc1grrDTEtWLgEUJkEEl6VxF5__UTXzFLcmfWSAhrW1XWZw6pkP8VPynjrGJwfKCJ7iF2-D7KAHna6XbZkLVr8MXz6VmFuzl8ev67rO0qR1ARXps8ow_T0sJQSDkPEaZX15Hr1bpeJsCdFyZOv1ALhYYHt6X9QVGqCVoCL7xzKX3Ry3d04tOEfryZQd87BJzgTGdhZKQN-YJqAURy7pJDMn-Uc0ML-HEllDRX9Tvi9tiUs-IXusCwQilFQ6saf3ULwGWPLN79bt2ShlJb-m_Ah9pGJqx1fH7eAB_oHvxoZN0ytsd-5WVODa_Qnftofs
		//AKIA5JWLHDN7IKVWUFUP
        'myStore' => [
			'merchantId' => 'A7Z6ARMDUV6NC',
			'marketplaceId' => 'ATVPDKIKX0DER',//US
			'keyId' => 'AKIA5JWLHDN7BXDZOH5M',
			//'keyId' => 'amzn1.application-oa2-client.2d0837c440a44988a6fa022e9fea0e32',
			//'secretKey' => '28539da1ea14585d978830fca6c30896883cc05d1556497515942eb7db38e541',
			'secretKey' => 'v7RrZTh+QpI0DHYskiCC0SyepLIfYAorzmPrJ3X4',
            'authToken' => 'Atzr|IwEBINhECc1grrDTEtWLgEUJkEEl6VxF5__UTXzFLcmfWSAhrW1XWZw6pkP8VPynjrGJwfKCJ7iF2-D7KAHna6XbZkLVr8MXz6VmFuzl8ev67rO0qR1ARXps8ow_T0sJQSDkPEaZX15Hr1bpeJsCdFyZOv1ALhYYHt6X9QVGqCVoCL7xzKX3Ry3d04tOEfryZQd87BJzgTGdhZKQN-YJqAURy7pJDMn-Uc0ML-HEllDRX9Tvi9tiUs-IXusCwQilFQ6saf3ULwGWPLN79bt2ShlJb-m_Ah9pGJqx1fH7eAB_oHvxoZN0ytsd-5WVODa_Qnftofs',
			'amazonServiceUrl' => 'https://mws-eu.amazonservices.com/',
            /** Optional settings for SOCKS5 proxy
             *
            'proxy_info' => [
                'ip' => '127.0.0.1',
                'port' => 8080,
                'user_pwd' => 'user:password',
            ],
             */
		]
	],

	// Default service URL
	'AMAZON_SERVICE_URL' => 'https://mws.amazonservices.com/',

	'muteLog' => false
];
