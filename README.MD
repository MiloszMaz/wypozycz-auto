### Instrukcja korzystania z aplikacji 

Projekt nr 2. Aplikacja Webowa – Wypożyczalnia pojazdów samochodów osobowych

Aplikacja zbudowana na modelu MVC - Model - Widok - Kontroller

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
4. Funkcjonalność - logowanie dla 3 grup jest w jednym miejscu 