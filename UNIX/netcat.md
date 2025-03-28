# netcat

## echo server

server

```sh
$ PORT=5555
$ nc -l -p $PORT
```

client

```sh
$ PORT=5555
$ HOSTNAME=192.168.56.101
$ nc $HOSTNAME $PORT
```

## remote server

server

```sh
$ PORT=5555
$ SHELL=/bin/bash
$ nc -l -p $PORT -e $SHELL
```

client

```sh
$ HOSTNAME=192.168.56.101
$ PORT=5555
$ nc $HOSTNAME $PORT
> cd ~/Desktop
> touch {a..z}{1..9}.log
> ^C
```

## port scan

client

```sh
$ HOSTNAME=192.168.56.101
$ PORT=5555
$ nc -zv $HOSTNAME $PORT
```

## file transfer(redirect)

server

```sh
$ PORT=5555
$ FILE='infile'
$ nc -l -p $PORT > FILE
```

client

```sh
$ PORT=5555
$ HOSTNAME=192.168.56.101
$ FILE='/etc/passwd'
$ nc $HOSTNAME $PORT < FILE
$ ^C
```

## HTTP

- rfc1945 [HTTP1.0](https://datatracker.ietf.org/doc/html/rfc1945#section-10.8)
- rfc9110 [HTTP/1.1 および HTTP/2](https://tex2e.github.io/rfc-translater/html/rfc9110.html)

http server

```sh
$ PORT=8000
$ python3 -m http.server $PORT
>
```

client

```sh
$ PORT=8000
$ SERVER=192.168.56.101
$ nc $SERVER $PORT
> GET / HTTP/1.0
> CRLF
> CRLF
```

request-header

```sh
$ nc www.it-college.ac.jp 80
> GET / HTTP/1.1
> HOST:www.it-college.ac.jp
> REFERER:x.com
> USER-AGENT:hoge
> CRLF
> CRLF
```

## Mail

- rfc5321[smtp](https://datatracker.ietf.org/doc/html/rfc5321)
- rfc1939 [pop3](http://srgia.com/docs/rfc1939j.html)

メイル送信

```sh
$ MAIL_SERVER=192.168.56.101
$ PORT=25
$ nc $MAIL_SERVER $PORT
> EHLO
> MAIL FROM: <送信元のメイルアドレス>
> RCPT TO: <送信先のメイルアドレス>
> DATA
> メッセージを書くところ，何行書いてもよいがEOFは改行してピリオドを打つ
> .
> QUIT
```

メイルを読む

```sh
$ MAIL_SERVER=192.168.56.101
$ PORT=110
$ nc $MAIL_SERVER $PORT
> USER ユーザー名
> PASS ユーザーのパスワード
> STAT
> LIST
> RETR メールの番号
> DEL メールの番号
> QUIT
```
