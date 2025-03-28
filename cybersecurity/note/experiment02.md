## EXPERIMENT #2 DC-1 のハッキング(p380)

事前学習

- 標準入出力
- パイプ，リダイレクト
- 疑似デバイスファイル，ナルデバイス
- Metasploit

Haking Skill

- SCAN
  - fping
  - nmap
  - Droopescan
- INVESTIGATION
  - robots.txt
- INVASION
  - Exploit Database, Metasploit, TTY shell
- Privilege escalation
  - SUID, Take Over via find

## 明示的な入出力と暗黙な入出力を理解する(p380)

暗黙な入出力の理解と標準入力(0)，標準出力(1)，標準エラー出力(2)
それぞれの番号とファイルを知る

## 標準入力(p381)

Unix では Keyboard，Terminal，File は データストリームとして扱われる
標準出力は，コマンドが成功した時に画面に出力される

ターミナルを 2 つあげて /dev/stdin の実体を確認せよ

```sh
$ ll /dev/stdin
> /proc/self/fd/0

$ ll /proc/self/fd/0
> /dev/pts/1
```

```sh
$ ll /dev/stdin
> /proc/self/fd/0

$ ll /proc/self/fd/0
> /dev/pts/2
```

### リダイレクトで標準出力をファイルに保存する(P382)

リダイレクトを使うと出力先を変えられる

```sh
$ command > file    #上書き
$ command >> file # 追記
```

### ファイル記述子を意識する(P382)

ファイル記述子(ファイルディスクリプタ)の記述方法で
標準出力番号や標準入力番号は省略することができる

```sh
$ cat  1> output1.txt
>Hello.
> C-d
 $ cat > output2.txt
>Hello.
> C-d
$ diff output1.txt output2.txt
> 違いなし
```

## 標準エラー出力とは(p383)

標準エラー出力はエラーメッセージ等を出力する
通常は標準出力と同じ場所に出力されるので，違いを理解すること
