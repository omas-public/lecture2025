#include <stdio.h>

char *alphabet[36] = {
		      ".-" ,
		      "-..." ,
		      "-.-." ,
		      "-.." ,
		      "." ,
		      "..-." ,
		      "--." ,
		      "...." ,
		      ".." ,
		      ".---" ,
		      "-.-" ,
		      ".-.." ,
		      "--" ,
		      "-." ,
		      "---" ,
		      ".--." ,
		      "--.-" ,
		      ".-." ,
		      "..." ,
		      "-" ,
		      "..-" ,
		      "...-" ,
		      ".--" ,
		      "-..-" ,
		      "-.--" ,
		      "--.." ,
} ;

int main() {
  int c ;
  while( (c = getchar()) != EOF ) {
    if ( c >= 'A' && c <= 'Z' ) {
      printf( "%s " , alphabet[ c - 'A' ] ) ;
    } else if ( c == ' ' || c == '\n' ) {
      printf( "  " ) ;
    } else if ( c == '.' ) {
      printf( ".-.-.- " ) ;
    } else {
      putchar( c ) ;
    }
  }
  return 0 ;
}
