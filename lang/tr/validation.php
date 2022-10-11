<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Doğrulama Mesajları
    |--------------------------------------------------------------------------
    |
    | Aşağıdaki öğeler doğrulama sınıfı tarafından kullanılan varsayılan hata
    | mesajlarını içermektedir. `size` gibi bazı kuralların birden çok çeşidi
    | bulunmaktadır. Her biri ayrı ayrı düzenlenebilir.
    |
    */

    'accepted' => ':attribute kabul edilmelidir.',
    'active_url' => ':attribute geçerli bir URL olmalıdır.',
    'after' => ':attribute değeri bugün tarihinden sonra olmalıdır.',
    'after_or_equal' => ':attribute değeri bugün tarihinden sonra veya eşit olmalıdır.',
    'alpha' => ':attribute sadece harflerden oluşmalıdır.',
    'alpha_dash' => ':attribute sadece harfler, rakamlar ve tirelerden oluşmalıdır.',
    'alpha_num' => ':attribute sadece harfler ve rakamlar içermelidir.',
    'array' => ':attribute dizi olmalıdır.',
    'before' => ':attribute değeri bugün tarihinden önce olmalıdır.',
    'before_or_equal' => ':attribute değeri bugün tarihinden önce veya eşit olmalıdır.',
    'between' => [
        'numeric' => ':attribute :min - :max arasında olmalıdır.',
        'file' => ':attribute :min - :max arasındaki kilobayt değeri olmalıdır.',
        'string' => ':attribute :min - :max arasında karakterden oluşmalıdır.',
        'array' => ':attribute :min - :max arasında nesneye sahip olmalıdır.',
    ],
    'boolean' => ':attribute sadece doğru veya yanlış olmalıdır.',
    'confirmed' => ':attribute tekrarı eşleşmiyor.',
    'date' => ':attribute geçerli bir tarih olmalıdır.',
    'date_equals' => ':attribute ile bugün aynı tarihler olmalıdır.',
    'date_format' => ':attribute :format biçimi ile eşleşmiyor.',
    'different' => ':attribute ile :other birbirinden farklı olmalıdır.',
    'digits' => ':attribute :digits haneden oluşmalıdır.',
    'digits_between' => ':attribute :min ile :max arasında haneden oluşmalıdır.',
    'dimensions' => ':attribute görsel ölçüleri geçersiz.',
    'distinct' => ':attribute alanı yinelenen bir değere sahip.',
    'email' => ':attribute alanına girilen e-posta adresi geçersiz.',
    'ends_with' => ':attribute, şunlardan biriyle bitmelidir :values',
    'exists' => 'Seçili :attribute geçersiz.',
    'file' => ':attribute dosya olmalıdır.',
    'filled' => ':attribute alanının doldurulması zorunludur.',
    'gt' => [
        'numeric' => ':attribute, :value değerinden büyük olmalı.',
        'file'    => ':attribute, :value kilobayt boyutundan büyük olmalı.',
        'string'  => ':attribute, :value karakterden uzun olmalı.',
        'array'   => ':attribute, :value taneden fazla olmalı.',
    ],
    'gte' => [
        'numeric' => ':attribute, :value kadar veya daha fazla olmalı.',
        'file'    => ':attribute, :value kilobayt boyutu kadar veya daha büyük olmalı.',
        'string'  => ':attribute, :value karakter kadar veya daha uzun olmalı.',
        'array'   => ':attribute, :value tane veya daha fazla olmalı.',
    ],
    'image' => ':attribute alanı resim dosyası olmalıdır.',
    'in' => ':attribute değeri geçersiz.',
    'in_array' => ':attribute alanı :other içinde mevcut değil.',
    'integer' => ':attribute tamsayı olmalıdır.',
    'ip' => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4' => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ':attribute geçerli bir IPv6 adresi olmalıdır.',
    'json' => ':attribute geçerli bir JSON değişkeni olmalıdır.',
    'lt' => [
        'numeric' => ':attribute, :value değerinden küçük olmalı.',
        'file'    => ':attribute, :value kilobayt boyutundan küçük olmalı.',
        'string'  => ':attribute, :value karakterden kısa olmalı.',
        'array'   => ':attribute, :value taneden az olmalı.',
    ],
    'lte' => [
        'numeric' => ':attribute, :value kadar veya daha küçük olmalı.',
        'file'    => ':attribute, :value kilobayt boyutu kadar veya daha küçük olmalı.',
        'string'  => ':attribute, :value karakter kadar veya daha kısa olmalı.',
        'array'   => ':attribute, :value tane veya daha az olmalı.',
    ],
    'max' => [
        'numeric' => ':attribute değeri :max değerinden küçük olmalıdır.',
        'file' => ':attribute değeri :max kilobayt değerinden küçük olmalıdır.',
        'string' => ':attribute değeri :max karakterden küçük olmalıdır.',
        'array' => ':attribute değeri :max adedinden az nesneye sahip olmalıdır.',
    ],
    'mimes' => ':attribute dosya biçimi :values olmalıdır.',
    'mimetypes' => ':attribute dosya biçimi :values olmalıdır.',
    'min' => [
        'numeric' => ':attribute değeri :min değerinden büyük olmalıdır.',
        'file' => ':attribute değeri :min kilobayt değerinden büyük olmalıdır.',
        'string' => ':attribute değeri :min karakterden büyük olmalıdır.',
        'array' => ':attribute en az :min nesneye sahip olmalıdır.',
    ],
    'multiple_of' => ':attribute :value değerinin katsayısı olmalıdır.',
    'not_in' => 'Seçili :attribute geçersiz.',
    'not_regex' => ':attribute biçimi geçersiz.',
    'numeric' => ':attribute sayı olmalıdır.',
    'password' => 'Parola geçersiz.',
    'present' => ':attribute alanı mevcut olmalıdır.',
    'regex' => ':attribute biçimi geçersiz.',
    'required' => ':attribute alanı gereklidir.',
    'required_if' => ':attribute alanı, :other :value değerine sahip olduğunda zorunludur.',
    'required_unless' => ':attribute alanı, :other alanı :value değerlerinden birine sahip olmadığında zorunludur.',
    'required_with' => ':attribute alanı :values varken zorunludur.',
    'required_with_all' => ':attribute alanı herhangi bir :values değeri varken zorunludur.',
    'required_without' => ':attribute alanı :values yokken zorunludur.',
    'required_without_all' => ':attribute alanı :values değerlerinden herhangi biri yokken zorunludur.',
    'prohibited' => ':attribute alanının doldurulması yasak.',
    'prohibited_if' => ':other alanı :value değerine sahipken :attribute alanının doldurulması yasak.',
    'prohibited_unless' => ':other alanı :values değerine sahip değilken :attribute alanının doldurulması yasak.',
    'same' => ':attribute ile :other eşleşmelidir.',
    'size' => [
        'numeric' => ':attribute :size olmalıdır.',
        'file' => ':attribute :size kilobyte olmalıdır.',
        'string' => ':attribute :size karakter olmalıdır.',
        'array' => ':attribute :size nesneye sahip olmalıdır.',
    ],
    'starts_with' => ':attribute şunlardan biri ile başlamalıdır: :values',
    'string' => ':attribute dizge olmalıdır.',
    'timezone' => ':attribute geçerli bir saat dilimi olmalıdır.',
    'unique' => ':attribute daha önceden kayıt edilmiş.',
    'uploaded' => ':attribute yüklemesi başarısız.',
    'url' => ':attribute biçimi geçersiz.',
    'uuid' => ':attribute bir UUID formatına uygun olmalı.',

    /*
    |--------------------------------------------------------------------------
    | Özelleştirilmiş Doğrulama Mesajları
    |--------------------------------------------------------------------------
    |
    | Bu alanda her niteleyici (attribute) ve kural (rule) ikilisine özel hata
    | mesajları tanımlayabilirsiniz. Bu özellik, son kullanıcıya daha gerçekçi
    | metinler göstermeniz için oldukça faydalıdır.
    |
    | Örnek olarak:
    |
    | 'email.email': 'Girdiğiniz e-posta adresi geçerli değil.'
    | 'x.regex': 'x alanı için "a-b.c" formatında veri girmelisiniz.'
    |
    */

    'custom' => [
        'x' => [
            'regex' => 'x alanı için "a-b.c" formatında veri girmelisiniz.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Özelleştirilmiş Niteleyici İsimleri
    |--------------------------------------------------------------------------
    |
    | Bu alandaki bilgiler "email" gibi niteleyici isimlerini "e-posta adresi"
    | gibi daha okunabilir metinlere çevirmek için kullanılır. Bu bilgiler
    | hata mesajlarının daha temiz olmasını sağlar.
    |
    | Örnek olarak:
    |
    | 'email' => 'e-posta adresi',
    | 'password' => 'parola',
    |
    */

    'attributes' => [
        'name' => 'Ad',
        'username' => 'Kullanıcı Adı',
        'code' => 'Kod',
        'value' => 'Değer',
        'symbol' => 'Sembol',
        'rate' => 'Oran',
        'url' => 'URL',
        'country' => 'Ülke',
        'country_en' => 'Ülke Adı (EN)',
        'country_tr' => 'Ülke Adı (TR)',
        'company_name' => 'Şirket Adı',
        'company_email' => 'Şirket Email',
        'company_phone' => 'Şirket Telefon (Sabit)',
        'company_gsm' => 'Şirket Telefon',
        'company_fax' => 'Şirket Fax',
        'company_address' => 'Şirket Adresi',
        'email' => 'E-Mail',
        'site_url' => 'Site Link',
        'logo' => 'Logo',
        'smtp_server' => 'SMTP Server',
        'smtp_username' => 'SMTP Kullanıcı Adı',
        'smtp_password' => 'SMTP Şifre',
        'smtp_mail' => 'SMTP Mail',
        'tax_administration' => 'Vergi Dairesi',
        'tax_no' => 'Vergi No',
        'taxrate_show' => 'Vergi Oranı Göster',
        'include_tax' => 'Vergi Dahil Fiyat Göster',
        'paginate_user' => 'Sayfa da Gösterilecek Ürün Sayısı (Müşteri)',
        'paginate_admin' => 'Sayfa da Gösterilecek Ürün Sayısı (Admin)',
        'return_day' => 'İade Gün Hakkı',
        'stock_show' => 'Stok Miktarı Göster',
        'product_show_outstock' => 'Stoğu Tükenen Ürünleri Göster',
        'invoice_prefix' => 'Fatura Ön Eki',
        'default_currency' => 'Varsayılan Para Birimi',
        'default_weight' => 'Varsayılan Ağırlık Birimi',
        'image' => 'Resim',
        'title' => 'Başlık',
        'content' => 'İçerik',
        'category_parent' => 'Ana Kategori',
        'domestic' => 'Yurtiçi',
        'domestic_currency' => 'Yurtiçi Para Birimi',
        'abroad' => 'Yurtdışı',
        'abroad_currency' => 'Yurtdışı Para Birimi',
        'taxRate' => 'Vergi Oranı',
        'tracking_url' => 'Takip Adresi',
        'door' => 'Kapıda Ödeme',
        'price' => 'Fiyat',
        'dealer_price' => 'Bayi Fiyat',
        'stock' => 'Stok',
        'password' => 'Şifre',
        'phone' => 'Telefon',
        'gender' => 'Cinsiyet',
        'date' => 'Doğum Tarihi',
        'discount_type' => 'İndirimi tipi',
        'discount_rate' => 'İndirim Oranı',
        'starting_date' => 'Başlangıç tarihi',
        'finish_date' => 'Bitiş tarihi',
        'minimum_price' => 'Minimum tutar',
        'tax_price' => 'Vergi Dahil Fiyat',
        'tax_dealer_price' => 'Vergi Dahil Bayi Fiyat',
        'today' => 'bugünün',
        'identity' => 'T.C. Kimlik No.',
        'tax_office' => 'Vergi Daire',
        'tax_no' => 'Vergi Numarası',
        'cc_owner' => 'Kart Sahibinin Adı Soyadı',
        'ccNumber' => 'Kredi Kartı Numarası',
        'cvv' => 'Güvenlik Kodu',
        'expiry' => 'Son Kullanma Tarihi',
        'month' => 'Ay',
        'year' => 'Yıl',
        'installment_number' => 'Taksit Sayısı',
        'comission_rate' => 'Komisyon Oranı',
        'extra_price' => 'Ek Ücret',
        'description' => 'Açıklama',
        'store_no' => 'Mağaza No',
        'user_password' => 'Üye İş Yeri Şifresi',
        'terminal_no' => 'Terminal No',
        'threed_address' => '3D Adres',
        'threed_key' => '3D Anahtar',
        'model' => 'Model',
        'api_address' => 'Api Adresi',
        'api_user' => 'Api Kullanıcı',
        'api_password' => 'Api Şifre',
        'organization_no' => 'Organizasyon No',
        'user_code' => 'Kullanıcı Kodu',
        'branch' => 'Şube',
        'no' => 'No',
        'owner' => 'Hesap Sahibi',
        'iban' => 'Iban',
        'card_number' => 'Kart Numarası',
        'expiration_date' => 'Son Geçerlilik Tarihi',
        'cvc' => 'CVC',
        'type' => 'Tip',
        'name_surname' => 'Ad Soyad',
        'link' => 'Link',
        'orderNo' => 'Sipariş Numarası',
        'bankId'  => 'Banka Adı',
        'amount' => 'Toplam Tutar',
        'branchNo' => 'Şube Numarası',
        'accountNo' => 'Hesap Numarası',
        'width' => 'Genişlik',
        'height' => 'Yükseklik',
        'image_width' => 'Genişlik',
        'image_height' => 'Yükseklik',
        'thumb_width' => 'Thumb Genişlik',
        'thumb_height' => 'Thumb Yükseklik',
        'zoom_width' => 'Zoom Genişlik',
        'zoom_height' => 'Zoom Yükseklik',
        'variation_type' => 'Varyasyon Tipi',
        'product_quick_cart' => 'Ürün Önizlemesinde Sepete Ekleme Butonu Göster',
        'product_quick_show' => 'Ürün Önizlemesinde Ürün Detay Butonu Göster',
        'product_quick_fav' => 'Ürün Önizlemesinde Favori Ekleme Butonu Göster',
        'langFile' => 'Dil Formatı',
        'oldPassword' => 'Eski Şifre',
        'newPassword' => 'Yeni Şifre',
        'repassword' => 'Şifre Tekrar',
        'confirmPassword' => 'Yeni Şifre Doğrulama',
        'rating' => 'Yıldız',
        'category' => 'Kategori',
        'uploadImage' => 'Resim',
        'postcode' => 'Posta Kodu',
        'verifyCode' => 'Doğrulama kodu',
        'surname' => 'Soyad',
        'date_birth' => 'Doğum Tarihi',
        'slogan1:' => 'Slogan 1',
        'slogan2:' => 'Slogan 2',
        'slogan3:' => 'Slogan 3',
        'seo_title' => 'Seo Başlık',
        'seo_keywords' => 'Seo Anahtar Kelimeler',
        'upload_multi_image' => 'Çoklu Dil Resmi',
        'sms_api' => 'SMS API',
        'sms_url' => 'SMS URL',
        'sms_username' => 'SMS Kullanıcı Adı',
        'sms_password' => 'SMS Şifre',
        'minimum_price_cargo' => 'Minimum Sepet Tutarı',
        'store_noLive' => 'Mağaza No',
        'store_passwordLive' => 'Mağaza Parolası',
        'store_keyLive' => 'Mağaza Gizli Anahtarı',
        'user_passwordTest' => 'Üye İş Yeri Şifresi',
        'terminal_noTest' => 'Terminal No',
        'threed_addressTest' => '3D Adress',
        'threed_keyTest' => '3D Anahtar',
        'modelTest' => 'Model',
        'api_addressTest' => 'Api Adresi',
        'api_userTest' => 'Api Kullanıcı',
        'api_passwordTest' => 'Api Şifre',
        'organization_noTest' => 'Organizasyon No',
        'user_codeTest' => 'Kullanıcı Kodu',
        'terminal_noLive' => 'Terminal No',
        'threed_addressLive' => '3D Adress',
        'threed_keyLive' => '3D Anahtar',
        'modelLive' => 'Model',
        'api_adressLive' => 'Api Adresi',
        'api_userLive' => 'Api Kullanıcı',
        'api_passwordLive' => 'Api Şifre',
        'organization_noLive' => 'Organizasyon No',
        'user_codeLive' => 'Kullanıcı Kodu',
        'store_noTest' => 'Mağaza No',
        'store_passwordTest' => 'Mağaza Parolası',
        'store_keyTest' => 'Mağaza Gizli Anahtarı',
        'currency_auto' => 'Para birimini güncellemek istiyorum',
        'currency_seconds' => 'Ne kadar sürede güncellensin',

        'show_discounted_products' => 'İndirimli ürünler gösterilsin mi?',
        'discounted_products_page' => 'İndirimli ürünler kaç adet gösterilsin?',
        'show_showcase' => 'Vitrindeki ürünler gösterilsin mi?',
        'showcase_page' => 'Vitrindeki ürünler kaç adet gösterilsin?',
        'show_newest_products' => 'Yeni ürünler gösterilsin mi?',
        'newest_products_page' => 'Yeni ürünler kaç adet gösterilsin?',
        'show_bestseller_products' => 'Çok satan ürünler gösterilsin mi?',
        'bestseller_products_page' => 'Çok satan ürünler kaç adet gösterilsin?',

        'fileType' => 'Dosya Türü',
        'processType' => 'İşlem Türü',
        'category' => 'Kategori',
        'imFile' => 'Dosya Yükleme'








    ],

];
