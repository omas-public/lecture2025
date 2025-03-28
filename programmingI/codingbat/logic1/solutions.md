# [Logic-1](https://codingbat.com/python/Logic-1)

## [cigar_party](https://codingbat.com/prob/p195669)

normal
```py
def cigar_party(cigars, is_weekend):
  if is_weekend:
    if cigars >= 40:
      return True
    else:
      return False
  else:
    if cigars >= 40 and cigars <= 60:
      return True
    else:
    return False
```

good
```py
def cigar_party(cigars, is_weekend):
   return cigars >= 40 and (is_weekend or cigars <= 60)
```

## [date_fashion](https://codingbat.com/prob/p129125)

normal
```py
def date_fashion(you, date):
  if you <= 2 or date <= 2:
    return 0
  elif you >= 8 or date >= 8:
    return 2
  else:
    return 1
```

excellent
```py
from operator import le, gt
curry2 = lambda fun: lambda a: lambda b: fun(a, b)
checkfn = lambda fun: lambda you, date :  any( fun(score) for score in [you, date])

def date_fashion(you, date):
  nogood = checkfn(curry2(le)(2))
  ok =  checkfn(curry2(ge)(8))

  return 0 if nogood(you, date) else 2 if ok(you, date) else 1
```

## [squirrel_play](https://codingbat.com/prob/p135815)

normal
```py
def squirrel_play(temp, is_summer):
  upper = 90
  if is_summer:
    upper = 100
    return (temp >= 60 and temp <= upper)
```

good?
```py
def squirrel_play(temp, is_summer):
  return temp >= 60 and (temp <= 100 if is_summer else temp <= 90)
```


## [caught_speeding](https://codingbat.com/prob/p137202)

normal
```py
def caught_speeding(speed, is_birthday):
  gift = 0
  if is_birthday:
    gift = 5
    if speed <= 60 + gift:
      return 0
  elif speed >= 81 + gift:
    return 2
  else:
    return 1
```

good
```py
def caught_speeding(speed, is_birthday):
  checker = lambda speed : 0 if speed <= 60 else 1 if speed <= 80 else 2
  return checker(speed - 5) if is_birthday else checker(speed)
```

excellent
```py
from bisect import bisect_left
def caught_speeding(speed, is_birthday):
  checkfun = lambda a, lambda x: bisect_left(a, x)
  penalty = checkfun([60, 80])
  return penalty(speed - 5) if is_birthday else penalty(speed)
```

## [sorta_sum](https://codingbat.com/prob/p116620)

normal
```py
def sorta_sum(a, b):
  total = a + b
  if total > 9 and total < 20:
    return 20
  else:
    return total
```

good
```py
def sorta_sum(a, b):
  total = a + b
  return 20 if 10 <= total <= 20 else total 
```


## [alarm_clock](https://codingbat.com/prob/p119867)

normal
```py
def alarm_clock(day, vacation):
  weekday_alarm = "7:00"
  weekend_alarm = "10:00"
  if vacation:
    weekday_alarm = "10:00"
    weekend_alarm = "off"
  if day > 0 and day < 6:
    return weekday_alarm
  else:
    return weekend_alarm
```

good
```py
  weekend = day in [0, 6] 
  return 'off' if vacation and weekend else  '10:00' vacation or weekend else '7:00'
```

good
```py
  weekend = day in [0, 6] 
  return 'off' if all((vacation, weekend)) else  '10:00' any((vacation, weekend)) else '7:00'
```

## [love6](https://codingbat.com/prob/p100958)

normal
```py
def love6(a, b):
  if a==6 or b==6 or a + b==6 or abs(a-b)==6:
    return True
  return False
```

good
```py
def love6(a, b):
  return 6 in [a, b, sum(a, b), abs(a - b)]
```

## [in1to10](https://codingbat.com/prob/p158497)

normal
```py
def in1to10(n, outside_mode):
  if not outside_mode:
    return (n >= 1 and n <= 10)
  else:
    return (n <= 1 or n >= 10)
```

good
```py

is_inclusive = lambda min, max : lambda n: min <= n <= max
def in1to10(n, outside_mode):
  inclusive1to10 = is_inclusive(1,10)
  inclusive2to9 =  is_inclusive(2, 9)
  return   not inclusive2to9(n)  if outside_mode else inclusive1to10(n)
```

## [near_ten](https://codingbat.com/prob/p165321)

normal
```py
def near_ten(num):
  return (num % 10 == 0 or num % 10 == 1 or num % 10 == 2 or abs(10 - num % 10) == 2 or abs(10 -
 num % 10) == 1 or abs(10 - num % 10) == 0)
```

good
```py
def near_ten(num):
  return (num + 2) % 10 < 5
```