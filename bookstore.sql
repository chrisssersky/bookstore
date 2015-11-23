-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Lis 2015, 17:04
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int(11) NOT NULL,
  `first_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `last_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `country` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `author`
--

INSERT INTO `author` (`author_id`, `first_name`, `last_name`, `date_of_birth`, `country`) VALUES
(1, 'John ', 'Fowles', '1926-03-31', 'Wielka Brytania'),
(2, 'Paula ', 'Hawkins', '1972-09-26', 'Wielka Brytania'),
(3, 'Zielke', 'Mariusz', '1971-05-25', 'Polska'),
(4, 'Stephen', 'King', '1947-06-23', 'Stany Zjednoczone'),
(5, 'Nicholas ', 'Sparks', '1965-12-31', 'Stany Zjednoczone'),
(6, 'John', 'Grisham', '1955-02-24', 'Stany Zjednoczone'),
(7, 'Tom', 'Clancy', '1947-04-17', 'Stany Zjednoczone'),
(8, 'Philip', 'G. Zimbardo', '1986-07-23', 'USA'),
(9, 'Mirosław ', 'Bańko', '1976-03-23', 'Polska'),
(10, 'Dmitry', 'Glukhovsky', '1979-05-23', 'Rosja'),
(11, 'Piotr', 'Pytlakowski', '1951-04-23', 'Polska'),
(12, 'Jo', 'Nesbo', '1981-06-24', 'Norwegia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `create_date` year(4) NOT NULL,
  `price` double NOT NULL,
  `time_add` datetime NOT NULL,
  `avg_rating` double NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `book`
--

INSERT INTO `book` (`book_id`, `title`, `description`, `create_date`, `price`, `time_add`, `avg_rating`) VALUES
(1, 'Kolekcjoner', '"Kolekcjoner" to trzymająca w napięciu historia porwania i uwięzienia pięknej dwudziestoletniej studentki malarstwa, Mirandy Grey, przez zauroczonego nią obsesjonata, kolekcjonera motyli, Fryderyka Clegga. Bohater chce, by dziewczyna z ofiary przeistoczyła się w kochającą go kobietę. Dba o zapewnienie jej luksusowych warunków, spełnia każde pragnienie - z wyjątkiem jednego... Dziewczyna, niczym uwięziony motyl, pragnie tylko odzyskania wolności...', 1963, 24.99, '2015-10-17 19:12:00', 4.9375),
(2, 'Mag', 'Bohater książki, młody Anglik Nicholas Urfe, przyjmuje stanowisko nauczyciela na pewnej greckiej wyspie. Tam zaprzyjaźnia się z właścicielem wspaniałej posiadłości. Przyjaźń z milionerem wpędza młodzieńca w koszmar. Z każdym dniem rzeczywistość i fantazje coraz bardziej się mieszają, a Urfe staje się nieświadomym aktorem prywatnego teatru bogacza — styka się ze śmiercią, seksem i przemocą. Desperacko zaczyna walczyć o zachowanie życia. Akcji, stanowiącej prawdziwy labirynt zdarzeń, towarzyszą kulturowe szarady, a sama opowieść prowokuje do zastanowienia się nad iluzorycznością otaczającego nas świata i funkcjonujących w nim zasad moralnych.', 1965, 34.95, '2015-10-17 19:14:00', 2.61083984375),
(3, 'Najdłuższa podróż', 'W obliczu śmierci Ira wspomina swoje przeżycia z czasów II wojny światowej: radości i smutki dnia codziennego oraz wielką miłość – żonę, Ruth. Równocześnie z historią Iry poznajemy Sophię, studentkę próbującą pozbierać się po burzliwym związku, oraz Luke’a, ujeżdżacza byków, który po ciężkim wypadku zamierza wrócić na rodeo. Historie obu par zbiegną się w najmniej oczekiwanym momencie, przypominając, że ludzkim życiem rządzi przypadek oraz że miłość ma wymiar uniwersalny.', 2014, 45.35, '2015-10-17 19:25:18', 2),
(4, 'I wciąż ją kocham', 'John Tyree dokonuje wyboru - nie widząc szans na zdobycie wyższego wykształcenia, po ukończeniu szkoły średniej zaciąga się do armii. Przechodzi szkołę prawdziwego, męskiego życia, nabiera pewności siebie, której dotąd mu brakowało. W czasie przepustki spotyka Savannah – dziewczynę swoich marzeń. Młodszą o dwa lata studentkę pedagogiki, wolontariuszkę, która z grupą przyjaciół, w ramach akcji dobroczynnej, buduje domu dla ubogich. Na przekór wszelkich okolicznościom, pomiędzy obojgiem rozkwita miłość. Savannah przyrzeka czekać na ukochanego, dopóki nie minie okres jego służby...', 2006, 38.2, '2015-10-17 19:12:10', 3),
(5, 'Dla Ciebie wszystko', 'Dawson Cole i Amanda Collier. Chłopak z dołów społecznych, wychowany w rodzinie uchodzącej za najgorszą, najbardziej mściwą, najbardziej niebezpieczną w całym hrabstwie Pamlico: złodziei, dilerów narkotyków, sutenerów i pijaków ze skłonnościami do przemocy. I dziewczyna z przeciwnego bieguna społecznego, pragnąca zostać nauczycielką. Różnice pochodzenia, wychowanie, wreszcie nieprzychylni ludzie sprawiły, że tych dwoje nie mogło być razem, choć oboje bardzo tego pragnęli. Dawson, który w młodości niechcący zabił człowieka, nigdy się z tym nie po-godził. Żyje samotnie, pracując na platformach wiertniczych i pokutując za dawne winy. Amanda, mimo że wyszła za mąż i urodziła dzieci, czuje się nie-szczęśliwa. Po latach dawni kochankowie spotykają się w rodzinnym miasteczku z okazji pogrzebu starego przyjaciela. Stłamszone przed laty uczucie powraca – ale czy uda im się odnaleźć szczęście na przekór całemu światu? Przeszłość i związane z nią konflikty odzywają się ze zdwojoną siłą...', 2011, 65.35, '2015-10-17 09:24:31', 1),
(6, 'Dziewczyna z pociągu', 'Najszybciej sprzedający się debiut dla doroslych w historii brytyjskiego rynku. Co 6 sekund ktoś w Stanach Zjednoczonych kupuję tę książkę.\r\nMiliony egzemplarzy sprzedanych na całym świecie.\r\nRachel każdego ranka dojeżdża do pracy tym samym pociągiem. Wie, że pociąg zawsze zatrzymuje się przed tym samym semaforem, dokładnie naprzeciwko szeregu domów. Zaczyna się jej nawet wydawać, że zna ludzi, którzy mieszkają w jednym z nich. Uważa, że prowadzą doskonałe życie. Gdyby tylko mogła być tak szczęśliwa jak oni. I nagle widzi coś wstrząsającego. Widzi tylko przez chwilę, bo pociąg rusza, ale to wystarcza.\r\nWszystko się zmienia. Rachel ma teraz okazję stać się częścią życia ludzi, których widywała jedynie z daleka. Teraz przekonają się, że jest kimś więcej niż tylko dziewczyną z pociągu.', 2015, 27.99, '2015-10-19 14:45:30', 3.375),
(7, 'Sędzia', 'Dziennikarz Kuba Zimny pisze artykuł o Adamie Bonarze, właścicielu świetnie prosperującej firmy leasingowej, nagle pomówionym o oszukanie inwestorów na sumę 300 mln złotych. Bonar rozumie, że padł ofiarą manipulacji zmierzających do przejęcia jego firmy, i rozpoczyna niebezpieczną akcję odwetową, w której będzie się musiał zmierzyć z dwoma bardzo silnymi przeciwnikami: Księżnym, byłym funkcjonariuszem SB, a obecnie prezesem banku, i bezwzględnym sędzią Foglem. Bonara czeka wiele kłopotów, a czytelnika – lawina dramatycznych zdarzeń, z dwoma morderstwami włącznie.\r\n„Sędzia” to trzymający w napięciu thriller prawniczy, demaskujący powiązania między politykami, finansistami i cynicznymi prawnikami, którzy zapewniają przestępcom niekaralność i swobodę działania. Mariusz Zielke kolejny raz zdziera obnaża prawdziwe oblicze świata finansjery i kreśli prawdziwe oblicze świata, w którym prawo jest dla bogatych, a nie dla biednych.', 2015, 35.99, '2015-10-19 13:49:49', 2),
(8, 'Worek Kości', 'W wieku trzydziestu sześciu lat popularny pisarz, Michael Noonan, traci ukochaną żonę Johannę (Jo), która umiera nagle na parkingu centrum handlowego. Tuż przed śmiercią Jo kupiła domowy test ciążowy, ale Michael nie wiedział, że podejrzewa u siebie ciążę choć oboje długo czekali na dziecko. Gdyby urodziła się im dziewczynka, miała otrzymać imię Kia. Rzeczywiście, Jo była w ciąży, a płód był płci żeńskiej. Jednocześnie Noonan doznaje pisarskiej blokady. Po czterech latach, gnębiony koszmarami, decyduje się stawić im czoła.', 2015, 45.99, '2015-10-19 23:25:00', 4.65),
(9, 'Doktor Sen ', 'Niewielka grupa staruszków nazywająca się Prawdziwym Węzłem przemierza autostrady Ameryki swoimi samochodami turystycznymi w poszukiwaniu pożywienia. Na pierwszy rzut oka są całkowicie nieszkodliwi, w końcu to tylko emeryci odziani w poliester. Dwunastoletnia Abra Stone jednak wkrótce się przekona, że Prawdziwy Węzeł to prawie nieśmiertelne istoty, żywiące się substancją wytwarzaną przez poddane śmiertelnym torturom dzieci, obdarzone tym samym darem co Dan Torrance. \r\n\r\nNękany przez mieszkańców hotelu Panorama, w którym jako dziecko spędził jedną straszliwą zimę, Dan przez dziesięciolecia błąka się po Ameryce. Ostatecznie osiada w małym miasteczku w New Hampshire, lecząc swoje uzależnienie od alkoholu we wspierającej go grupie Anonimowych Alkoholików. Większość czasu spędza w domu opieki, gdzie zachowana z lat dzieciństwa resztka mocy pozwala mu nieść ulgę umierającym w ostatnich chwilach ich życia. Staje się tam znany jako „Doktor Sen”. Kiedy Dan poznaje Abrę Stone, jej nadzwyczajny dar budzi drzemiące w nim demony i każe mu stanąć do boju o jej duszę i przetrwanie.', 2013, 29.99, '2015-10-19 18:41:39', 0),
(10, 'Czarna bezgwiezdna noc', 'Zbiór 4 minipowieści mistrza grozy, które ujawniają jedną wspólną tajemnicę – ciemną stronę każdego z nas. Niezwykłe opowiadania, połączone tematem kary, zostały wzbogacone posłowiem Kinga, w którym autor opisuje inspiracje do powstania każdego z nich. "Wierzę w to, że w każdym człowieku jest drugi człowiek, obcy..." napisał Wilfred Leland James, bohater pierwszego opowiadania, zatytułowanego „1922”. Kolejne : „Wielki kierowca”, „Dobry interes” i „Dobre małżeństwo” udowadniają, że prawdziwy horror tworzymy sami sobie. Stephen King kolejny raz dowodzi, że jest mistrzem mrocznych historii i długich opowiadań.', 2015, 45.35, '2015-10-19 13:36:00', 3.9375),
(11, 'Ława przysięgłych', 'Wdowa po nałogowym palaczu za śmierć swojego męża obwinia koncern tytoniowy. Decyduje się wnieść sprawę do sądu. Po jednej stronie samotna kobieta, po drugiej potężny i bogaty, zatrudniający najlepszych prawników koncern.Miliony dolarów to stawka w precedensowej sprawie sądowej. Adwokaci obu stron walczą, by wygrać proces, zanim jeszcze się rozpocznie. Muszą tylko odpowiednio dobrać skład ławy przysięgłych... i umiejętnie wpłynąć na ich decyzje. Wśród dwunastu mężczyzn i kobiet, którzy wydadzą werdykt, jest jednak ktoś, kto o wiele zręczniej posługuje się manipulacją...', 2009, 56.93, '2015-10-21 12:39:44', 1),
(12, 'Znalezione nie kradzione ', '„Pobudka, geniuszu” – tymi niepokojącymi słowami zaczyna się opowieść o psychopatycznym czytelniku, którego literatura popycha do zbrodni. Geniuszem jest John Rothstein, autor porównywany z J.D. Salingerem, twórca słynnej postaci Jimmy’ego Golda, który jednak od kilku dekad nie wydał żadnej książki. Czytelnikiem – Morris Bellamy, wściekły nie tylko o to, że jego ulubiony autor przestał publikować nowe powieści, lecz także dlatego, że sprzedał nonkonformistyczną postać Jimmy’ego Golda dla zysków z reklam. Morris wymierza Rothsteinowi karę najdotkliwszą z możliwych. Zabija go i opróżnia jego sejf z gotówki. Kradnie też notesy zawierające co najmniej jedną niewydaną jeszcze powieść z Goldem. Morris ukrywa swój skarb, po czym za inne przestępstwo trafia do więzienia. Kilka dekad później chłopiec o nazwisku Pete Sauberg znajduje ukryty łup Bellamy’ego. Teraz Bill Hodges, Holly Gibney i Jerome Robinson muszą ratować chłopca i jego rodzinę przed mściwym Morrisem, który po trzydziestu pięciu latach, ogarnięty jeszcze większym obłędem, wychodzi na wolność. ', 2015, 30, '2015-10-19 16:40:43', 0),
(13, 'Stan zagrożenia', 'Mordercza rywalizacja supermocarstw odeszła w zapomnienie, a Stany Zjednoczone stanęły w obliczu nowego zagrożenia - ekspansji karteli narkotykowych. Jack Ryan tym razem zamieszany jest w nie do końca legalną akcję elitarnej Armii USA, która ma za zadanie zniszczenie mafii narkotykowych na terenie Kolumbii.', 2003, 34.99, '2015-10-21 13:32:39', 0),
(14, 'Psychologia i życie', 'Znany na całym świecie, przetłumaczony na wiele języków obcych podręcznik prezentuje wiedzę z całego zakresu psychologii, dostarczając narzędzi do krytycznej oceny wiarygodności wyników badań.', 2012, 97.45, '2015-11-09 16:26:31', 0),
(15, 'Słownik dobrego stylu', '... czyli wyrazy które się lubią. Słownik dobrego stylu obejmuje 5000 haseł i wskazuje, z jakim słowem połączyć dane słowo, podpowiada, jak najlepiej przekazać daną treść, uczy wyrażać się zgrabnie i naturalnie.', 2014, 30.45, '2015-11-09 13:41:00', 2.5),
(16, 'Metro 2033', 'Nowe wydanie pierwszego tomu fantastyczno-naukowego cyklu "Metro" Dmitrija Glukhovsky’ego – "Metro 2033". Rok 2033. Świat po zagładzie nuklearnej. Ocalali walczą o przetrwanie w sieci moskiewskiego metra. Ich los trafia w ręce młodego Artema. W związku z polską premierą niezwykle wyczekiwanej powieści "Metro 2035", zamykającej cykl "Metro", całość trylogii otrzymała nową artystyczną szatę graficzną, stworzoną przez znanego rosyjskiego ilustratora, Iliję Jackiewicza, twórcę okładek takich książek jak "FUTU.RE" (Glukhovsky), "Łzy Diabła" (Magdalena Kozak), "Szczury Wrocławia" (Robert J. Szmidt), a także wszystkich tomów serii "Uniwersum Metro 2033", w tym "Dzielnicy obiecanej" (Paweł Majka) i "Otchłani" (Robert J. Szmidt). Nowe wydania wzbogacone są również o ilustracje, które doskonale oddają postapokaliptyczny klimat.', 2015, 99.99, '2015-11-09 14:36:34', 3.75),
(17, 'Futu.re', 'Pokonaliśmy śmierć. I co dalej?\r\nOdkrycia naukowe poprzedniego pokolenia zapewniły mojemu nieśmiertelność i wieczną młodość.\r\nZiemię zaludniają piękne, tryskające zdrowiem i nieznające śmierci istoty.\r\nLecz każda utopia ma swoje cienie. Tak… Ktoś musi to robić – czuwać, by ów nowy wspaniały świat nie runął pod ciężarem przeludnienia, dbać, by jego kruchej równowagi nie zniszczyły zwierzęce instynkty człowieka. Ktoś musi troszczyć się o to, by ludzie żyli tak, jak przystoi nieśmiertelnym.\r\nTym kimś jestem ja.', 2015, 56.39, '2015-11-09 19:31:33', 4),
(18, 'Mój agent Masa', 'Poznaliście wersję Masy, teraz poznacie prawdę ... Jeden z najsłynniejszych polskich gliniarzy Piotr Wróbel w rozmowie z Piotrem Pytlakowskim opowiada jak pozyskał najcenniejszego agenta w świecie gangsterskim, Jarosława Sokołowskiego ps. Masa i tłumaczy, dlaczego jego informator nigdy nie powinien dostać statusu świadka koronnego. To historia o Masie, który donosił na kumpli, ale też o innym gangsterze, który doniósł na Masę.', 2015, 45.89, '2015-11-09 10:28:28', 0),
(19, 'Więcej krwi', 'Jon ucieka przed zemstą Rybaka, najważniejszego gangstera w Oslo, którego zdradził. Kieruje się na daleką północ Norwegii i ukrywa się w leśnej czatowni, gdzie pomaga mu tylko Lea, samotna matka i jej syn, Knut. Słońce północy, które nigdy nie zachodzi, powoli doprowadza mężczyznę do obłędu, a ludzie Rybaka są coraz bliżej...', 2015, 25.99, '2015-11-09 07:20:26', 0),
(20, 'Krew na śniegu ', 'Lata 70., Oslo. Olav Johanssen to płatny zabójca, który pracuje dla najbardziej wpływowego gangstera w mieście. Otrzymuje nietypowe zlecenie - ma zabić żonę swojego szefa. Nie wypełnia jednak należycie swojego zadania...', 2014, 24.99, '2015-11-09 15:30:39', 4.5),
(21, 'Łowcy głów', 'Roger Brown uważa się za najlepszego i zarazem najbardziej niedocenianego łowcę głów w Norwegii. Ma zbyt piękną żonę i zbyt drogą willę, dlatego zbyt często musi kraść dzieła sztuki. Kiedy poznaje Clasa Greve, szczęśliwego posiadacza bezcennego obrazu Rubensa, postanawia wykorzystać szansę i zrobić decydujący krok w stronę finansowej niezależności…\r\nAkcja powieści toczy się w świecie finansowej elity i w przestępczym podziemiu. Morderstwa, spektakularne pościgi i oszałamiające tempo zdarzeń. Polowanie na głowy trwa…', 2012, 45.99, '2015-11-09 07:26:27', 3),
(22, 'Karaluchy', 'W domu publicznym w stolicy Tajlandii znaleziono ciało zamordowanego norweskiego ambasadora. W Oslo pospiesznie tworzony jest plan uniknięcia skandalu. Policjant Harry Hole wsiada do samolotu skacowany, z zastrzykami witaminy B12 w walizce i wkrótce zaczyna krążyć po zaułkach Bangkoku – wśród świątyń, palarni opium, dziecięcych prostytutek i barów go-go. Odkrywa, że w tej sprawie chodzi o coś więcej niż o morderstwo: za ścianami pełza coś, co nie znosi światła dziennego...\r\n', 2011, 35.86, '2015-11-09 06:13:16', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book_author`
--

CREATE TABLE IF NOT EXISTS `book_author` (
  `book_author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`book_author_id`),
  KEY `book2_author_fk` (`author_id`),
  KEY `book_author_fk` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `book_author`
--

INSERT INTO `book_author` (`book_author_id`, `book_id`, `author_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 6, 2),
(4, 7, 3),
(5, 8, 4),
(6, 9, 4),
(7, 10, 4),
(8, 12, 4),
(9, 3, 5),
(10, 4, 5),
(11, 5, 5),
(12, 11, 6),
(13, 13, 7),
(14, 14, 8),
(15, 15, 9),
(16, 16, 10),
(17, 17, 10),
(18, 18, 11),
(19, 19, 12),
(20, 20, 12),
(21, 21, 12),
(22, 22, 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book_category`
--

CREATE TABLE IF NOT EXISTS `book_category` (
  `book_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`book_category_id`),
  KEY `book2_category_fk` (`book_id`),
  KEY `book_category_fk` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `book_category`
--

INSERT INTO `book_category` (`book_category_id`, `category_id`, `book_id`) VALUES
(1, 9, 1),
(2, 13, 6),
(3, 13, 7),
(4, 13, 8),
(5, 14, 2),
(6, 12, 3),
(7, 12, 4),
(8, 12, 5),
(9, 13, 9),
(10, 13, 10),
(11, 1, 11),
(12, 13, 12),
(13, 1, 13),
(14, 11, 14),
(15, 15, 15),
(16, 4, 16),
(17, 4, 17),
(18, 2, 18),
(19, 9, 19),
(20, 6, 20),
(21, 6, 21),
(22, 6, 22);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book_comment`
--

CREATE TABLE IF NOT EXISTS `book_comment` (
  `comment_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `time` datetime,
  PRIMARY KEY (`comment_id`),
  KEY `book_comment_fk` (`book_id`),
  KEY `book_comment_user_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `book_comment`
--

INSERT INTO `book_comment` (`comment_id`, `book_id`, `user_id`, `comment`, `time`) VALUES
(1, 7, 2, 'Dziennikarz Kuba Zimny pisze artykuł o Adamie Bonarze, właścicielu świetnie prosperującej firmy leasingowej, nagle pomówionym o oszukanie inwestorów na sumę 300 mln złotych. Bonar rozumie, że padł ofiarą manipulacji zmierzających do przejęcia jego firmy, i rozpoczyna niebezpieczną akcję odwetową, w której będzie się musiał zmierzyć z dwoma bardzo silnymi przeciwnikami.', '2015-11-17 08:19:20'),
(2, 7, 2, 'The HTTP protocol is based on a request/response pattern, which means that the server cannot push any data to the client (i.e., the server can only provide data to the client in response to a client request). Long polling is a web application development pattern used to emulate pushing data from server to client. When the long polling pattern is used, the client submits a request to the server and the connection then remains active until the server is ready to send data to the client. The connection is closed only after data is sent back to the client or connection timeout occurs. The client then creates a new request when the connection is closed, thus restarting the loop.', '2015-11-18 19:11:20'),
(3, 1, 1, 'Fowles tak niesamowicie tworzy trudne charaktery i stawia ich w sytuacji, która byłaby naturalna dla nas, zwykłych ludzi, dopiero wtedy, gdyby pewne postawy moralne i normy społeczne uległy w jakimś stopniu zniekształceniu. Sprawia, że bohatera, którego powinniśmy wewnętrznie karcić, pouczać, usprawiedliwiamy, czując dla niego pewną dozę współczucia, a może nawet sympatii. W słowach Fowlesa tytułowy kolekcjoner, który niewątpliwie żyje w zakrzywionej rzeczywistości staje się kimś, do kogo nie żywi się urazy, a raczej fascynuje jego postąpieniami, jego myślami, jego schematem działania.\r\nPowieść wprawia w drganie tę delikatną u wielu ludzi strunę moralności. Zaczynasz zastanawiać się, gdzie tak naprawdę istnieje granica pomiędzy postępowaniem dobrym i złym oraz kto ją określa', '2015-11-19 13:25:58'),
(4, 1, 2, 'dsfsdfsdf', '2015-11-22 18:34:21'),
(5, 1, 3, 'sdfsdf', '2015-11-22 23:58:44');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Akcja'),
(2, 'Biografia'),
(3, 'Dla dzieci'),
(4, 'Fantastyka'),
(5, 'Historia'),
(6, 'Horror'),
(7, 'Klasyka'),
(8, 'Komiks'),
(9, 'Kryminał'),
(10, 'Poezja'),
(11, 'Poradnik'),
(12, 'Romans'),
(13, 'Thriller'),
(14, 'Dramat'),
(15, 'Edukacja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `final_purchase`
--

CREATE TABLE IF NOT EXISTS `final_purchase` (
  `final_purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_status_id` int(11) NOT NULL,
  PRIMARY KEY (`final_purchase_id`),
  KEY `final_purchase_user_fk` (`user_id`),
  KEY `final_purchase_status_fk` (`purchase_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `final_purchase`
--

INSERT INTO `final_purchase` (`final_purchase_id`, `user_id`, `purchase_status_id`) VALUES
(1, 3, 1),
(2, 2, 1),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `final_purchase_item`
--

CREATE TABLE IF NOT EXISTS `final_purchase_item` (
  `final_purchase_item_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `final_purchase_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`final_purchase_item_id`),
  KEY `final_purchase_fk` (`book_id`),
  KEY `final2_purchase_fk` (`final_purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `final_purchase_item`
--

INSERT INTO `final_purchase_item` (`final_purchase_item_id`, `book_id`, `final_purchase_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 14, 3, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_status_id` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`),
  KEY `purchase_status_fk` (`purchase_status_id`),
  KEY `purchase_user_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `purchase_item`
--

CREATE TABLE IF NOT EXISTS `purchase_item` (
  `purchase_item_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`purchase_item_id`),
  KEY `purchase_fk` (`book_id`),
  KEY `purchase2_fk` (`purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `purchase_status`
--

CREATE TABLE IF NOT EXISTS `purchase_status` (
  `status_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `purchase_status`
--

INSERT INTO `purchase_status` (`status_id`, `name`) VALUES
(1, 'Zrealizowano'),
(2, 'W realizacji');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_details_fk` (`detail_id`),
  KEY `user_role_fk` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `detail_id`, `login`, `password`, `email`) VALUES
(1, 1, 1, 'chrissser', 'admin', 'krzysiekserek@gmail.com'),
(2, 2, 2, 'student', 'student', 'krzysiekserek@gmail.com'),
(3, 2, 3, 'test', 'test', 'krzysiekserek@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `detail_id` int(11) NOT NULL,
  `first_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `last_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` int(11) NOT NULL,
  `street` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `country` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user_details`
--

INSERT INTO `user_details` (`detail_id`, `first_name`, `last_name`, `date_of_birth`, `sex`, `street`, `country`) VALUES
(1, 'Krzysztof', 'Serafin', '1992-07-26', 1, 'Rycerska, Rzeszów', 'Polska'),
(2, 'Karolina', 'Krupa', '1990-04-23', 1, 'Stolarska 12, Krosno', 'Polska'),
(3, 'Chris', 'Dobovsky', '2015-11-20', 1, 'Podlaski Bełt', 'Polska');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user_role`
--

INSERT INTO `user_role` (`role_id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Użytkownik');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `book2_author_fk` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `book_author_fk` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Ograniczenia dla tabeli `book_category`
--
ALTER TABLE `book_category`
  ADD CONSTRAINT `book2_category_fk` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `book_category_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Ograniczenia dla tabeli `book_comment`
--
ALTER TABLE `book_comment`
  ADD CONSTRAINT `book_comment_fk` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `book_comment_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ograniczenia dla tabeli `final_purchase`
--
ALTER TABLE `final_purchase`
  ADD CONSTRAINT `final_purchase_status_fk` FOREIGN KEY (`purchase_status_id`) REFERENCES `purchase_status` (`status_id`),
  ADD CONSTRAINT `final_purchase_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ograniczenia dla tabeli `final_purchase_item`
--
ALTER TABLE `final_purchase_item`
  ADD CONSTRAINT `final2_purchase_fk` FOREIGN KEY (`final_purchase_id`) REFERENCES `final_purchase` (`final_purchase_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `final_purchase_fk` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Ograniczenia dla tabeli `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_status_fk` FOREIGN KEY (`purchase_status_id`) REFERENCES `purchase_status` (`status_id`),
  ADD CONSTRAINT `purchase_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ograniczenia dla tabeli `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD CONSTRAINT `purchase2_fk` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`purchase_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_fk` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Ograniczenia dla tabeli `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_details_fk` FOREIGN KEY (`detail_id`) REFERENCES `user_details` (`detail_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_role_fk` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
