<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class News
{
    private array $data = [
        '1' => [
            'id' => 1,
            'category_id' => 1,
            'title' => 'В Херсонской области заявили, что Украина оказалась разменной монетой',
            'desc' => 'Украина оказалась разменной монетой в борьбе между "американскими жуликами"',
            'inform' => 'Украина оказалась разменной монетой в борьбе между "американскими жуликами", заявил РИА Новости заместитель главы администрации Херсонской области Кирилл Стремоусов."Украина оказалась разменной монетой в борьбе между жуликами американскими", - сказал он.',
            'date_of_public' => '2022-10-23 12:21:00',
            'isPrivate' => true
            ],
        '2' => [
            'id' => 2,
            'category_id' => 1,
            'title' => 'Путин поздравил Си Цзиньпина с переизбранием на третий срок',
            'desc' => 'Президент РФ Владимир Путин направил поздравительную телеграмму Си Цзиньпину',
            'inform' => 'Президент РФ Владимир Путин направил поздравительную телеграмму Си Цзиньпину, избранному генеральным секретарем Компартии Китая на третий срок, сообщил РИА Новости пресс-секретарь президента Дмитрий Песков.',
            'date_of_public' => '2022-10-23 08:00:0',
            'isPrivate' => false
        ],
        '3' => [
            'id' => 3,
            'category_id' => 1,
            'title' => 'Time: Россия знает о главном уязвимом месте Украины',
            'desc' => 'Россия хорошо знает уязвимые места украинской энергетики',
            'inform' => 'Россия хорошо знает уязвимые места украинской энергетики, созданной во времена СССР, пишет обозреватель газеты Time Сиара Ньюджент.',
            'date_of_public' => '2022-10-22 21:44:00',
            'isPrivate' => false
            ],
        '4' => [
            'id' => 4,
            'category_id' => 1,
            'title' => 'Американский офицер назвал способ молниеносно парализовать ВСУ',
            'desc' => 'Вооруженные силы Украины утратят боеспособность в случае захвата линий снабжения в Волынской и Львовской областях',
            'inform' => 'Вооруженные силы Украины утратят боеспособность в случае захвата линий снабжения в Волынской и Львовской областях, пишет подполковник армии США в отставке Дэниел Дэвис в статье для 19Fortyfive.',
            'date_of_public' => '2022-10-22 18:17:00',
            'isPrivate' => true
            ],
        '5' =>[
            'id' => 5,
            'category_id' => 2,
            'title' => 'Китай останется островом стабильности в мире, заявил эксперт',
            'desc' => 'Переизбрание председателем КПК Си Цзиньпина характеризует Китай как "остров стабильности"',
            'inform' => 'Переизбрание председателем КПК Си Цзиньпина характеризует Китай как "остров стабильности" в турбулентный период мировой истории, завил РИА Новости заместитель председателя общества Российско-Китайской дружбы Сергей Санакоев.',
            'date_of_public' => '2022-10-23 16:18:00',
            'isPrivate' => false
            ],
        '6' =>[
            'id' => 6,
            'category_id' => 2,
            'title' => 'Демонстранты в Брюсселе потребовали мер для борьбы с изменением климата',
            'desc' => 'Десятки тысяч демонстрантов вышли в воскресенье на улицы Брюсселя',
            'inform' => 'Десятки тысяч демонстрантов вышли в воскресенье на улицы Брюсселя, чтобы потребовать от местных и общеевропейских властей принять более действенные меры для защиты планеты от изменений климата, передает корреспондент РИА Новости.',
            'date_of_public' => '2022-10-23 16:17:00',
            'isPrivate' => true
            ],
        '7' =>[
            'id' => 7,
            'category_id' => 2,
            'title' => 'Участники акции оппозиции в Кишиневе пытались пройти через кордон полиции',
            'desc' => 'Члены и сторонники партии "Шор" в Кишиневе пытаются прорвать кордон полиции',
            'inform' => 'Члены и сторонники партии "Шор" в Кишиневе пытаются прорвать кордон полиции, чтобы добраться до центральной площади и провести там антиправительственный протест, передает корреспондент РИА Новости.',
            'date_of_public' => '2022-10-23 16:06:00',
            'isPrivate' => false
            ],
        '8' =>[
            'id' => 8,
            'category_id' => 2,
            'title' => 'Вучич: США приблизились к идеальному шторму, разместив десант в Румынии',
            'desc' => 'Размещение у границы с Украиной в Румынии 101-й воздушно-десантной дивизии Сухопутных войск США приближает резкое обострение ситуации',
            'inform' => 'Размещение у границы с Украиной в Румынии 101-й воздушно-десантной дивизии Сухопутных войск США приближает резкое обострение ситуации, которое можно назвать идеальным штормом, заявил президент Сербии Александр Вучич. Об этом сообщает агентство TANJUG.',
            'date_of_public' => '2022-10-23 15:59:00',
            'isPrivate' => true
            ],
        '9' =>[
            'id' => 9,
            'category_id' => 2,
            'title' => 'Украинские войска обстреляли три населенных пункта в ДНР',
            'desc' => 'Украинские войска за 23 минуты обстреляли Гольмовский, Зайцево и Макеевку',
            'inform' => 'Украинские войска за 23 минуты обстреляли Гольмовский, Зайцево и Макеевку, выпустив в сумме 13 снарядов, сообщает представительство ДНР в Совместном центре контроля и координации вопросов, связанных с военными преступлениями Украины.',
            'date_of_public' => '2022-10-23 15:41:00',
            'isPrivate' => false
            ],
        '10' =>[
            'id' => 10,
            'category_id' => 3,
            'title' => '"Газпром" подает газ через Украину на ГИС "Суджа" в подтвержденном объеме',
            'desc' => 'Газпром" подает газ через Украину',
            'inform' => '"Газпром" подает газ через Украину в подтвержденном украинской стороной объеме через газоизмерительную станцию (ГИС) "Суджа" - 42,4 миллиона кубометров на 23 октября, на ГИС "Сохрановка" заявка отклонена, сообщил официальный представитель российской компании Сергей Куприянов.',
            'date_of_public' => '2022-10-23 10:38:00',
            'isPrivate' => false
            ],
        '11' =>[
            'id' => 11,
            'category_id' => 3,
            'title' => 'Глава бизнес-палаты рассказал о работе в России индийского автопрома',
            'desc' => 'Индийские автопроизводители намерены выйти на российский рынок в ближайшее время',
            'inform' => 'Индийские автопроизводители намерены выйти на российский рынок в ближайшее время, в данный момент оценивают конъюнктуру, заявил РИА Новости президент Индийской палаты международного бизнеса Манприт Сингх Наги.',
            'date_of_public' => '2022-10-23 08:26:00',
            'isPrivate' => false
            ],
        '12' =>[
            'id' => 12,
            'category_id' => 3,
            'title' => 'Стоимость ипотеки в Европе бьет многолетние рекорды',
            'desc' => 'Средние ставки по ипотеке в Европе стремительно растут',
            'inform' => 'Средние ставки по ипотеке в Европе стремительно растут, выяснило РИА Новости на основе анализа данных ряда центробанков региона. Согласно изученным сведениям 35 регуляторов, ставки по жилищным кредитам достигли многолетних максимумов в 20 европейских странах, а больше всего с января они выросли в Молдавии и Польше.',
            'date_of_public' => '2022-10-23 08:00:00',
            'isPrivate' => false
            ],
        '13' => [
            'id' => 13,
            'category_id' => 3,
            'title' => 'Останутся без металла: CША взялись за российский алюминий',
            'desc' => 'В Вашингтоне раздумывают над полным запретом импорта алюминия из России',
            'inform' => 'В Вашингтоне раздумывают над полным запретом импорта алюминия из России. Аналитики предупреждают: это обернется дефицитом металла и взлетом мировых цен, что больно ударит и по американской, и по европейской промышленности.',
            'date_of_public' => '2022-10-23 08:00:00',
            'isPrivate' => true
            ],
        '14' => [
            'id' => 14,
            'category_id' => 4,
            'title' => 'Жители дома в Иркутске, пострадавшего при ЧП, получат выплаты во вторник',
            'desc' => 'Жители дома, пострадавшего после падения самолета в Иркутске, получат компенсацию',
            'inform' => 'Жители дома, пострадавшего после падения самолета в Иркутске, получат компенсацию во вторник, в течение недели будет решен вопрос дальнейшего проживания, сообщил губернатор Иркутской области Игорь Кобзев.',
            'date_of_public' => '2022-10-23 15:43:00',
            'isPrivate' => false
            ],
        '15' => [
            'id' => 15,
            'category_id' => 4,
            'title' => 'В "Ростехе" заявили, что не сотрудничают с "Мотор Сич" с 2014 года',
            'desc' => '"Ростех" провел импортозамещение и не сотрудничает с украинским предприятием "Мотор Сич"',
            'inform' => '"Ростех" провел импортозамещение и не сотрудничает с украинским предприятием "Мотор Сич" с 2014 года, заявили журналистам в воскресенье в пресс-службе госкорпорации.',
            'date_of_public' => '2022-10-23 14:21:00',
            'isPrivate' => false
            ],
        '16' => [
            'id' => 16,
            'category_id' => 4,
            'title' => 'В Запорожской области возложили цветы на мемориале на линии "Вотан"',
            'desc' => 'Жители Запорожской области почтили память освободителей Мелитополя от фашистов',
            'inform' => 'Жители Запорожской области почтили память освободителей Мелитополя от фашистов в годы Великой Отечественной войны, возложив цветы на мемориальном комплексе на линии "Вотан" в селе Мордвиновка, передает корреспондент РИА Новости.',
            'date_of_public' => '2022-10-23 13:26:00',
            'isPrivate' => true
            ],
        '17' => [
            'id' => 17,
            'category_id' => 4,
            'title' => 'Губернатор Севастополя объяснил громкие звуки в городе',
            'desc' => 'Губернатор Севастополя Михаил Развожаев сообщил, что громкие звуки в городе связаны с учениями',
            'inform' => 'Губернатор Севастополя Михаил Развожаев сообщил, что громкие звуки в городе связаны с учениями, и призвал население сохранять спокойствие.',
            'date_of_public' => '2022-10-23 13:09:00',
            'isPrivate' => false
            ],
        '18' => [
            'id' => 18,
            'category_id' => 5,
            'title' => 'На месте падения самолета в Иркутске завершили аварийно-спасательные работы',
            'desc' => 'Пожар на месте падения самолёта в Иркутске ликвидирован',
            'inform' => 'Пожар на месте падения самолёта в Иркутске ликвидирован, там работают следователи и полицейские, передает корреспондент РИА Новости.',
            'date_of_public' => '2022-10-23 16:25:00',
            'isPrivate' => false
            ],
        '19' => [
            'id' => 19,
            'category_id' => 5,
            'title' => 'Семьи из поврежденного дома в Иркутске получат по сто тысяч тысяч рублей',
            'desc' => 'Две семьи, проживавшие в пострадавшем при падении самолета доме в Иркутске, получат по 100 тысяч рублей во вторник',
            'inform' => 'Две семьи, проживавшие в пострадавшем при падении самолета доме в Иркутске, получат по 100 тысяч рублей во вторник, сообщил губернатор Иркутской области Игорь Кобзев.',
            'date_of_public' => '2022-10-23 16:13:00',
            'isPrivate' => false
            ],
        '20' => [
            'id' => 20,
            'category_id' => 5,
            'title' => 'Энергоснабжение в Иркутске восстановят к 22:30',
            'desc' => 'Энергоснабжение в домах в Иркутске восстановят к 22.30 воскресенья (17.30 мск)',
            'inform' => 'Энергоснабжение в домах в Иркутске, где был отключен свет после падения самолета, восстановят к 22.30 воскресенья (17.30 мск), сообщил губернатор Иркутской области Игорь Кобзев.',
            'date_of_public' => '2022-10-23 15:58:00',
            'isPrivate' => false
            ],
        '21' => [
            'id' => 21,
            'category_id' => 5,
            'title' => 'Мэр Иркутска подтвердил отсутствие жильцов в доме при падении самолета',
            'desc' => 'Пять человек проживают в доме в Иркутске, где упал самолет',
            'inform' => 'Пять человек проживают в доме в Иркутске, где упал самолет, в момент падения их не было дома, сообщил мэр города Руслан Болотов.',
            'date_of_public' => '2022-10-23 15:55:00',
            'isPrivate' => false
            ],
        '22' => [
            'id' => 22,
            'category_id' => 6,
            'title' => 'Российские военные уничтожили нефтехранилище в Днепропетровской области',
            'desc' => 'Российская оперативно-тактическая и армейская авиация, а также ракетные войска и артиллерия уничтожили пять складов боеприпасов',
            'inform' => 'Российская оперативно-тактическая и армейская авиация, а также ракетные войска и артиллерия уничтожили пять складов боеприпасов, нефтехранилище и склад горючего для авиации в районе населенного пункта Алексеевка Днепропетровской области, сообщили в Минобороны РФ.',
            'date_of_public' => '2022-10-23 15:05:00',
            'isPrivate' => true
            ],
        '23' => [
            'id' => 23,
            'category_id' => 6,
            'title' => 'Российские военные нанесли удары по системам военного управления Украины',
            'desc' => 'Российские Вооруженные силы нанесли новые удары',
            'inform' => 'Российские Вооруженные силы нанесли новые удары по украинским системам военного управления и энергетики, сообщили в Минобороны.',
            'date_of_public' => '2022-10-23 14:52:00',
            'isPrivate' => false
            ],
        '24' => [
            'id' => 24,
            'category_id' => 6,
            'title' => 'В Курской области построили две линии обороны на границе с Украиной',
            'desc' => 'В Курской области возвели две усиленных линии обороны на границе с Украиной',
            'inform' => 'В Курской области возвели две усиленных линии обороны на границе с Украиной, сообщил губернатор региона Роман Старовойт.',
            'date_of_public' => '2022-10-23 14:42:00',
            'isPrivate' => false
            ],
        '25' => [
            'id' => 25,
            'category_id' => 6,
            'title' => 'ВСУ намерены уничтожить население Херсонской области, заявил Стремоусов',
            'desc' => 'Украинским войскам поставлена задача уничтожить население Херсонской области',
            'inform' => 'Украинским войскам поставлена задача уничтожить население Херсонской области, заявил заместитель главы администрации региона Кирилл Стремоусов.',
            'date_of_public' => '2022-10-23 13:45:00',
            'isPrivate' => true
            ],
        '26' => [
            'id' => 26,
            'category_id' => 7,
            'title' => 'Россия считает возможным продление работы МКС',
            'desc' => 'Правительство РФ считает возможным продлить работу Международной космической станции (МКС)',
            'inform' => 'Правительство РФ считает возможным продлить работу Международной космической станции (МКС) до 2028 года, заявил журналистам вице-премьер - глава Минпромторга РФ Денис Мантуров.',
            'date_of_public' => '2022-10-23 08:06:00',
            'isPrivate' => false
            ],
        '27' => [
            'id' => 27,
            'category_id' => 7,
            'title' => 'Группировка "Сфера" будет состоять из более 600 спутников',
            'desc' => 'Спутниковая группировка более чем из 600 отечественных космических аппаратов будет создана в рамках проекта "Сфера"',
            'inform' => 'Спутниковая группировка более чем из 600 отечественных космических аппаратов будет создана в рамках проекта "Сфера", сообщил вице-премьер - глава Минпромторга РФ Денис Мантуров.',
            'date_of_public' => '2022-10-22 23:25:00',
            'isPrivate' => false
            ],
        '28' => [
            'id' => 28,
            'category_id' => 7,
            'title' => 'Разгонный блок с первым спутником группировки "Сфера" выведен на орбиту',
            'desc' => 'Ракета "Союз-2.1б" вывела на незамкнутую орбиту разгонный блок "Фрегат"',
            'inform' => 'Ракета "Союз-2.1б" вывела на незамкнутую орбиту разгонный блок "Фрегат" с первым аппаратом группировки "Сфера" и тремя спутниками связи "Гонец-М", передает корреспондент РИА Новости.',
            'date_of_public' => '2022-10-22 23:13:00',
            'isPrivate' => false
            ],
        '29' => [
            'id' => 29,
            'category_id' => 7,
            'title' => 'С "Восточного" стартовала ракета с первым спутником группировки "Сфера"',
            'desc' => 'Ракета "Союз-2.1б" стартовала с космодрома "Восточный"',
            'inform' => 'Ракета "Союз-2.1б" с первым аппаратом многоспутниковой группировки "Сфера" - "Скифом-Д" и тремя спутниками связи "Гонец-М" стартовала с космодрома "Восточный", передает корреспондент РИА Новости.',
            'date_of_public' => '2022-10-22 23:05:00',
            'isPrivate' => true
            ],
        '30' => [
            'id' => 30,
            'category_id' => 8,
            'title' => 'Голевой пас Миранчука помог "Торино" обыграть "Удинезе" в Серии А',
            'desc' => 'Футболисты "Торино" обыграли "Удинезе"',
            'inform' => 'Футболисты "Торино" обыграли "Удинезе" в гостевом матче 11-го тура чемпионата Италии.',
            'date_of_public' => '2022-10-23 15:28:00',
            'isPrivate' => false
            ],
        '31' => [
            'id' => 31,
            'category_id' => 8,
            'title' => 'Глава комиссии спортсменов FIS назвал печальной конкуренцию без России',
            'desc' => 'Председатель комиссии спортсменов финн Мартти Йюльхя прокомментировал отстранение россиян от турниров',
            'inform' => 'Председатель комиссии спортсменов Международной федерации лыжного спорта и сноуборда (FIS) финн Мартти Йюльхя назвал печальной с точки зрения конкуренции ситуацию с отстранением россиян от турниров.',
            'date_of_public' => '2022-10-23 15:00:00',
            'isPrivate' => false
            ],
        '32' => [
            'id' => 32,
            'category_id' => 8,
            'title' => 'Морозова и Нарижный победили на Гран-при России по фигурному катанию',
            'desc' => 'Российские фигуристы стали победителями первого этапа Гран-при России в танцах на льду',
            'inform' =>  'Российские фигуристы Аннабель Морозова и Девид Нарижный стали победителями первого этапа Гран-при России в танцах на льду.',
            'date_of_public' => '2022-10-23 13:54:00',
            'isPrivate' => false
            ],
        '33' => [
            'id' => 33,
            'category_id' => 8,
            'title' => 'Валиева стала победительницей первого этапа Гран-при России ',
            'desc' => 'Фигуристка Камила Валиева победила на первом этапе Гран-при России',
            'inform' => 'Фигуристка Камила Валиева победила в женском одиночном катании на первом этапе Гран-при России, который проходит в Москве.',
            'date_of_public' => '2022-10-23 16:32:00',
            'isPrivate' => false
            ],
        '34' => [
            'id' => 34,
            'category_id' => 8,
            'title' => '"Локомотив" заслуженно оказался на 14-м месте в РПЛ, считает Пименов',
            'desc' => 'Футболистам московского "Локомотива" не хватает движения в матчах чемпионата',
            'inform' => 'Футболистам московского "Локомотива" не хватает движения в матчах чемпионата России, их неудачные результаты закономерны, заявил РИА Новости бывший игрок команды Руслан Пименов.',
            'date_of_public' => '2022-10-23 12:37:00',
            'isPrivate' => false
            ],
        '35' => [
            'id' => 35,
            'category_id' => 9,
            'title' => 'Скажи мне, кто твой кот: что о нас говорят любимые животные',
            'desc' => 'Сегодня во всем мире отмечают день снежного барса',
            'inform' => 'Сегодня во всем мире отмечают день снежного барса. Этот грациозный зверь вызывает умиление — но не у всех. РИА Новости разбирается вместе с экспертами, почему одни животные нравятся нам больше других, о чем свидетельствует нелюбовь к кошкам, зачем люди заводят змей и почему не всегда полезны веселые видео про питомцев.',
            'date_of_public' => '2022-10-23 08:00:00',
            'isPrivate' => false
            ],
        '36' => [
            'id' => 36,
            'category_id' => 9,
            'title' => 'Тайны советской дипломатии: что вы знаете о наркоме Георгии Чичерине',
            'desc' => 'Георгия Чичерина, которому посвящена выставка в Музеях Московского Кремля, увлекала идея мировой революции и восхищала музыка Моцарта.',
            'inform' => 'Георгия Чичерина, которому посвящена выставка в Музеях Московского Кремля, увлекала идея мировой революции и восхищала музыка Моцарта. Знание нескольких языков и внимание к культурным традициям собеседников помогали наркому в дипломатии. Почему его называли "главой восточной фракции", какая роль в международных отношениях была тогда отведена Кремлю и к чему призывал агитфарфор — ответы в тесте РИА Новости.',
            'date_of_public' => '2022-10-22 08:00:00',
            'isPrivate' => false
            ],
        '37' => [
            'id' => 37,
            'category_id' => 9,
            'title' => 'В Москве открывается выставка, посвященная снежному барсу',
            'desc' => 'В Москве в Западном крыле Новой Третьяковки открывается выставка "Снежный барс"',
            'inform' => 'В Москве в Западном крыле Новой Третьяковки открывается выставка "Снежный барс. Увидеть и сохранить", сообщает пресс-служба галереи.',
            'date_of_public' => '2022-10-22 06:05:00',
            'isPrivate' => false
            ],
        '38' => [
            'id' => 38,
            'category_id' => 9,
            'title' => 'Татьяна Васильева — о ватном пальто, гениальных партнерах и казусе в Кремле',
            'desc' => 'Татьяна Васильева не стесняется клише "антрепризная актриса"',
            'inform'=> 'Татьяна Васильева не стесняется клише "антрепризная актриса" и с гордостью говорит, что и в свои 75 лет много работает, потому что нужно содержать семью. На недавней встрече со зрителями в театре "Школа современной пьесы" она расскрыла много секретов не только закулисного мира, но и личной жизни. Самое интересное – в материале РИА Новости.',
            'date_of_public' => '2022-10-22 07:30:00',
            'isPrivate' => true
            ],
        '39' => [
            'id' => 39,
            'category_id' => 9,
            'title' => 'Санкт-Петербургский культурный форум в этом году не состоится',
            'desc' => 'Санкт-Петербургский культурный форум не состоится в этом году',
            'inform' => 'Минкультуры РФ сообщило, что Санкт-Петербургский культурный форум не состоится в этом году, однако в ведомстве надеются, что он пройдет в 2023 году.',
            'date_of_public' => '2022-10-21 20:05:00',
            'isPrivate' => false
            ],
        '40' => [
            'id' => 40,
            'category_id' => 10,
            'title' => 'Россия не по своей воле вступила в конфликт на Украине, заявил патриарх',
            'desc' => 'Россия не по своей воле вступила в конфликт на земле исторической Руси',
            'inform' => 'Россия не по своей воле вступила в конфликт на земле исторической Руси, заявил патриарх Московский и всея Руси Кирилл в воскресенье.',
            'date_of_public' => '2022-10-23 13:47:00',
            'isPrivate' => false
            ],
        '41' => [
            'id' => 41,
            'category_id' => 10,
            'title' => 'Димитриевская родительская суббота: какого числа, кого можно поминать',
            'desc' => 'В православном календаре девять особых дней поминовения усопших',
            'inform' => 'В православном календаре девять особых дней поминовения усопших, одним из которых является Димитриевская родительская суббота. История появления и традиции этого поминального дня, на какое число выпадает Димитриевская суббота в 2022 году — в материале РИА Новости.',
            'date_of_public' => '2022-10-22 15:05:00',
            'isPrivate' => true
            ],
        '42' => [
            'id' => 42,
            'category_id' => 10,
            'title' => 'В Туле пройдет концерт фестиваля "Подвиг ратный - подвиг духовный"',
            'desc' => 'Концерт в рамках фестиваля "Подвиг ратный - подвиг духовный" пройдет в Тульской областной филармонии',
            'inform' => 'Концерт в рамках фестиваля "Подвиг ратный - подвиг духовный" пройдет в Тульской областной филармонии в День защитника отечества, 23 февраля, сообщили РИА Новости в пресс-службе фестиваля.',
            'date_of_public' => '2022-10-21 19:33:00',
            'isPrivate' => false
            ],
        '43' => [
            'id' => 43,
            'category_id' => 10,
            'title' => 'В РПЦ опровергли сообщения о расколе с Латвийской церковью',
            'desc' => 'Латвийская православная церковь (ЛПЦ) не состоит в расколе с Русской (РПЦ)',
            'inform' => 'Латвийская православная церковь (ЛПЦ) не состоит в расколе с Русской (РПЦ), говорится в разъяснении об этом вопросе руководителя управления по делам епархий в странах ближнего зарубежья митрополита Крутицкого и Коломенского Павла (Пономарева), опубликованном на сайте ЛПЦ.',
            'date_of_public' => '2022-10-21 15:12:00',
            'isPrivate' => false
            ],
        '44' => [
            'id' => 44,
            'category_id' => 10,
            'title' => 'Около ста семей староверов из Латинской Америки хотят переселиться в Россию',
            'desc' => 'Около 100 семей староверов из Латинской Америки хотят переселиться в Россию',
            'inform' => 'Около 100 семей староверов из Латинской Америки хотят переселиться в Россию, сообщил глава Русской православной старообрядческой церкви (РПСЦ) митрополит Московский и всея Руси Корнилий (Титов).',
            'date_of_public' => '2022-10-20 18:04:00',
            'isPrivate' => true
            ],
        '45' => [
            'id' => 45,
            'category_id' => 11,
            'title' => 'Самое важное в туризме за неделю: ликвидация Ростуризма и отмена ПЦР-тестов',
            'desc' => 'Шокирующей новостью для всего туррынка на этой неделе стала ликвидация Ростуризма',
            'inform' => ' Шокирующей новостью для всего туррынка на этой неделе стала ликвидация Ростуризма, теперь его функции – у Минэкономразвития. Как это скажется на сфере путешествий – мнений много, единого пока нет. Стало проще россиянам, прилетающим из-за рубежа, наконец-то отменены ПЦР-тесты. О самом важно за неделю – в дайджесте РИА Новости.',
            'date_of_public' => '2022-10-22 07:01:00',
            'isPrivate' => false
            ],
        '46' => [
            'id' => 46,
            'category_id' => 11,
            'title' => 'Вся Москва за 18 минут: новые достопримечательности российской столицы',
            'desc' => 'В Москве открыли самое большое колесо обозрения в Европе',
            'inform' => 'В Москве открыли самое большое колесо обозрения в Европе. Завершается реконструкция крупнейшего экологического парка — там уже есть где погулять, отдохнуть, заняться спортом. Речные вокзалы превращаются в зоны отдыха, а ГЭС — в общественные и культурные пространства. О том, как меняется туристическая карта столицы, — в материале РИА Новости.',
            'date_of_public' => '2022-10-22 08:00:00',
            'isPrivate' => true
            ],
        '47' => [
            'id' => 47,
            'category_id' => 11,
            'title' => 'Эксперты рассказали, куда россияне поедут на отдых осенью и зимой',
            'desc' => 'Аналитики национальной системы бронирования выяснили, как изменится рынок отечественного туризма',
            'inform' => 'Аналитики национальной системы бронирования выяснили, как изменится рынок отечественного туризма, какие направления выбирают для отдыха россияне на осенне-зимний период 2022-2023, сообщает Bronevik.com (входит в МТС Travel).',
            'date_of_public' => '2022-10-21 14:07:00',
            'isPrivate' => false
            ],
        '48' => [
            'id' => 48,
            'category_id' => 11,
            'title' => 'Анастасия Макеева: "Мои самые выдающиеся путешествия — по России"',
            'desc' => 'Звезда кино, театра и мюзиклов Анастасия Макеева полюбила путешествия в детстве, когда начала выступать на сцене',
            'inform' => 'Звезда кино, театра и мюзиклов Анастасия Макеева полюбила путешествия в детстве, когда начала выступать на сцене. В интервью РИА Новости она рассказала, как встретилась ночью с лисами в Горном Алтае, пережила пытку пельменями в Китае и побывала на Марсе.',
            'date_of_public' => '2022-10-23 08:00:00',
            'isPrivate' => false
            ]
    ];

    /**
     * @throws FileNotFoundException
     */

    public function getAllNews():array
    {
        return json_decode(Storage::disk('local')->get('news.json'), true);
    }

    /**
     * @throws FileNotFoundException
     */

    public function getOneNews($id): ?array
    {
        if(array_key_exists($id, $this->getAllNews())){
            return $this->getAllNews()[$id];
        }
        return null;
    }

    public function getFilteredNews($slug, Categories $categories, $category_id = null):array
    {
        if(!is_null($slug)){
            $category_id = $categories->getCategoryId($slug);
        }

        $news = [];

        if(is_null($category_id)) return [];

        foreach ($this->getAllNews() as $article)
        {
            if($article['category_id'] == $category_id){
                $news[] = $article;
            }
        }
        return $news;
    }
}
