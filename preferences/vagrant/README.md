Vagrant
===========

Official Web Site
-----------------

- [Vagrant](https://www.vagrantup.com/)

Install
-------

- [開発環境の構築・共有を簡単にするVagrant入門](https://thinkit.co.jp/story/2015/03/19/5740)

### Download

- [Vagrant](https://www.vagrantup.com/downloads.html)

### Install

```bash
sudo apt install virtualbox vagrant
```

Settings & Configiration
------------------------

構築，開始，ログイン
```bash
mkdir -p ~/Boxes/仮想マシン名 && cd $_
vagrant init --minimal  hashicorp-education/ubuntu-24-04
vagrant up
vagrant ssh
```

終了コマンド
- vagrant halt (環境を残す場合)
- vagrant destory (環境を残さない場合)
