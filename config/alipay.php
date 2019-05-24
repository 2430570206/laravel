<?php
return [
    //应用ID,您的APPID。
    'app_id' => "2016092500595677",

    //商户私钥
    'merchant_private_key' => "MIIEpAIBAAKCAQEAyx3iWe55Czfa7kVHRBTS2HBgJIJXfFMZ/Uu2x+rJq07DMhs3q5u7Fu+q5xwn7p8+KUhJ49ePbQnn60SA5PqCct2hPPGsTBiWG9qhsVihs+8DICQYQeAg8Fl4HZiyEYZYt16ln/iwbOqWZD5nnQ3OrXyB1nFNhn4CNA5h13N0W4GnieHDQJt6037PrDGNc9Dnn5Kr3qo7ptaRoRxdc7MrvnKG9xWlU3w1EYVKQPHWTeNPtkAFYLSMCeIf3sN2kZ5VCMDpVxXlfXZ0jnSAx2Tx5c7YsgSENARBqCyW8o9GjRerKA0Ro2gOy943hECWknscTrC+H+/O7M0HdHJRBPoNnwIDAQABAoIBAQCdx9gWHf5fLYNexegnRbnHsfutQKbvB6rPrWoOAB+qeCN/H89t+ioqFgD/SErovUDPVr03RTK/9Ar5IhyyQrrkua9PpTg/YHXyqzIhjoUGPiuCYyeIvK85pXZ+HyhsHp15zAcCrm92HAC5XBSm1pvu/iHpz9f2Gpphj66Ha8M+dKSWk515vInuNa5QarfbprRRf9hlb24i/z+MzDViDie+KaNPZ3jWuDHhSIq3+X9pLM8+fgcC7NWSilpYfZo26SWAMO/njf4UkBze/uL5iNCZL0Eg/uKl/GzKgQWDb2bHcHPtqvym7PxRRY5btfJnJkaBkN1SmlJF1vzLfDbZFZLBAoGBAPeGHNmy2DRHZzKD369+Ci0JKe2D0MGgVje5VDZ9MhJH8gyJNN8hQF2I/UCHDKNPq0/NEphtUeJxRwEgM4WxmQ2QPu9qFIzr8riuV7t4vasad0TdqcCTqRABdGtpAiN63/s1PdB4cYVA23OuDoypX6bdW0Eli48f/Pn4iJ9+u3i/AoGBANISe1bB9uP+TFxvJGRm/zmg6by7+O6920e/OPetht5GYF5N3LW7UAx8pZDYtuJPpTu/2zIZ+wQSz5V3BVrPQjA08lB0hBX7cM8k+E8DRqv8A7RFzJulEVCu1215i7fFqUf08nkfDBA7dErFtIjqvPah/RYYlHgJ9DMvmqcNqsMhAoGAepm9/oJcHoDjd5zkFZt7VNU+JDvvEYjmS5GLSbX3MCDcniLzwjVJGUs6DVUXCGj0tIEh3cgAEAYFomQdwPG3moVA9vr3FNnljl4kbGIgp/hi7QRSCWXaDmh6Dp2jholdGaNEa9bMe7ElQYYMBNX7372ybnE3T/wLJJFaso1mNCcCgYBX+bF5leWFedwU4d7FxXShd8graDVKFmyc0XJUF3Hh6Gs3UzhZS0as1A6qaHe+s0gpi6GKi+LZw973Y070xtObSLEqDIG8iv6lYYAz5tVT9Ui/2HNlw21K8s35ZOukXL0WC3j4TI5KxftfzQhcRqI4T4KkHEshMln4jbkguNKIwQKBgQCeut5jKMSowz1C8ZBK+6jvAh2F5J5Y+IQ5S9q1Zp3NtcCezeKgMfVL1JIrFgsBzyunrEHQSfAq7vLDxTuG+CJOm4FrEu/eMPAihPxnCd6yDjYI52uylo0Zp0/Ytw80tkUeNGi9Jua4vRDe2Sc8HcHHiF/ZE1f+lM/vt6EH2oKq+A==",

    //异步通知地址
    'notify_url' => "http://39.106.187.142/returnfalse",

    //同步跳转
    'return_url' => "http://39.106.187.142/returntrue",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvdIRRBObdWtlCCKIZmlFGLH6UbMIN5UdEMtTJsYSYFLwIE8pM0pedZ7mmoz+4LDVlmWnxiQrNpi2zfV6J3PVNeodhAHOkN5VFJwlLEnt4zRJqlww1WF4OKqU4mKALkVEJju+QvvsC6S0QM/gLJB3zJawYRnk0UQdx2LHhwivisYUbSSv+1qIIstom3iqq5V3ECkuAVBEAhE3PdL18o1R9klgiZpeDMRaH+w/XxqQPqvV8PSwG9GLlZ09vUXasGDNwH99RoFY6dCASvnnYEpjpfXRyRq5v0YGDfNYMnp7IyIpHiXvavG6Ewl+y8zIHqueD3iShGRmptY3zlx/Jasg6QIDAQAB",
];