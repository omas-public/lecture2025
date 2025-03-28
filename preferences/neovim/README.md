# Install & setting neovim

## [Install Now](https://github.com/neovim/neovim/blob/master/INSTALL.md)

```sh
sudo apt update
sudo apt install neovim
```

## setting configure files

```sh
mkdir -p ~/.config/nvim
cp -r  ./conf/*.vim ~/.config/nvim/
nvim
```

## vim tutor lang helper

```sh
mkdir ~/bin
cp tutor/tutor.sh ~/bin
export PATH=$PATH:$HOME/bin
tutor.sh
```

## [nvim-gist](https://github.com/rudylee/nvim-gist)

### Git initial config

[Git の初期設定(終わっていない方向け)](../git/README.md)

### Generate Github personal access token

Before you can use this plugin, you need to create a Github personal token so the plugin can create and access your gists.

You can visit https://github.com/settings/tokens to generate a new token. Make sure the token has access to create a gist.

### Add personal access token to the plugin

Run the GistList command in your neovim

```
:GistList
```

When you run the list command for the first time, the plugin will ask you to enter the Github username and personal access token.

### Usage

#### List gists

```
:GistList
```

#### Save current buffer to Gist

```
:GistCreate
```

### Make Public

file: ~/.config/nvim/plugged/nvim-gist/rplugin/python3/\_\_init\_\_.py
標準で Public 設定になるように 上記ファイル 80 行目の GistCreate Function に 3 行追加する
[ファイル全体](./gist-nvim/__init__.py)

```py
    def GistCreate(self):
        auth_config = self.get_auth_config()

        parse_buffer_name = re.search('gist:(.*)\/(.*)', self.vim.current.buffer.name)

        if parse_buffer_name:
            gist_id = parse_buffer_name.group(1)
            filename = parse_buffer_name.group(2)

            self.GistSave([gist_id, filename])
        else:
            content = '\n'.join(self.vim.funcs.getline(1, '$'))

            self.vim.command('call inputsave()')
            self.vim.command("let nvim_gist_filename = input('Enter the filename: ')")
+					self.vim.command("let nvim_gist_description = input('Enter the description: ')")
            self.vim.command('call inputrestore()')

            self.vim.command('echo "Creating gist..."')

            payload = {
+             "description" : self.vim.vars["nvim_gist_description"],
+             "public" : "true",
                "files" : {
                    self.vim.vars["nvim_gist_filename"]: {
                        "content": content
                    }
            		}
            }
```

## Install linter & formatter for python

Python を使う場合の設定

```sh
sudo apt install pipx
pipx install flake8 autopep8 black isort
echo 'export PATH=$PATH:$HOME/.local/bin' >> ~/.bash_aliases
source ~/.bash_aliases
```

## Install VOLTA(node version manager)

javascript を使う場合の追加設定

### [getting started](https://docs.volta.sh/guide/getting-started)

```sh
curl https://get.volta.sh | bash
echo -e 'export VOLTA_HOME=$HOME/.volta\nexport PATH=$PATH:$VOLTA_HOME/bin' >> ~/.bash_aliases
source ~/.bash_aliases
volta install node
node --version
npm --verson
```

#### npm upgrade

```sh
npm install npm # show latest version
npm install npm@11.x.x
```

### Install linter and formatter for node

```sh
npm install -g standard prettier-standard
```
