# UNIX Commands & vi

## KeyBind

本校では，1 年生のはじめに Bash のキーバインドは学習しているが，あまり使いこなせていないように見受けられる。
keybind を使いこなすことで作業時間の短縮になる，覚え方のコツとしては
関連するキーバインドをセットで覚えると良い。

また Bash は標準では，emacs エディタの keybind が使われているが
`set -o vi` で vi の KeyBind に変更することもできるので ，好みで使い分けると良い。

- C-b / C-f (カーソルを一文字 左/右に移動)
- C-h / C-d (一文字削除 左/右)
- M-b / M-f (カーソルを一単語 左/右に移動)
- C-w / M-d (一単語削除 左/右)
- M-C-] char / C-] char (カーソルより左/右 の char に移動)
- C-u / C-k (カーソルより左/右を削除)
- C-a / C-e (カーソルを行頭/行末に移動)
- C-p / C-n (Command history を前/後に)
- C-r / M-p (履歴から検索)
- C-t (一文字入れ替え)
- M-. (直前のコマンドの引数を入力)

## Network Command

- hostname
- ping
  - ping -c [count]
- tracepath(traceroute)
- ip(ifconfig)
  - ip address show(ip -a)
  - ip link set [devname] (up|down)
  - ip address add 192.168.1.254/24 dev [devname]
  - ip route add default via 192.168.1.254 dev [devname]
- ss(netstat)
  - ss -atn
  - ss -lp
  - ss -ntr
  - ss -pantu
- tcpdump
  - tcpdump -i [devname]
  - tcpdump host [target_ip]
  - tcpdump port [port_num]
  - tcpdump host 192.168.56.102 and port 80
- dig(nslookup)
  - dig www.it-college.ac.jp
  - dig ns std.it-college.ac.jp
  - dig mx std.it-college.ac.jp
  - dig -x 8.8.8.8

## Process

- ps
- kill
- &
- ^Z
- jobs
- fg
- bg
- free
- top

## vi

[vim tutor](https://gist.github.com/omas-public/d713308c82ec3bf69fc2f1024b399a31)

- char
- word
- sentence
- paragraph

### Motion

| Direction | Key                              |
| --------- | -------------------------------- |
| Upper     | k \# **) } ?** ^U ^B **gg**      |
| Left      | 0 ^ F B b h                      |
| Right     | e w E W **f** $                  |
| Bottom    | Enter j \* **( { /** ^D ^F **G** |

### InsertMode

| Direction | Key           |
| --------- | ------------- |
| Upper     | O             |
| Left      | I i           |
| Right     | a R c C s S A |
| Bottom    | o             |

### CommandMode

#### range

- n
- n, m
- ., .+- n
- /RE/

#### command

- [range]s/old/new/[g]
- [range]s/^.\*\\(RE\\).\*$/\1/
- [range]d
- e filename
- e #
- !python3 %

#### vi tricks

- :help command
- ~
- r
- xp
- ddp
- /searchword[enter]cw[replaceword]ESCn.n.

### Script

#### Python でシェルプログラム

os モジュールを使う方法

```py
import os
command = 'ls -al'
os.system(command)
```

subprocess モジュールを使う方法

```py
from subprocess import run
output = run(["ls", "-al" ], capture_output=True, text=True)
print(output.stdout)
```

より使いやすくしてみる

```py
from subprocess import run, PIPE

# util abstruct function with lambda
command = lambda command, *fix_args:  lambda *args:  run([command, *fix_args, *args], capture_output=True, text=True)

# concrete function
stdout = lambda process: print(process.stdout)
ping1 = command('ping', '-c1')

# test code
output = ping1('localhost')
print(output)

# loop code
addresses = [f'192.168.56.{i}' for i in range(1,10)]
for address in addresses:
  stdout(ping1(address))
```
