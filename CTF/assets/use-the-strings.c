#include <stdio.h>

// gcc -O2 -o use-the-strings use-the-strings.c

// Use the strings

// 解き方1
//	$ strings use-the-strings | grep FLAG

// 解き方2
//	$ objdump -D use-the-strings | lv
//	"/main" で main 関数部分を探す。
//	if ( flag ) に相当する jne 命令があるので、
//		1050: 8b 05 de 2f 00 00 mov  0x2fde(%rip),%eax <flag>
//		1056: 85 0c             test %eax,%eax
//		1058: 75 03             jne  105d <main+0xd>
//	jne 命令(0x75) の部分を jmp 命令(0xEB) にバイナリエディタで書き換える。

// 解き方3
//	gcc -g -O2 -o use-the-strins-gdb use-the-strings.c

//	gdb use-the-strings-gdb
//	(gdb) break main
//	(gdb) run
//	   if ( flag )
//	(gdb) set variable flag=1
//	(gdb) continue

// volatile 宣言って何？
volatile int flag = 0 ;

int main() {
  if ( flag ) {
    printf( "FLAG{UseTheStrings}\n" ) ;
  }
  return 0 ;
}
