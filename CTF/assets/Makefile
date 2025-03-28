##

#--------------------------------------------
# https形式	https://github.com/tohrusaitoh/ctf.git

GH_ID		= tohrusaitoh
GH_PROJECT	= ctf
GH_HTTPS	= https://github.com/$(GH_ID)/$(GH_PROJECT).git

REPOSITORY	= origin
BRANCH		= master

DATE		:= $(shell date +%Y/%m/%d)
HOSTNAME	:= $(shell hostname)
all:		add commit push
		@echo $(GH_HTTPS)
#--------------------------------------------
#		git init $(GH_PROJECT)
#		cd $(GH_PROJECT)
#		git add file...
#		git remote add	   $(REPOSITORY) $(GH_HTTPS)
#		git remote set-url $(REPOSITORY) $(GH_HTTPS)
#		git push $(REPOSITORY) $(BRANCH)
#		git pull $(REPOSITORY) $(BRANCH)
#		git config --global user.name  "John Doe"
#		git config --global user.email "foo@example.com"

add:;		git add -u
commit:;	git commit -m $(DATE)-$(HOSTNAME)
push:;		git push
pull:;		git pull
#--------------------------------------------

rot13:
	tr A-Za-z N-ZA-Mn-za-m < simple-encryption.txt 

fib100:
	gcc -DTYPE_INT="long long int" -o fib100-64.out fib100.c
	gcc -DTYPE_INT="int" -o fib100-32.out fib100.c
	./fib100-64.out

whitespace:
	ruby whitespace.rb whitespace.ws_.txt

use-the-strings:	use-the-strings.c
	gcc    -O2 -o use-the-strings     use-the-strings.c
	gcc -g -O2 -o use-the-strings-gdb use-the-strings.c

sql-injection-database.db:	sql-injection-database.sql
	sqlite3 sql-injection-database.db < sql-injection-database.sql

buffer-overflow:	buffer-overflow.c
	gcc -o buffer-overflow buffer-overflow.c

File0000.zip:
	zip File0000.zip File0000.chk

what-is-the-river-called.jpg:
	bash what-is-the-river-called.sh

what-is-this-camera-called.jpg:
	bash what-is-this-camera-called.sh
