# [List-1](https://codingbat.com/python/List-1)

## [first_last6](https://codingbat.com/prob/p181624)

normal
```py
def first_last6(nums):
  if (nums[0] == 6) or (nums[len(nums)-1] == 6):
    return True
  else:
    return False
```

good
```py
def first_last6(nums):
  return  (nums[0] == 6) or (nums[-1] == 6)
```

excellent
```py
def first_last6(nums):
  return 6 in [nums[0], nums[-1]]
```

## [same_first_last](https://codingbat.com/prob/p179078)

normal
```py
def same_first_last(nums):
  if len(nums) > 0:
    if nums[0] == nums[len(nums) - 1]:
      return True
    else:
      return False
  else:
    return False
```

good
```py
def same_first_last(nums):
  return False if len(nums) < 1 else nums[0] == nums[-1]
```


## [make_pi](https://codingbat.com/prob/p113659)

normal
```py
def make_pi():
  return [3, 1 ,4]
```

## [common_end](https://codingbat.com/prob/p147755)

normal
```py
def common_end(a, b):
  if (a[0] == b[0]) or (a[len(a) - 1] == b[len(b) - 1]):
    return True
  else:
    return False
```

good
```py
def common_end(a, b):
  return (a[0] == b[0]) or (a[- 1] == b[- 1])
```

good
```py
def common_end(a, b):
    return any([a[i] == b[i] for i in [0, -1]])
```


## [sum3](https://codingbat.com/prob/p191645)

normal
```py
def sum3(nums):
  return nums[0] + nums[1] + nums[2]
```

good
```py
def sum3(nums):
  return sum(nums)
```

## [rotate_left3](https://codingbat.com/prob/p148661)

normal
```py
def rotate_left3(nums):
  return [nums[1], nums[2], nums[0]]
```

good
```py
def rotate_left3(nums):
  return nums[1:] + nums[0:1]
```


## [reverse3](https://codingbat.com/prob/p192962)

normal
```py
def reverse3(nums):
  return [nums[2], nums[1], nums[0]]
```

good
```py
def reverse3(nums):
  return reversed(nums)
```

excellent
```py
def reverse3(nums):
  return nums[::-1]
```

## [max_end3](https://codingbat.com/prob/p135290)

normal
```py
def max_end3(nums):
  if nums[0] > nums[2]:
    return [nums[0],nums[0],nums[0]]
  else:
    return [nums[2],nums[2],nums[2]]
```

good
```py
def max_end3(nums):
  return [max(nums[0], nums[-1])] * 3
```


## [sum2](https://codingbat.com/prob/p192589)

normal
```py
def sum2(nums):
  if len(nums) == 0:
    return 0
  elif len(nums) == 1:
    return nums[0]
  else:
    return nums[0] + nums[1]
```

good
```py
def sum2(nums):
  return 0 len(nums) == 0 else sum(nums[:2])
```

excellent
```py
def sum2(nums):
  return sum(nums[:2])
```

## [middle_way](https://codingbat.com/prob/p171011)

normal
```py
def middle_way(a, b):
  return [a[1],b[1]]
```
excelent
```py
def middle_way(a, b):
  middle = len(a) // 2
  return list(zip(a,b)[middle])
```

## [make_ends](https://codingbat.com/prob/p124806)

```good
def make_ends(nums):
  return [nums[0], nums[-1]]
```



## [has23](https://codingbat.com/prob/p177892)

good
```py
def has23(nums):
    return 2 in nums or 3 in nums
```

good
```py
def has23(nums):
  return True in [n in nums for n in [2, 3]]
```

good
```py
def has23(nums):
  return any([n in nums for n in [2,3]])
```
