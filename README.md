# Поиск и устранение утечек памяти в PHP
Демонстрационный проект [стрима Валентина Удальцова на канале PHP Point](https://youtu.be/NNMp-97rk9c).

## Упомянутые материалы
* [авторский канал Пых в Telegram](https://t.me/phpyh)
* [Правильная регистрация консольных команд Symfony в DI](https://medium.com/phpyh/%D0%BF%D1%80%D0%B0%D0%B2%D0%B8%D0%BB%D1%8C%D0%BD%D0%B0%D1%8F-%D1%80%D0%B5%D0%B3%D0%B8%D1%81%D1%82%D1%80%D0%B0%D1%86%D0%B8%D1%8F-%D0%BA%D0%BE%D0%BD%D1%81%D0%BE%D0%BB%D1%8C%D0%BD%D1%8B%D1%85-%D0%BA%D0%BE%D0%BC%D0%B0%D0%BD%D0%B4-%D0%B2-symfony-di-f7536c254926)
* [Symfony ProgressBar](https://symfony.com/doc/current/components/console/helpers/progressbar.html)
* [Symfony Stopwatch](https://symfony.com/doc/current/components/stopwatch.html)
* [пример MemoryInterrupter для предотвращения memory exhausted в воркерах](src/Worker/MemoryInterrupter.php)
* [про параметр $real_usage в memory_get_usage()](https://alexwebdevelop.com/monitor-script-memory-usage/#real-usage)
* [must-read про сборку мусора на официальном сайте PHP](https://www.php.net/manual/ru/features.gc.php)
* [тикеты про утечки памяти на bugs.php.net](https://www.google.com/search?q=site%3Abugs.php.net+memory+leak)
* [issue про reset в Symfony Console](https://github.com/symfony/symfony/pull/32418)

## Расширение php-memprof
* https://github.com/arnaud-lb/php-memory-profiler
* под Mac устанавливаем Judy из [исходников](https://sourceforge.net/projects/judy/)
* `pecl install memprof`
* `brew install qcachegrind`
* `memprof_dump_callgrind(fopen($projectDir.'callgrind.dump', 'wb'));`
* `MEMPROF_PROFILE=1 bin/console leak --env=prod`
* `qcachegrind callgrind.dump`

## Расширение php-meminfo
* https://github.com/BitOne/php-meminfo
* клонируем мой форк `git clone git@github.com:vudaltsov/php-meminfo.git` + `git checkout php74_support`
* устанавливаем по инструкции в `README.md`
* [подробная инструкция по анализу](https://github.com/BitOne/php-meminfo/blob/master/doc/hunting_down_memory_leaks.md)
