<?php
/**
 * Defines RecAnalystConst class.
 *
 * @package recAnalyst
 * @version $Id: RecAnalystConst.php 13 2013-11-30 09:12:37Z mittermeyer $
 * @author biegleux <biegleux[at]gmail[dot]com>
 * @copyright copyright (c) 2008-2012 biegleux
 * @license http://www.opensource.org/licenses/gpl-3.0.html GNU General Public License version 3 (GPLv3)
 * @link http://recanalyst.sourceforge.net/
 * @filesource
 */

/**
 * Class RecAnalystConst.
 *
 * RecAnalystConst implements constants used for RecAnalyst.
 *
 * @package recAnalyst
 */
final class RecAnalystConst {

    const IMG_EXT = '.gif';

    /**
     * Map strings. Can be localized.
     * @var array
     */
    public static $MAPS = array(
        Map::ARABIA         => array('アラビア',                    'arabia'),
        Map::ARCHIPELAGO    => array('列島',                'archipelago'),
        Map::BALTIC         => array('バルト海',                    'baltic'),
        Map::BLACKFOREST    => array('深い森',          'black_forest'),
        Map::COASTAL        => array('沿岸',                    'coastal'),
        Map::CONTINENTAL    => array('大陸',                'continental'),
        Map::CRATERLAKE     => array('カルデラ湖',              'crater_lake'),
        Map::FORTRESS       => array('要塞',                'fortress'),
        Map::GOLDRUSH       => array('金鉱',                'gold_rush'),
        Map::HIGHLAND       => array('高地',                'highland'),
        Map::ISLANDS        => array('島々',                    'islands'),
        Map::MEDITERRANEAN  => array('地中海',          'mediterranean'),
        Map::MIGRATION      => array('移住',                'migration'),
        Map::RIVERS         => array('流域',                    'rivers'),
        Map::TEAMISLANDS    => array('チームごとの島',          'team_islands'),
        Map::RANDOM         => array('ランダム',                    'random'),
        Map::SCANDINAVIA    => array('スカンディナビア',                'scandinavia'),
        Map::MONGOLIA       => array('モンゴリア',              'mongolia'),
        Map::YUCATAN        => array('ユカタン',                    'yucatan'),
        Map::SALTMARSH      => array('海辺の沼地',              'salt_marsh'),
        Map::ARENA          => array('アリーナ',                    'arena'),
        Map::KINGOFTHEHILL  => array('キング オブ ザ ヒル',     ''),
        Map::OASIS          => array('オアシス',                    'oasis'),
        Map::GHOSTLAKE      => array('凍結湖',              'ghost_lake'),
        Map::NOMAD          => array('遊牧',                    'nomad.png'),
        Map::IBERIA         => array('イベリア',                    'iberia.png'),
        Map::BRITAIN        => array('イギリス',                    'britain.png'),
        Map::MIDEAST        => array('中東',                    'mideast.png'),
        Map::TEXAS          => array('テキサス',                    'texas.png'),
        Map::ITALY          => array('イタリア',                    'italy.png'),
        Map::CENTRALAMERICA => array('中央アメリカ',            'central_america.png'),
        Map::FRANCE         => array('フランス',                    'france.png'),
        Map::NORSELANDS     => array('ノルウェー',              'norse_lands.png'),
        Map::SEAOFJAPAN     => array('日本海',    'sea_of_japan.png'),
        Map::BYZANTINUM     => array('ビザンティウム',              'byzantinum.png'),
        Map::CUSTOM         => array('カスタム',                    ''),
        Map::BLINDRANDOM    => array('ブラインド ランダム',         'blind_random'),
    );

    /**
     * Game version strings. Can be localized.
     * @var array
     */
    public static $GAME_VERSIONS = array(
        'Unknown',
        'AOK',
        'AOK Trial',
        'AOK 2.0',
        'AOK 2.0a',
        'AOC',
        'AOC Trial',
        'AOC 1.0',
        'AOC 1.0c',
        'AOFE 2.2',
        'AOC 1.4'
    );

    /**
     * Map style strings. Can be localized
     * @var array
     */
    public static $MAP_STYLES = array(
        '標準',
        'リアル マップ',
        'カスタム'
    );

    /**
     * Difficulty level strings. Can be localized.
     * @var array
     */
    public static $DIFFICULTY_LEVELS = array(
        '非常に難しい',
        '難しい',
        '普通',
        '簡単',
        '非常に簡単'
    );

    /**
     * Difficulty level strings for AOK. Can be localized.
     * @var array
     */
    public static $AOK_DIFFICULTY_LEVELS = array(
        '非常に難しい',
        '難しい',
        '普通',
        '簡単',
        '非常に簡単'
    );

    /**
     * Game type strings. Can be localized.
     * @var array
     */
    public static $GAME_TYPES = array(
        'ランダム マップ',
        'チェック メイト',
        'デス マッチ',
        'シナリオ',
        'キャンペーン',
        'キング オブ ザ ヒル',
        '民族の象徴の建造',
        '民族の象徴の防衛',
        'ターボ ランダム マップ'
    );

    /**
     * Game speed strings. Can be localized.
     * @var array
     */
    public static $GAME_SPEEDS = array(
        100 => '遅い',
        150 => '普通',
        200 => '速い'
    );

    /**
     * Reveal setting strings. Can be localized.
     * @var array
     */
    public static $REVEAL_SETTINGS = array(
        '標準',
        '開拓済み',
        'すべて表示'
    );

    /**
     * Map size strings. Can be localized.
     * @var array
     */
    public static $MAP_SIZES = array(
        '極小 (2プレイヤー)',
        '小 (3プレイヤー)',
        '中 (4プレイヤー)',
        '大 (6プレイヤー)',
        '広大 (8プレイヤー)',
        '特大'
    );

    /**
     * Starting age strings. Can be localized.
     * @var array
     */
    public static $STARTING_AGES = array(
        '暗黒の時代',
        '領主の時代',
        '城主の時代',
        '帝王の時代',
        '帝王の時代以降'
    );

    /**
     * Victory condition strings. Can be localized.
     * @var array
     */
    public static $VICTORY_CONDITIONS = array(
        '標準',
        '征服',
        '制限時間',
        'スコア',
        'カスタム'
    );

    /**
     * Civilization strings. Can be localized.
     * @var array
     */
    public static $CIVS = array(
        array('',           ''),
        array('ブリトン',   'britons'),
        array('フランク',       'franks'),
        array('ゴート',     'goths'),
        array('チュートン', 'teutons'),
        array('日本',   'japanese'),
        array('中国',   'chinese'),
        array('ビザンティン',   'byzantines'),
        array('ペルシア',   'persians'),
        array('サラセン',   'saracens'),
        array('トルコ',     'turks'),
        array('バイキング', 'vikings'),
        array('モンゴル',   'mongols'),
        array('ケルト',     'celts'),
        array('スペイン',   'spanish'),
        array('アステカ',       'aztecs'),
        array('マヤ',       'mayans'),
        array('フン',       'huns'),
        array('朝鮮',   'koreans'),
        array('イタリア',   'italians'),
        array('インド', 'indians'),
        array('インカ',     'incas'),
        array('マジャール', 'magyars'),
        array('スラヴ',     'slavs')
    );

    public static $COLORS = array(
        0x00 => '#0000ff',
        0x01 => '#ff0000',
        0x02 => '#00ff00',
        0x03 => '#cccc00',
        0x04 => '#00ffff',
        0x05 => '#ff00ff',
        0x06 => '#b9b9b9',
        0x07 => '#ff8201'
    );

    /**
     * Resource strings. Can be localized.
     * @var array
     */
    public static $RESOURCES = array(
        0x00 => '食料',
        0x01 => '木',
        0x02 => '石',
        0x03 => '金'
    );

    /**
     * Research strings. Can be localized.
     * @var array
     */
    public static $RESEARCHES = array(
        101 => array('領主の時代',              'feudal_age'),
        102 => array('城主の時代',              'castle_age'),
        103 => array('帝王の時代',          'imperial_age'),
         22 => array('機織り',                  'loom'),
        213 => array('荷車',            'wheel-barrow'),
        249 => array('手押し車',                'hand_cart'),
          8 => array('見張り',              'town_watch'),
        280 => array('巡回',                'town_patrol'),
         14 => array('引き具',          'horse_collar'),
         13 => array('馬鍬',                'heavy_plow'),
         12 => array('輪作',            'crop_rotation'),
        202 => array('両刃斧',          'double_bit_axe'),
        203 => array('のこぎり',                    'bow_saw'),
        221 => array('両ひきのこぎり',              'two_man_saw'),
         55 => array('金の採掘',                'gold_mining'),
        278 => array('石の切り出し',            'stone_mining'),
        182 => array('金の掘削',        'gold_shaft_mining'),
        279 => array('石の掘削',        'stone_shaft_mining'),
         19 => array('地図製作',                'cartography'),
         23 => array('貨幣制度',                    'coinage'),
         48 => array('隊商',                    'caravan'),
         17 => array('銀行取引',                    'banking'),
         15 => array('組合',                    'guilds'),
        211 => array('射手用胸当て',        'padded_archer_armor'),
        212 => array('射手用革の鎧',    'leather_archer_armor'),
        219 => array('射手用鎖の鎧',        'ring_archer_armor'),
        199 => array('矢羽根',              'fletching'),
        200 => array('錐状矢じり',          'bodkin_arrow'),
        201 => array('小手',                    'bracer'),
         67 => array('鍛造',                    'forging'),
         68 => array('鋳造',            'iron_casting'),
         75 => array('高温溶鉱炉',          'blast_furnace'),
         81 => array('騎馬用うろこの鎧',            'scale_barding'),
         82 => array('騎馬用鎖かたびら',            'chain_barding'),
         80 => array('騎馬用甲冑',          'plate_barding'),
         74 => array('歩兵用うろこの鎧',                'scale_mail'),
         76 => array('歩兵用鎖かたびら',                'chain_mail'),
         77 => array('歩兵用甲冑',              'plate_mail'),
         50 => array('石工技術',                    'masonry'),
        194 => array('強化壁',          'fortified_wall'),
         93 => array('弾道学',              'ballistics'),
        380 => array('火砲学',              'heated_shot'),
        322 => array('迎撃用窓',            'murder_holes'),
         54 => array('Stonecutting',            'stonecutting'),
         51 => array('建築学',          'architecture'),
         47 => array('化学',                'chemistry'),
        377 => array('包囲攻撃技術',            'siege_engineers'),
        140 => array('監視塔',              'guard_tower'),
         63 => array('防御塔',                  'keep'),
         64 => array('砲台',            'bombard_tower'),
        222 => array('軍兵',                'man_at_arms'),
        207 => array('長剣剣士',            'long_swordsman'),
        217 => array('重剣剣士',    'two_handed_swordsman'),
        264 => array('近衛剣士',                'champion'),
        197 => array('長槍兵',                  'pikeman'),
        429 => array('矛槍兵',              'halberdier'),
        434 => array('エリート イーグル ウォリア',      'eagle_warrior'),
         90 => array('追跡術',              'tracking'),
        215 => array('武者修行',                    'squires'),
        100 => array('石弓射手',                'crossbow'),
        237 => array('重石弓射手',              'arbalest'),
         98 => array('精鋭散兵',        'elite_skirmisher'),
        218 => array('重弓騎兵',    'heavy_cavalry_archer'),
        437 => array('弓懸',                'thumb_ring'),
        436 => array('パルティアン戦術',        'parthian_tactics'),
        254 => array('騎兵',            'light_cavalry'),
        428 => array('ハサー',                  'hussar'),
        209 => array('重騎士',              'cavalier'),
        265 => array('近衛騎士',                    'paladin'),
        236 => array('重装駱駝騎兵',                'heavy_camel'),
        435 => array('血統',                'bloodlines'),
         39 => array('繁殖',                'husbandry'),
        257 => array('改良投石機',                  'onager'),
        320 => array('破城投石機',          'siege_onager'),
         96 => array('強化破城槌',              'capped_ram'),
        255 => array('改良強化破城槌',              'siege_ram'),
        239 => array('ヘビー スコーピオン',         'heavy_scorpion'),
        316 => array('購い',                'redemption'),
        252 => array('篤信',                    'fervor'),
        231 => array('神聖',                'sanctity'),
        319 => array('償い',                'atonement'),
        441 => array('薬草学',          'herbal_medicine'),
        439 => array('異端',                    'heresy'),
        230 => array('活版印刷',            'block_printing'),
        233 => array('啓蒙',            'illumination'),
         45 => array('信仰',                    'faith'),
        438 => array('神政',                'theocracy'),
         34 => array('大型ガレー船',                'war_galley'),
         35 => array('ガリオン船',                  'galleon'),
        246 => array('高速火炎船',          'fast_fire_ship'),
        244 => array('重爆破工作船',    'heavy_demolition_ship'),
         37 => array('キャノンガリオン船',          'cannon_galleon'),
        376 => array('機動キャノンガリオン船',  'cannon_galleon'),
        373 => array('造船技術',                'shipwright'),
        374 => array('傾船技術',                'careening'),
        375 => array('乾ドック',                'dry_dock'),
        379 => array('城壁強化',                'hoardings'),
        321 => array('土木技術',                    'sappers'),
        315 => array('徴用',            'conscription'),
        408 => array('諜報／反逆',          'spy'),
        // unique-unit-upgrade
        432 => array('エリート ジャガー ウォリア',      'jaguar_man'),
        361 => array('エリート カタフラクト',       'cataphract'),
        361 => array('エリート カタフラクト',       'cataphract'),
        370 => array('エリート ウォード レイダー',      'woad_raider'),
        362 => array('改良型連弩兵',            'chu_ko_nu'),
        360 => array('エリート ロングボウ',     'longbowman'),
        363 => array('エリート フランカスロウ', 'throwing_axeman'),
        365 => array('エリート ハスカール',         'huskarl'),
          2 => array('エリート タルカン',           'tarkan'),
        366 => array('剣豪',            'samurai'),
        450 => array('強化戦車',            'war_wagon'),
        448 => array('重装亀甲船',      'turtle_ship'),
        //348 => array('Elite Turtle Ship',     'turtle_ship'),
         27 => array('精鋭羽飾射手',        'plumed_archer'),
        371 => array('エリート マングダイ',         'mangudai'),
        367 => array('エリート エレファント',       'war_elephant'),
        368 => array('Eエリート マムルーク',            'mameluke'),
        //378 => array('Elite Mameluke',        'mameluke'),
         60 => array('エリート コンキスタドールr',      'conquistador'),
        364 => array('エリート チュートンナイト',   'teutonic_knight'),
        369 => array('エリート イェニチェリ',           'janissary'),
        398 => array('エリート ベルセルク',         'berserk'),
        372 => array('重装バイキング船',            'longboat'),
        // unique-research
         24 => array('栄誉戦',          'unique_tech'),
         61 => array('兵站学',              'unique_tech'),
          5 => array('ケルトの怒り',            'unique_tech'),
         52 => array('砲弾術',              'unique_tech'),
          3 => array('ヨーマン',                    'unique_tech'),
         83 => array('ビアードアックス',                'unique_tech'),
         16 => array('無秩序',                  'unique_tech'),
        457 => array('パーフュージョン',                'unique_tech'),
         21 => array('無神論',                  'unique_tech'),
         59 => array('投擲術',              'unique_tech'),
          4 => array('エルドラド',              'unique_tech'),
        445 => array('新機箭',              'unique_tech'),
          6 => array('演習',                    'unique_tech'),
          7 => array('象使い',                  'unique_tech'),
          9 => array('狂信',                'unique_tech'),
        440 => array('覇権',                'unique_tech'),
         11 => array('銃眼付胸壁',          'unique_tech'),
         10 => array('砲術',                'unique_tech'),
         49 => array('ベルセルクギャング',          'unique_tech')
    );

    /**
     * Unit strings. Can be localized.
     * @var array
     */
    public static $UNITS = array(
          4 => array('弓兵',                    'archer'),
          5 => array('砲撃手',          'hand_cannoneer'),
          6 => array('精鋭散兵',        'elite_skirmisher'),
          7 => array('散兵',                'skirmisher'),
          8 => array('ロングボウ',              'longbowman'),
         11 => array('マングダイ',              'mangudai'),
         13 => array('漁船',            'fishing_ship'),
         17 => array('交易船',              'trade_cog'),
         21 => array('大型ガレー船',                'war_galley'),
         24 => array('石弓射手',                'crossbowman'),
         25 => array('チュートンナイト',            'teutonic_knight'),
         35 => array('破城槌',          'battering_ram'),
         36 => array('大砲',            'bombard_cannon'),
         38 => array('騎士',                    'knight'),
         39 => array('弓騎兵',          'cavalry_archer'),
         40 => array('カタフラクト',                'cataphract'),
         41 => array('ハスカール',                  'huskarl'),
    //   42 => array('Trebuchet (Unpacked)',    'trebuchet'),
         46 => array('イェニチェリ',                'janissary'),
         73 => array('連弩兵',              'chu_ko_nu'),
         74 => array('民兵',                    'militiaman'),
         75 => array('軍兵',                'man_at_arms'),
         76 => array('重剣剣士',            'heavy_swordsman'),
         77 => array('長剣剣士',            'long_swordsman'),
         83 => array('町の人',              'villager'),
         93 => array('槍兵',                'spearman'),
        125 => array('聖職者',                  'monk'),
    //  128 => array('Trade Cart, Empty',       ''),
        128 => array('交易船',              'trade_cart'),
    //  204 => array('Trade Cart, Full',        ''),
        232 => array('ウォードレイダー',                'woad_raider'),
        239 => array('エレファント',            'war_elephant'),
        250 => array('バイキング船',                'longboat'),
        279 => array('スコーピオン',                'scorpion'),
        280 => array('投石機',              'mangonel'),
        281 => array('フランカスロウ',          'throwing_axeman'),
        282 => array('マムルーク',              'mameluke'),
        283 => array('重騎士',              'cavalier'),
    //  286 => array('Monk With Relic',         ''),
        291 => array('武士',                    'samurai'),
        329 => array('らくだ騎兵',                  'camel'),
        330 => array('重装らくだ騎兵',              'heavy_camel'),
    //  331 => array('Trebuchet, P',            'trebuchet'),
        331 => array('遠投投石機',              'trebuchet'),
        358 => array('長槍兵',                  'pikeman'),
        359 => array('矛槍兵',              'halberdier'),
        420 => array('キャノンガリオン船',          'cannon_galleon'),
        422 => array('強化破城槌',              'capped_ram'),
        434 => array('王',                  'king'),
        440 => array('爆破工作兵',                  'petard'),
        441 => array('ハサー',                  'hussar'),
        442 => array('ガレー船',                    'galleon'),
        448 => array('斥候',            'scout_cavalry'),
        473 => array('重剣剣士',    'two_handed_swordsman'),
        474 => array('重弓騎兵',    'heavy_cavalry_archer'),
        492 => array('重石弓射手',              'arbalest'),
    //  493 => array('Adv Heavy Crossbowman',   ''),
        527 => array('爆破工作船',          'demolition_ship'),
        528 => array('重爆破工作船',    'heavy_demolition_ship'),
        529 => array('火炎船',              'fire_ship'),
        530 => array('エリート ロングボウ',     'longbowman'),
        531 => array('エリート フランカスロウ', 'throwing_axeman'),
        532 => array('高速火炎船',          'fast_fire_ship'),
        533 => array('重装バイキング船',            'longboat'),
        534 => array('エリート ウォードレイダー',       'woad_raider'),
        539 => array('ガレー船',                    'galley'),
        542 => array('ヘビー スコーピオン',         'heavy_scorpion'),
        545 => array('交易船',          'transport_ship'),
        546 => array('騎兵',            'light_cavalry'),
        548 => array('改良強化破城槌',              'siege_ram'),
        550 => array('改良投石機',                  'onager'),
        553 => array('エリート カタフラクト',       'cataphract'),
        554 => array('エリート チュートンナイト',   'teutonic_knight'),
        555 => array('エリート ハスカール',         'huskarl'),
        556 => array('エリート マムルーク',         'mameluke'),
        557 => array('エリート イェニチェリ',           'janissary'),
        558 => array('エリート エレファント',       'war_elephant'),
        559 => array('改良型連弩兵',            'chu_ko_nu'),
        560 => array('剣豪',            'samurai'),
        561 => array('エリート マングダイ',         'mangudai'),
        567 => array('近衛剣士',                'champion'),
        569 => array('近衛騎士',                    'paladin'),
        588 => array('破城投石機',          'siege_onager'),
        692 => array('ベルセルク',                  'berserk'),
        694 => array('エリート ベルセルク',         'berserk'),
        725 => array('ジャガー ウォリア',           'jaguar_man'),
        726 => array('エリート ジャガー ウォリア',  'jaguar_man'),
    //  748 => array('Cobra Car',               ''),
        751 => array('イーグル ウォリア',           'eagle_warrior'),
        752 => array('エリート イーグル ウォリア',      'eagle_warrior'),
        755 => array('タルカン',                    'tarkan'),
        757 => array('エリート タルカン',           'tarkan'),
        759 => array('ハスカール',                  'huskarl'),
        761 => array('エリート ハスカール',         'huskarl'),
        763 => array('羽飾射手',            'plumed_archer'),
        765 => array('精鋭羽飾射手',        'plumed_archer'),
        771 => array('コンキスタドール',            'conquistador'),
        773 => array('エリート コンキスタドール',       'conquistador'),
        775 => array('宣教師',              'missionary'),
    //  812 => array('Jaguar',                  ''),
        827 => array('戦車',                'war_wagon'),
        829 => array('強化戦車',            'war_wagon'),
        831 => array('亀甲船',              'turtle_ship'),
        832 => array('重装亀甲船',      'turtle_ship'),
    );

    /**
     * Building strings. Can be localized.
     * @var array
     */
    public static $BUILDINGS = array(
         12 => array('戦士育成所',      'barracks'),
         45 => array('港',          'dock'),
         49 => array('包囲攻撃訓練所',  'siege_workshop'),
         50 => array('畑',          'farm'),
         68 => array('粉ひき所',            'mill'),
         70 => array('家',          'house'),
         72 => array('壁, 柵',  'palisade_wall'),
         79 => array('見張り台',        'watch_tower'),
         82 => array('城',          'castle'),
         84 => array('市場',            'market'),
         87 => array('射手育成所',  'archery_range'),
        101 => array('騎兵育成所',          'stable'),
        103 => array('鉄工所',      'blacksmith'),
        104 => array('神殿',        'monastery'),
        109 => array('町の中心',        'town_center'),
        117 => array('壁, 石',      'stone_wall'),
        155 => array('壁, 要塞',    'fortified_wall'),
        199 => array('梁',      'fish_trap'),
        209 => array('学問所',      'university'),
        234 => array('監視塔',      'guard_tower'),
        235 => array('防御塔',          'keep'),
        236 => array('砲台',    'bombard_tower'),
        276 => array('民族の象徴',          'wonder'),
        487 => array('門',          'gate'),
        490 => array('門',          'gate'),
        562 => array('伐採所',      'lumber_camp'),
        584 => array('採掘所',      'mining_camp'),
        598 => array('前哨',            'outpost'),
        621 => array('町の中心',        'town_center'),
        665 => array('門',          'gate'),
        673 => array('門',          'gate'),
        796 => array('柵の門',      'palisade_gate'),
        804 => array('柵の門',      'palisade_gate')
    );

    /**
     * Terrain colors.
     * @var array
     */
    public static $TERRAIN_COLORS = array(
        array(0x33, 0x97, 0x27),
        array(0x30, 0x5d, 0xb6),
        array(0xe8, 0xb4, 0x78),
        array(0xe4, 0xa2, 0x52),
        array(0x54, 0x92, 0xb0),
        array(0x33, 0x97, 0x27),
        array(0xe4, 0xa2, 0x52),
        array(0x82, 0x88, 0x4d),//
        array(0x82, 0x88, 0x4d),//
        array(0x33, 0x97, 0x27),
        array(0x15, 0x76, 0x15),
        array(0xe4, 0xa2, 0x52),
        array(0x33, 0x97, 0x27),
        array(0x15, 0x76, 0x15),
        array(0xe8, 0xb4, 0x78),
        array(0x30, 0x5d, 0xb6),//
        array(0x33, 0x97, 0x27),//
        array(0x15, 0x76, 0x15),
        array(0x15, 0x76, 0x15),
        array(0x15, 0x76, 0x15),
        array(0x15, 0x76, 0x15),
        array(0x15, 0x76, 0x15),
        array(0x00, 0x4a, 0xa1),
        array(0x00, 0x4a, 0xbb),
        array(0xe4, 0xa2, 0x52),
        array(0xe4, 0xa2, 0x52),
        array(0xff, 0xec, 0x49),//
        array(0xe4, 0xa2, 0x52),
        array(0x30, 0x5d, 0xb6),//
        array(0x82, 0x88, 0x4d),//
        array(0x82, 0x88, 0x4d),//
        array(0x82, 0x88, 0x4d),//
        array(0xc8, 0xd8, 0xff),
        array(0xc8, 0xd8, 0xff),
        array(0xc8, 0xd8, 0xff),
        array(0x98, 0xc0, 0xf0),
        array(0xc8, 0xd8, 0xff),//
        array(0x98, 0xc0, 0xf0),
        array(0xc8, 0xd8, 0xff),
        array(0xc8, 0xd8, 0xff),
        array(0xe4, 0xa2, 0x52)
    );

    /**
     * Object colors.
     * @var array
     */
    public static $OBJECT_COLORS = array(
        Unit::GOLDMINE   => array(0xff, 0xc7, 0x00),
        Unit::STONEMINE  => array(0x91, 0x91, 0x91),
        Unit::CLIFF1     => array(0x71, 0x4b, 0x33),
        Unit::CLIFF2     => array(0x71, 0x4b, 0x33),
        Unit::CLIFF3     => array(0x71, 0x4b, 0x33),
        Unit::CLIFF4     => array(0x71, 0x4b, 0x33),
        Unit::CLIFF5     => array(0x71, 0x4b, 0x33),
        Unit::CLIFF6     => array(0x71, 0x4b, 0x33),
        Unit::CLIFF7     => array(0x71, 0x4b, 0x33),
        Unit::CLIFF8     => array(0x71, 0x4b, 0x33),
        Unit::CLIFF9     => array(0x71, 0x4b, 0x33),
        Unit::CLIFF10    => array(0x71, 0x4b, 0x33),
        Unit::RELIC      => array(0xff, 0xff, 0xff),
        Unit::TURKEY     => array(0xa5, 0xc4, 0x6c),
        Unit::SHEEP      => array(0xa5, 0xc4, 0x6c),
        Unit::DEER       => array(0xa5, 0xc4, 0x6c),
        Unit::BOAR       => array(0xa5, 0xc4, 0x6c),
        Unit::JAVELINA   => array(0xa5, 0xc4, 0x6c),
        Unit::FORAGEBUSH => array(0xa5, 0xc4, 0x6c)
    );

    /**
     * Player colors.
     * @var array
     */
    public static $PLAYER_COLORS = array(
        0x00 => array(0x00, 0x00, 0xff),
        0x01 => array(0xff, 0x00, 0x00),
        0x02 => array(0x00, 0xff, 0x00),
        0x03 => array(0xff, 0xff, 0x00),
        0x04 => array(0x00, 0xff, 0xff),
        0x05 => array(0xff, 0x00, 0xff),
        0x06 => array(0xb9, 0xb9, 0xb9),
        0x07 => array(0xff, 0x82, 0x01)
    );

    /**
     * Real world maps.
     * @var array
     */
    public static $REAL_WORLD_MAPS = array(
        Map::IBERIA,
        Map::BRITAIN,
        Map::MIDEAST,
        Map::TEXAS,
        Map::ITALY,
        Map::CENTRALAMERICA,
        Map::FRANCE,
        Map::NORSELANDS,
        Map::SEAOFJAPAN,
        Map::BYZANTINUM
    );

    /**
     * Cliff units.
     * @var array
     */
    public static $CLIFF_UNITS = array(
        Unit::CLIFF1,
        Unit::CLIFF2,
        Unit::CLIFF3,
        Unit::CLIFF4,
        Unit::CLIFF5,
        Unit::CLIFF6,
        Unit::CLIFF7,
        Unit::CLIFF8,
        Unit::CLIFF9,
        Unit::CLIFF10
    );

    /**
     * Gate units.
     * @var array
     */
    public static $GATE_UNITS = array(
        Unit::GATE,
        Unit::GATE2,
        Unit::GATE3,
        Unit::GATE4
    );

    const VER_9C = 'VER 9.C';
    const VER_9B = 'VER 9.B';
    const VER_9A = 'VER 9.A';
    const VER_99 = 'VER 9.9';
    const VER_98 = 'VER 9.8';
    const VER_94 = 'VER 9.4';
    const VER_93 = 'VER 9.3';
    const TRL_93 = 'TRL 9.3';
}

final class GameVersion {

    const UNKNOWN   = 0;
    const AOK       = 1;
    const AOKTRIAL  = 2;
    const AOK20     = 3;
    const AOK20A    = 4;
    const AOC       = 5;
    const AOCTRIAL  = 6;
    const AOC10     = 7;
    const AOC10C    = 8;
    const AOFE22    = 9;
    const AOC13 = 10;
    const AOC14 = 11;

    private function __construct(){}
}

final class MapStyle {

    const STANDARD  = 0;
    const REALWORLD = 1;
    const CUSTOM    = 2;

    private function __construct(){}
}

final class DifficultyLevel {

    const HARDEST  = 0;
    const HARD     = 1;
    const MODERATE = 2;
    const STANDARD = 3;
    const EASIEST  = 4;

    private function __construct(){}
}

final class GameType {

    const RANDOMMAP  = 0;
    const REGICIDE   = 1;
    const DEATHMATCH = 2;
    const SCENARIO   = 3;
    const CAMPAIGN   = 4;

    private function __construct(){}
}

final class GameSpeed
{
    const SLOW   = 100;
    const NORMAL = 150;
    const FAST   = 200;

    private function __construct(){}
}

final class RevealMap
{
    const NORMAL     = 0;
    const EXPLORED   = 1;
    const ALLVISIBLE = 2;

    private function __construct(){}
}

final class MapSize
{
    const TINY   = 0;
    const SMALL  = 1;
    const MEDIUM = 2;
    const NORMAL = 3;
    const LARGE  = 4;
    const GIANT  = 5;

    private function __construct(){}
}

final class Civilization {

    const NONE       = 0;
    const BRITONS    = 1;
    const FRANKS     = 2;
    const GOTHS      = 3;
    const TEUTONS    = 4;
    const JAPANESE   = 5;
    const CHINESE    = 6;
    const BYZANTINES = 7;
    const PERSIANS   = 8;
    const SARACENS   = 9;
    const TURKS      = 10;
    const VIKINGS    = 11;
    const MONGOLS    = 12;
    const CELTS      = 13;
    const SPANISH    = 14;
    const AZTECS     = 15;
    const MAYANS     = 16;
    const HUNS       = 17;
    const KOREANS    = 18;
    const ITALIANS    = 19;
    const INDIANS    = 20;
    const INCAS    = 21;
    const MAGYARS    = 22;
    const SLAVS    = 23;

    private function __construct(){}
}

final class Resource {

    const FOOD  = 0;
    const WOOD  = 1;
    const STONE = 2;
    const GOLD  = 3;

    private function __construct(){}
}

final class StartingAge {

    const DARKAGE         = 0;
    const FEUDALAGE       = 1;
    const CASTLEAGE       = 2;
    const IMPERIALAGE     = 3;
    const POSTIMPERIALAGE = 4;

    private function __construct(){}
}

final class VictoryCondition {

    const STANDARD   = 0;
    const CONQUEST   = 1;
    const TIMELIMIT  = 2;
    const SCORELIMIT = 3;
    const CUSTOM     = 4;

    private function __construct(){}
}

final class Map {

    const ARABIA         = 9;
    const ARCHIPELAGO    = 10;
    const BALTIC         = 11;
    const BLACKFOREST    = 12;
    const COASTAL        = 13;
    const CONTINENTAL    = 14;
    const CRATERLAKE     = 15;
    const FORTRESS       = 16;
    const GOLDRUSH       = 17;
    const HIGHLAND       = 18;
    const ISLANDS        = 19;
    const MEDITERRANEAN  = 20;
    const MIGRATION      = 21;
    const RIVERS         = 22;
    const TEAMISLANDS    = 23;
    const RANDOM         = 24;
    const SCANDINAVIA    = 25;
    const MONGOLIA       = 26;
    const YUCATAN        = 27;
    const SALTMARSH      = 28;
    const ARENA          = 29;
    const KINGOFTHEHILL  = 30;
    const OASIS          = 31;
    const GHOSTLAKE      = 32;
    const NOMAD          = 33;
    const IBERIA         = 34;
    const BRITAIN        = 35;
    const MIDEAST        = 36;
    const TEXAS          = 37;
    const ITALY          = 38;
    const CENTRALAMERICA = 39;
    const FRANCE         = 40;
    const NORSELANDS     = 41;
    const SEAOFJAPAN     = 42;
    const BYZANTINUM     = 43;
    const CUSTOM         = 44;
    const BLINDRANDOM    = 48;

    private function __construct(){}
}

final class Unit {

    const GOLDMINE   = 66;
    const STONEMINE  = 102;
    const CLIFF1     = 264;
    const CLIFF2     = 265;
    const CLIFF3     = 266;
    const CLIFF4     = 267;
    const CLIFF5     = 268;
    const CLIFF6     = 269;
    const CLIFF7     = 270;
    const CLIFF8     = 271;
    const CLIFF9     = 272;
    const CLIFF10    = 273;
    const RELIC      = 285;
    const TURKEY     = 833;
    const SHEEP      = 594;
    const DEER       = 65;
    const BOAR       = 48;
    const JAVELINA   = 822;
    const FORAGEBUSH = 59;

    const GATE  = 487;
    const GATE2 = 490;
    const GATE3 = 665;
    const GATE4 = 673;
}
?>