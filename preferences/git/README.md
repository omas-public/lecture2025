# Git & GitHub

## Git

### Official Web Site

- [Git](http://git-scm.com/)

### [Install](http://git-scm.com/download/linux)

\* Vagrant の仮想マシンには標準で入っているので Install の必要はない

```bash
sudo apt update
sudo apt install git
```

### [Configration](http://git-scm.com/book/ja/Git-%E3%81%AE%E3%82%AB%E3%82%B9%E3%82%BF%E3%83%9E%E3%82%A4%E3%82%BA-Git-%E3%81%AE%E8%A8%AD%E5%AE%9A)

```bash
git config --global user.email "メールアドレス"
git config --global user.name  "ローマ字表記の名前"
git config --global color.ui auto
git config --global core.editor  "nvim"
git config --global init.defaultBranch main
```

## GitHub & GitHubPage

### Official Web Site

- [GitHub](https://github.com)

### Registration

- [sign up](https://github.com/)
  - username
  - email address
  - password
  - confirm(メールから)

### Create GitHub Repository

[sign in](https://github.com/)

- Create New repository
  - repository name
  - check initialize

```bash
git clone https://github.com/USERNAME /REPOSITORY
cd REPOSITORY
echo "<!doctype html><h1>Hello world!</h1>" > index.html
git add index.html
git commit -m "create first html page"
git push -u origin master
```

### References

#### [Git]

- [Git とは](http://ja.wikipedia.org/wiki/Git)
- [Git Document](http://git-scm.com/documentation)
- [サルでもわかる Git 入門](http://www.backlog.jp/git-guide/)

#### [Github & GitHubPages](https://github.com)

- [GitHub とは](http://ja.wikipedia.org/wiki/GitHub)
- [GitHub 入門](http://qiita.com/ongaeshi/items/4272209ad80380933000)
- [GitHubPages](https://pages.github.com/)
