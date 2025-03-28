# [warmup-1](https://codingbat.com/python/Warmup-1)

## Logic (ブール演算，算術演算 if statement)

### [sleep_in](https://codingbat.com/prob/p173401)

> The parameter weekday is True if it is a weekday, and the parameter vacation is True if we are on vacation. We sleep in if it is not a weekday or we're on vacation. Return True if we sleep in.

引数(weekday)が False のとき または 引数(vacation)が True の時 True を返しそれ以外は False を返す関数 sleepin を作成せよ

- if文を用いて作成せよ
- ブール演算で作成せよ(if文を使わない)

### [monkey_trouble](https://codingbat.com/prob/p120546)

> We have two monkeys, a and b, and the parameters a_smile and b_smile indicate if each is smiling. We are in trouble if they are both smiling or if neither of them is smiling. Return True if we are in trouble.

引数(a_smile, b_smile) が ともに True または 引数(a_smile, b_smile) が ともにFalse の時 True を返しそれ以外は False を返す関数 monkey_trouble を作成せよ

- if文を用いて作成せよ
- ブール演算を用いて作成せよ(if文を使わない)

### [sum_double](https://codingbat.com/prob/p141905)

> Given two int values, return their sum. Unless the two values are the same, then return double their sum.

引数(a, b) の合計を返す関数 sum_double を作成せよ，但し a と b が等しいときは 合計を2倍にして返せ

- if文を用いて作成せよ

### [diff21](https://codingbat.com/prob/p197466)

> Given an int n, return the absolute difference between n and 21, except return double the absolute difference if n is over 21.

整数 n が与えられる，n と 21 の差を絶対値で返せ，ただし n が 21より大きい場合は 絶対値をを2倍にして返せ

- if文を用いて作成せよ
- (abs関数を用いて作成せよ)[https://www.google.com/search?q=python3+abs&oq=python3+abs&aqs=chrome..69i57j0l7.11013j0j9&sourceid=chrome&ie=UTF-8]

### [parrot_trouble](https://codingbat.com/prob/p166884)

> We have a loud talking parrot. The "hour" parameter is the current hour time in the range 0..23. We are in trouble if the parrot is talking and the hour is before 7 or after 20. Return True if we are in trouble.

引数 talking が True かつ 引数 hour が 7未満 または 20より大きい時 True を返し それ以外のときは False を返す関数 parrot_trouble を作成せよ

- if文を用いて作成せよ
- ブール演算で作成せよ(if文を使わない)

### [makes10](https://codingbat.com/prob/p124676)

> Given 2 ints, a and b, return True if one if them is 10 or if their sum is 10.

2つの整数 a, bが与えられる。 どちらかが10と等しいとき または 合計が10の時は True を返せ

- if文を用いて作成せよ

### [near_hundred](https://codingbat.com/prob/p12467)

> Given an int n, return True if it is within 10 of 100 or 200. Note: abs(num) computes the absolute value of a number.

intの引数(n)と100または200の差分の絶対値が10以内なら Trueを返しそれ以外はFalse を返す関数 near_hundred を作成せよ

- if文を用いて作成せよ
- ブール演算で作成せよ(if文を使わない)

### [pos_neg](https://codingbat.com/prob/p124676)

> Given 2 int values, return True if one is negative and one is positive. Except if the parameter "negative" is True, then return True only if both are negative.

intの引数(a, b)の一方が正の数(Positive)，もう片方の数が負の数(Negative)のときに True を返す関数 pos_neg を作成せよ。 但し 引数 negative が True のときは a,b がともに 負の数(Negative)のときだけ True を返せ

- if文を用いて作成せよ
- ブール演算で作成せよ(if文を使わない)

## String (文字列の切り出し，結合)


### [not_string](https://codingbat.com/prob/p189441) 

> Given a string, return a new string where "not " has been added to the front. However, if the string already begins with "not", return the string unchanged.

stringの引数(str) が 'not' で開始していない場合は 先頭に 'not ' を付け加えて返せ それ以外のときはそのまま引数を返せ

- if文 と 文字列のスライスを使用せよ

###  [missing_char](https://codingbat.com/prob/p149524)

> Given a non-empty string and an int n, return a new string where the char at index n has been removed. The value of n will be a valid index of a char in the original string (i.e. n will be in the range 0..len(str)-1 inclusive).

空ではないstringの引数(str) と intの引数(n)が与えられる str の n 番目の文字を削除した 文字列を返せ

- 文字列のスライスを使用してindexの前と後ろの文字を取り出し合成

### [front_back](https://codingbat.com/prob/p153599)

> Given a string, return a new string where the first and last chars have been exchanged.

stringの引数(str) の 最初の文字と最後の文字を交換した文字列を作成して返せ

- 文字列のスライスを使用して一文字めと最後の文字を取り出す

### [front3](https://codingbat.com/prob/p147920) 

> Given a string, we'll say that the front is the first 3 chars of the string. If the string length is less than 3, the front is whatever is there. Return a new string which is 3 copies of the front.

stringの引数(str)の先頭3文字を取り出し，3回コピーした文字列を作成して返せ，但しstrが3文字未満ならそのまま返せ

- 文字列のスライスを使用，if文で判定
