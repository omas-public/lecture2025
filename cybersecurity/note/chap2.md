# Chapter2 仮想環境によるハッキングラボの構築

## 2-1 ハッキングを学ぶ方法は色々

重要度 ☆☆

- 本(日本語の書籍は少ない)
- 動画コンテンツ
- Web ページ
- 勉強会(沖縄にもいくつかのグループがある)
- CTF(重要)

VulnHub および Metaspoittable

## 2-2 仮想化とは

### 仮想化ソフト分類

重要度 ☆☆☆

- ホスト OS 型(VirtualBox など，個人で使う)
- コンテナ型(Docker など，個人で使う)
- ハイパーバイザ型(ネットワークのお仕事はこれを使う)

## 2-3 ハッキングラボで VirtualBox を採用する理由

重要度 ☆☆☆

Host と Guest の関係を知り，IP アドレスを抑える

## 2-4 VirtualBox のインストール

重要度 ☆☆

Linux では APT でインストールできる，もちろん公式のインストーラからでも可

## 2-5 VirtualBox の基本設定

重要度 ☆☆

- Extension Pack のインストール

## 2-6 攻撃用 OS としての KaliLinux と ParrotOS

重要度 ☆☆

Linux ディストリビューションとは何かを知り，攻撃用端末向けの Linux を知る

## 2-7 VirtualBox に ParrotOS をインストールする

重要度 ☆☆☆

エキスパートモードを使用して設定するべきところを理解する

- HardDisk 容量
- メモリ& CPU&ヴィデオメモリの設定

## 2-8 初めての ParrotOS

重要度 ☆☆

まずは VirtualBox の Host キー理解とパッケージを APT でアップグレードできればよい

### OS のセキュリティ機構

重要度 ☆☆☆

- SELinux(disable)
- AppArmer(実験のみ)
- iptable & ufw(disable)

## 2-9 ParrotOS のネットワーク設定

### VirtualBox におけるネットワークの種類

重要度 ☆☆☆

#### 重要ポイント

- VirtualBox でのネットワークのセッティングができるようにする
- ParrotOS の IP セッティングができるようにする

#### ネットワーク基礎を速習する(P102)

重要度 ☆☆☆

それぞれ説明できること

#### VirtualBox におけるネットワークの種類(P109)

重要度 ☆☆☆

VirtualBox は様々なネットワークをサポートしているが，Nat と HostOnly をつかう

#### 本書における ParrotOS のネットワーク構成(P115)

重要度 ☆☆

教科書では Nat と HostOnly を使い分けているが，両方バインドしていてもよい

#### ParrotOS を HostOnlyNetwork に接続するよう設定する(P117)

重要度 ☆☆☆

静的アドレスの設定の仕方はいくつかあるが，旧来のやり方と NetworkManager 経由のやりかたとを理解して設定できるようにする，GUI は特に覚える必要はない
