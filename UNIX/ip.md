# IP Address

IP アドレス(Internet Protocol Address)は、IP ネットワーク上の情報機器を識別するために指定するネットワーク層における識別用の番号であり，version 4 では 32bit, version 6 では 128bit のアドレス空間が付与されている。
IPv4 では，32bit を 8bit(1 オクテット)ごとに区切った 10 進数で表す。

アドレス空間 0 - 4294967295 python3 -c "print(2 \*\* 32)"

| 2 進数                           | 10 進数         | 16 進数     |
| -------------------------------- | --------------- | ----------- |
| 00000000000000000000000000000000 | 0.0.0.0         | 0.0.0.0     |
| 11111111111111111111111111111111 | 255.255.255.255 | FF.FF.FF.FF |

例 `python3 -c "print(bin(192), hex(192))"`
| | | | |
| ------ | ------ | ------ | ------ |
|11000000|10101000|00000000|00000001|
|192 |168 |0 |1 |
|0xc0 |0xa8 |0x00 |0x01 |

## IP クラス

- 32bit のアドレスを半分に分割 (上位 1bit が**0**) Class A
  - 00000000 -> 01000000
  - 0 -> 127
  - 0x0 -> 0x7F
- 残りの半分を更に分割(上位 2bit が**10**) Class B
  - 10000000 -> 10111111
  - 128 -> 191
  - 0x80 -> 0xBF
- 残りの半分を更に分割(上位 3bit が**110**) Class C
  - 11000000 -> 1101111
  - 192 -> 223
  - 0xC0 -> 0xDF
- 残りの半分を更に分割(上位 4bit が**1110**) Class D
  - 11100000 -> 11101111
  - 224 -> 239
  - 0xE0 -> 0xEF

## Private IP Address

LAN などの企業内ネットワークに存在する端末が、自由に使用できる IP アドレスのこと。自ネットワーク内でのみ一意であるため、ほかのネットワークでは同じプライベートアドレスが利用されている可能性がある。

- Class A 10.0.0.0/8
- Class B 172.16.0.0/12
- Class C 192.168.0.0/16

### note

ClassB のネットワーク(172.16.0.0/12)

|               | 第一オクテット | 第二オクテット | 第三オクテット | 第四オクテット |
| ------------- | -------------- | -------------- | -------------- | -------------- |
| NetworkAdress | 172            | 16             | 0              | 0              |
| NetworkAdress | 10101100       | 0001 0000      | 00000000       | 00000000       |
| BitMask       | 11111111       | 1111 0000      | 00000000       | 00000000       |
| BroadCast     | 10101100       | 0001 1111      | 11111111       | 11111111       |
| BroadCast     | 172            | 31             | 255            | 255            |
