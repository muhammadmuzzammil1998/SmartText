# SmartText · [Demo](https://git.muzzammil.xyz/smarttext/?github)
Protect your messages with 256-bit encryption.

Note: The mcrypt extension has been deprecated in php7.2 because apparently it has been an "[abandonware for nearly a decade now, and was also fairly complex to use](http://php.net/manual/en/migration71.deprecated.php)." I'll do my best to keep it working on my website. If you want to give it a try follow [this](https://github.com/muhammadmuzzammil1998/SmartText/blob/master/README.md#build). You can still report bugs and stuff.

## Encryption
Smart Text uses AES-complaint, RIJNDAEL 256 bit encryption/decryption with php_mcrypt with CBC. Its open source and can be adjusted as needed.
## The 2-Passwords system
Dual password protection makes it even harder to brute force a way in to the encryption so that the message is secure and can be read by only those with both passwords. Also, your real passwords aren't used directly, there hashes are.
## Decryption
You can decrypt the message using this link https://git.muzzammil.xyz/smarttext/?do=decrypt and pasting the message there.


## Example
Fx5tfPeB8xWZe1pGl0eqYgL1s0hKx3L8MxOco7UxbqtG9FgH2RKqcViLB7KSO012glNm+VnaBZjuFjeahfvOYkkypHyiQUBYAu3kWiKhiKO8LOw77fXgL6x/xkUFFTDCo=
### Passwords for the encrypted string:
- Password #1: hellololpass1
- Password #2: hellololpass2
### MD-5: 1866fb41bbd2c62b99f8134bf0300b95


## Build

***Tailor this to your needs.***

Add this PPA
```bash
sudo add-apt-repository ppa:ondrej/php
```
Update
```bash
sudo apt-get update
```
Install php7.1 and php7.1-mcrypt
```bash
sudo apt-get install php7.1 php7.1-mcrypt
```
Clone SmartText
```bash
git clone https://github.com/muhammadmuzzammil1998/SmartText.git
```
Setup your server for SmartText

## NOTE: PLEASE DO NOT USE IT FOR ILLEGAL PURPOSES, I WILL NOT BE HELD RESPONSIBLE FOR IT. ONLY YOU ARE RESPONSIBLE FOR THE THINGS YOU DO.
