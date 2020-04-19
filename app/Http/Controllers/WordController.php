<?php

namespace App\Http\Controllers;

use App\Http\CustomServices\TranslatorService;
use App\Models\Film;
use App\Models\Word;
use Illuminate\Http\Request;
use KubAT\PhpSimple\HtmlDomParser;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::where('status', '!=', '0')->where('rating', '<', 301)->orderBy('rating')->orderBy('id')->get();

        return view('words.index', compact('words'));
    }

    public function learn(Word $word)
    {
        $word->update(['status' => 0]);
        return response('all good', 200);
    }

    public function correctionTranslate(Word $word)
    {
        $res = TranslatorService::getYandexDictionaryTranslate($word->word);;
        if($res != ''){
            $word->update(['translate' => $res]);
        }else{
            $res = $word->translate;
        }
        return response()->json([
            'answer' => $res
        ]);
    }

    public function parseSubtitles(string $path = '')
    {
        $text = mb_strtolower(file_get_contents($path));
        $text = preg_replace('~[0-9\?\>\=]~', '', $text);
        $arr = array_unique(str_word_count($text, 1, "АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя"));
        $words = Word::whereIn('word', array_values($arr))->pluck('id');

        $film = Film::first();
        $film->words()->sync($words);
    }

    protected $arr = [
        "appoint" => "1. назначать, определить, утвердить "
        , "admit" => "1. признавать, допускать, принимать "
        , "appropriate" => "1. подходящий 2. соответствующий, надлежащий, нужный 3. присваивать, ассигновать 4. подходяще "
        , "emerge" => "1. всплывать, выходить, возникать "
        , "flour" => "1. мука 2. посыпать мукой 3. мучной "
        , "considerable" => "1. значительный, солидный, изрядный 2. много 3. значительно, немало "
        , "brief" => "1. краткий, небольшой, кратчайший 2. резюме, брифинг, записка 3. инструктировать, проинформировать, кратко проинформировать 4. кратко "
        , "lack" => "1. отсутствие, нехватка, необеспеченность 2. недоставать, испытывать недостаток, не иметь 3. недостаточный "
        , "encourage" => "1. поощрять, ободрять, поддерживать "
        , "aid" => "1. помощь, помощник, пособие 2. помогать, содействовать 3. вспомогательный "
        , "complex" => "1. сложный, комплексный, многосложный 2. комплекс, совокупность 3. комплексно "
        , "relief" => "1. рельеф, облегчение, помощь 2. рельефный, предохранительный 3. облегченно "
        , "conclude" => "1. заключать, завершать, сделать вывод "
        , "annual" => "1. ежегодный, внутригодовой 2. ежегодник, однолетник 3. ежегодно, за год "
        , "determine" => "1. определять, обусловливать, устанавливать "
        , "regard" => "1. уважение, внимание, учет 2. рассматривать, касаться, относиться 3. в отношении "
        , "settle" => "1. селиться, обосноваться, урегулировать 2. урегулирование, разрешение "
        , "occasion" => "1. случай, возможность, раз 2. служить поводом "
        , "describe" => "1. описывать, изображать, рассказывать "
        , "significant" => "1. значительный, важный, многозначительный 2. значащий "
        , "beyond" => "1. за, вне, помимо 2. за пределами, дальше, выше 3. превышающий "
        , "debt" => "1. долг, заем, заемные средства 2. долговой, долгий "
        , "raise" => "1. поднимать, воспитывать, повысить 2. повышение "
        , "court" => "1. суд, двор, судья 2. ухаживать 3. судебный, придворный "
        , "conduct" => "1. провести, вести, дирижировать 2. ведение, поведение "
        , "capable" => "1. способный, дееспособный, талантливый 2. одаренный, могущий, поддающийся "
        , "appeal" => "1. обращение, призыв, привлекательность 2. обращаться, апеллировать, обжаловать 3. апелляционный, привлекательный "
        , "assume" => "1. предполагать, брать на себя, принимать "
        , "complain" => "1. жаловаться, выражать недовольство, подать жалобу "
        , "commitment" => "1. обязательство, приверженность, совершение "
        , "domestic" => "1. внутренний, отечественный, домашний 2. прислуга, отечественного производства "
        , "unless" => "1. если 2. за исключением, разве только 3. не 4. кроме "
        , "shift" => "1. сдвиг, переключение, клавиша Shift 2. перекладывать, перемещаться, смещать "
        , "soil" => "1. почва, слой почвы, территория 2. пачкать, загрязнять, пакостить 3. почвенный "
        , "represent" => "1. представлять, изображать, олицетворять "
        , "affair" => "1. дело, роман, отношения "
        , "handle" => "1. справляться, обрабатывать, обращаться 2. ручка, обработка, дескриптор "
        , "either" => "1. любой 2. тоже 3. также, либо 4. оба "
        , "neither" => "1. ни 2. никто, ни тот 3. не 4. тоже 5. Neither "
        , "flat" => "1. квартира, плоскость, равнина 2. плоский, равнинный, пологий 3. фиксированный, спущенный, приплюснутый 4. плашмя "
        , "rural" => "1. сельский, загородный "
        , "further" => "1. дальнейший, дополнительный, новый 2. дальше, более того, затем 3. способствовать, содействовать "
        , "facility" => "1. объект, установка, возможность "
        , "approach" => "1. подход, приближение, наступление 2. подходить, обращаться, приблизить 3. подъездной, подходной "
        , "investigate" => "1. исследовать, разбираться, выяснять "
        , "welfare" => "1. благосостояние, социальное обеспечение, благотворительность 2. благотворительный, материальный "
        , "broad" => "1. широкий, масштабный, общий 2. широко 3. расширенный "
        , "ensure" => "1. гарантировать, убедиться, добиться "
        , "extend" => "1. расширять, продлевать, распространять "
        , "kind" => "1. добрый, добросердечный, благостный 2. вид, характер, доброта 3. отчасти "
        , "emphasis" => "1. акцент, выразительность, особое внимание "
        , "hence" => "1. следовательно 2. поэтому 3. отсюда, потому, исходя из этого 4. таким образом "
        , "hardly" => "1. едва, вряд ли, насилу 2. навряд ли "
        , "urge" => "1. побуждать, убеждать, настаивать 2. побуждение, настоятельный призыв, тяга 3. настоятельный "
        , "besides" => "1. кроме того, помимо того, кстати 2. кроме 3. притом 4. мало того "
        , "appreciate" => "1. ценить, понимать, высоко ценить "
        , "efficient" => "1. эффективный, квалифицированный, целесообразный 2. эффективно 3. эффективно действующий "
        , "gap" => "1. пробел, разрыв, зазор "
        , "concern" => "1. беспокойство, забота, интерес 2. касаться, волновать, беспокоиться "
        , "suffer" => "1. страдать, понести, испытывать "
        , "acquire" => "1. приобретать, получать, обзаводиться "
        , "chairman" => "1. председатель 2. председательствующий "
        , "argue" => "1. спорить, аргументировать, обсуждать "
        , "remarkable" => "1. замечательный, выдающийся, примечательный 2. потрясающий "
        , "demand" => "1. требовать, истребовать, предъявлять требования 2. спрос, требование, потребность 3. до востребования "
        , "launch" => "1. запуск, начало, катер 2. запускать, начинать, открыть 3. стартовый "
        , "nevertheless" => "1. однако, несмотря на 2. все же, все 3. но "
        , "act" => "1. действие, акт, дело 2. действовать, поступать, выступать "
        , "wonder" => "1. удивляться, интересоваться, сомневаться 2. чудо, удивление, интерес 3. неудивительно "
        , "rate" => "1. ставка, курс, скорость 2. оценивать, расклассифицировать 3. тарифный "
        , "nod" => "1. кивать, клевать носом, задремать 2. кивок "
        , "plate" => "1. тарелка, пластина, плита 2. листовой, пластинчатый "
        , "coal" => "1. уголь, уголек, угль 2. каменноугольный 3. добывать уголь "
        , "excite" => "1. возбуждать, побуждать, волновать 2. Excite "
        , "acknowledge" => "1. признавать, подтверждать, сознавать "
        , "species" => "1. вид, порода, биологический вид 2. видовой "
        , "charity" => "1. благотворительная деятельность, милосердие, милостыня 2. благотворительный, милосердный "
        , "initial" => "1. первоначальный, отправной, первичный 2. инициал 3. парафировать 4. первый 5. первоначально "
        , "rather" => "1. скорее, довольно, лучше 2. вернее 3. вместо "
        , "deny" => "1. отрицать, отказывать, отрекаться "
        , "however" => "1. однако, несмотря на, как бы 2. впрочем 3. же "
        , "upper" => "1. верхний, высший, старший 2. верхняя часть "
        , "connect" => "1. связываться, связывать, объединять "
        , "arrest" => "1. арест, арестованный 2. приковывать, задерживать, остановить "
        , "origin" => "1. происхождение, источник, первопричина 2. исходный "
        , "south" => "1. юг 2. Южная 3. к югу "
        , "pain" => "1. боль, мука, болевые ощущения 2. болеть, мучить 3. болевой, болеутоляющий "
        , "suit" => "1. подходить, устраивать, соответствовать 2. костюм, иск, скафандр "
        , "recover" => "1. восстановиться, выздоравливать, оправиться "
        , "suppose" => "1. предполагать, допускать "
        , "crowd" => "1. толпа, множество, публика 2. толпиться, вытеснять, теснить "
        , "extent" => "1. степень, размер, протяженность "
        , "objective" => "1. цель, объектив, объект 2. объективный, целевой, объектный 3. объективно "
        , "moreover" => "1. более того, кроме того, причем 2. мало того 3. притом "
        , "even" => "1. даже 2. ровный, четный, эвенский 3. вечер, эвен 4. выравнивать 5. и, пусть "
        , "arrange" => "1. организовать, расставлять, договариваться "
        , "plenty" => "1. множество, избыток, изобилие 2. обильный, достаточно, изрядный 3. много 4. многие 5. предостаточно "
        , "fit" => "1. подходить, помещаться, приспосабливать 2. пригонка, припадок 3. пригодный, годный, нужный "
        , "attempt" => "1. попытка, покушение, потуга 2. пытаться, стремиться, предпринимать "
        , "within" => "1. внутри, в 2. в течение, не позднее "
        , "charge" => "1. заряжать, обвинять, поручать 2. обвинение, плата, заряд 3. зарядовый "
        , "mention" => "1. упоминать, отметить, назвать 2. упоминание, помин "
        , "landscape" => "1. пейзаж, альбомная ориентация, ландшафтный дизайн 2. горизонтальный, пейзажный, альбомная "
        , "certain" => "1. определенный, уверенный, бесспорный 2. некоторый, некий, один 3. наверняка 4. убежденный 5. определенного рода "
        , "whether" => "1. ли 2. то ли, или 3. независимо, действительно ли "
        , "gather" => "1. собирать, собраться, накопить 2. сбор "
        , "article" => "1. статья, предмет, заметка "
        , "therefore" => "1. следовательно 2. поэтому 3. по этой причине, потому, в этой связи "
        , "contemporary" => "1. современный, сегодняшний, актуальный 2. современник, сверстник, современность "
        , "object" => "1. объект, цель, вещь 2. возражать 3. объектный 4. против "
        , "major" => "1. основной, крупный, значительный 2. майор, мажор 3. ведущий, профилирующий 4. специализироваться "
        , "although" => "1. хотя 2. несмотря на то, однако 3. хоть "
        , "possess" => "1. обладать, наследовать, принадлежать "
        , "aware" => "1. осведомленный, сведущий, сознательный 2. знающий, сознающий, информированный 3. известно "
        , "substantial" => "1. существенный, большой, реальный "
        , "consider" => "1. рассматривать, считать, учитывать "
        , "fund" => "1. фонд, средства 2. финансировать 3. фондовый 4. Funds "
        , "sentence" => "1. предложение, приговор, наказание 2. приговаривать, присудить, осуждать "
        , "apply" => "1. применять, обращаться, касаться "
        , "refer" => "1. относиться, ссылаться, упоминать 2. с ссылкой "
        , "constant" => "1. постоянный, устойчивый, константный 2. константа, постоянство 3. постоянно 4. фиксированный "
        , "pleasure" => "1. удовольствие, развлечение, воля 2. доставлять удовольствие, радовать, радоваться 3. приятный, прогулочный, увеселительный "
        , "notion" => "1. понятие, мнение, упоминание "
        , "exist" => "1. существовать, жить, возникать 2. сущий "
        , "maintain" => "1. поддерживать, сохранять, утверждать "
        , "blame" => "1. вина, порицание, обвинение 2. обвинять, осуждать, упрекать "
        , "poll" => "1. опрос, голосование, список избирателей 2. голосовать, опросить "
        , "operate" => "1. работать, управлять, воздействовать "
        , "beside" => "1. рядом, наряду 2. около, кроме, у 3. Beside "
        , "effort" => "1. усилие, попытка, напряжение "
        , "occur" => "1. происходить, встречаться, возникать 2. происшедший "
        , "apart" => "1. отдельно, на части, в стороне 2. кроме 3. отделенный "
        , "satisfy" => "1. удовлетворять, выполнять, утолять "
        , "accompany" => "1. провожать, аккомпанировать, проводить "
        , "refuse" => "1. отказываться, отказывать, отказаться 2. мусор, отходы, отказ "
        , "former" => "1. бывший 2. составитель 3. старый, тогдашний 4. первый "
        , "youth" => "1. молодежь, молодость, юношество 2. молодежный "
        , "surround" => "1. окружать, оцепить, окутать "
        , "improve" => "1. улучшать, повысить, исправить "
        , "otherwise" => "1. иначе, в противном случае, в других отношениях 2. иным образом, остальное, иным способом 3. другой 4. противоположный "
        , "perhaps" => "1. возможно, наверно 2. разве 3. авось 4. что ли "
        , "supply" => "1. поставка, питание, снабжение 2. поставлять, снабжать, подавать 3. приточный "
        , "convince" => "1. убеждать, убедиться, внушать "
        , "council" => "1. Совет, синедрион, собор "
        , "wealth" => "1. богатство, состояние, изобилие 2. материальный "
        , "attitude" => "1. отношение, позиция, поза "
        , "attend" => "1. посещать, присутствовать, обслуживать "
        , "fee" => "1. взнос, гонорар, сбор "
        , "essential" => "1. существенный, необходимый, эфирный 2. существенно 3. необходимость, реквизит "
        , "ought" => "1. должен 2. надо, нужно, необходимо 3. следует, стоит 4. пора "
        , "advantage" => "1. преимущество, выигрыш, перевес "
        , "obvious" => "1. очевидный, понятный, самоочевидный 2. видимый "
        , "outcome" => "1. исход, последствие, выход "
        , "fellow" => "1. товарищ, стипендиат, приятель 2. ближний, малый, товарищеский 3. поддерживающий "
        , "distinguish" => "1. отличать, различить, распознавать 2. отличительный, различимый "
        , "sensitive" => "1. чувствительный, щепетильный, нежный 2. ранимый, подверженный, учитывающий 3. сенситив "
        , "estimate" => "1. оценивать, расценивать, прикидывать 2. оценка, расчет, эстимейт 3. оценочный 4. оценочно "
        , "associate" => "1. связывать, сопоставить, объединяться 2. партнер, коллега, сообщник 3. младший, ассоциативный "
        , "suitable" => "1. подходящий, пригодный 2. соответствующий, годный, применимый 3. подходяще "
        , "obtain" => "1. получать, добывать, получиться "
        , "via" => "1. через, посредством 2. с помощью "
        , "struggle" => "1. борьба, труд, трудность 2. бороться, пытаться, отбиваться "
        , "due" => "1. надлежащий, должное 2. сбор, взнос, пошлина 3. причитающийся, связанный, подлежащий 4. благодаря "
        , "towel" => "1. полотенце, полотенцесушитель 2. вытирать полотенцем "
        , "divide" => "1. делить, подразделять, отделять 2. разделение, водораздел "
        , "shape" => "1. форма, фигура, очертание 2. формировать, придавать форму, формироваться "
        , "recognize" => "1. распознавать, признавать, узнавать "
        , "firm" => "1. твердый, решительный, устойчивый 2. фирма 3. укреплять 4. крепко "
        , "afford" => "1. позволить себе, давать, доставлять 2. себе "
        , "pure" => "1. чистый, простой, непорочный 2. чистая вода "
        , "thick" => "1. толстый, густой, хриплый 2. гуща, пекло, толщина 3. густо, толсто "
        , "severe" => "1. суровый, тяжелый, сильный 2. тяжелая форма, острый дефицит 3. выраженный "
        , "thus" => "1. таким образом 2. Итак 3. так, при этом, соответственно 4. тем самым 5. следовательно "
        , "permit" => "1. разрешать, дозволить 2. разрешение, пропуск, лицензия 3. разрешительный, допустимый "
        , "establish" => "1. установить, создавать, основывать 2. establish "
        , "bill" => "1. законопроект, счет, Билль 2. вексельный, переводной 3. выставить счет, выставлять счет "
        , "sequence" => "1. последовательность, очередность, ряд 2. последовательный "
        , "justify" => "1. оправдывать, объяснять, обосновывать "
        , "site" => "1. сайт, местоположение, участок "
        , "despite" => "1. несмотря на 2. вопреки, несмотря "
        , "expense" => "1. расход, цена, трата 2. расходный "
        , "attract" => "1. привлекать, вызвать, влечь "
        , "treaty" => "1. договор, Конвенция, трактат 2. договорный "
        , "circumstance" => "1. условие, случай, сложившиеся обстоятельства "
        , "affect" => "1. влиять, затрагивать, поражать 2. аффект, влияние "
        , "propose" => "1. предлагать, предполагать, выдвинуть "
        , "voluntary" => "1. добровольный, произвольный, сознательный 2. добровольность, доброволец, добровольное начало 3. добровольно "
        , "screw" => "1. винт, шнек 2. винтовой 3. привинчивать, завинтить, испортить "
        , "commercial" => "1. коммерческий, рекламный, товарный 2. рекламный ролик, коммерция, телереклама "
        , "aim" => "1. цель, прицел 2. целиться, направлять, прицеливаться 3. прицельный "
        , "civil" => "1. гражданский, гражданско-правовой, строительный "
        , "gift" => "1. подарок, подношение, дарование 2. дарить, одаривать 3. подарочный "
        , "advice" => "1. консультация, Совет, уведомление 2. консультационный "
        , "select" => "1. выбирать, избирать, выделить 2. отборный 3. отбор "
        , "fuel" => "1. топливо, расход топлива, заправка 2. топливный, тепловыделяющий 3. подпитывать, подогревать, разжигать "
        , "narrow" => "1. узкий, ограниченный, узенький 2. суживать, сужать 3. узкий проход, сужение, узость "
        , "glance" => "1. взгляд 2. скользнуть, бросить взгляд, мельком взглянуть "
        , "offence" => "1. преступление, оскорбление, посягательство "
        , "bother" => "1. беспокоить, надоедать, утруждать 2. беспокойство, хлопоты "
        , "shout" => "1. крик 2. кричать, крикнуть, орать "
        , "emergency" => "1. чрезвычайная ситуация, авария, крайняя необходимость 2. аварийный, экстренный, непредвиденный "
        , "faith" => "1. вера, вероисповедание, доверие 2. добросовестно "
        , "vary" => "1. различаться, изменяться, разнообразить 2. различный 3. варьирование "
        , "disease" => "1. болезнь, заболеваемость "
        , "absent" => "1. отсутствовать, отлучиться 2. отсутствующий 3. в отсутствие 4. без 5. absent "
        , "tend" => "1. иметь тенденцию, тяготеть, заботиться "
        , "tough" => "1. жесткий, трудный, вязкий 2. жестко 3. жесткая позиция, крепкий орешек "
        , "thin" => "1. тонкий, худой, разреженный 2. редеть, худеть, утончать 3. тонко 4. тонкий слой "
        , "abroad" => "1. за границей, в эмиграции 2. зарубежный "
        , "sufficient" => "1. достаточный, существенный, довольно 2. достаточное количество, достаточная степень 3. достаточно "
        , "require" => "1. требовать, приказывать, предполагать "
        , "yard" => "1. двор, ярд, склад 2. дворовый, ярдовый "
        , "elect" => "1. избирать, решить 2. избранник 3. выборный "
        , "evidence" => "1. доказательства, свидетельство, данные 2. свидетельствовать, подтверждать 3. очевидный, свидетельский "
        , "tape" => "1. лента, волокита, магнитофонная лента 2. ленточный 3. заклеить, записать на пленку, записывать на пленку "
        , "quite" => "1. довольно, немало 2. неплохой 3. самое "
        , "threat" => "1. угроза "
        , "overall" => "1. общий, всеобщий, габаритные 2. в целом, обще, повсеместно 3. комбинезон, спецодежда, халат "
        , "vast" => "1. обширный, огромный, безбрежный 2. простор, обширность "
        , "exercise" => "1. упражнение, осуществление, зарядка 2. осуществлять, упражнять, проявлять "
        , "keen" => "1. проницательный, острый, живой 2. увлеченный, стремящийся, пронизывающий 3. увлекаться, сильно желать, причитать 4. Кин "
        , "crown" => "1. корона, темя, крона 2. венчать 3. коронный, корончатый "
        , "depth" => "1. глубина, пучина, глубина залегания 2. глубинный "
        , "pupil" => "1. ученик, зрачок 2. учащийся 3. ученический, подопечный "
        , "addition" => "1. дополнение, присоединение, пополнение 2. дополнительный 3. сверх "
        , "tidy" => "1. аккуратный, неплохой 2. убирать, прибрать 3. уборка "
        , "reckon" => "1. рассчитывать, считать, подсчитывать "
        , "will" => "1. будет, хотеть, завещать 2. воля, желание, Уилл 3. непременно "
        , "selfish" => "1. эгоистичный "
        , "seldom" => "1. редко "
        , "ship" => "1. корабль 2. отправлять, отгружать, отгружаться 3. судовой "
        , "clever" => "1. умный, искусный, способный "
        , "cupboard" => "1. шкафчик, буфет, шкап "
        , "fairly" => "1. довольно, справедливо, объективно 2. сносно "
        , "goat" => "1. коза, козлятина, козлище 2. козий "
        , "afterwards" => "1. впоследствии, потом, после этого 2. после "
        , "tone" => "1. тон, тонус, интонация 2. тональный 3. тонизировать, тонировать "
        , "entirely" => "1. полностью, исключительно 2. полный "
        , "hang" => "1. вешать, висеть, развешивать 2. зависание "
        , "belong" => "1. принадлежать, находиться "
        , "grow" => "1. расти, выращивать, становиться "
        , "artist" => "1. художник, артист, артистка "
        , "gradually" => "1. постепенно, последовательно, помаленьку 2. шаг за шагом "
        , "possession" => "1. владение, одержимость, имущество 2. владеющий "
        , "occasionally" => "1. периодически, случайно, временами 2. время от времени, отдельные случаи "
        , "additional" => "1. дополнительный 2. другой 3. добавленный "
        , "presence" => "1. присутствие, представительство, явка "
        , "extension" => "1. расширение, продление, вытягивание 2. добавочный, удлинительный "
        , "confidence" => "1. уверенность, убежденность, вера 2. доверительный "
        , "leaf" => "1. лист, створка, листва 2. перелистывать 3. листовой, пластинчатый "
        , "impression" => "1. впечатление, мнение, отпечаток "
        , "introduction" => "1. вступление, интродукция, Предисловие 2. вводный "
        , "cheap" => "1. дешевый, низкий 2. дешевка 3. дешево 4. удешевленный "
        , "rise" => "1. подъем, рост 2. подниматься, повышаться, возвышаться "
        , "amusing" => "1. забавный, увлекательный 2. развлечение 3. веселящий, развлекающий "
        , "arrangement" => "1. расположение, соглашение, устройство 2. организационный "
        , "treatment" => "1. лечение, обработка, обращение 2. лечебный "
        , "advertisement" => "1. реклама, анонс, рекламный материал 2. рекламный "
        , "threaten" => "1. угрожать, пугать, грозиться 2. под угрозу "
        , "favour" => "1. одолжение, польза, поддержка 2. благоприятствовать, способствовать, поддерживать 3. за "
        , "proposal" => "1. предложение, проектное предложение "
        , "frequently" => "1. часто 2. неоднократно 3. часто встречающийся "
        , "conclusion" => "1. заключение, завершение, решение "
        , "attractive" => "1. привлекательный, интересный, выгодный 2. притягивающий, манящий "
        , "distribution" => "1. распределение, распространение, дистрибуция 2. распределительный, сбытовой, раздаточный 3. распределенный "
        , "arise" => "1. возникать, появляться, подниматься "
        , "restriction" => "1. ограничение, сужение, рестрикция 2. ограничительный "
        , "detailed" => "1. подробный 2. детализированный, развернутый, углубленный 3. детально "
        , "recovery" => "1. восстановление, рекуперация, возвращение 2. восстановительный "
        , "aspect" => "1. аспект, сторона, точка зрения 2. аспектный "
        , "majority" => "1. большинство, совершеннолетие, большинство голосов 2. мажоритарный "
        , "appointment" => "1. назначение, должность, свидание "
        , "settlement" => "1. поселок, урегулирование, расчет 2. расчетный, поселенческий 3. пос. "
        , "initially" => "1. первоначально, в начальной стадии, в начале 2. начальный этап 3. начальный "
        , "recognition" => "1. распознавание, признание, осознание 2. распознающий "
        , "contribution" => "1. вклад, содействие, контрибуция "
        , "observation" => "1. наблюдение, замечание, соблюдение 2. наблюдательный 3. наблюдаемый "
        , "selection" => "1. выбор, селекция, подборка 2. отборочный "
        , "establishment" => "1. учреждение, создание, истеблишмент "
        , "injury" => "1. травма, повреждение, оскорбление 2. раненый 3. травмированный "
        , "accommodation" => "1. жилье, место, помещение 2. аккомодационный "
        , "autumn" => "1. осень 2. осенний "
        , "representation" => "1. представление, представительство, изображение 2. представительский "
        , "concentrate" => "1. концентрат, концентрация 2. концентрировать, заострить "
        , "representative" => "1. представитель 2. представительный, показательный 3. уполномоченный, представляющий "
        , "criticism" => "1. критика, нарекание, нападки "
        , "tour" => "1. тур, турне, поездка 2. путешествовать, гастролировать, посетить 3. туристический 4. на гастролях "
        , "obligation" => "1. обязательство, обязательность, облигация "
        , "minority" => "1. меньшинство, меньшая часть, представитель меньшинства 2. миноритарный, неосновной "
        , "acceptable" => "1. допустимый, приятный, пригодный 2. подходящий, допускаемый "
        , "pollution" => "1. загрязнение, осквернение, поллюция 2. загрязняющий "
        , "pension" => "1. пенсия, пансион, пособие 2. пенсионный "
        , "distinction" => "1. различие, разграничение, особенность 2. отличительный "
        , "election" => "1. выборы, избирательная кампания 2. избирательный "
        , "tension" => "1. напряжение, напряженность, натяжение 2. напряженный, натяжной "
        , "negotiation" => "1. ведение переговоров, преодоление, согласование "
        , "regime" => "1. режим, власть 2. режимный "
        , "whatever" => "1. что угодно, все, любой 2. что "
        , "bit" => "1. немного, в бит 2. бит, кусочек, частица 3. битовый, небольшой, эпизодическая "
        , "certainly" => "1. конечно, естественно, точно 2. разумеется 3. бесспорно "
        , "especially" => "1. особенно, сугубо 2. главным образом "
        , "nor" => "1. ни, также 2. не 3. равно "
        , "obviously" => "1. очевидно, совершенно очевидный 2. явно, ясно, видимо 3. разумеется "
        , "often" => "1. часто "
        , "wonderful" => "1. прекрасный, изумительный, отличный 2. потрясающий "
        , "appearance" => "1. внешний вид, появление, выступление 2. внешний "
        , "though" => "1. хотя 2. однако, несмотря на, несмотря на то 3. даже 4. несмотря "
        , "slightly" => "1. слегка, ненамного, несущественно 2. легко 3. приоткрытый "
        , "statement" => "1. заявление, высказывание, отчет "
        , "unusual" => "1. необычный, редкий, исключительный 2. нестандартно "
        , "properly" => "1. должным образом, подобающим образом 2. правильно, собственно, прилично "
        , "completely" => "1. полностью, целиком, совершенно 2. полно, абсолютный "
        , "upon" => "1. на 2. на основании, по факту "
        , "above" => "1. выше, наверху, ранее 2. вышеупомянутый, вышеприведенный, высшее 3. поверх 4. упомянутый выше, приведенный выше "
        , "amongst" => "1. среди 2. в ряду "
        , "behalf" => "1. ради 2. имя, поручение, интерес 3. от имени "
        , "elsewhere" => "1. в другом месте, повсюду, нигде "
        , "forward" => "1. вперед 2. форвард, переадресация, продвижение 3. пересылать, передавать, выдвигать 4. нападающий, передний, передовой "
        , "heavily" => "1. тяжело, сильно, в большой степени 2. тяжкий "
        , "housing" => "1. жилье, корпус, жилищное строительство 2. жилищный 3. жилищно "
        , "liability" => "1. ответственность, пассив, долг 2. Обязательственный "
        , "themselves" => "1. сами, себя "
        , "which" => "1. который, какой, каковой "
        , "while" => "1. время 2. хотя, между тем как 3. пока 4. несмотря на то, покуда 5. при "
        , "whilst" => "1. пока 2. во время 3. хотя "
    ];

    protected $ww = 'appoint, admit, appropriate, emerge, flour, considerable, brief, lack, encourage, aid, complex, relief, conclude, annual, determine, regard, settle, occasion, describe, significant, beyond, debt, raise, court, conduct, capable, appeal, assume, complain, commitment, domestic, unless, shift, soil, represent, affair, handle, either, neither, flat, rural, further, facility, approach, investigate, welfare, broad, ensure, extend, kind, emphasis, hence, hardly, urge, besides, appreciate, efficient, gap, concern, suffer, acquire, chairman, argue, remarkable, demand, launch, nevertheless, act, wonder, rate, nod, plate, coal, excite, acknowledge, species, charity, initial, rather, deny, however, upper, connect, arrest, origin, south, pain, suit, recover, suppose, crowd, extent, objective, moreover, even, arrange, plenty, fit, attempt, within, charge, mention, landscape, certain, whether, gather, article, therefore, contemporary, object, major, although, possess, aware, substantial, consider, fund, sentence, apply, refer, constant, pleasure, notion, exist, maintain, blame, poll, operate, beside, effort, occur, apart, satisfy, accompany, refuse, former, youth, surround, improve, otherwise, perhaps, supply, convince, council, wealth, attitude, attend, fee, essential, ought, advantage, obvious, outcome, fellow, distinguish, sensitive, estimate, associate, suitable, obtain, via, struggle, due, towel, divide, shape, recognize, firm, afford, pure, thick, severe, thus, permit, establish, bill, sequence, justify, site, despite, expense, attract, treaty, circumstance, affect, propose, voluntary, screw, commercial, aim, civil, gift, advice, select, fuel, narrow, glance, offence, bother, shout, emergency, faith, vary, disease, absent, tend, tough, thin, abroad, sufficient, require, yard, elect, evidence, tape, quite, threat, overall, vast, exercise, keen, crown, depth, pupil, addition, tidy, reckon, will, selfish, seldom, ship, clever, cupboard, fairly, goat, afterwards, tone, entirely, hang, belong, grow, artist, gradually, possession, occasionally, additional, presence, extension, confidence, leaf, impression, introduction, cheap, rise, amusing, arrangement, treatment, advertisement, threaten, favour, proposal, frequently, conclusion, attractive, distribution, arise, restriction, detailed, recovery, aspect, majority, appointment, settlement, initially, recognition, contribution, observation, selection, establishment, injury, accommodation, autumn, representation, concentrate, representative, criticism, tour, obligation, minority, acceptable, pollution, pension, distinction, election, tension, negotiation, regime, whatever, bit, certainly, especially, nor, obviously, often, wonderful, appearance, though, slightly, statement, unusual, properly, completely, upon, above, amongst, behalf, elsewhere, forward, heavily, housing, liability, themselves, which, while, whilst';

    protected $w = 'pretty, volume, provide, condition, land, pack, worth, urban, familiar, arm, include, appoint, admit, appropriate, root, compare, human, wide, quarter, library, link, enable, laugh, example, avoid, emerge, take, anywhere, stuff, noise, fail, loss, path, room, can, flour, magazine, way, wage, point, considerable, topic, wave, space, vision, several, duty, database, observe, brief, neck, society, weak, preserve, lack, skin, encourage, task, aid, remove, shadow, complex, birth, contain, tool, pool, relief, roll, miss, oil, field, unit, matter, conclude, declare, race, lead, bar, annual, suspect, decide, case, determine, waste, regard, difficulty, ticket, settle, flow, approve, occasion, describe, feature, indeed, table, option, significant, general, beyond, straight, deal, fan, debt, raise, below, climb, touch, neighbour, follow, announce, stick, court, watch, quantity, bag, practice, surface, conduct, curious, well, environment, clear, respond, gain, match, island, proper, inner, capable, move, christmas, trial, plant, victim, appeal, issue, per, pound, seat, railway, front, thank, cup, assume, offer, complain, commitment, error, science, domestic, unless, shift, notice, enormous, angry, measure, doubt, male, female, produce, nurse, soil, quiet, represent, trade, affair, term, handle, remain, increase, either, neither, sale, flat, limit, rural, pattern, meal, further, return, line, mean, reach, once, occupy, alive, get, challenge, board, might, variety, cool, paper, heat, score, combine, rock, fair, arrive, accident, facility, means, focus, knock, approach, coat, uncle, past, benefit, none, north, glass, target, during, fashion, yet, investigate, state, gun, scheme, image, welfare, current, couple, explore, prefer, broad, scale, count, ensure, across, extend, double, fear, kind, transfer, aside, sudden, late, emphasis, set, profit, record, accept, hence, depend, subject, hardly, urge, area, bean, shoe, besides, household, appreciate, sound, net, drug, just, average, relevant, efficient, gap, enter, cross, vehicle, response, concern, joy, suffer, acquire, coast, lift, chairman, argue, remarkable, demand, wound, launch, deliver, senior, nevertheless, discuss, weight, act, wonder, oppose, rate, theme, like, large, nod, spirit, plate, possible, knowledge, publish, vote, reply, coal, excite, train, novel, acknowledge, species, charity, trick, earn, unite, afraid, never, kid, initial, rather, prepare, deny, however, upper, step, connect, arrest, origin, south, alone, pain, suit, busy, hill, realize, desk, recover, mountain, suppose, stand, invite, crowd, extent, objective, moreover, even, fine, total, arrange, sense, plenty, employ, employment, still, tax, relative, route, view, release, fit, attempt, examine, necessary, foundation, advance, goods, break, serve, trip, rare, account, within, charge, carry, mention, landscape, opportunity, commission, smart, strength, certain, whether, agriculture, gather, round, continue, article, therefore, direct, background, chief, display, protect, store, contemporary, citizen, marry, early, object, memory, crime, anyway, perfect, major, different, instead, band, stay, agree, although, soon, possess, similar, piece, aware, middle, substantial, guard, military, rest, chest, wedding, legal, consider, event, fault, both, battle, bridge, create, ever, inch, fund, sentence, inside, value, community, advise, apply, length, calm, chapter, block, various, refer, base, quality, constant, boat, health, explain, pleasure, notion, exist, report, angle, maintain, blame, century, pick, sure, relate, correct, bright, prime, previous, deputy, poll, operate, may, beside, effort, west, circle, occur, dry, involve, patient, support, common, famous, apart, opinion, satisfy, accompany, refuse, post, recent, locate, reason, former, sign, failure, labour, spot, age, youth, surround, vital, wrong, success, dream, suggest, solve, join, express, series, track, odd, guide, income, habit, improve, wheel, deep, otherwise, perhaps, district, strike, supply, poor, convince, tie, escape, mine, pour, expect, council, wealth, attitude, software, item, garden, attend, appear, generation, judge, stress, fee, worry, essential, remind, ought, single, advantage, cause, cell, equal, likely, joint, floor, lovely, authority, note, mental, newspaper, sharp, obvious, title, pass, since, own, outcome, special, external, internal, fellow, stage, brush, assist, part, desire, fly, distinguish, simple, tank, sensitive, guess, future, excuse, estimate, attack, discover, height, mood, develop, lot, buy, last, ride, gender, journey, wine, responsible, switch, source, sheet, manage, corner, associate, east, suitable, village, latter, visit, guest, degree, treat, bone, obtain, via, date, local, breath, struggle, weapon, member, customer, factory, ahead, collect, boot, purpose, immediate, staff, replace, care, specific, original, church, lock, due, over, wood, character, master, flight, onion, consequence, ill, capital, towel, shoulder, divide, shape, foreign, mark, tiny, recognize, able, creature, fix, natural, bottom, criminal, destroy, engine, passenger, used to, safe, leg, rule, unique, valley, prison, except, firm, weird, afford, pure, excellent, thick, severe, thus, permit, huge, check, establish, royal, bill, sequence, sum, justify, plane, review, law, site, claim, ugly, free, damage, currency, taste, dress, private, trust, despite, range, expense, murder, content, research, attract, beauty, list, treaty, camp, confirm, earth, cash, sick, tall, border, circumstance, lie, welcome, present, bank, cover, choice, look, population, ordinary, mistake, hall, experience, available, survive, whole, rich, debate, layer, affect, propose, prevent, manufacture, turn, voluntary, screw, commercial, complete, aim, civil, gift, advice, select, amount, access, fuel, temporary, skill, knee, promise, narrow, achieve, glance, ancient, warn, purchase, please, press, share, rice, branch, hole, adult, order, row, chain, imagine, agreement, team, offence, bother, seem, shout, emergency, faith, vary, disease, chair, extra, belief, audience, request, absent, lip, permanent, letter, concept, reduce, tend, smell, receive, prove, introduce, defend, stretch, tough, thin, abroad, secure, surprise, sex, exchange, instance, sufficient, solution, change, require, happen, primary, yard, about, farm, drop, elect, evidence, regular, define, separate, cancer, empty, hat, influence, data, attach, tape, butter, level, roof, iron, department, search, network, pair, silent, quite, threat, burn, gas, overall, powerful, question, potato, pocket, allow, vast, exercise, opposite, property, award, goal, reflect, mind, almost, terrible, film, lord, officer, soap, sock, contract, aloud, keen, behave, type, procedure, mostly, process, crown, industry, depth, pupil, laptop, shake, union, addition, fall, friendly, tidy, bicycle, reckon, catch, will, selfish, countryside, cinema, figure, thought, useful, book, air, pardon, signature, seldom, glasses, career, policy, ship, clever, cupboard, run, fairly, goat, cold, umbrella, daily, underground, aunt, wear, leading, badly, museum, madam, action, signal, position, save, afterwards, love, bye, tone, performance, pull, unknown, closely, behaviour, sweet, whom, bedroom, warm, camera, unable, forest, god, program, safety, brother, king, rain, conversation, build, normal, owner, bread, park, gently, metal, ball, fully, power, spend, prize, choose, entirely, according, wake, enjoy, movement, art, music, text, month, drink, nature, wash, pencil, hang, belong, naturally, meaning, meat, document, ability, standard, situation, unfortunately, role, previously, enemy, colour, comment, argument, coffee, radio, grow, slow, licence, painting, peace, daughter, including, model, growing, sugar, snow, shoot, difference, explanation, progress, push, golden, lucky, swim, cow, risk, public, lamp, assistance, director, status, soup, lake, baby, speech, teach, comfortable, interview, reference, development, location, strongly, highly, possibility, final, seriously, shortly, hate, partly, photograph, fight, city, mile, draw, soul, spring, method, protection, mail, artist, weather, improvement, self, mass, birthday, guilty, gradually, tear, stranger, centre, definition, television, theory, season, winter, possession, package, employee, die, teacher, juice, club, occasionally, disappear, style, gentleman, management, additional, official, writer, presence, cabinet, useless, material, print, successful, egg, brain, lesson, holiday, honour, physical, extension, contact, session, modern, recently, cake, map, bus, credit, training, dollar, experiment, expert, normally, actual, positive, arrival, confidence, price, editor, conflict, expensive, originally, professional, leaf, decision, impression, scientific, instrument, lawyer, introduction, combination, identify, totally, fill, activity, cheap, design, student, married, toilet, hotel, elderly, screen, alternative, inform, rise, leader, parent, hell, generally, respect, amusing, suggestion, agency, traffic, delivery, flower, poem, balcony, sofa, transport, period, feed, author, detail, individual, reasonable, song, arrangement, secretary, speaker, ignore, cost, sport, phrase, repeat, preparation, treatment, territory, agent, creation, priority, star, thirsty, national, advertisement, violence, pen, conference, plus, potential, reader, basis, discussion, widely, international, committee, massive, threaten, servant, pressure, plastic, saving, region, incident, favour, proposal, humour, defence, farmer, hi, employer, growth, technical, communication, understanding, channel, frequently, device, resistance, popular, travel, diet, personal, conclusion, attractive, victory, prisoner, visitor, revolution, resource, distribution, basic, production, arise, negative, restriction, player, atmosphere, education, eastern, construction, war, army, sing, tooth, restaurant, insurance, administration, typical, detailed, computer, division, independent, responsibility, mechanism, strategy, historical, recovery, toy, winner, temperature, boss, aspect, university, energy, tire, jewellery, component, majority, percent, contrast, ok, principle, central, provision, requirement, unlikely, formal, protest, market, appointment, wisdom, kingdom, expectation, settlement, prince, seek, relax, grandmother, mix, initially, critical, analyse, recognition, stair, league, exam, recommend, translate, contribution, observation, approval, social, reality, religious, soldier, healthy, government, reaction, industrial, scientist, phase, product, candidate, calculate, secondary, selection, resolution, engineer, pub, ideal, bloody, dramatic, insane, champion, rarely, literature, characteristic, opposition, establishment, injury, accommodation, autumn, football, freedom, western, president, resident, chemical, demonstrate, illness, beer, college, surname, technique, representation, perspective, relationship, bomb, concentrate, achievement, mainly, governor, competition, kiss, educational, instruction, discipline, colleague, institution, representative, tomato, engage, profession, medical, crisis, campaign, electricity, worker, christian, expansion, championship, weekend, monthly, publication, conservative, salad, criticism, exhibition, independence, consist, constitution, pilot, nation, marriage, tour, republic, political, obligation, liberal, buyer, association, financial, cent, trend, northern, leadership, minority, parliament, moral, reform, airplane, acceptable, or, interpretation, presentation, sexual, technology, tradition, economy, fucking, democratic, regional, pollution, kilometre, so, relatively, finance, the, politician, pension, personality, symptom, economic, factor, teenager, competitive, largely, basketball, metre, religion, congress, sector, distinction, category, politics, election, investment, tendency, when, culture, tension, unemployment, recommendation, academic, dominate, video, negotiation, involvement, monitor, membership, proportion, composer, partnership, cultural, regime, democracy, of, illustrate, federal, o\'clock, budget, be, bear, become, begin, blow, bring, come, cut, do, drive, eat, feel, find, forget, give, go, have, hear, hide, hit, hold, hurt, keep, know, learn, leave, let, light, lose, make, meet, pay, put, read, ring, say, see, sell, send, show, shut, sit, sleep, speak, speed, spread, steal, tell, think, throw, understand, win, wind, write, whatever, whose, wife, wild, away, behind, bit, breakfast, certainly, clearly, cook, danger, dangerous, difficult, enough, equipment, especially, few, fresh, fun, glad, grass, grey, ice, impossible, lunch, nor, obviously, often, possibly, shot, twice, usually, wonderful, hope, nearly, place, silence, till, among, appearance, least, though, alright, believe, easily, paint, party, slightly, statement, such, trouble, unusual, against, along, because, blood, car, dark, description, eye, finger, following, ground, hair, properly, remember, same, section, shit, smile, stone, suddenly, wall, yeah, beach, chance, clothes, completely, cry, dear, dinner, ear, exactly, extremely, foot, force, fuck, gate, heart, heavy, horse, husband, immediately, lay, nose, probably, ready, relation, service, sky, strange, through, together, tonight, truth, upon, above, absolutely, active, actually, add, address, after, afternoon, again, ago, all, already, also, always, amongst, and, animal, another, answer, any, anybody, anyone, anything, application, around, as, ask, at, attention, back, bad, beautiful, because of, bed, before, beginning, behalf, being, between, big, bike, bird, black, blue, body, bottle, box, boy, boyfriend, brown, building, business, but, by, call, captain, card, careful, carefully, cat, child, class, clean, client, close, co-operation, code, collection, command, company, connection, context, control, copy, corporate, could, country, course, currently, dad, day, dead, death, direction, distance, doctor, dog, door, down, driver, each, easy, effect, effectively, else, elsewhere, end, environmental, evening, every, everybody, everyone, everything, exception, existing, expression, face, fact, family, far, fast, father, feeling, file, finally, finish, fire, fish, food, for, form, forward, friend, from, fruit, full, funny, game, girl, girlfriend, global, gold, good, grandfather, great, green, group, half, hand, happy, hard, he, head, heavily, hello, help, her, here, herself, high, him, himself, his, history, home, hospital, hot, hour, house, housing, how, hungry, i, idea, if, important, in, increased, inflation, information, interest, interested, interesting, into, it, itself, job, jump, key, kill, kitchen, lady, language, left, less, liability, life, listen, little, live, long, long-term, low, machine, main, man, manager, manner, many, maybe, me, media, meeting, message, milk, minute, mirror, moment, money, more, morning, most, mother, much, must, my, myself, name, near, need, new, news, next, nice, night, no, nobody, not, nothing, now, number, office, old, on, only, open, operation, other, others, our, ourselves, outside, page, parliamentary, partner, people, person, phone, picture, plan, play, police, port, problem, project, queen, quick, quickly, quietly, rapidly, reading, real, really, red, result, right, river, road, scene, school, sea, second, secret, security, serious, setting, shall, she, shock, shop, short, should, side, sir, sister, size, slowly, small, soft, some, somebody, someone, something, sometimes, son, sorry, sort, start, station, stop, story, street, strong, structure, study, summer, sun, surely, system, talk, tasty, tea, telephone, test, than, thanks, that, theatre, their, them, themselves, then, there, these, they, thing, this, those, time, today, tomorrow, too, top, towards, town, transaction, tree, true, try, under, until, up, us, use, used, user, usual, valuable, variation, version, very, virtually, voice, wait, walk, want, warning, water, we, week, what, where, which, while, whilst, white, who, why, window, wish, with, without, woman, word, work, world, would, year, yellow, yes, yesterday, you, young, your, yours, yourself';
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
