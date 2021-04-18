<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>  
  
<p align="center">  
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>  
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>  
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>  
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>  
</p>  

Ugulama geliştirilirken kullanılan teknolojiler:
---
______

```bash
PHP (8.0)
Laravel (8)
PhpStorm (2021.3)
```
  
## Api Listesi

>   GET api/v1/companies
  
Bütün company datasını listelemek için kullanılır

**Company Register**
> POST api/v1/register

kayıt olmak ve token alma işlemi için kullanılır.
  
>   GET api/v1/companies/id

  Company detaylarını listelemek için kullanılır
  
  **Company Package**
> POST api/v1/companies/package

company_id ve package_id değerine göre göre company'e paket tanımlanması yapmak için kullanılır.

> GET api/v1/reports/payments

Company'ler için bütün ödeme detaylarını listeler. (status : 1 başarılı, satatus:0 başarısız ödeme ) 

> GET api/v1/packages

Bütün paket bilgilerinin listeler

> GET api/v1/packages/id

id bilgisi girilen paket detaylarını listeler

### WORKER
Random bir hash oluşturularak son basamağı tek ise hesaptan çekildi, çift ise çekilemedi, şeklinde ödeme kurgusu tanımlanmıştır. Çekilemez ise 1 gün ara ile tekrar denenecek şekilde bir kuyruk yapısı kullanıldı. Üçüncü seferde yapılamaz ise company pasif durumuna alınır. Company_payments’ a denemeler kaydedilir..

### RAPOR
Worker çalıştıktan sonra başarılı işlem, başarısız işlem, başarılı işlem tutarı, başarısız işlem tutarı, günlere göre listelenmektedir.

> GET api/v1/reports/payments

api 'den kontrol edilebilir.

### SANCTUM
sisteme kayıt olup token alma işlemleri için laravel/sanctum kullanılır. Detaylarına laravel-sanctum
