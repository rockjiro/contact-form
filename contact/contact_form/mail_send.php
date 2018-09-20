<?php
// 管理者のメールアドレス
$admin_mail = "info@up-point.jp";
// 送信者のメールアドレス ※フォームに入力されたメールアドレス
$user_mail  = $_POST['email'];
// 会社名 ※メールの差出元に表示される
$company_name = "株式会社IKフレーミング";
// 送信後、お問い合せページにリダイレクト
$redirect_url = "//" . $_SERVER["HTTP_HOST"] . "/inquiry/index.php?send=success";


//ユーザーへの送信メール設定
ini_set("mbstring.internal_encoding","UTF-8");
mb_language("ja");
$mail_subject = "お問い合せありがとうございます。";
$body = <<<EOM
お問い合せありがとうございます。
以下の内容にて、お問い合せを受け付けました。
---------------------------------------
[お名前]
{$_POST['name']}

[フリガナ]
{$_POST['kana']}

[TEL]
{$_POST['tel1']}-{$_POST['tel2']}-{$_POST['tel3']}

[メールアドレス]
{$_POST['email']}

[お問合わせ内容]
{$_POST['contents']}
---------------------------------------

内容を確認のうえ、後日回答させていただきます。
しばらくお待ちください。
EOM;
$to_mail = $user_mail;
$from_mail = $admin_mail;
$from_name = $company_name;
$header = "From : " . mb_encode_mimeheader($from_name) . " <{$from_mail}> ";
mb_send_mail($to_mail, $mail_subject, $body, $header);

//管理者への送信メール設定
ini_set("mbstring.internal_encoding","UTF-8");
mb_language("ja");
$mail_subject = "お問い合せを受信しました。";
$body = <<<EOM
以下の内容にて、お問い合せを受け付けました。
---------------------------------------
[お名前]
{$_POST['name']}

[フリガナ]
{$_POST['kana']}

[TEL]
{$_POST['tel1']}-{$_POST['tel2']}-{$_POST['tel3']}

[メールアドレス]
{$_POST['email']}

[お問合わせ内容]
{$_POST['contents']}
---------------------------------------

内容を確認のうえ、後日回答をお送りください。
EOM;
$to_mail = $admin_mail;
$from_mail = $admin_mail;
$from_name = $company_name;
$header = "From : " . mb_encode_mimeheader($from_name) . " <{$from_mail}> ";
mb_send_mail($to_mail, $mail_subject, $body, $header);
header("Location: " . $redirect_url );
exit;

?>