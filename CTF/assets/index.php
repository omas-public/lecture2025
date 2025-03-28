<?php // -*- coding: utf-8 -*-

$answer = array(
    // 暗号コーディング
    "1.1" => "FLAG{RotationThirteen}" ,
    "1.2" => "FLAG{crow-in-the-night}" ,
    "1.3" => "FLAG{まいむまいむ}" ,
    "1.4" => "FLAG{ZhaitengChe}" ,
    "1.5" => "FLAG{unown}" ,
    // ファイル系
    "2.1" => "FLAG{WordFile}" ,
    "2.2" => "FLAG{BlackCatOmanjyu}" ,
    "2.3" => "FLAG{RealImageSize}" ,
    // Web技術系
    "3.1" => "FLAG{MatsushimaNanako}" ,
    "3.2" => "FLAG{URLAttack}" ,
    "3.3" => "FLAG{YBB=500Yen}" ,
    "3.4" => "FLAG{EatRealCookie}" ,
    "3.5" => "FLAG{YouAreShock!}" ,
    "3.6" => "FLAG{I-Love-Netscape}" ,
    "3.7" => "FLAG{CorrectSpellIsReferrer}" ,
    // プログラム作成系
    "4.1" => "FLAG{SOS}" ,
    "4.2" => "FLAG{9261915075}" ,
    "4.3" => "FLAG{8087}" ,
    "4.4" => "FLAG{i4004}" ,
    // インターネット系
    "5.1" => "FLAG{KURONEKO-CLUB}" ,
    "5.2" => "FLAG{echizensoba}" ,
    // OS系
    "6.1" => "FLAG{UseTheStrings}" ,
    "6.2" => "FLAG{whitespace}" ,
    "6.3" => "FLAG{LoveOverflows}" ,
) ;

$hint = array(
    // 暗号コーディング
    "1.1" => "単換字式暗号(シーザー暗号)の１つです。" ,
    "1.2" => "<a href=\"http://www.ytv.co.jp/conan/archive/k1169248.html\">"
			    ."この事件でも使われてたなぁ</a>。" ,
    "1.3" => "メールの内部形式では、漢字も英字で扱う必要があります。" ,
    "1.4" => "私のミッションクリアのため。" ,
    "1.5" => "ぽけもん文字(答えは英小文字のみ)" ,
    // ファイル系
    "2.1" => "拡張子を間違えました。ファイルの種別を調べましょう。" ,
    "2.2" => "最近のOfficeファイルは、ZIPファイルです。(要unzip)" ,
    "2.3" => "画像の大きさが間違ってませんか？(要バイナリエディタ)"
    		."<a href='https://www.tohoho-web.com/wwwgif.htm'>参考資料</a>" ,
    // Web技術系
    "3.1" => "Webプログラマは、エディタのバックアップファイルはちゃんと消しましょう。" ,
    "3.2" => "HTMLのソースを眺めることから始めよう。" ,
    "3.3" => "SQLインジェクションを実践してみましょう。" ,
    "3.4" => "ブラウザのクッキーの偽装しちゃいましょう。(要クッキー偽造拡張機能)" ,
    "3.5" => "HTTP プロトコルではどういう情報がやりとりされているでしょうか？"
        			."(要telnet ^_^)" ,
    "3.6" => "UserAgentはブラウザの種別を確認する。" ,
    "3.7" => "Refererについて調べてみよう。" ,
    // プログラム作成系
    "4.1" => "電波な人を連れてくるか、変換プログラムを組むしかないかな。" ,
    "4.2" => "手際良くプログラムを書きましょう。普通に書くと桁溢れしちゃうよ。" ,
    "4.3" => "curlやw3mといったツールでスクリプトを書きましょう。" ,
    "4.4" => "サーバ負荷が高くなるのでブルートフォースだけはやめてくれ。" ,
    // インターネット系
    "5.1" => "ドメイン情報を調べてください。(要dig or nslookup)" ,
    "5.2" => "インターネットに個人情報つき画像を掲載するのは危険です。食べたい物はドメイン名(英字)に書いてあるよ" ,
    // OS系
    "6.1" => "コマンドでさくっとやっちゃうか、ディープに逆アセンブル？"
    			."(要strings or 逆アセンブラ+バイナリエディタ)" ,
    "6.2" => "プログラムが書いてあります。見えますか？読めますか？" ,
    "6.3" => "このプログラムをコンパイルしたらgetsを使うな...って言われた。" ,
) ;

$thanx = array(
    // 暗号コーディング
    "1.1" => "rot13は基礎です。通信のための暗号化の理解は大切です。" ,
    "1.2" => "黒の組織って、アホですか？" ,
    "1.3" => "エンコーディング技術にはいろいろなところで使われています。" ,
    "1.4" => "" ,
    "1.5" => "" ,
    // ファイル系
    "2.1" => "拡張子偽装はウィルス拡散の基礎技術です。" ,
    "2.2" => "ウィルスをデータの中に隠すための技術の一つです。" ,
    "2.3" => "これもウィルスを隠す技術の一つです。" ,
    // Web技術系
    "3.1" => "URLトラバーサルの一種です。" ,
    "3.2" => "HTMLやJavaScriptは利用者に丸見えです。" ,
    "3.3" => "SQLインジェクションを甘く見てはいけません。" ,
    "3.4" => "クライアントから送られてくるデータはすべて検証が必要です。" ,
    "3.5" => "Webプログラミングの仕組みをしるためにもHTTPのプロトコル理解は大切です。",
    "3.6" => "UserAgentをつかうとスマホ専用のページなどを作ることができます。" ,
    // プログラム作成系
    "4.1" => "アマチュア無線にチャレンジしませんか?" ,
    "4.2" => "Good Job!" ,
    "4.3" => "8087 は、Intel 16bit CPUファミリーのFPU実数演算プロセッサです。" ,
    "4.4" => "i4004 は、Intelの4bitコンピュータの名前です。" ,
    // インターネット系
    "5.1" => "TXTフィールドは迷惑メール対策でDKIM,SPFで使われています。" ,
    "5.2" => "GPS情報付き写真はストーカー被害の可能性につながります。" ,
    // OS系
    "6.1" => "Good Job!!" ,
    "6.2" => "Good Job!!" ,
    "6.3" => "バッファオーバーフローは、ウィルスなどを実行させる手段でよく使われているので、対策が重要です。" ,
) ;

$ANS = isset( $_REQUEST["A"] ) ? $_REQUEST["A"] : "" ;
$NUM = isset( $_REQUEST["Q"] ) ? $_REQUEST["Q"] : "" ;
$EMAIL = isset( $_REQUEST["EM"] ) ? $_REQUEST["EM"] : "" ;
$REMOTE = isset( $_SERVER[ 'REMOTE_ADDR' ] ) ? $_SERVER[ 'REMOTE_ADDR' ] : "" ;
$SUBMIT = isset( $_REQUEST["S"] ) ? $_REQUEST["S"] : "" ;

$ans_select = "<select name=\"Q\">\n" ;
$ans_select .= "<option value=\"\">問題を選んで</option>" ;
foreach( $answer as $key => $value ) {
    $chk = ($key == $NUM) ? "selected" : "" ;
    $ans_select .= "<option value=\"$key\" $chk>$key</option>\n" ;
}
$ans_select .= "</select>\n" ;

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Simple Capture The Flag</title>
		<link rel='stylesheet' href='/cstyle.css' type='text/css' media='all' />
	</head>
	<body>
		<h1 align="center">Simple Capture The Flag</h1>

		<table width="100%" border="0">
		<tr>
				<td colspan="2">
					<?php include( "/var/www/html/.menu-header.php" ) ; ?>
				</td>
		</td>
		<tr>
				<td width="230" bgcolor="#F8FCFF" valign="top">
					<?php include( "/var/www/html/.menu-right.php" ) ; ?>
				</td>
				<td valign="top">

<!-- ここから -->
		<h2 class="cyan">CTFとは</h2>
		<p>
            CTF(Capture The Flag)とは、情報技術・情報セキュリティに興味を持ってもらうために、
			情報技術・セキュリティ技術を知っていれば解ける問題を、解けた問題数と難易度に応じて
            ポイントをつけて競う大会です。

            基本は、与えられたヒントを元に、データの中に埋め込まれた FLAG{XXXXX} という形式
			のデータを探し回答サーバに送ります。
		</p>
		<hr />
        <h2 class="cyan">練習問題</h2>
		<form method="POST" action="./">
			<blockquote>
			<table>
            <tr><td><b>答え合わせ：</b></td>
				<td>問題 <?php print $ans_select ; ?></td>
				<td>答え <input type="text" name="A" size="20"
								value=<?php print "\"".htmlspecialchars($ANS)."\""; ?>/></td></tr>
				<tr><td></td><td colspan="2">
					Email:<input type="text" name="EM" size="40"
								value=<?php print "\"".htmlspecialchars($EMAIL)."\"" ;?> /></td>
			<tr><td colspan="3" align="right"><input type="submit" name="S" value="確認" /></td></tr>
			<?php
				if ( $NUM != "" && $ANS != "" ) {
                    print "<tr><td></td><td colspan=\"2\">" ;
                    print "問題".htmlspecialchars($NUM)."の回答".htmlspecialchars($ANS)."は" ;
                    if ( !preg_match( "/^FLAG{.*}$/" , $ANS ) ) {
                        print "<font color=\"red\"><b>間違いです。FLAG{...}形式で回答してください</b></font>" ;
                    } else {
                        $text = "問題".$NUM."の回答".$ANS ;
                        if ( $answer[ $NUM ] == $ANS ) {
                            print "<font color=\"blue\"><b>正解です</b></font><br />".$thanx[$NUM]."\n" ; ;
                            $text .= "は正解。" ;
                        } else {
                            print "<font color=\"red\"><b>間違いです</b></font>" ;
                            print "<br/>ヒント：".$hint[$NUM]."\n" ;
                            $text .= "は間違い。" ;
                        }
                    }
                    print "</td></tr>\n" ;
                    if ( $SUBMIT != "" ) {
                        // 回答状況を送る
                        mb_send_mail( "t-saitoh+ctf@tsaitoh.net" ,
                                      "[CTF]".$text ,
                                      $EMAIL."\n"
                                      .$REMOTE."\n"
                                      .(($REMOTE!="")?`dig -x $REMOTE +short`:"")
                                      ."https://tsaitoh.net/~t-saitoh/ctf/"
                                      .(preg_match("/^\d\.\d$/" , $NUM ) ? "#".$NUM :"")
                                      ."\n" ) ;
                    }
                }
			?>
			</table>
			</blockquote>
		</form>
		<hr />

             
		<h3>1. 暗号・コーディング系</h3>
		<ul>
            <li><a name="1.1">1.1</a> <a href="simple-encryption.txt">簡単な暗号</a></li>
            <li><a name="1.2">1.2</a> <a href="crow-in-the-night.html">なんて書いてある(闇夜の烏)</a></li>

   			<li><a name="1.3">1.3</a> <a href="mime-mime.txt">なんて書いてある(フォークダンス)</a></li>
			<li><a name="1.4">1.4</a> <a href="poke.jpg">ともだちになればわかる</a></li>
            <li><a name="1.5">1.5</a> <a href="unknown.php">なぞのもじ</a>(flag is xxx を FLAG{xxx}で答えよ)</li>
		</ul>
		<blockquote>
             通信の世界では、データを暗号化したり、
             メールでバイナリデータを文字として
             送るための変換(エンコーディング)が行われており、
             その知識を問うための問題。
		</blockquote>
		<h3>2. ファイル系</h3>
		<ul>
            <li><a name="2.1">2.1</a> <a href="never-believe-ext.docx">拡張子を信用してはいけない</a></li>
            <li><a name="2.2">2.2</a> <a href="omanjyu2.docx">画像が隠れているよ</a></li>
            <li><a name="2.3">2.3</a> <a href="real-size-256x256.gif">"正方形"の画像</a>(答えは dummy のはずがない)</li>
		</ul>
		<blockquote>
			インターネットで扱われる様々なデータがあるけど、データの中にウィルスを隠して送りつける場合もある。
			そのためには、身近なデータファイルがどういう構成なのか知っていると隠された情報を見つけることができる。
		</blockquote>

		<h3>3. Web技術系</h3>
		<ul>
			<li><a name="3.1">3.1</a> <a href="beware-dot-bak-file.php">バックアップファイルに注意しよう</a></li>
			<li><a name="3.2">3.2</a> <a href="url-traversal.php">URLトラバーサル</a></li>
			<li><a name="3.3">3.3</a> <a href="sql-injection.php">SQLの基本</a></li>
            <li><a name="3.4">3.4</a> <a href="eat-real-cookie.php">本当のクッキーを食べさせて</a></li>
            <li><a name="3.5">3.5</a> <a href="you-already-know.php">あなたは既に答えを受け取っている</a></li>
			<li><a name="3.6">3.6</a> <a href="i-love-netscape-agent.php">あなたはどんな端末からアクセスしていますか?</a></li>
			<li><a name="3.7">3.7</a> <a href="no-referer.php">直接アクセスしてね</a></li>
		</ul>
		<blockquote>
			最近のHTTPを基本とするWebプログラムでは、情報漏洩などの危険性を意識してプログラムを作る必要がある。
			そのためには、Webの通信ではどういうやりとりをしているのか知っている必要がある。
		</blockquote>

		<h3>4. プログラム作成系</h3>
		<ul>
            <li><a name="4.1">4.1</a> <a href="morse-text.txt">フラグは何？(flag is xxx を FLAG{xxx}で答えよ)</a></li>
			<li><a name="4.2">4.2</a> フィボナッチ数 fib(100) の末尾10桁を FLAG{xxxxxxxxxx} 形式で答えよ<br>
				ただし、fib(1)=1,fib(2)=1 とする</li>
            <li><a name="4.3">4.3</a> <a href="brute-force-pin4.php">数字4桁のパスワードを答えてください。</a></li>
            <li><a name="4.4">4.4</a> <a href="simple-crypt-is-insecure.php">英大小+数字の5桁のパスワードを答えてください。</a></li>
		</ul>
		<blockquote>
			セキュリティ対策では、状況に応じて簡単なプログラムを使って解析することが
			求められる。このためCTFでも、サクッとプログラムを書く技術も求められる。
		</blockquote>
		<h3>5. インターネット系</h3>
		<ul>
			<li><a name="5.1">5.1</a> capture-the-flag.tsaitoh.net というドメインの flag=XXXXX という形式の情報を FLAG{XXXXX} 形式で答えよ</li>
<li><a name="5.2">5.2</a> <a href="i-like-this-noodle.jpg">うしろを見ろ(答えはローマ字小文字 FLAG{xxx} .co.jp とする)</a></li>
		</ul>
		<h3>6. OS系</h3>
		<ul>
			<li><a name="6.1">6.1</a> <a href="use-the-strings">プログラムを動かして情報を探せ</a>(elf-x86-64)<br />
                       <a href="use-the-strings-gdb">(elf-x86-64-gdb)</a></li>
            <li><a name="6.2">6.2</a> <a href="whitespace.ws_.txt">言語オタクにしか読めない</a></li>
                                             <li><a name="6.3">6.3</a> <a href="buffer-overflow">プログラムを動かして情報を探せ(2)</a>(elf-x86-64)</li>
		</ul>
		<blockquote>
			ウィルスやマルウェアなどの被害が発生したときは、
			そのマルウェアがどういう処理をしたのかを、プログラムの機械語を調べて分析する必要がある。
			この例題は、そのための逆アセンブラなどを使うための基礎知識を問う問題。
		</blockquote>
		<?php print str_repeat( "<br/>\n" , 35 ) ; ?>
<!-- ここまで -->
				</td>
		</tr>
		<tr><td colspan="2">
			<?php include( "/var/www/html/.menu-footer.php" ) ; ?>
		</td></tr>
		</table>
	</body>
</html>
<!-- Local Variables: -->
<!-- mode: php -->
<!-- End: -->
