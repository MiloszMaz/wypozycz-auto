### Instrukcja korzystania z aplikacji 

Projekt nr 2. Aplikacja Webowa – Wypożyczalnia pojazdów samochodów osobowych

Aplikacja zbudowana na modelu MVC - Model - Widok - Kontroller

### Katalogi
1. config - dane konfiguracyjne w formie tablic
2. Controller - kontroler obsługuje kwestie serwerowe i przetwarzanie danych
3. Core - klasy bazowe takie jak autoryzacji, wyświetlenia wiadomości flash, obsługa bazy danych, przekierowania i generowanie url
4. Model - obsluguje zapytania do bazy danych i modele danych
5. public - katalog w którym znajduje się aplikacja
6. views - widok, nie zawiera kodu przetwarzającego dane, służy do prezentacji
7. App.php - klasa bazowa aplikacji jest uruchamiana przez plik `public/index.php`
8. Autoloader.php - ładuje zależności (inne klasy) za pomocą przestrzeni nazw namespace

## Baza danych
1. Dane do bazy znajdują się w pliku `config/database.php`
2. Dump bazy danych znajduje się w pliku `data/sql-dump.sql`

## Użytkownicy w systemie
1. Pracownik `michal` `test123`
2. Kierownik `jan` `test123`
3. Administrator `milosz` `test123`
Źródło autoryzacji znajduje się w pliku `Core/Auth.php`


## Założenia zrealizowane w projekcie z pdf
1. Zaprojektowana aplikacja WWW oparta na własnym mini-frameworku MVC - wypożyczalnia samochodów osobowych.
2. Dane (objekty) zawarte w aplikacji:
a) Klienci - model `Model/Klienci.php` tabela bazy danych klienci
b) Samochod - model `Model/Samochod.php` tabela bazy danych samochod
c) Wypozyczenia - model `Model/Wypozyczenia.php` tabela bazy danych wypozyczenia
d) dodatkowy obiekt User - model `Model/User.php` tabela user - klasa do obsługi użytkowników (pracownik, kierownik, administrator) w bazie danych
3. Przygotowana relacyjna baza danych mysql - zrzut w `data/sql-dump.sql`
Baza danych zawiera relacje:
Wypozyczenia (id_klienta) - Klienci (id)
Wypozyczenia (id_samochodu) - Samochod (id)
4. Funkcjonalność - logowanie dla 3 grup jest w jednym miejscu. Użytkownicy są przechowywami w bazie danych, natomiast w kodzie przywileje i sesje obsługuje klasa `Core/Auth.php`
Menu zalogowanych jest oddzielone od menu gości - menu dla zalogowanych ma kolor ciemnoczerwony.
5. Przyjmowanie zamowien - opracowane w sposob:
Gość może złożyć zamówienie, natomiast pracownik musi je ostatecznie potwierdzić, czyli przyjąć zamówienie
Gość na stronie głównej wybiera samochód i klika wypożycz - następnie wypełnia formularz i dane zapisują się w bazie danych.
Strony: 
6. Usuwanie rezerwacji