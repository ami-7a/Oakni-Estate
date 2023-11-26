<!-- Yudaiが上記のPHPコードを以下に変更（2023/07/01） -->
<?php
mb_language("Japanese");
mb_internal_encoding("UTF-8");

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  // POSTでのアクセスでない場合
  $name = '';
  $email = '';
  $tel = '';
  $message = '';
  $err_msg = '';
  $complete_msg = '';

} else {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $message = $_POST['message'];

  // エラーメッセージ・完了メッセージの用意
  $err_msg = '';
  $complete_msg = '';

  // メール送信先の設定
  $to = "oak@oakni-estate.co.jp, ami7a121@gmail.com, qwer_0625@outlook.com"; // 送信先のメールアドレス

  // 空チェック
  if ($name == '' || $email == '' || $tel == '' || $message == '') {
    $err_msg = '全ての項目を入力してください。';
  }

  // 電話番号のチェック
  if( strlen($tel) >= 10 ) { // 文字列が電話番号（ハイフンなし）である場合
}else{ // 文字列が電話番号（ハイフンなし）でない場合 $err_msg =
'電話番号を正しく入力してください。'; } if ($err_msg == '') { //
メールの件名と本文の作成 $mail_subject = "新規のお問い合わせが" . $name .
"さんから送信されました。"; $mail_message = "名前: " . $name . "\n";
$mail_message .= "メールアドレス: " . $email . "\n"; $mail_message .= "電話番号:
" . $tel . "\n"; $mail_message .= "お問い合わせ内容:\n" . $message; //
Yudaiがエンコード変換コードを追加（2023/07/02） // $mail_subject =
mb_convert_encoding($mail_subject, 'UTF-8', 'SJIS-win'); // $mail_message =
mb_convert_encoding($mail_message, 'UTF-8', 'SJIS-win'); //
mb_internal_encoding("utf-8"); // Yudaiがヘッダー情報を追加（2023/07/02）
$header = array(); $header['MIME-Version'] = "1.0"; $header['Content-Type'] =
"text/plain; charset=UTF-8"; $header['Content-Transfer-Encoding'] = "8bit";
$header['From'] = "${name},<${email}>"; $set_header = array(); foreach ($header
as $key => $val) { $set_header[] = $key . ': ' . $val; } $send_header =
implode("¥n", $set_header); // メール送信 if (mail($to, $mail_subject,
$mail_message, $send_header)) { // 完了メッセージ $complete_msg =
"お問合わせいただき誠にありがとうございます。<br />３営業日以内に弊社からメールにてご連絡をいたします。";
// 全てクリア $name = ''; $email = ''; $tel = ''; $message = ''; } else { //
未完了メッセージ $err_msg = "送信に失敗しました。"; } } } ?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-210362828-1"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "UA-210362828-1");
    </script>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>オークニエステート：お問い合わせ</title>
    <meta
      name="description"
      content="福岡でのお部屋探し、不動産仲介、ワークスペース探し、賃貸売買はオークニエステートにお任せください。福岡市中央区警固にオフィスを構える不動産です。どうぞお気軽に、ご相談ください。"
    />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/ress.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/contact.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Ibarra+Real+Nova&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=WindSong&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
      rel="stylesheet"
    />

    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- ハンバーガーメニュー -->
    <script>
      $(function () {
        $(".three_line").on("click", function () {
          $(this).toggleClass("open");
          $("#gnav").toggleClass("open");
        });
      });

      // メニューをクリックされたら、非表示にする
      $(function () {
        $(".gnav-menu li a").on("click", function () {
          $("#gnav").removeClass("open");
        });
      });
    </script>

    <!-- 各コンテンツをふっわっと表示させるJS -->
    <script>
      window.onload = function () {
        scroll_effect();

        $(window).scroll(function () {
          scroll_effect();
        });

        function scroll_effect() {
          $(".effect-fade").each(function () {
            var elemPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight) {
              $(this).addClass("effect-scroll");
            }
          });
        }
      };
    </script>
  </head>
  <body>
    <header class="header">
      <!-- ヘッダー左（ロゴ、会社名） -->
      <a href="index.html" class="header-left">
        <div class="site-logo"><img src="img/site-logo.png" alt="ロゴ" /></div>
        <p class="site-title">OAKNI ESTATE</p>
      </a>

      <!-- ヘッダー右（グロナビ） -->
      <section class="header-right">
        <nav id="nav">
          <li>
            <a href="index.html">
              <span class="en">TOP</span>
              <span class="jp">トップ</span></a
            >
          </li>

          <li>
            <a href="rooms.html">
              <span class="en">ROOMS</span>
              <span class="jp">賃貸物件</span></a
            >
            <ul>
              <li><a href="rooms.html#jump">▶︎必要書類</a></li>
            </ul>
          </li>

          <li>
            <a href="furniture.html">
              <span class="en">FURNITURE</span>
              <span class="jp">家具のリース</span></a
            >
          </li>

          <li>
            <a href="company.html">
              <span class="en">COMPANY</span>
              <span class="jp">会社について</span></a
            >
          </li>

          <li>
            <a href="contact.html">
              <span class="en">CONTACT</span>
              <span class="jp">お問い合わせ</span></a
            >
          </li>
        </nav>
      </section>

      <!-- ハンバーガーメニュー -->
      <div id="hamburger">
        <section>
          <div class="three_line" id="btnA">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </section>

        <!--ハンバーガー内のグロナビ-->
        <nav id="gnav">
          <div class="gnav-menu">
            <div class="gnav-img"><img src="img/oakni-logo.png" alt="" /></div>

            <ul>
              <li>
                <a href="index.html"> <span>トップページ</span></a>
              </li>

              <li>
                <a href="rooms.html"> <span>賃貸物件情報</span></a>
              </li>

              <li>
                <a href="rooms.html#jump"> <span>必要書類</span></a>
              </li>

              <li>
                <a href="furniture.html"> <span>家具のリース</span></a>
              </li>

              <li>
                <a href="company.html"> <span>会社概要</span></a>
              </li>
            </ul>

            <!-- ハンバーガーお問い合わせボタン -->
            <section class="contact02">
              <a class="contact-btn02" href="contact.html">
                <span>お問い合わせ</span>
              </a>
            </section>
          </div>

          <!--ハンバーガー内SNSセクション-->
          <ul class="sns-btns">
            <li>
              <a
                href="https://www.instagram.com/oakni_estate/?hl=ja"
                class="flowbtn insta"
                ><i class="fab fa-instagram"></i
              ></a>
            </li>

            <li>
              <a href="https://lin.ee/byyGB2t" class="flowbtn line"
                ><i class="fab fa-line"></i
              ></a>
            </li>

            <li>
              <a href="mailto:oak@oakni-estate.co.jp" class="flowbtn mail"
                ><i class="far fa-envelope"></i
              ></a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <main class="second-main effect-fade">
      <!-- 共通h1・h2 -->
      <h2>Contact us</h2>
      <h3>コンタクトフォーム</h3>

      <?php if ($err_msg != ''): ?>
      <div class="alert alert-danger">
        <?php echo $err_msg; ?>
      </div>
      <?php endif; ?>

      <?php if ($complete_msg != ''): ?>
      <div class="alert alert-success">
        <?php echo $complete_msg; ?>
      </div>
      <?php endif; ?>

      <form class="form effect-fade" method="post">
        <li class="form-left">
          <img src="img/contact-img.jpg" alt="" />
        </li>

        <li class="form-right">
          <!-- Name -->
          <div class="txt-area">
            <p>お名前<span class="must-red">*</span></p>
            <input type="text" name="name" value="<?php echo $name; ?>" />
          </div>

          <!-- Email -->
          <div class="txt-area">
            <p>メールアドレス<span class="must-red">*</span></p>
            <input type="text" name="email" value="<?php echo $email; ?>" />
          </div>

          <!-- 以下、件名に関するソースをコメントアウト（2023/07/01） -->
          <!-- Subject -->
          <!-- <div class="txt-area">
            <p>件名</p>
            <input type="text"  name="subject" value="<?php echo $subject; ?>">
          </div> -->

          <!-- 電話番号入力欄を追加（2023/07/01） -->
          <!-- tel -->
          <div class="txt-area">
            <p>
              電話番号<span class="must-red">*</span
              ><span class="small">※ハイフンは不要です。</span>
            </p>
            <input type="tel" name="tel" value="<?php echo $tel; ?>" />
          </div>

          <!-- Content -->
          <div class="txt-area">
            <p>お問い合わせ内容<span class="must-red">*</span></p>
            <textarea name="message" rows="5"><?php echo $subject; ?></textarea>
          </div>

          <div class="sent-btn">
            <button type="submit">送信</button>
          </div>
        </li>
      </form>
    </main>

    <footer class="footer effect-fade">
      <!-- 共通フッター -->
      <section class="main-footer">
        <section class="footer-left">
          <img class="footer-logo" src="img/oakni-logo.png" alt="" />
          <div class="footer-adress">
            <p class="comapny-name">株式会社オークニエステート</p>
            <p class="adress">
              〒810-0024<br /><a href="company.html"
                >福岡市中央区桜坂3丁目4-28 ハイムニュー桜坂310号室</a
              >
            </p>
            <p class="footer-tel">
              <a href="tel:092-791-3231">tel:092-791-3231</a>
            </p>
          </div>
        </section>

        <section class="footer-right">
          <li>
            <a href="index.html"> <span>TOP</span></a>
          </li>

          <li>
            <a href="rooms.html"> <span>ROOMS</span></a>
          </li>

          <li>
            <a href="furniture.html"> <span>FURNITURE</span></a>
          </li>

          <li>
            <a href="company.html"> <span>COMPANY</span></a>
          </li>

          <li>
            <a href="contact.html"> <span>CONTACT</span></a>
          </li>
        </section>
      </section>

      <section class="copy-right">
        <p>©︎ 2021, Oakni Estate, All Rights Reserved.</p>
      </section>
    </footer>
  </body>
</html>
