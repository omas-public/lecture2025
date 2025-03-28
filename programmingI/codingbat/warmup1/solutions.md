# [warmup-1](https://codingbat.com/python/Warmup-1)

## Logic (ブール演算，算術演算 if statement)

### [sleep_in](https://codingbat.com/prob/p173401)

normal
```py
def sleep_in(weekday, vacation):
  if(not weekday or vacation):
    return True
  else:
    return False
```

good
```py
def sleep_in(weekday, vacation):
  return not weekday or vacation:
```

### [monkey_trouble](https://codingbat.com/prob/p120546)

normal
```py
def monkey_trouble(a_smile, b_smile):
  if((a_smile and b_smile) or ((not a_smile) and (not b_smile))):
    return True
  else:
    return False
```

good
```py
def monkey_trouble(a_smile, b_smile):
  return a_smile ==  b_smile
```

good
```py
def monkey_trouble(a_smile, b_smile):
  return not(a_smile ^  b_smile)
```


### [sum_double](https://codingbat.com/prob/p141905)

normal
```py
def sum_double(a, b):
  result = a + b
  if(a == b):
    result = 2 * result
  return result
```

good
```py
def sum_double(a, b):
  total = sum([a , b])
  return total * 2 if a == b else total
```

### [diff21](https://codingbat.com/prob/p197466)

normal
```py
def diff21(n):
  if n > 21:
    result = 2 * (n - 21)
  else:
    result = 21 - n
  return result
```
good
```py
def diff21(n):
 diff = abs(21 - n)
 return diff * 2 if n > 21 else diff 
```

### [parrot_trouble](https://codingbat.com/prob/p166884)

normal
```py
def parrot_trouble(talking, hour):
  if talking:
    if hour < 7 or hour > 20:
      return True
    else:
      return False
  else:
    return False
```

good
```py
def parrot_trouble(talking, hour):
  if  hour < 7 or hour > 20:
    return taking  
  return False
```

excellent
```py
def parrot_trouble(talking, hour):
  night = not ( 7 <= hour <= 20 )
  return night and talking
```

### [makes10](https://codingbat.com/prob/p124676)

normal
```py
def makes10(a, b):
  if a == 10 or b == 10 or a + b == 10:
    return True
  else:
    return False
```

good
```py
def makes10(a, b):
  return a == 10 or b == 10 or a + b == 10
```
excellent
```py
def makes10(a, b):
  total = sum([a,  b])
  return 10 in [total ,a ,b]
```

### [near_hundred](https://codingbat.com/prob/p12467)

normal
```py
def near_hundred(n):
  if abs(100 - n) <= 10 or abs(200 - n) <= 10:
    return True
  else:
    return False
```

normal
```py
def near_hundred(n):
  return abs(100 - n) <= 10 or abs(200 - n) <= 10
```

good
```py
def near_hundred(n):
  near100 = abs(100 - n) <= 10
  near200 = abs(200 - n) <= 10
  return (near100 or near200)
```

excellent
```py
def near_hundred(n):
  _diffn = lambda a: lambda n:  lambda m: abs(n - m) <=  a
  diff10 = _diffn(10)(n)
  hundreds = [100, 200]
  return any([diff10(n) for n in hundreds])
```

### [pos_neg](https://codingbat.com/prob/p124676)

normal 
```py
def pos_neg(a, b, negative):
  if negative:
    return (a < 0 and b < 0)
  else:
    return ((a < 0 and b > 0) or (a > 0 and b < 0))
```

good
```py
def pos_neg(a, b, negative):
  bothneg = a < 0 and b < 0
  posneg = a * b < 0

  return  (posneg and not negative) or (bothneg and negative)
```

excellent
```py
def pos_neg(a, b, negative):
  bothneg = lambda a, b :  all([v < 0 for v in [a, b]])
  posneg = lambda a, b:  a * b < 0

  return bothneg(a, b) if negative else posneg(a, b)
```


## String (文字列の切り出し，結合)


### [not_string](https://codingbat.com/prob/p189441) 

normal
```py
def not_string(str):
  a = str.split('not')
  if len(a) > 1 and a[0] == "" :
    return str
  else:
    return "not " + str
```

good
```py
def not_string(str):
  return  str if str.startswith('not') else 'not ' + str 
```

excellent
```py
def not_string(str):
  prefix = 'not'
  return  str if str.startswith(prefix) else f'{prefix} {str}' 
```

###  [missing_char](https://codingbat.com/prob/p149524)

normal
```py
def missing_char(str, n):
  return str[:n] + str[n + 1:]
```

good
```py
def missing_char(str, n):
  return str.replace(str[n],'',1)
```

### [front_back](https://codingbat.com/prob/p153599)

normal
```py
def front_back(str):
  if len(str) == 1:
    return str
  elif len(str) == 2:
    return str[1] + str[0]
  else:
    return str[-1:] + str[1: -1] + str[:1]
```

good
```py
def front_back(str):
 return str if len(str) <= 1 else str[-1] +  str[1: -1] + str[0]
```

excellent
```py
def front_back(str):
  try:
    head, body, tail = (str[0], str[1: -1], str[-1])
  except IndexError:
    return str
  finally:
    return str if len(str) < 2 else ''.join([tail, body, head])
```


### [front3](https://codingbat.com/prob/p147920) 

normal
```py
def front3(str):
  if len(str) < 3:
    return str + str + str
  else:
    return str[:3] + str[:3] + str[:3]
```

good
```py
def front3(str):
  return str[:3] * 3
```