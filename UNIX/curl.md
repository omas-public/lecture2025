# curl

## sample

simple pattern
```sh
$ URI=https://www.it-college.ac.jp
$ curl $URI
```

exercise

```sh
$ URI=https://www.w.oncejapan.com/photo
$ curl $URI/?page=[1-7] \
| grep '<img  src="https://' \
| tr -d '\t' \
> index.html
$ google-chrome index.html
```

```sh
$ URI=https://www.nihongo-pro.com/jp/kanji-pal/list/jlpt/N1
$ curl $URI \
| grep 'span class="kanji_clickable"' \
| sed -e 's/<span [^>]*>\(.\)<\/span>/\1/g' \
| sed -e 's/<[^>]*>//g' \
| sed -e 's/[x00-x7F]//g' \
| sed -n '1p' \
| tr ' ' ','
```

use method
```sh
$ URI = https://www.it-college.ac.jp
$ curl -X GET $URI
$ curl -X POST -d "user=foo&passwd=bar" $URI
$ curl --json '{"user":"foo", "password":"bar"}' $URI
```

response header
```sh
$ URI=https://www.it-college.ac.jp
$ curl -I $URI
```

download
```sh
$ URI=https://piapro.net/images/ch_img_miku.png
$ curl -O $URI 
```

use cookie
```sh
$ URI=https://www.it-college.ac.jp
$ COOKIE=cookies.txt
$ curl -c $COOKIE $URI
$ less $COOKIE
$ curl -b $COOKIE $URI
```


## Server

[Simple HTTP Server(on Python)](../web/getpost.py)
```py
from http.server import BaseHTTPRequestHandler, HTTPServer
from urllib.parse import parse_qs, urlparse

class CustomHTTPRequestHandler(BaseHTTPRequestHandler):

    def do_GET(self):
        self.send_response(200)
        self.send_header('Content-type', 'text/plain; charset=utf-8')
        self.end_headers()
        body = f'GET:{urlparse(self.path).query}'
        self.wfile.write(body.encode())

    def do_POST(self):
        self.send_response(200)
        self.send_header('Content-Type', 'text/plain; charset=utf-8')
        self.end_headers()
        body = f'POST:{self.rfile.read(int(self.headers["content-length"])).decode("utf-8")}'
        self.wfile.write(body.encode())

PORT = 8000
SERVER = 'localhost'

server_address = (SERVER, PORT)
httpd = HTTPServer(server_address, CustomHTTPRequestHandler)
httpd.serve_forever()
```

[Simple HTTP Server(on NodeJS)](../web/getpost.js)
```js
const PORT = 8000
const server = require('http') .createServer((req, res) => {
  res.setHeader('Set-Cookie', `last_access=${Date.now()};`);
  res.writeHead(200, {"Content-Type": "text/plain"})
  if (req.method == 'GET') {
    const body = ['get', req.headers.cookie, req.url.split('?').at(1)]
    res.end(body.join('\n'))
  }
  if (req.method == 'POST') {
    const body = ['post', req.headers.cookie]
    req.on('data', chunk => body.push(chunk))
    req.on('end', ()  => res.end(body.join('\n')))
  }
})
server.listen(PORT)
```