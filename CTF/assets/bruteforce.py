import string
from itertools import product
from crypt import crypt
import time, timeit

def bruteforce(plains, hash, salt):
  is_same_hash = (lambda hash, salt: lambda plain:  hash == crypt(plain, salt))(hash, salt)
  for plain in plains:
    if is_same_hash(plain):
      return plain
  return None
 
create_plains = lambda letters: lambda n:  ["".join(tp) for tp in product(letters, repeat=n) ]

if __name__ == '__main__':
  start_time = time.perf_counter()
  letters = string.digits +string.ascii_lowercase
  plains = create_plains(letters)(5)

  result = bruteforce(plains, "OtP1pexfjzhyc","Ot" )
  print('result', result)
  end_time = time.perf_counter()
  print (end_time - start_time)
