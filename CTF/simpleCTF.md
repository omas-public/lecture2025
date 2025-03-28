# [Simple Capture The Flag](https://tsaitoh.net/~t-saitoh/ctf/)

## 1. 暗号・コーディング系

- [1.1 簡単な暗号](https://tsaitoh.net/~t-saitoh/ctf/simple-encryption.txt)
  - [rot13](https://ja.wikipedia.org/wiki/ROT13)
  - [tr](<https://ja.wikipedia.org/wiki/Tr_(UNIX)>)
  - [programming](./assets/rotate.js)
- [1.2 闇夜の烏](https://tsaitoh.net/~t-saitoh/ctf/crow-in-the-night.html)
  - [curl](https://qiita.com/yasuhiroki/items/a569d3371a66e365316f)
  - html2text
- [1.3 なんて書いてある(フォークダンス)](https://tsaitoh.net/~t-saitoh/ctf/mime-mime.txt)
  - [base64](https://ja.wikipedia.org/wiki/Base64)
  - nkf, iconv
- [1.4 ともだちになればわかる](https://tsaitoh.net/~t-saitoh/ctf/poke.jpg)
  - QR code, smartPhone
- [1.5 なぞのもじ](https://tsaitoh.net/~t-saitoh/ctf/unknown.php)
  - curl , tr, Programming
- [1.6 メールが届いたよ](https://tsaitoh.net/~t-saitoh/ctf/EML.txt)
  - MIME, base64, display

## 2. ファイル系

- [2.1 拡張子を信用してはいけない](https://tsaitoh.net/~t-saitoh/ctf/never-believe-ext.docx)
  - file, strings
- [2.2 画像が隠れているよ](https://tsaitoh.net/~t-saitoh/ctf/omanjyu2.docx)
  - file, strings, unzip
- [2.3 "正方形"の画像(答えは dummy のはずがない)](https://tsaitoh.net/~t-saitoh/ctf/real-size-256x256.gif)
  - [gif format](https://www.setsuki.com/hsp/ext/gif.htm)
  - file, xxd, vi

## 3. Web 技術系

- [3.1 バックアップファイルに注意しよう](https://tsaitoh.net/~t-saitoh/ctf/beware-dot-bak-file.php)
  - curl
- [3.2 URL トラバーサル](https://tsaitoh.net/~t-saitoh/ctf/url-traversal.php)
  - curl
- [3.3 SQL の基本](https://tsaitoh.net/~t-saitoh/ctf/sql-injection.php)
  - sql injection
- [3.4 本当のクッキーを食べさせて](https://tsaitoh.net/~t-saitoh/ctf/eat-real-cookie.php)
  - curl cookie
- [3.5 あなたは既に答えを受け取っている](https://tsaitoh.net/~t-saitoh/ctf/you-already-know.php)
  - curl response header
- [3.6 あなたはどんな端末からアクセスしていますか?](https://tsaitoh.net/~t-saitoh/ctf/i-love-netscape-agent.php)
  - curl request header
- [3.7 直接アクセスしてね](https://tsaitoh.net/~t-saitoh/ctf/no-referer.php)
  - curl request header

### 4. プログラム作成系

- [4.1 フラグは何？(flag is xxx を FLAG{xxx}で答えよ)](https://tsaitoh.net/~t-saitoh/ctf/morse-text.txt)
  - モールス信号
  - https://morse.ariafloat.com/en/
- 4.2 フィボナッチ数 fib(100) の末尾 10 桁を FLAG{xxxxxxxxxx} 形式で答えよ ただし、fib(1)=1,fib(2)=1 とする
  - フィボナッチ数
  - programing
- [4.3 数字 4 桁のパスワードを答えてください](https://tsaitoh.net/~t-saitoh/ctf/brute-force-pin4.php)
  - curl
  - ページにヒントがあるので 0000 番からのブルートフォースはやめてね
- [4.4 英大小+数字の 5 桁のパスワードを答えてください](https://tsaitoh.net/~t-saitoh/ctf/simple-crypt-is-insecure.php)
  - サイトではなくローカルで総当りしてね

### 5. インターネット系

- 5.1 capture-the-flag.tsaitoh.net というドメインの flag=XXXXX という形式の情報を FLAG{XXXXX} 形式で答えよ
  - dig
- [5.2 うしろを見ろ(答えはローマ字小文字 FLAG{xxx} .co.jp とする)](https://tsaitoh.net/~t-saitoh/ctf/i-like-this-noodle.jpg)
  - exif

### 6. OS 系

- 6.1 プログラムを動かして情報を探せ
  - [elf-x86-64](elf-x86-64) [elf-x86-64](elf-x86-64-gdb)
- [6.2 言語オタクにしか読めない](https://tsaitoh.net/~t-saitoh/ctf/whitespace.ws_.txt)
- 6.3 プログラムを動かして情報を探せ(2)
  - [](elf-x86-64)
