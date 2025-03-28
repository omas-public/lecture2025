# [warmup-2]https://codingbat.com/python/Warmup-2)

## String, Loop, List

### [string_times](https://codingbat.com/prob/p193507)

> Given a string and a non-negative int n, return a larger string that is n copies of the original string.

引数str と 正の整数 n が与えられる。 もとの str を n 回 コピーした 文字列を返せ 

- for loop を使って文字の結合
- [itertools.repeat 関数を使う](https://www.google.com/search?q=iterator+repeat+python&oq=iterator+repeat+&aqs=chrome.1.69i57j0l7.7317j0j7&sourceid=chrome&ie=UTF-8)

### [front_times](https://codingbat.com/prob/p165097)

> Given a string and a non-negative int n, we'll say that the front of the string is the first 3 chars, or whatever is there if the string is less than length 3. Return n copies of the front;

引数(str)の最初の3文字を 引数(n)回コピーした文字列を作成して返せ ただしstrが3文字未満ならそのまま返せ

- 文字列のスライス
- 文字列の掛け算
- 文字列の長さ

### [string_bits](https://codingbat.com/prob/p165097)

> Given a string, return a new string made of every other char starting with the first, so "Hello" yields "Hlo".

引数(str)の偶数番目の文字を取り出して合成した文字列を返せ

- 文字列のスライス(第3引数)

### [string_splosion](https://codingbat.com/prob/p118366)

> Given a non-empty string like "Code" return a string like "CCoCodCode".

文字列を1文字(C),1文字から2文字(Co),1文字から3文字(Cod)...結合して返す

- list slice
- for loop

### [last2](https://codingbat.com/prob/p145834)

> Given a string, return the count of the number of times that a substring length 2 appears in the string and also as the last 2 chars of the string, so "hixxxhi" yields 1 (we won't count the end substring).

最後の2文字と一致する2文字の回数を返す

- list slice (negative n)
- loop

### [array_count9](https://codingbat.com/prob/p166170)

> Given an array of ints, return the number of 9's in the array.

リストに9がいくつ含まれているかカウントを返す

### [array_front9](https://codingbat.com/prob/p110166)

> Given an array of ints, return True if one of the first 4 elements in the array is a 9. The array length may be less than 4.

リストの4番目以内の要素に9が含まれているか 真偽値を返せ


### [array123](https://codingbat.com/prob/p193604)

> Given an array of ints, return True if the sequence of numbers 1, 2, 3 appears in the array somewhere.

リストの要素の中に 1,2,3 が 順番に含まれているか 真偽値を返せ

### [string_match](https://codingbat.com/prob/p182414)

> Given 2 strings, a and b, return the number of the positions where they contain the same length 2 substring. So "xxcaazz" and "xxbaaz" yields 3, since the "xx", "aa", and "az" substrings appear in the same place in both strings.

2つの文字列が与えられる。 同じ場所に位置する2文字をカウントして返せ

