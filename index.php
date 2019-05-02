<!--
 * Licensed under MIT License by (c) Muhammad Muzzammil 2017 (http://muzzammil.xyz/)
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this
 * software and associated documentation files (the "Software"), to deal in the Software
 * without restriction, including without limitation the rights to use, copy, modify,
 * merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following
 * conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies
 * or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
 * PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE
 * FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
-->
<?php
include "algo.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Smart Text</title>
  <link rel="stylesheet" type="text/css" href=<?php echo "'main.css?" . rand() . "'"; ?>>
  <link rel="stylesheet" type="text/css" href="//cdn.muzzammil.xyz/OctoCSS/octo.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="Muhammad Muzzammil">
  <meta name="keyword" content="Encrypt, Decrypt, AES, RIJNDAEL, 256, secure, message" />
  <meta name="description" content="Protect your messages with 256-bit encryption" />
  <meta name="theme-color" content="#000000" />
</head>

<body>
  <a href="http://github.com/muhammadmuzzammil1998/SmartText" target="_blank">
    <github class="octo-right"><img src="//cdn.muzzammil.xyz/OctoCSS/github.svg"></github>
  </a>
  <div id="content">
    <span id="title"><span>Smart</span> <span>Text</span></span>
    <?php $do = $_GET['do'];if (!isset($do)) {?>
    <form id="form" action="?do=encrypt" method="POST">
      <label for="data">Message: </label><br>
      <textarea class="text" name="data" id="data" required><?php echo $_POST['data']; ?></textarea><br>
      <label for="password1">Password 1: </label>
      <input class="text" type="password" pattern=".{6,}" title="6 characters minimum" pattern=".{6,}"
        title="6 characters minimum" name="password1" id="password1" value=<?php echo '"' . $_POST['password1'] . '"' ?>
        required><br>
      <label for="password2">Password 2: </label>
      <input class="text" type="password" pattern=".{6,}" title="6 characters minimum" pattern=".{6,}"
        title="6 characters minimum" name="password2" id="password2" value=<?php echo '"' . $_POST['password2'] . '"' ?>
        required><br>
      <input type="submit" value="Encrypt" id="encryptBTN" class="btn">
    </form>
    <a href="?do=decrypt" class="btn" id="decrypt">Decrypt</a><br><a href="?do=explain" class="btn" id="explain">What is
      this?</a>
    <?php } else if (isset($do)) {
    if ($do == "encrypt" && !valid()) {
        ?>
    <form id="form" action="?do=encrypt" method="POST">
      <label for="data">Message: </label><br>
      <textarea class="text" name="data" id="data" required><?php echo $_POST['data']; ?></textarea><br>
      <?php if (empty($_POST['data']) && $_GET['do'] == "encrypt") {
            echo "<span class='warn'>Please enter some data.</span><br>" . PHP_EOL;
        }
        ?>
      <label for="password1">Password 1: </label>
      <input class="text" type="password" pattern=".{6,}" title="6 characters minimum" name="password1" id="password1"
        value=<?php echo '"' . $_POST['password1'] . '"' ?> required><br>
      <?php if (empty($_POST['password1']) && $_GET['do'] == "encrypt") {
            echo "<span class='warn'>Please enter first password.</span><br>" . PHP_EOL;
        }
        ?>
      <label for="password2">Password 2: </label>
      <input class="text" type="password" pattern=".{6,}" title="6 characters minimum" name="password2" id="password2"
        value=<?php echo '"' . $_POST['password2'] . '"' ?> required><br>
      <?php if (empty($_POST['password2']) && $_GET['do'] == "encrypt") {
            echo "<span class='warn'>Please enter second password.</span><br>" . PHP_EOL;
        }
        ?>
      <input type="submit" value="Encrypt" id="encryptBTN" class="btn">
    </form>
    <a href="?do=decrypt" class="btn" id="decrypt">Decrypt</a><br><a href="?do=explain" class="btn" id="explain">What is
      this?</a>
    <?php } else if ($do == "encrypt" && valid()) {
        $data = $_POST['data'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];?>
    <div id="encrypted">
      <h1>Encryption status: <?php $encryptedData = encrypt($data, $pass1, $pass2);unset($_POST);if ($encryptedData) {
            echo '<span id="green">Successful</span>';
        } else {
            echo '<span id="red">Unsuccessful</span>';
        }
        ?></h1>
      <?php if ($encryptedData) {?>
      <h1>Encryptied message: <span id="messageBody"><?php echo $encryptedData; ?></span></h1>
      <h1>MD5 Hash: <span id="messageBody"><?php echo md5($encryptedData); ?></span></h1>
      <?php }?>
      <i>
        <h3>Somethings to note:
          <ol>
            <li>Please remember both passwords as they are the only thing that can unlock the message. If you forget
              them, you'll loose the message and there is no way to retrieve them.</li>
            <li>DO NOT change any letter in the encrypted string, <b>keep it as it is</b>. Take a screenshot if you
              want, there is no threat to it.</li>
            <li>DO NOT share passwords with anyone</li>
            <li>Output may vary, but the results will be the same.</li>
          </ol>
        </h3>
      </i>
      <a href="./" class="btn" id="goBack">Go Back</a>
    </div>
    <?php } else if ($do == "decrypt" && !valid()) {?>
    <form id="form" action="?do=decrypt" method="POST">
      <label for="data">Encrypted Message: </label><br>
      <textarea class="text" name="data" id="data" required></textarea><br>
      <label for="password1">Password 1: </label>
      <input class="text" type="password" pattern=".{6,}" title="6 characters minimum" name="password1" id="password1"
        required><br>
      <label for="password2">Password 2: </label>
      <input class="text" type="password" pattern=".{6,}" title="6 characters minimum" name="password2" id="password2"
        required><br>
      <input type="submit" value="Decrypt" id="decryptBTN" class="btn">
    </form>
    <a href="./" class="btn" id="encrypt">Encrypt</a><br><a href="?do=explain" class="btn" id="explain">What is
      this?</a>
    <?php } else if ($do == "decrypt" && valid()) {
        $data = $_POST['data'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];?>
    <div id="decrypted">
      <h1>Decryption status: <?php $decryptedData = decrypt($data, $pass1, $pass2);unset($_POST);if ($decryptedData) {
            echo '<span id="green">Successful</span>';
        } else {
            echo '<span id="red">Unsuccessful</span>';
        }
        ?></h1>
      <?php if ($decryptedData) {
            echo '<h1>Decrypted message: <span id="messageBody">' . $decryptedData . '</span></h1>' . PHP_EOL;
        } else {?>
      <h1>MD-5 Hash: <?php echo md5($_POST['data']) . PHP_EOL; ?></h1>
      <i>
        <h3>Somethings to note:
          <ol>
            <li>Enter correct passwords.</li>
            <li>Make sure you have the correct encrypted string</li>
            <li>verify by Hash</li>
          </ol>
        </h3>
      </i>
      <?php }?>
      <a href="./" class="btn" id="goBack">Go Back</a>
    </div>
    <?php } else if ($do == "explain") {?>
    <div>
      <h1 id="head">Explain</h1>
      <h2>Encryption</h2>
      <h3 id="desc">
        Smart Text uses AES-complaint, RIJNDAEL 256 bit encryption/decryption with php_mcrypt with CBC. Its open source
        and can be adjusted as needed.
      </h3>
      <h2>The 2-Passwords system</h2>
      <h3 id="desc">Dual password protection makes it even harder to brute force a way in to the encryption so that the
        message is secure and can be read by only those with both passwords. Also, your real passwords aren't used
        directly, their hashes are.</h3>
      <h2>Decryption</h2>
      <h3 id="desc">You can decrypt the message using this link <a
          href="https://git.muzzammil.xyz/smarttext/?do=decrypt">https://git.muzzammil.xyz/smarttext/?do=decrypt</a> and
        pasting the message there.</h3>
    </div>
    <a href="./" class="btn" id="goBack">Go back</a>
    <?php }}?>
    <h3><b>NOTE: PLEASE DO NOT USE IT FOR ILLEGAL PURPOSES, I WILL NOT BE HELD RESPONSIBLE FOR IT. ONLY YOU ARE
        RESPONSIBLE FOR THE THINGS YOU DO.</b></h3>
  </div>
</body>

</html>