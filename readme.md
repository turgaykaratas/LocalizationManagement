# Laravel 5.6 with Localization Management
 <br>

## Proje Amacı
Projelerinize dil ve versiyon bazlı olarak dil desteği vermek için geliştirildi. JSON olarak cevap vermektedir<br>
{ <br>
&nbsp;&nbsp;"project_name": "Proje1",<br>
&nbsp;&nbsp;"project_language": "ABD",<br>
&nbsp;&nbsp;"project_version": 1,<br>
&nbsp;&nbsp;"project_words": {<br>
&nbsp;&nbsp;&nbsp;&nbsp;"title": "Hello",<br>
&nbsp;&nbsp;&nbsp;&nbsp;"content": "What's up",<br>
&nbsp;&nbsp;&nbsp;&nbsp;"footer": "This project is made for helping you"<br>
&nbsp;&nbsp;}<br>
}<br>

## Proje Açıklaması
Projede kurulduktan sonra sistemde otomatik olarak tanımlı bir kullanıcı olacaktır. Bu kullanıcının tipi site yöneticisidir ve otomatik olarak "admin" rolü ile ilişkilendirilmiştir. Bu kullanıcı ile yeni kullanıcılar oluşturmakta ve bilgilerini düzeltebilmektedir.<br>

Oluşturulan kullanıcılar "Project Owner" rolü ile otomatik olarak ilişkilendirilmektedir. Mevcut sisteme Role, Permission ve User arasındaki ilişkilendirmeleri yapmak için bir form eklenebilir. Gerekli altyapı mevcut bulunmaktadır.<br>

Sisteme giriş yapan kullanıcılar soldaki "İşlemler" menüsünden işlemlerini yapabilmektedirler.<br>

## Uygulama Projesi Ekleme
"İşlemler" menüsünden "Proje Listesi"ni seçtikten sonra gelen sayfada sağ taraftaki liste üzerindeki "Yeni Proje" butonuna basıp yeni bir proje sisteme ekleyecektir. Daha sonra bu listeden 
* Projeye yeni bir dil ekleyebilir. Bu esnada versiyon ekleme ve versiyona ait dil için key value değerleri girilecektir.  
* Projeye girilen dile yeni bir versiyon eklenebilir.
* Yeni versiyon ekleme mevcut versiyonun altındaki kelimeler kullanılarak oluşturulabilinir.

# Kurulum
## Projenin yerel bilgisayara kopyalanmadı
git clone https://github.com/turgaykaratas/LocalizationManagement.git<br>

## Projenin hazır edilmesi
Projeyi bilgisayarınıza aldıktan sonra gerekli paketlerin kurulması için aşağıdaki komutları sırayla çalıştırınız<br>
composer install <br>
composer update <br>

## Veri Tabanı Ayarları
DB_CONNECTION=mysql <br>
DB_HOST=127.0.0.1 <br>
DB_PORT=3306 <br>
DB_DATABASE=customer_tracking <br>
DB_USERNAME=root <br>
DB_PASSWORD= <br>
Projenin mevcut ayarlarıdır. config/database.php dosyasından değiştirilebilinir<br>
Veritabanı oluştururken "Collation" değerini "utf8_general_ci" seçiniz.<br>

## Tablo Ayarları
Veritabanı ayarı yapıldıktan sonra gerekli tablolar otomatik olarak oluşturulacaktır. Bunun için "php artisan migrate" <br>

## Tabloların Doldurulması ve Admin Kullanıcısının Sisteme Eklenmesi
Gerekli kayıtları sisteme eklemek için sırasıyla aşağıdaki komutları çalıştırınız. <br>
* İlk olarak bu komutu "composer dump-autoload" bir kereye mahsus çalıştırıyoruz.
* Tabloları doldurmak için "php artisan db:seed" komutunu çalıştırınız.<br>

Sistemde otomatik olarak oluşturulan admin kullanıcısının bilgileri <br>
e-posta: urgayk7@gmail.com <br>
parola : 123qwe<br>

## Dil Servisinin kullanılması
Dil servisi ile istenilen proje, proje alt dili ve proje dil versiyonuna ait kelimeleri alabilmekteyiz. <br>
<b>Api servis linki örneği :</b> http://localhost:8000/api/local?project=Proje1&lang=us&version=1 <br>
<b>Aldığı Parametreler</b>
* project : Oluşturulan proje adı
* lang : Projeye eklenen dil kodu (Dil tablosu adı "languages")
* version : Proje diline ait versiyon. <br><br>

<b>Not : </b> Her proje için birden fazla dil olabilir ve her dil içinde birden fazla versiyon olabilir.


## Kullanılan Paketler
[ENTRUST Role and Permissions for Laravel 5](https://github.com/Zizaco/entrust)