  # コーディング指針

  ## コレクションやライブラリを使ったプログラミング

古典的な for や if をなるべく避ける(古典的な文法は教科書等のサンプルで十分かと)

bad

```py
for i in range(10):
  print(i + 1)
```

good

```py
result = [str(i + 1) for i in range(10)]
print('\n'.join(result))
```

good

```py
result = list(map(lambda i: str(i + 1), range(10)))
print('\n'.join(result))
```

good

```py
increment = lambda fun: lambda i: fun(i + 1)
result = list(map(increment(str), range(10)))
print('\n'.join(result))
```

---

bad

```py
x = 5
if x % 2 == 0:
  print('偶数です')
else :
  print('奇数です')
```

good

```py
x = 5
result = '偶数です' if x % 2 == 0 else '奇数です'
print(result)
```

good

```py
fun = lambda x: '偶数です' if x % 2 == 0 else '奇数です'

x = 5
print(fun(result))
```

good

```py
abstructfun = lambda fun, dic :lambda value:  dic.get(fun(value))
is_even = lambda x: x % 2 == 0
dictionary = {True:'偶数です', False:'奇数です'}

concretefun = abstructfun( is_even, dictionary)

x = 5
print(concretefun(x))
```

---

bad

```py
x = 0
for i in range(1, 11):
  x += i

print(x)
```

good

```py
result = sum([i for i in range(1, 10 + 1)])
print(result)
```

good

```py
add = lambda a,b: a + b
result = reduce(add, range(1, 10 + 1))
print(result)
```

---

## ミューテートはなるべく避ける

bad

```py
def push (array, new):
  array.append(new value)

array = [some values]
push(array,  new_value)
```

good

```py
def push(array, new):
  return [*array, new]

array = [some values]
result = push(array, new)
```

---

bad

```py
def shift(array, new):
  array.insert(0, new)
```

good

```py
def shift(array, new):
  return [new *array]
```

---

bad

```py
def delete (array, target):
  array.remove(target)
```

bad

```py
def delete (array, target):
  array.pop(array.index(target))
```

good

```py
def delete(array, target):
  return [value for value in array if value != target]
```

good

```py
def delete(array, target):
  return list(filter(lambda value != target, array))
```

---

bad

```py
def update(array, target, new):
  idx = array.index(target)
  array[idx] = new
```

good

```py
def update(array, target, new):
  idx = array.index(target)
  return [array[0:idx], new,  array[idx + 1:]]
```

good

```py
def update(array, target, new):
  idx = array.index(target)
  return [new if i == idx else v for i, v in enumerate(array)]
```

good

```py
def update(array, target, new):
  return list(map(lambda value: new if value == target else value))
```

---
