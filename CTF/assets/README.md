# 情報セキュリティ講習用定番CTF

### tsaitoh が作った CTF 問題サーバのファイル群

CTFの問題の準備
~~~
$ cd public_html
$ git clone https://github.com/tohrusaitoh/ctf.git
~~~

### FileによるCTFもどき

[演習の際のテキスト](https://www.ei.fukui-nct.ac.jp/2020/11/19/linux-file-access-2020/)

Linux のファイルコマンドに慣れるためのFileによるCTFもどき

ディレクトリへのリンクで無限にディレクトリの中に入るPATH
が仕掛けてあるので tar.gz で配布。
~~~
$ cd /home/
$ sudo tar zxvf ..PATH../ctf/Challenge.tar.gz
~~~

#### Task5 bomb の下準備

Challenge/1-CTF.d/Task5/bomb には、"killall -KILL bash"の書いてある
cat,ls,less,lv,more,nkf を置いてある。これに引っかかるように、
演習参加者の .bashrc には、以下を仕込んでおく。
~~~
# もし file:PathTrap があったら、危険なPATHになるように設定
if [ -r ..PATH../Challenge/PathTrap ]; then
    export PATH=.:/usr/bin:/bin
fi
~~~

### telnet localhost echo の準備

~~~
((( inetd インストール)))
$ sudo apt-get install inetutils-inetd
$ sudo vi /etc/inetd.conf
echo stream tcp nowait <<USERID>> ..PATH../ctf/inetd-echo.sh

((( inetd 再起動 )))
$ ps ax | grep inetutils-inetd
$ sudo kill -HUP inetutils-inetd のプロセス番号

((( 接続実験 )))
$ telnet localhost echo
or $ telnet localhost 7
~~~

