# [warmup-2]https://codingbat.com/python/Warmup-2)

## String, Loop, List

### [string_times](https://codingbat.com/prob/p193507)

bad
```py
def string_times(str, n):
  acc = ''
  i=0
  while i<n:
    acc += str
    i += 1
  return acc

```

normal
```py
def string_times(str, n):
  acc = ''
  for i in range(n):
    acc = acc + str
  return acc
```

good
```py
def string_times(str, n):
  return ''.join([str for _ in range(n)])
```

excellent
```py
def string_times(str, n):
 return str * n
```
### [front_times](https://codingbat.com/prob/p165097)

bad
```py
def front_times(str, n):
  if len(str) < 3:
    front = str
  else:
    front = str[:3]
  acc = ''
  for i in range(n):
    acc = acc + front
  return acc
```


normal
```py
def front_times(str, n):
  acc = ''
  pre3 = str[:3]
  for i in range(n):
    acc = acc + pre3
  return acc
```

good
```py
def front_times(str, n):
  pre3 = str[:3]
  return ''.join([pre3 for _ in range(n)])
```

excellent
```py
def front_times(str, n):
  return str[:3] * n
```

### [string_bits](https://codingbat.com/prob/p165097)

normal
```py
def string_bits(str):
  acc = ""
  for i in range(len(str)):
    if i % 2 == 0:
      acc = acc + str[i]
  return acc
```
good
```py
def string_bits(str):
  return ''.join([v for i, v in enumerate(str) if i % 2 == 0])
```
excellent
```py
def string_bits(str):
  return str[::2]
```

### [string_splosion](https://codingbat.com/prob/p118366)

normal
```py
  acc = ""
  for i in range(len(str)):
    acc = acc + str[:i+1]
  return acc
```
good
```py
def string_splosion(str):
  return "".join([str[:i + 1] for i in range(len(str))])
```
### [last2](https://codingbat.com/prob/p145834)

normal
```py
def last2(str):
  if len(str) < 2:
    return 0
  
  last2 = str[len(str)-2:]
  count = 0
  
  for i in range(len(str)-2):
    sub = str[i:i+2]
    if sub == last2:
      count = count + 1

  return count
```

good
```py
def last2(str):
  length = 2
  array = [str[i:i + length] for i in range(len(str) - length)]
  return array.count(str[- length:])
```

excellent
```py
def last2(s):
  length = 2
  return sum(s[i:i + length] == s[- length:] for i in range(len(s) - length))
```

### [array_count9](https://codingbat.com/prob/p166170)

normal
```py
def array_count9(nums):
  acc = 0
  for num in nums:
    if num == 9:
      acc = acc + 1

  return acc
```

good
```py
def array_count9(nums):
  return len([num for num in nums if num == 9])
```
excellent
```py
def array_count9(nums):
  return nums.count(9)
```

### [array_front9](https://codingbat.com/prob/p110166)

bad
```py
def array_front9(nums):
  result = False
  for i in range(4):
    if len(nums) > i:
      if nums[i] == 9:
        result = True
  return result
```

normal
```py
def array_front9(nums):
  end = min(4, len(nums))
  
  for i in range(end): 
    if nums[i] == 9:
      return True
  return False
```

good
```py
def array_front9(nums):
  return [num == 9 for num in nums[:4]].count(True)
```

excellent
```py
def array_front9(nums):
  return 9 in nums[:4]
```
### [array123](https://codingbat.com/prob/p193604)


bad
```py
def array123(nums):
  if len(nums)<3:
    return False
  for i in range(len(nums)-2):
    if nums[i] == 1 and nums[i+1] == 2 and nums[i+2] == 3:
      result = True
      break
    else:
      result = False
  return result
```

normal
```py
def array123(nums):
  for i in range(len(nums)-2):
    if nums[i]==1 and nums[i+1]==2 and nums[i+2]==3:
      return True
  return False
```

good
```py
def array123(nums):
    return [1, 2, 3] in [nums[i:i + 3] for i in range(len(nums) - 2)]
```

good
```py
def array123(nums):
    return  any([ [1, 2, 3] == nums[i:i + 3] for i in range(len(nums) - 2) ])
```
### [string_match](https://codingbat.com/prob/p182414)

bad
```py
def string_match(a, b):
  r = len(a) if len(a)<len(b) else len(b)
  result = 0
  for i in range(r):
    if a[i:i+2] == b[i:i+2] and len(a[i:i+2]) == 2 and len(b[i:i+2]) == 2:
      result += 1
  return result
```

normal
```py
def string_match(a, b):
  shorter = min(len(a), len(b))
  acc = 0
  
  for i in range(shorter-1):
    a_sub = a[i:i+2]
    b_sub = b[i:i+2]
    if a_sub == b_sub:
      acc = acc + 1

  return acc
```
good
```py
def string_match(a, b):
  return [a[i:i+2] == b[i:i+2]  for i in range(min(len(a), len(b)) - 1)].count(True)
```

excellent
```py
def string_match(a, b):
  slice = lambda n : lambda l :lambda s: [s[i: i + n] for i in range(l - 1)]
  slice2 = slice(2)(min(len(a), len(b)))
  return [left == right for left, right in zip(slice2(a), slice2(b))].count(True)  
```

TODO : wrapping 再考
```py
from itertools import pairwise
def string_match(a, b):
  is_equal = lambda a, b : a == b
  wrapfun = lambda fun: lambda l: fun(l[0], l[1])
  return list(map(wrapfun(is_equal) , zip(pairwise(a), pairwise(b)))).count(True)
```