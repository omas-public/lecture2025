#include <stdio.h>

// 64bit 整数型を gcc で使う時は、long long int を使う。
// long long int 型の定数は、末尾にLLをつける。

// long int 型では、処理系によっては 32bit の可能性あり。

#if !defined( TYPE_INT )
# define TYPE_INT long long int
#endif
typedef TYPE_INT type_int_t ;

int main() {
  type_int_t	a = 0  , b = 1 ,  c ;
  int		wa = 0 , wb = 1 , wc ;

  for( int i = 0 ; i < 100 ; i++ ) {
    c = (a + b) % 10000000000LL ;
    wc = wa + wb ;
    printf( "L %d %lld\n" , i + 1 , (long long int)b  ) ;
    printf( "I %d %d\n" , i + 1 , wb  ) ;
    a = b ;
    b = c ;
    wa = wb ;
    wb = wc ;
  }
  return 0 ;
}
