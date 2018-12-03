# Note++

System notatek

## Getting Started

Projekt Note++ jest moim autorskim projektem, umożliwiającym tworzenie notatek. System jest kompatybilny z urządzeniami mobilnymi, oraz mniejszymi ekranami.

### Wymagania

Aby system mógł zadziałać twój serwer musi spełniać następujące wymagania

```
1. PHP (z obsługą PDO + podstawowe biblioteki) - w wersji 7.2
2. MySQL - w wersji 5.7
```

### Instalacja

Jeśli twój serwer spełnia wymagania, to możesz przejść do instalacji systemu według poniższych instrukcji

```
1. Pobierz system z GitHuba w formacie .ZIP
2. Wypakuj pliki z paczki na serwer FTP do głównego katalogu, lub do podfolderu
3. Przejdź do lokalizacji application/config/ i edytuj plik app.php w celu skonfigurowania aplikacji
4. Zaimportuj plik .SQL do bazy danych
5. Przejdź na stronę i sprawdź czy nie ma żadnych błędów
6. Gotowe!
```

Jeśli znajdą się jakieś błędy, przeanalizuj plik konfiguracyjny w celu wykrycia błędu.

## System został zbudowany z:

* [Szablonu](http://www.dropwizard.io/1.0.2/docs/) - Tylko strona główna zbudowana jest z szablonu!
* [Bootstrap 4](https://getbootstrap.com/) - Framework użyty w całym projekcie
* [jQuery](https://jquery.com) - Framework odpowiada za dynamiczne zachowania strony

## Autorzy

* **SopelPL** - *Twórca projektu* - [GitHub](https://github.com/SopelPL)

## Licencja

Projekt został udostępniony na licencji GNU General Public License v3, więcej informacji znajduję się w pliku [LICENSE.md](LICENSE.md)
