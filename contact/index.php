<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, minimum-scale=1">
<meta name="format-detection" content="telephone=no">
<title>お問い合わせ｜株式会社IKフレーミング</title>
<meta name="description" content="">
<meta name="keyword" content="">
<meta property="og:site_name" content="株式会社IKフレーミングオフィシャルサイト">
</head>
<body class="drawer drawer--left">
	<main id="inquiry">
		<section class="sec1" id="app">
			<p class="top_text">ご不明な点やご相談がございましたら、下記のメールフォームよりお気軽にお問い合わせください。<br><span class="c_red">※全ての項目にご入力の上、送信ください。<br>※1週間以上経っても返信が無い場合、問題が発生した恐れがありますので、その際は誠に申し訳ございませんが、お電話にて再度お問い合わせください。</span></p>

			<!-- 送信完了時のメッセージ -->
			<?php if($_GET['send'] == 'success'): ?>
				<p class="top_text c_red">送信完了しました。</p>
			<?php endif ?>
			<form action="/contact/contact_form/mail_send.php" method="post" novalidate="true" autocomplete="off">
				<table>
					<tr>
						<th>お名前</th>
						<td><input type="text" name="name" value="" placeholder="例) 建方　太郎" v-model="name"></td>
					</tr>
					<tr>
						<th>フリガナ</th>
						<td><input type="text" name="kana" value="" placeholder="例) タテカタ　タロウ" v-model="kana"></td>
					</tr>
					<tr>
						<th>電話番号</th>
						<td>
							<div class="tel">
								<input type="tel" name="tel1" value="" v-model="tel1"> - 
								<input type="tel" name="tel2" value="" v-model="tel2"> - 
								<input type="tel" name="tel3" value="" v-model="tel3">
							</div>
							<small class="c_red" v-if="!$v.tel1.numeric || !$v.tel2.numeric || !$v.tel3.numeric ">無効な電話番号です</small>
						</td>
					</tr>
					<tr>
						<th>メールアドレス</th>
						<td>
							<input type="email" name="email" value="" placeholder="例) mail@example.co.jp" v-model="email">
							<small class="c_red" v-if="!$v.email.email">無効なメールアドレスです</small>
						</td>
					</tr>
					<tr>
						<th>お問い合わせ内容</th>
						<td><textarea name="contents" placeholder="こちらに内容をご入力ください。" v-model="contents"></textarea></td>
					</tr>
				</table>
				<ul>
					<li><button type="button" @click="showModal = true" :disabled="$v.$invalid">送信する</button></li>
					<li><button type="button" @click="reset">リセット</button></li>
				</ul>
				<modal v-if="showModal" @close="showModal = false"></modal>
			</form>
		</section>
	</main>
	<!-- Vue.jsの記述 -->
	<link rel="stylesheet" type="text/css" href="/contact/contact_form/cf.css">
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue-router.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vuelidate/dist/vuelidate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vuelidate/dist/validators.min.js"></script>
	<script src="/contact/contact_form/cf.js"></script>
</body>
</html>