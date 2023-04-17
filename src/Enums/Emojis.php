<?php


namespace Bytes\DiscordResponseBundle\Enums;

use Bytes\DiscordResponseBundle\Objects\PartialEmoji;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class Emojis
 * @package Bytes\DiscordResponseBundle\Enums
 */
enum Emojis: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case WEATHER_TIME_GLOBE_WITH_MERIDIANS = '🌐';
    case WEATHER_TIME_SUN_WITH_FACE = '🌞';
    case WEATHER_TIME_FULL_MOON_WITH_FACE = '🌝';
    case WEATHER_TIME_NEW_MOON_WITH_FACE = '🌚';
    case WEATHER_TIME_NEW_MOON_SYMBOL = '🌑';
    case WEATHER_TIME_WAXING_CRESCENT_MOON_SYMBOL = '🌒';
    case WEATHER_TIME_FIRST_QUARTER_MOON_SYMBOL = '🌓';
    case WEATHER_TIME_WAXING_GIBBOUS_MOON_SYMBOL = '🌔';
    case WEATHER_TIME_FULL_MOON_SYMBOL = '🌕';
    case WEATHER_TIME_WANING_GIBBOUS_MOON_SYMBOL = '🌖';
    case WEATHER_TIME_LAST_QUARTER_MOON_SYMBOL = '🌗';
    case WEATHER_TIME_WANING_CRESCENT_MOON_SYMBOL = '🌘';
    case WEATHER_TIME_LAST_QUARTER_MOON_WITH_FACE = '🌜';
    case WEATHER_TIME_FIRST_QUARTER_MOON_WITH_FACE = '🌛';
    case WEATHER_TIME_CRESCENT_MOON = '🌙';
    case WEATHER_TIME_EARTH_GLOBE_EUROPE_AFRICA = '🌍';
    case WEATHER_TIME_EARTH_GLOBE_AMERICAS = '🌎';
    case WEATHER_TIME_EARTH_GLOBE_ASIA_AUSTRALIA = '🌏';
    case WEATHER_TIME_VOLCANO = '🌋';
    case WEATHER_TIME_MILKY_WAY = '🌌';
    case WEATHER_TIME_SHOOTING_STAR = '🌠';
    case WEATHER_TIME_WHITE_MEDIUM_STAR = '⭐';
    case WEATHER_TIME_BLACK_SUN_WITH_RAYS = '☀';
    case WEATHER_TIME_SUN_BEHIND_CLOUD = '⛅';
    case WEATHER_TIME_CLOUD = '☁';
    case WEATHER_TIME_HIGH_VOLTAGE_SIGN = '⚡';
    case WEATHER_TIME_UMBRELLA_WITH_RAIN_DROPS = '☔';
    case WEATHER_TIME_SNOWFLAKE = '❄';
    case WEATHER_TIME_SNOWMAN_WITHOUT_SNOW = '⛄';
    case WEATHER_TIME_CYCLONE = '🌀';
    case WEATHER_TIME_FOGGY = '🌁';
    case WEATHER_TIME_RAINBOW = '🌈';
    case WEATHER_TIME_WATER_WAVE = '🌊';
    case WEATHER_TIME_CLOCK_FACE_TWELVE_OCLOCK = '🕛';
    case WEATHER_TIME_CLOCK_FACE_TWELVE_THIRTY = '🕧';
    case WEATHER_TIME_CLOCK_FACE_ONE_OCLOCK = '🕐';
    case WEATHER_TIME_CLOCK_FACE_ONE_THIRTY = '🕜';
    case WEATHER_TIME_CLOCK_FACE_TWO_OCLOCK = '🕑';
    case WEATHER_TIME_CLOCK_FACE_TWO_THIRTY = '🕝';
    case WEATHER_TIME_CLOCK_FACE_THREE_OCLOCK = '🕒';
    case WEATHER_TIME_CLOCK_FACE_THREE_THIRTY = '🕞';
    case WEATHER_TIME_CLOCK_FACE_FOUR_OCLOCK = '🕓';
    case WEATHER_TIME_CLOCK_FACE_FOUR_THIRTY = '🕟';
    case WEATHER_TIME_CLOCK_FACE_FIVE_OCLOCK = '🕔';
    case WEATHER_TIME_CLOCK_FACE_FIVE_THIRTY = '🕠';
    case WEATHER_TIME_CLOCK_FACE_SIX_OCLOCK = '🕕';
    case WEATHER_TIME_CLOCK_FACE_SEVEN_OCLOCK = '🕖';
    case WEATHER_TIME_CLOCK_FACE_EIGHT_OCLOCK = '🕗';
    case WEATHER_TIME_CLOCK_FACE_NINE_OCLOCK = '🕘';
    case WEATHER_TIME_CLOCK_FACE_TEN_OCLOCK = '🕙';
    case WEATHER_TIME_CLOCK_FACE_ELEVEN_OCLOCK = '🕚';
    case WEATHER_TIME_CLOCK_FACE_SIX_THIRTY = '🕡';
    case WEATHER_TIME_CLOCK_FACE_SEVEN_THIRTY = '🕢';
    case WEATHER_TIME_CLOCK_FACE_EIGHT_THIRTY = '🕣';
    case WEATHER_TIME_CLOCK_FACE_NINE_THIRTY = '🕤';
    case WEATHER_TIME_CLOCK_FACE_TEN_THIRTY = '🕥';
    case WEATHER_TIME_CLOCK_FACE_ELEVEN_THIRTY = '🕦';
    case SPORTS_GAMES_HOBBIES_ARTIST_PALETTE = '🎨';
    case SPORTS_GAMES_HOBBIES_CLAPPER_BOARD = '🎬';
    case SPORTS_GAMES_HOBBIES_MICROPHONE = '🎤';
    case SPORTS_GAMES_HOBBIES_HEADPHONE = '🎧';
    case SPORTS_GAMES_HOBBIES_MUSICAL_SCORE = '🎼';
    case SPORTS_GAMES_HOBBIES_MUSICAL_NOTE = '🎵';
    case SPORTS_GAMES_HOBBIES_MULTIPLE_MUSICAL_NOTES = '🎶';
    case SPORTS_GAMES_HOBBIES_MUSICAL_KEYBOARD = '🎹';
    case SPORTS_GAMES_HOBBIES_VIOLIN = '🎻';
    case SPORTS_GAMES_HOBBIES_TRUMPET = '🎺';
    case SPORTS_GAMES_HOBBIES_SAXOPHONE = '🎷';
    case SPORTS_GAMES_HOBBIES_GUITAR = '🎸';
    case SPORTS_GAMES_HOBBIES_ALIEN_MONSTER = '👾';
    case SPORTS_GAMES_HOBBIES_VIDEO_GAME = '🎮';
    case SPORTS_GAMES_HOBBIES_PLAYING_CARD_BLACK_JOKER = '🃏';
    case SPORTS_GAMES_HOBBIES_FLOWER_PLAYING_CARDS = '🎴';
    case SPORTS_GAMES_HOBBIES_MAHJONG_TILE_RED_DRAGON = '🀄';
    case SPORTS_GAMES_HOBBIES_GAME_DIE = '🎲';
    case SPORTS_GAMES_HOBBIES_DIRECT_HIT = '🎯';
    case SPORTS_GAMES_HOBBIES_AMERICAN_FOOTBALL = '🏈';
    case SPORTS_GAMES_HOBBIES_BASKETBALL_AND_HOOP = '🏀';
    case SPORTS_GAMES_HOBBIES_SOCCER_BALL = '⚽';
    case SPORTS_GAMES_HOBBIES_TENNIS_RACQUET_AND_BALL = '🎾';
    case SPORTS_GAMES_HOBBIES_BILLIARDS = '🎱';
    case SPORTS_GAMES_HOBBIES_RUGBY_FOOTBALL = '🏉';
    case SPORTS_GAMES_HOBBIES_BOWLING = '🎳';
    case SPORTS_GAMES_HOBBIES_FLAG_IN_HOLE = '⛳';
    case SPORTS_GAMES_HOBBIES_MOUNTAIN_BICYCLIST = '🚵';
    case SPORTS_GAMES_HOBBIES_BICYCLIST = '🚴';
    case SPORTS_GAMES_HOBBIES_CHEQUERED_FLAG = '🏁';
    case SPORTS_GAMES_HOBBIES_HORSE_RACING = '🏇';
    case SPORTS_GAMES_HOBBIES_TROPHY = '🏆';
    case SPORTS_GAMES_HOBBIES_SKI_AND_SKI_BOOT = '🎿';
    case SPORTS_GAMES_HOBBIES_SNOWBOARDER = '🏂';
    case SPORTS_GAMES_HOBBIES_SWIMMER = '🏊';
    case SPORTS_GAMES_HOBBIES_SURFER = '🏄';
    case SPORTS_GAMES_HOBBIES_FISHING_POLE_AND_FISH = '🎣';
    case TECHNOLOGY_MOVIE_CAMERA = '🎥';
    case TECHNOLOGY_CAMERA = '📷';
    case TECHNOLOGY_VIDEO_CAMERA = '📹';
    case TECHNOLOGY_VIDEOCASSETTE = '📼';
    case TECHNOLOGY_OPTICAL_DISC = '💿';
    case TECHNOLOGY_DVD = '📀';
    case TECHNOLOGY_MINIDISC = '💽';
    case TECHNOLOGY_FLOPPY_DISK = '💾';
    case TECHNOLOGY_PERSONAL_COMPUTER = '💻';
    case TECHNOLOGY_MOBILE_PHONE = '📱';
    case TECHNOLOGY_BLACK_TELEPHONE = '☎';
    case TECHNOLOGY_TELEPHONE_RECEIVER = '📞';
    case TECHNOLOGY_PAGER = '📟';
    case TECHNOLOGY_FAX_MACHINE = '📠';
    case TECHNOLOGY_SATELLITE_ANTENNA = '📡';
    case TECHNOLOGY_TELEVISION = '📺';
    case TECHNOLOGY_RADIO = '📻';
    case TECHNOLOGY_SPEAKER_WITH_THREE_SOUND_WAVES = '🔊';
    case TECHNOLOGY_SPEAKER_WITH_ONE_SOUND_WAVE = '🔉';
    case TECHNOLOGY_SPEAKER = '🔈';
    case TECHNOLOGY_SPEAKER_WITH_CANCELLATION_STROKE = '🔇';
    case TECHNOLOGY_BELL = '🔔';
    case TECHNOLOGY_BELL_WITH_CANCELLATION_STROKE = '🔕';
    case TECHNOLOGY_PUBLIC_ADDRESS_LOUDSPEAKER = '📢';
    case TECHNOLOGY_CHEERING_MEGAPHONE = '📣';
    case TECHNOLOGY_HOURGLASS_WITH_FLOWING_SAND = '⏳';
    case TECHNOLOGY_HOURGLASS = '⌛';
    case TECHNOLOGY_ALARM_CLOCK = '⏰';
    case TECHNOLOGY_WATCH = '⌚';
    case TECHNOLOGY_OPEN_LOCK = '🔓';
    case TECHNOLOGY_LOCK = '🔒';
    case TECHNOLOGY_LOCK_WITH_INK_PEN = '🔏';
    case TECHNOLOGY_CLOSED_LOCK_WITH_KEY = '🔐';
    case TECHNOLOGY_KEY = '🔑';
    case TECHNOLOGY_LEFT_POINTING_MAGNIFYING_GLASS = '🔎';
    case TECHNOLOGY_ELECTRIC_LIGHT_BULB = '💡';
    case TECHNOLOGY_ELECTRIC_TORCH = '🔦';
    case TECHNOLOGY_ELECTRIC_PLUG = '🔌';
    case TECHNOLOGY_BATTERY = '🔋';
    case TECHNOLOGY_RIGHT_POINTING_MAGNIFYING_GLASS = '🔍';
    case TECHNOLOGY_WRENCH = '🔧';
    case TECHNOLOGY_NUT_AND_BOLT = '🔩';
    case TECHNOLOGY_HAMMER = '🔨';
    case TECHNOLOGY_MOBILE_PHONE_WITH_RIGHTWARDS_ARROW_AT_LEFT = '📲';
    case TECHNOLOGY_ANTENNA_WITH_BARS = '📶';
    case TECHNOLOGY_CINEMA = '🎦';
    case TECHNOLOGY_VIBRATION_MODE = '📳';
    case TECHNOLOGY_MOBILE_PHONE_OFF = '📴';
    case NUMBERS_LETTERS_KEYCAP_DIGIT_ONE = '1⃣';
    case NUMBERS_LETTERS_KEYCAP_DIGIT_TWO = '2⃣';
    case NUMBERS_LETTERS_KEYCAP_DIGIT_THREE = '3⃣';
    case NUMBERS_LETTERS_KEYCAP_DIGIT_FOUR = '4⃣';
    case NUMBERS_LETTERS_KEYCAP_DIGIT_FIVE = '5⃣';
    case NUMBERS_LETTERS_KEYCAP_DIGIT_SIX = '6⃣';
    case NUMBERS_LETTERS_KEYCAP_DIGIT_SEVEN = '7⃣';
    case NUMBERS_LETTERS_KEYCAP_DIGIT_EIGHT = '8⃣';
    case NUMBERS_LETTERS_KEYCAP_DIGIT_NINE = '9⃣';
    case NUMBERS_LETTERS_KEYCAP_DIGIT_ZERO = '0⃣';
    case NUMBERS_LETTERS_KEYCAP_TEN = '🔟';
    case NUMBERS_LETTERS_INPUT_SYMBOL_FOR_NUMBERS = '🔢';
    case NUMBERS_LETTERS_KEYCAP_NUMBER_SIGN = '#⃣';
    case NUMBERS_LETTERS_INPUT_SYMBOL_FOR_LATIN_SMALL_LETTERS = '🔡';
    case NUMBERS_LETTERS_INPUT_SYMBOL_FOR_LATIN_LETTERS = '🔤';
    case NUMBERS_LETTERS_INFORMATION_SOURCE = 'ℹ';
    case NUMBERS_LETTERS_SQUARED_OK = '🆗';
    case NUMBERS_LETTERS_SQUARED_NEW = '🆕';
    case NUMBERS_LETTERS_SQUARED_UP_WITH_EXCLAMATION_MARK = '🆙';
    case NUMBERS_LETTERS_SQUARED_COOL = '🆒';
    case NUMBERS_LETTERS_SQUARED_FREE = '🆓';
    case NUMBERS_LETTERS_SQUARED_NG = '🆖';
    case NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_P = '🅿';
    case NUMBERS_LETTERS_CIRCLED_LATIN_CAPITAL_LETTER_M = 'Ⓜ';
    case NUMBERS_LETTERS_SQUARED_CL = '🆑';
    case NUMBERS_LETTERS_SQUARED_SOS = '🆘';
    case NUMBERS_LETTERS_SQUARED_ID = '🆔';
    case NUMBERS_LETTERS_SQUARED_VS = '🆚';
    case NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_A = '🅰';
    case NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_B = '🅱';
    case NUMBERS_LETTERS_NEGATIVE_SQUARED_AB = '🆎';
    case NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_O = '🅾';
    case NUMBERS_LETTERS_COPYRIGHT_SIGN = '©';
    case NUMBERS_LETTERS_REGISTERED_SIGN = '®';
    case NUMBERS_LETTERS_HUNDRED_POINTS_SYMBOL = '💯';
    case NUMBERS_LETTERS_TRADE_MARK_SIGN = '™';
    case NUMBERS_LETTERS_INPUT_SYMBOL_FOR_LATIN_CAPITAL_LETTERS = '🔠';
    case NUMBERS_LETTERS_AUTOMATED_TELLER_MACHINE = '🏧';
    case NUMBERS_LETTERS_DOUBLE_EXCLAMATION_MARK = '‼';
    case NUMBERS_LETTERS_EXCLAMATION_QUESTION_MARK = '⁉';
    case NUMBERS_LETTERS_HEAVY_EXCLAMATION_MARK_SYMBOL = '❗';
    case NUMBERS_LETTERS_BLACK_QUESTION_MARK_ORNAMENT = '❓';
    case NUMBERS_LETTERS_WHITE_EXCLAMATION_MARK_ORNAMENT = '❕';
    case NUMBERS_LETTERS_WHITE_QUESTION_MARK_ORNAMENT = '❔';
    case HAND_SIGNS_ARROWS_THUMBS_UP_SIGN = '👍';
    case HAND_SIGNS_ARROWS_THUMBS_DOWN_SIGN = '👎';
    case HAND_SIGNS_ARROWS_OK_HAND_SIGN = '👌';
    case HAND_SIGNS_ARROWS_FISTED_HAND_SIGN = '👊';
    case HAND_SIGNS_ARROWS_RAISED_FIST = '✊';
    case HAND_SIGNS_ARROWS_VICTORY_HAND = '✌';
    case HAND_SIGNS_ARROWS_WAVING_HAND_SIGN = '👋';
    case HAND_SIGNS_ARROWS_RAISED_HAND = '✋';
    case HAND_SIGNS_ARROWS_OPEN_HANDS_SIGN = '👐';
    case HAND_SIGNS_ARROWS_WHITE_UP_POINTING_BACKHAND_INDEX = '👆';
    case HAND_SIGNS_ARROWS_WHITE_DOWN_POINTING_BACKHAND_INDEX = '👇';
    case HAND_SIGNS_ARROWS_WHITE_RIGHT_POINTING_BACKHAND_INDEX = '👉';
    case HAND_SIGNS_ARROWS_WHITE_LEFT_POINTING_BACKHAND_INDEX = '👈';
    case HAND_SIGNS_ARROWS_PERSON_RAISING_BOTH_HANDS_IN_CELEBRATION = '🙌';
    case HAND_SIGNS_ARROWS_PERSON_WITH_FOLDED_HANDS = '🙏';
    case HAND_SIGNS_ARROWS_WHITE_UP_POINTING_INDEX = '☝';
    case HAND_SIGNS_ARROWS_CLAPPING_HANDS_SIGN = '👏';
    case HAND_SIGNS_ARROWS_FLEXED_BICEPS = '💪';
    case HAND_SIGNS_ARROWS_NAIL_POLISH = '💅';
    case HAND_SIGNS_ARROWS_DOWNWARDS_BLACK_ARROW = '⬇';
    case HAND_SIGNS_ARROWS_LEFTWARDS_BLACK_ARROW = '⬅';
    case HAND_SIGNS_ARROWS_BLACK_RIGHTWARDS_ARROW = '➡';
    case HAND_SIGNS_ARROWS_NORTH_EAST_ARROW = '↗';
    case HAND_SIGNS_ARROWS_NORTH_WEST_ARROW = '↖';
    case HAND_SIGNS_ARROWS_SOUTH_EAST_ARROW = '↘';
    case HAND_SIGNS_ARROWS_SOUTH_WEST_ARROW = '↙';
    case HAND_SIGNS_ARROWS_LEFT_RIGHT_ARROW = '↔';
    case HAND_SIGNS_ARROWS_UP_DOWN_ARROW = '↕';
    case HAND_SIGNS_ARROWS_ANTICLOCKWISE_DOWNWARDS_AND_UPWARDS_OPEN_CIRCLE_ARROWS = '🔄';
    case HAND_SIGNS_ARROWS_BLACK_LEFT_POINTING_TRIANGLE = '◀';
    case HAND_SIGNS_ARROWS_BLACK_RIGHT_POINTING_TRIANGLE = '▶';
    case HAND_SIGNS_ARROWS_UP_POINTING_SMALL_RED_TRIANGLE = '🔼';
    case HAND_SIGNS_ARROWS_DOWN_POINTING_SMALL_RED_TRIANGLE = '🔽';
    case HAND_SIGNS_ARROWS_LEFTWARDS_ARROW_WITH_HOOK = '↩';
    case HAND_SIGNS_ARROWS_RIGHTWARDS_ARROW_WITH_HOOK = '↪';
    case HAND_SIGNS_ARROWS_BLACK_LEFT_POINTING_DOUBLE_TRIANGLE = '⏪';
    case HAND_SIGNS_ARROWS_BLACK_RIGHT_POINTING_DOUBLE_TRIANGLE = '⏩';
    case HAND_SIGNS_ARROWS_BLACK_UP_POINTING_DOUBLE_TRIANGLE = '⏫';
    case HAND_SIGNS_ARROWS_BLACK_DOWN_POINTING_DOUBLE_TRIANGLE = '⏬';
    case HAND_SIGNS_ARROWS_ARROW_POINTING_RIGHTWARDS_THEN_CURVING_DOWNWARDS = '⤵';
    case HAND_SIGNS_ARROWS_ARROW_POINTING_RIGHTWARDS_THEN_CURVING_UPWARDS = '⤴';
    case HAND_SIGNS_ARROWS_TWISTED_RIGHTWARDS_ARROWS = '🔀';
    case HAND_SIGNS_ARROWS_CLOCKWISE_RIGHTWARDS_AND_LEFTWARDS_OPEN_CIRCLE_ARROWS = '🔁';
    case HAND_SIGNS_ARROWS_CLOCKWISE_RIGHTWARDS_AND_LEFTWARDS_OPEN_CIRCLE_ARROWS_WITH_CIRCLED_ONE_OVERLAY = '🔂';
    case HAND_SIGNS_ARROWS_TOP_WITH_UPWARDS_ARROW_ABOVE = '🔝';
    case HAND_SIGNS_ARROWS_END_WITH_LEFTWARDS_ARROW_ABOVE = '🔚';
    case HAND_SIGNS_ARROWS_BACK_WITH_LEFTWARDS_ARROW_ABOVE = '🔙';
    case HAND_SIGNS_ARROWS_ON_WITH_EXCLAMATION_MARK_WITH_LEFT_RIGHT_ARROW_ABOVE = '🔛';
    case HAND_SIGNS_ARROWS_SOON_WITH_RIGHTWARDS_ARROW_ABOVE = '🔜';
    case HAND_SIGNS_ARROWS_CLOCKWISE_DOWNWARDS_AND_UPWARDS_OPEN_CIRCLE_ARROWS = '🔃';
    case HAND_SIGNS_ARROWS_UP_POINTING_RED_TRIANGLE = '🔺';
    case HAND_SIGNS_ARROWS_DOWN_POINTING_RED_TRIANGLE = '🔻';
    case HAND_SIGNS_ARROWS_UPWARDS_BLACK_ARROW = '⬆';
    case SYMBOLS_RESTROOM = '🚻';
    case SYMBOLS_MENS_SYMBOL = '🚹';
    case SYMBOLS_WOMENS_SYMBOL = '🚺';
    case SYMBOLS_BABY_SYMBOL = '🚼';
    case SYMBOLS_WATER_CLOSET = '🚾';
    case SYMBOLS_POTABLE_WATER_SYMBOL = '🚰';
    case SYMBOLS_PUT_LITTER_IN_ITS_PLACE_SYMBOL = '🚮';
    case SYMBOLS_WHEELCHAIR_SYMBOL = '♿';
    case SYMBOLS_NO_SMOKING_SYMBOL = '🚭';
    case SYMBOLS_PASSPORT_CONTROL = '🛂';
    case SYMBOLS_BAGGAGE_CLAIM = '🛄';
    case SYMBOLS_LEFT_LUGGAGE = '🛅';
    case SYMBOLS_CUSTOMS = '🛃';
    case SYMBOLS_NO_ENTRY_SIGN = '🚫';
    case SYMBOLS_NO_ONE_UNDER_EIGHTEEN_SYMBOL = '🔞';
    case SYMBOLS_NO_MOBILE_PHONES = '📵';
    case SYMBOLS_DO_NOT_LITTER_SYMBOL = '🚯';
    case SYMBOLS_NON_POTABLE_WATER_SYMBOL = '🚱';
    case SYMBOLS_NO_BICYCLES = '🚳';
    case SYMBOLS_NO_PEDESTRIANS = '🚷';
    case SYMBOLS_CHILDREN_CROSSING = '🚸';
    case SYMBOLS_NO_ENTRY = '⛔';
    case SYMBOLS_BLACK_UNIVERSAL_RECYCLING_SYMBOL = '♻';
    case SYMBOLS_DIAMOND_SHAPE_WITH_ADOT_INSIDE = '💠';
    case OTHER_PINE_DECORATION = '🎍';
    case OTHER_JAPANESE_DOLLS = '🎎';
    case OTHER_SCHOOL_SATCHEL = '🎒';
    case OTHER_GRADUATION_CAP = '🎓';
    case OTHER_CARP_STREAMER = '🎏';
    case OTHER_FIREWORKS = '🎆';
    case OTHER_FIREWORK_SPARKLER = '🎇';
    case OTHER_WIND_CHIME = '🎐';
    case OTHER_MOON_VIEWING_CEREMONY = '🎑';
    case OTHER_JACK_OLANTERN = '🎃';
    case OTHER_GHOST = '👻';
    case OTHER_FATHER_CHRISTMAS = '🎅';
    case OTHER_CHRISTMAS_TREE = '🎄';
    case OTHER_WRAPPED_PRESENT = '🎁';
    case OTHER_TANABATA_TREE = '🎋';
    case OTHER_PARTY_POPPER = '🎉';
    case OTHER_CONFETTI_BALL = '🎊';
    case OTHER_BALLOON = '🎈';
    case OTHER_CROSSED_FLAGS = '🎌';
    case OTHER_CRYSTAL_BALL = '🔮';
    case OTHER_HIGH_BRIGHTNESS_SYMBOL = '🔆';
    case OTHER_LOW_BRIGHTNESS_SYMBOL = '🔅';
    case OTHER_BATHTUB = '🛁';
    case OTHER_BATH = '🛀';
    case OTHER_SHOWER = '🚿';
    case OTHER_TOILET = '🚽';
    case OTHER_DOOR = '🚪';
    case OTHER_SMOKING_SYMBOL = '🚬';
    case OTHER_BOMB = '💣';
    case OTHER_PISTOL = '🔫';
    case OTHER_HOCHO = '🔪';
    case OTHER_PILL = '💊';
    case OTHER_SYRINGE = '💉';
    case OTHER_FIRE = '🔥';
    case OTHER_SPARKLES = '✨';
    case OTHER_GLOWING_STAR = '🌟';
    case OTHER_DIZZY_SYMBOL = '💫';
    case OTHER_COLLISION_SYMBOL = '💥';
    case OTHER_ANGER_SYMBOL = '💢';
    case OTHER_SPLASHING_SWEAT_SYMBOL = '💦';
    case OTHER_DROPLET = '💧';
    case OTHER_SLEEPING_SYMBOL = '💤';
    case OTHER_DASH_SYMBOL = '💨';
    case OTHER_EAR = '👂';
    case OTHER_EYES = '👀';
    case OTHER_NOSE = '👃';
    case OTHER_TONGUE = '👅';
    case OTHER_MOUTH = '👄';
    case OTHER_PEDESTRIAN = '🚶';
    case OTHER_RUNNER = '🏃';
    case OTHER_DANCER = '💃';
    case OTHER_WOMAN_WITH_BUNNY_EARS = '👯';
    case OTHER_FACE_WITH_OK_GESTURE = '🙆';
    case OTHER_FACE_WITH_NO_GOOD_GESTURE = '🙅';
    case OTHER_INFORMATION_DESK_PERSON = '💁';
    case OTHER_HAPPY_PERSON_RAISING_ONE_HAND = '🙋';
    case OTHER_FACE_MASSAGE = '💆';
    case OTHER_HAIRCUT = '💇';
    case OTHER_BRIDE_WITH_VEIL = '👰';
    case OTHER_PERSON_WITH_POUTING_FACE = '🙎';
    case OTHER_PERSON_FROWNING = '🙍';
    case OTHER_PERSON_BOWING_DEEPLY = '🙇';
    case OTHER_SIX_POINTED_STAR_WITH_MIDDLE_DOT = '🔯';
    case OTHER_CHART_WITH_UPWARDS_TREND_AND_YEN_SIGN = '💹';
    case OTHER_HEAVY_DOLLAR_SIGN = '💲';
    case OTHER_CURRENCY_EXCHANGE = '💱';
    case OTHER_CROSS_MARK = '❌';
    case OTHER_HEAVY_LARGE_CIRCLE = '⭕';
    case OTHER_HEAVY_MULTIPLICATION_X = '✖';
    case OTHER_BLACK_SPADE_SUIT = '♠';
    case OTHER_BLACK_HEART_SUIT = '♥';
    case OTHER_BLACK_CLUB_SUIT = '♣';
    case OTHER_BLACK_DIAMOND_SUIT = '♦';
    case OTHER_HEAVY_CHECK_MARK = '✔';
    case OTHER_BALLOT_BOX_WITH_CHECK = '☑';
    case OTHER_RADIO_BUTTON = '🔘';
    case OTHER_LINK_SYMBOL = '🔗';
    case OTHER_WAVY_DASH = '〰';
    case OTHER_PART_ALTERNATION_MARK = '〽';
    case OTHER_TRIDENT_EMBLEM = '🔱';
    case OTHER_BLACK_MEDIUM_SQUARE = '◼';
    case OTHER_WHITE_MEDIUM_SQUARE = '◻';
    case OTHER_BLACK_MEDIUM_SMALL_SQUARE = '◾';
    case OTHER_WHITE_MEDIUM_SMALL_SQUARE = '◽';
    case OTHER_BLACK_SMALL_SQUARE = '▪';
    case OTHER_WHITE_SMALL_SQUARE = '▫';
    case OTHER_BLACK_SQUARE_BUTTON = '🔲';
    case OTHER_WHITE_SQUARE_BUTTON = '🔳';
    case OTHER_MEDIUM_BLACK_CIRCLE = '⚫';
    case OTHER_MEDIUM_WHITE_CIRCLE = '⚪';
    case OTHER_LARGE_RED_CIRCLE = '🔴';
    case OTHER_LARGE_BLUE_CIRCLE = '🔵';
    case OTHER_WHITE_LARGE_SQUARE = '⬜';
    case OTHER_BLACK_LARGE_SQUARE = '⬛';
    case OTHER_LARGE_ORANGE_DIAMOND = '🔶';
    case OTHER_LARGE_BLUE_DIAMOND = '🔷';
    case OTHER_SMALL_ORANGE_DIAMOND = '🔸';
    case OTHER_SMALL_BLUE_DIAMOND = '🔹';
    case OTHER_SQUARED_KATAKANA_KOKO = '🈁';
    case OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_630 = '🈯';
    case OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7_A_7_A = '🈳';
    case OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_6_E_80 = '🈵';
    case OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_5408 = '🈴';
    case OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7981 = '🈲';
    case OTHER_CIRCLED_IDEOGRAPH_ADVANTAGE = '🉐';
    case OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_5272 = '🈹';
    case OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_55_B_6 = '🈺';
    case OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_6709 = '🈶';
    case OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7121 = '🈚';
    case OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_6708 = '🈷';
    case OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7533 = '🈸';
    case OTHER_SQUARED_KATAKANA_SA = '🈂';
    case OTHER_CIRCLED_IDEOGRAPH_ACCEPT = '🉑';
    case OTHER_CIRCLED_IDEOGRAPH_SECRET = '㊙';
    case OTHER_CIRCLED_IDEOGRAPH_CONGRATULATION = '㊗';
    case OTHER_EIGHT_SPOKED_ASTERISK = '✳';
    case OTHER_SPARKLE = '❇';
    case OTHER_EIGHT_POINTED_BLACK_STAR = '✴';
    case OTHER_NEGATIVE_SQUARED_CROSS_MARK = '❎';
    case OTHER_WHITE_HEAVY_CHECK_MARK = '✅';

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_GLOBE_WITH_MERIDIANS')]
    public static function weatherTimeGlobeWithMeridians(): Emojis
    {
        return Emojis::WEATHER_TIME_GLOBE_WITH_MERIDIANS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_SUN_WITH_FACE')]
    public static function weatherTimeSunWithFace(): Emojis
    {
        return Emojis::WEATHER_TIME_SUN_WITH_FACE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_FULL_MOON_WITH_FACE')]
    public static function weatherTimeFullMoonWithFace(): Emojis
    {
        return Emojis::WEATHER_TIME_FULL_MOON_WITH_FACE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_NEW_MOON_WITH_FACE')]
    public static function weatherTimeNewMoonWithFace(): Emojis
    {
        return Emojis::WEATHER_TIME_NEW_MOON_WITH_FACE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_NEW_MOON_SYMBOL')]
    public static function weatherTimeNewMoonSymbol(): Emojis
    {
        return Emojis::WEATHER_TIME_NEW_MOON_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_WAXING_CRESCENT_MOON_SYMBOL')]
    public static function weatherTimeWaxingCrescentMoonSymbol(): Emojis
    {
        return Emojis::WEATHER_TIME_WAXING_CRESCENT_MOON_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_FIRST_QUARTER_MOON_SYMBOL')]
    public static function weatherTimeFirstQuarterMoonSymbol(): Emojis
    {
        return Emojis::WEATHER_TIME_FIRST_QUARTER_MOON_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_WAXING_GIBBOUS_MOON_SYMBOL')]
    public static function weatherTimeWaxingGibbousMoonSymbol(): Emojis
    {
        return Emojis::WEATHER_TIME_WAXING_GIBBOUS_MOON_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_FULL_MOON_SYMBOL')]
    public static function weatherTimeFullMoonSymbol(): Emojis
    {
        return Emojis::WEATHER_TIME_FULL_MOON_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_WANING_GIBBOUS_MOON_SYMBOL')]
    public static function weatherTimeWaningGibbousMoonSymbol(): Emojis
    {
        return Emojis::WEATHER_TIME_WANING_GIBBOUS_MOON_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_LAST_QUARTER_MOON_SYMBOL')]
    public static function weatherTimeLastQuarterMoonSymbol(): Emojis
    {
        return Emojis::WEATHER_TIME_LAST_QUARTER_MOON_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_WANING_CRESCENT_MOON_SYMBOL')]
    public static function weatherTimeWaningCrescentMoonSymbol(): Emojis
    {
        return Emojis::WEATHER_TIME_WANING_CRESCENT_MOON_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_LAST_QUARTER_MOON_WITH_FACE')]
    public static function weatherTimeLastQuarterMoonWithFace(): Emojis
    {
        return Emojis::WEATHER_TIME_LAST_QUARTER_MOON_WITH_FACE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_FIRST_QUARTER_MOON_WITH_FACE')]
    public static function weatherTimeFirstQuarterMoonWithFace(): Emojis
    {
        return Emojis::WEATHER_TIME_FIRST_QUARTER_MOON_WITH_FACE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CRESCENT_MOON')]
    public static function weatherTimeCrescentMoon(): Emojis
    {
        return Emojis::WEATHER_TIME_CRESCENT_MOON;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_EARTH_GLOBE_EUROPE_AFRICA')]
    public static function weatherTimeEarthGlobeEuropeAfrica(): Emojis
    {
        return Emojis::WEATHER_TIME_EARTH_GLOBE_EUROPE_AFRICA;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_EARTH_GLOBE_AMERICAS')]
    public static function weatherTimeEarthGlobeAmericas(): Emojis
    {
        return Emojis::WEATHER_TIME_EARTH_GLOBE_AMERICAS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_EARTH_GLOBE_ASIA_AUSTRALIA')]
    public static function weatherTimeEarthGlobeAsiaAustralia(): Emojis
    {
        return Emojis::WEATHER_TIME_EARTH_GLOBE_ASIA_AUSTRALIA;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_VOLCANO')]
    public static function weatherTimeVolcano(): Emojis
    {
        return Emojis::WEATHER_TIME_VOLCANO;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_MILKY_WAY')]
    public static function weatherTimeMilkyWay(): Emojis
    {
        return Emojis::WEATHER_TIME_MILKY_WAY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_SHOOTING_STAR')]
    public static function weatherTimeShootingStar(): Emojis
    {
        return Emojis::WEATHER_TIME_SHOOTING_STAR;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_WHITE_MEDIUM_STAR')]
    public static function weatherTimeWhiteMediumStar(): Emojis
    {
        return Emojis::WEATHER_TIME_WHITE_MEDIUM_STAR;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_BLACK_SUN_WITH_RAYS')]
    public static function weatherTimeBlackSunWithRays(): Emojis
    {
        return Emojis::WEATHER_TIME_BLACK_SUN_WITH_RAYS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_SUN_BEHIND_CLOUD')]
    public static function weatherTimeSunBehindCloud(): Emojis
    {
        return Emojis::WEATHER_TIME_SUN_BEHIND_CLOUD;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOUD')]
    public static function weatherTimeCloud(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOUD;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_HIGH_VOLTAGE_SIGN')]
    public static function weatherTimeHighVoltageSign(): Emojis
    {
        return Emojis::WEATHER_TIME_HIGH_VOLTAGE_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_UMBRELLA_WITH_RAIN_DROPS')]
    public static function weatherTimeUmbrellaWithRainDrops(): Emojis
    {
        return Emojis::WEATHER_TIME_UMBRELLA_WITH_RAIN_DROPS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_SNOWFLAKE')]
    public static function weatherTimeSnowflake(): Emojis
    {
        return Emojis::WEATHER_TIME_SNOWFLAKE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_SNOWMAN_WITHOUT_SNOW')]
    public static function weatherTimeSnowmanWithoutSnow(): Emojis
    {
        return Emojis::WEATHER_TIME_SNOWMAN_WITHOUT_SNOW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CYCLONE')]
    public static function weatherTimeCyclone(): Emojis
    {
        return Emojis::WEATHER_TIME_CYCLONE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_FOGGY')]
    public static function weatherTimeFoggy(): Emojis
    {
        return Emojis::WEATHER_TIME_FOGGY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_RAINBOW')]
    public static function weatherTimeRainbow(): Emojis
    {
        return Emojis::WEATHER_TIME_RAINBOW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_WATER_WAVE')]
    public static function weatherTimeWaterWave(): Emojis
    {
        return Emojis::WEATHER_TIME_WATER_WAVE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_TWELVE_OCLOCK')]
    public static function weatherTimeClockFaceTwelveOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_TWELVE_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_TWELVE_THIRTY')]
    public static function weatherTimeClockFaceTwelveThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_TWELVE_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_ONE_OCLOCK')]
    public static function weatherTimeClockFaceOneOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_ONE_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_ONE_THIRTY')]
    public static function weatherTimeClockFaceOneThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_ONE_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_TWO_OCLOCK')]
    public static function weatherTimeClockFaceTwoOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_TWO_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_TWO_THIRTY')]
    public static function weatherTimeClockFaceTwoThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_TWO_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_THREE_OCLOCK')]
    public static function weatherTimeClockFaceThreeOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_THREE_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_THREE_THIRTY')]
    public static function weatherTimeClockFaceThreeThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_THREE_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_FOUR_OCLOCK')]
    public static function weatherTimeClockFaceFourOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_FOUR_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_FOUR_THIRTY')]
    public static function weatherTimeClockFaceFourThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_FOUR_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_FIVE_OCLOCK')]
    public static function weatherTimeClockFaceFiveOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_FIVE_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_FIVE_THIRTY')]
    public static function weatherTimeClockFaceFiveThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_FIVE_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_SIX_OCLOCK')]
    public static function weatherTimeClockFaceSixOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_SIX_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_SEVEN_OCLOCK')]
    public static function weatherTimeClockFaceSevenOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_SEVEN_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_EIGHT_OCLOCK')]
    public static function weatherTimeClockFaceEightOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_EIGHT_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_NINE_OCLOCK')]
    public static function weatherTimeClockFaceNineOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_NINE_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_TEN_OCLOCK')]
    public static function weatherTimeClockFaceTenOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_TEN_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_ELEVEN_OCLOCK')]
    public static function weatherTimeClockFaceElevenOClock(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_ELEVEN_OCLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_SIX_THIRTY')]
    public static function weatherTimeClockFaceSixThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_SIX_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_SEVEN_THIRTY')]
    public static function weatherTimeClockFaceSevenThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_SEVEN_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_EIGHT_THIRTY')]
    public static function weatherTimeClockFaceEightThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_EIGHT_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_NINE_THIRTY')]
    public static function weatherTimeClockFaceNineThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_NINE_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_TEN_THIRTY')]
    public static function weatherTimeClockFaceTenThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_TEN_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::WEATHER_TIME_CLOCK_FACE_ELEVEN_THIRTY')]
    public static function weatherTimeClockFaceElevenThirty(): Emojis
    {
        return Emojis::WEATHER_TIME_CLOCK_FACE_ELEVEN_THIRTY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_ARTIST_PALETTE')]
    public static function sportsGamesHobbiesArtistPalette(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_ARTIST_PALETTE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_CLAPPER_BOARD')]
    public static function sportsGamesHobbiesClapperBoard(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_CLAPPER_BOARD;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_MICROPHONE')]
    public static function sportsGamesHobbiesMicrophone(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_MICROPHONE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_HEADPHONE')]
    public static function sportsGamesHobbiesHeadphone(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_HEADPHONE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_MUSICAL_SCORE')]
    public static function sportsGamesHobbiesMusicalScore(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_MUSICAL_SCORE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_MUSICAL_NOTE')]
    public static function sportsGamesHobbiesMusicalNote(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_MUSICAL_NOTE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_MULTIPLE_MUSICAL_NOTES')]
    public static function sportsGamesHobbiesMultipleMusicalNotes(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_MULTIPLE_MUSICAL_NOTES;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_MUSICAL_KEYBOARD')]
    public static function sportsGamesHobbiesMusicalKeyboard(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_MUSICAL_KEYBOARD;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_VIOLIN')]
    public static function sportsGamesHobbiesViolin(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_VIOLIN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_TRUMPET')]
    public static function sportsGamesHobbiesTrumpet(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_TRUMPET;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_SAXOPHONE')]
    public static function sportsGamesHobbiesSaxophone(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_SAXOPHONE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_GUITAR')]
    public static function sportsGamesHobbiesGuitar(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_GUITAR;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_ALIEN_MONSTER')]
    public static function sportsGamesHobbiesAlienMonster(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_ALIEN_MONSTER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_VIDEO_GAME')]
    public static function sportsGamesHobbiesVideoGame(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_VIDEO_GAME;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_PLAYING_CARD_BLACK_JOKER')]
    public static function sportsGamesHobbiesPlayingCardBlackJoker(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_PLAYING_CARD_BLACK_JOKER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_FLOWER_PLAYING_CARDS')]
    public static function sportsGamesHobbiesFlowerPlayingCards(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_FLOWER_PLAYING_CARDS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_MAHJONG_TILE_RED_DRAGON')]
    public static function sportsGamesHobbiesMahjongTileRedDragon(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_MAHJONG_TILE_RED_DRAGON;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_GAME_DIE')]
    public static function sportsGamesHobbiesGameDie(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_GAME_DIE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_DIRECT_HIT')]
    public static function sportsGamesHobbiesDirectHit(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_DIRECT_HIT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_AMERICAN_FOOTBALL')]
    public static function sportsGamesHobbiesAmericanFootball(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_AMERICAN_FOOTBALL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_BASKETBALL_AND_HOOP')]
    public static function sportsGamesHobbiesBasketballAndHoop(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_BASKETBALL_AND_HOOP;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_SOCCER_BALL')]
    public static function sportsGamesHobbiesSoccerBall(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_SOCCER_BALL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_TENNIS_RACQUET_AND_BALL')]
    public static function sportsGamesHobbiesTennisRacquetAndBall(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_TENNIS_RACQUET_AND_BALL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_BILLIARDS')]
    public static function sportsGamesHobbiesBilliards(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_BILLIARDS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_RUGBY_FOOTBALL')]
    public static function sportsGamesHobbiesRugbyFootball(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_RUGBY_FOOTBALL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_BOWLING')]
    public static function sportsGamesHobbiesBowling(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_BOWLING;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_FLAG_IN_HOLE')]
    public static function sportsGamesHobbiesFlagInHole(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_FLAG_IN_HOLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_MOUNTAIN_BICYCLIST')]
    public static function sportsGamesHobbiesMountainBicyclist(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_MOUNTAIN_BICYCLIST;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_BICYCLIST')]
    public static function sportsGamesHobbiesBicyclist(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_BICYCLIST;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_CHEQUERED_FLAG')]
    public static function sportsGamesHobbiesChequeredFlag(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_CHEQUERED_FLAG;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_HORSE_RACING')]
    public static function sportsGamesHobbiesHorseRacing(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_HORSE_RACING;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_TROPHY')]
    public static function sportsGamesHobbiesTrophy(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_TROPHY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_SKI_AND_SKI_BOOT')]
    public static function sportsGamesHobbiesSkiAndSkiBoot(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_SKI_AND_SKI_BOOT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_SNOWBOARDER')]
    public static function sportsGamesHobbiesSnowboarder(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_SNOWBOARDER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_SWIMMER')]
    public static function sportsGamesHobbiesSwimmer(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_SWIMMER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_SURFER')]
    public static function sportsGamesHobbiesSurfer(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_SURFER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SPORTS_GAMES_HOBBIES_FISHING_POLE_AND_FISH')]
    public static function sportsGamesHobbiesFishingPoleAndFish(): Emojis
    {
        return Emojis::SPORTS_GAMES_HOBBIES_FISHING_POLE_AND_FISH;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_MOVIE_CAMERA')]
    public static function technologyMovieCamera(): Emojis
    {
        return Emojis::TECHNOLOGY_MOVIE_CAMERA;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_CAMERA')]
    public static function technologyCamera(): Emojis
    {
        return Emojis::TECHNOLOGY_CAMERA;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_VIDEO_CAMERA')]
    public static function technologyVideoCamera(): Emojis
    {
        return Emojis::TECHNOLOGY_VIDEO_CAMERA;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_VIDEOCASSETTE')]
    public static function technologyVideocassette(): Emojis
    {
        return Emojis::TECHNOLOGY_VIDEOCASSETTE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_OPTICAL_DISC')]
    public static function technologyOpticalDisc(): Emojis
    {
        return Emojis::TECHNOLOGY_OPTICAL_DISC;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_DVD')]
    public static function technologyDvd(): Emojis
    {
        return Emojis::TECHNOLOGY_DVD;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_MINIDISC')]
    public static function technologyMinidisc(): Emojis
    {
        return Emojis::TECHNOLOGY_MINIDISC;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_FLOPPY_DISK')]
    public static function technologyFloppyDisk(): Emojis
    {
        return Emojis::TECHNOLOGY_FLOPPY_DISK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_PERSONAL_COMPUTER')]
    public static function technologyPersonalComputer(): Emojis
    {
        return Emojis::TECHNOLOGY_PERSONAL_COMPUTER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_MOBILE_PHONE')]
    public static function technologyMobilePhone(): Emojis
    {
        return Emojis::TECHNOLOGY_MOBILE_PHONE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_BLACK_TELEPHONE')]
    public static function technologyBlackTelephone(): Emojis
    {
        return Emojis::TECHNOLOGY_BLACK_TELEPHONE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_TELEPHONE_RECEIVER')]
    public static function technologyTelephoneReceiver(): Emojis
    {
        return Emojis::TECHNOLOGY_TELEPHONE_RECEIVER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_PAGER')]
    public static function technologyPager(): Emojis
    {
        return Emojis::TECHNOLOGY_PAGER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_FAX_MACHINE')]
    public static function technologyFaxMachine(): Emojis
    {
        return Emojis::TECHNOLOGY_FAX_MACHINE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_SATELLITE_ANTENNA')]
    public static function technologySatelliteAntenna(): Emojis
    {
        return Emojis::TECHNOLOGY_SATELLITE_ANTENNA;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_TELEVISION')]
    public static function technologyTelevision(): Emojis
    {
        return Emojis::TECHNOLOGY_TELEVISION;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_RADIO')]
    public static function technologyRadio(): Emojis
    {
        return Emojis::TECHNOLOGY_RADIO;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_SPEAKER_WITH_THREE_SOUND_WAVES')]
    public static function technologySpeakerWithThreeSoundWaves(): Emojis
    {
        return Emojis::TECHNOLOGY_SPEAKER_WITH_THREE_SOUND_WAVES;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_SPEAKER_WITH_ONE_SOUND_WAVE')]
    public static function technologySpeakerWithOneSoundWave(): Emojis
    {
        return Emojis::TECHNOLOGY_SPEAKER_WITH_ONE_SOUND_WAVE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_SPEAKER')]
    public static function technologySpeaker(): Emojis
    {
        return Emojis::TECHNOLOGY_SPEAKER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_SPEAKER_WITH_CANCELLATION_STROKE')]
    public static function technologySpeakerWithCancellationStroke(): Emojis
    {
        return Emojis::TECHNOLOGY_SPEAKER_WITH_CANCELLATION_STROKE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_BELL')]
    public static function technologyBell(): Emojis
    {
        return Emojis::TECHNOLOGY_BELL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_BELL_WITH_CANCELLATION_STROKE')]
    public static function technologyBellWithCancellationStroke(): Emojis
    {
        return Emojis::TECHNOLOGY_BELL_WITH_CANCELLATION_STROKE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_PUBLIC_ADDRESS_LOUDSPEAKER')]
    public static function technologyPublicAddressLoudspeaker(): Emojis
    {
        return Emojis::TECHNOLOGY_PUBLIC_ADDRESS_LOUDSPEAKER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_CHEERING_MEGAPHONE')]
    public static function technologyCheeringMegaphone(): Emojis
    {
        return Emojis::TECHNOLOGY_CHEERING_MEGAPHONE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_HOURGLASS_WITH_FLOWING_SAND')]
    public static function technologyHourglassWithFlowingSand(): Emojis
    {
        return Emojis::TECHNOLOGY_HOURGLASS_WITH_FLOWING_SAND;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_HOURGLASS')]
    public static function technologyHourglass(): Emojis
    {
        return Emojis::TECHNOLOGY_HOURGLASS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_ALARM_CLOCK')]
    public static function technologyAlarmClock(): Emojis
    {
        return Emojis::TECHNOLOGY_ALARM_CLOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_WATCH')]
    public static function technologyWatch(): Emojis
    {
        return Emojis::TECHNOLOGY_WATCH;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_OPEN_LOCK')]
    public static function technologyOpenLock(): Emojis
    {
        return Emojis::TECHNOLOGY_OPEN_LOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_LOCK')]
    public static function technologyLock(): Emojis
    {
        return Emojis::TECHNOLOGY_LOCK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_LOCK_WITH_INK_PEN')]
    public static function technologyLockWithInkPen(): Emojis
    {
        return Emojis::TECHNOLOGY_LOCK_WITH_INK_PEN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_CLOSED_LOCK_WITH_KEY')]
    public static function technologyClosedLockWithKey(): Emojis
    {
        return Emojis::TECHNOLOGY_CLOSED_LOCK_WITH_KEY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_KEY')]
    public static function technologyKey(): Emojis
    {
        return Emojis::TECHNOLOGY_KEY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_LEFT_POINTING_MAGNIFYING_GLASS')]
    public static function technologyLeftPointingMagnifyingGlass(): Emojis
    {
        return Emojis::TECHNOLOGY_LEFT_POINTING_MAGNIFYING_GLASS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_ELECTRIC_LIGHT_BULB')]
    public static function technologyElectricLightBulb(): Emojis
    {
        return Emojis::TECHNOLOGY_ELECTRIC_LIGHT_BULB;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_ELECTRIC_TORCH')]
    public static function technologyElectricTorch(): Emojis
    {
        return Emojis::TECHNOLOGY_ELECTRIC_TORCH;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_ELECTRIC_PLUG')]
    public static function technologyElectricPlug(): Emojis
    {
        return Emojis::TECHNOLOGY_ELECTRIC_PLUG;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_BATTERY')]
    public static function technologyBattery(): Emojis
    {
        return Emojis::TECHNOLOGY_BATTERY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_RIGHT_POINTING_MAGNIFYING_GLASS')]
    public static function technologyRightPointingMagnifyingGlass(): Emojis
    {
        return Emojis::TECHNOLOGY_RIGHT_POINTING_MAGNIFYING_GLASS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_WRENCH')]
    public static function technologyWrench(): Emojis
    {
        return Emojis::TECHNOLOGY_WRENCH;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_NUT_AND_BOLT')]
    public static function technologyNutAndBolt(): Emojis
    {
        return Emojis::TECHNOLOGY_NUT_AND_BOLT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_HAMMER')]
    public static function technologyHammer(): Emojis
    {
        return Emojis::TECHNOLOGY_HAMMER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_MOBILE_PHONE_WITH_RIGHTWARDS_ARROW_AT_LEFT')]
    public static function technologyMobilePhoneWithRightwardsArrowAtLeft(): Emojis
    {
        return Emojis::TECHNOLOGY_MOBILE_PHONE_WITH_RIGHTWARDS_ARROW_AT_LEFT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_ANTENNA_WITH_BARS')]
    public static function technologyAntennaWithBars(): Emojis
    {
        return Emojis::TECHNOLOGY_ANTENNA_WITH_BARS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_CINEMA')]
    public static function technologyCinema(): Emojis
    {
        return Emojis::TECHNOLOGY_CINEMA;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_VIBRATION_MODE')]
    public static function technologyVibrationMode(): Emojis
    {
        return Emojis::TECHNOLOGY_VIBRATION_MODE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::TECHNOLOGY_MOBILE_PHONE_OFF')]
    public static function technologyMobilePhoneOff(): Emojis
    {
        return Emojis::TECHNOLOGY_MOBILE_PHONE_OFF;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_DIGIT_ONE')]
    public static function numbersLettersKeycapDigitOne(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_DIGIT_ONE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_DIGIT_TWO')]
    public static function numbersLettersKeycapDigitTwo(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_DIGIT_TWO;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_DIGIT_THREE')]
    public static function numbersLettersKeycapDigitThree(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_DIGIT_THREE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_DIGIT_FOUR')]
    public static function numbersLettersKeycapDigitFour(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_DIGIT_FOUR;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_DIGIT_FIVE')]
    public static function numbersLettersKeycapDigitFive(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_DIGIT_FIVE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_DIGIT_SIX')]
    public static function numbersLettersKeycapDigitSix(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_DIGIT_SIX;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_DIGIT_SEVEN')]
    public static function numbersLettersKeycapDigitSeven(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_DIGIT_SEVEN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_DIGIT_EIGHT')]
    public static function numbersLettersKeycapDigitEight(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_DIGIT_EIGHT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_DIGIT_NINE')]
    public static function numbersLettersKeycapDigitNine(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_DIGIT_NINE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_DIGIT_ZERO')]
    public static function numbersLettersKeycapDigitZero(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_DIGIT_ZERO;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_TEN')]
    public static function numbersLettersKeycapTen(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_TEN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_INPUT_SYMBOL_FOR_NUMBERS')]
    public static function numbersLettersInputSymbolForNumbers(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_INPUT_SYMBOL_FOR_NUMBERS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_KEYCAP_NUMBER_SIGN')]
    public static function numbersLettersKeycapNumberSign(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_KEYCAP_NUMBER_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_INPUT_SYMBOL_FOR_LATIN_SMALL_LETTERS')]
    public static function numbersLettersInputSymbolForLatinSmallLetters(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_INPUT_SYMBOL_FOR_LATIN_SMALL_LETTERS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_INPUT_SYMBOL_FOR_LATIN_LETTERS')]
    public static function numbersLettersInputSymbolForLatinLetters(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_INPUT_SYMBOL_FOR_LATIN_LETTERS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_INFORMATION_SOURCE')]
    public static function numbersLettersInformationSource(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_INFORMATION_SOURCE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_SQUARED_OK')]
    public static function numbersLettersSquaredOk(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_SQUARED_OK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_SQUARED_NEW')]
    public static function numbersLettersSquaredNew(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_SQUARED_NEW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_SQUARED_UP_WITH_EXCLAMATION_MARK')]
    public static function numbersLettersSquaredUpWithExclamationMark(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_SQUARED_UP_WITH_EXCLAMATION_MARK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_SQUARED_COOL')]
    public static function numbersLettersSquaredCool(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_SQUARED_COOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_SQUARED_FREE')]
    public static function numbersLettersSquaredFree(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_SQUARED_FREE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_SQUARED_NG')]
    public static function numbersLettersSquaredNg(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_SQUARED_NG;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_P')]
    public static function numbersLettersNegativeSquaredLatinCapitalLetterP(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_P;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_CIRCLED_LATIN_CAPITAL_LETTER_M')]
    public static function numbersLettersCircledLatinCapitalLetterM(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_CIRCLED_LATIN_CAPITAL_LETTER_M;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_SQUARED_CL')]
    public static function numbersLettersSquaredCl(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_SQUARED_CL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_SQUARED_SOS')]
    public static function numbersLettersSquaredSos(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_SQUARED_SOS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_SQUARED_ID')]
    public static function numbersLettersSquaredId(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_SQUARED_ID;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_SQUARED_VS')]
    public static function numbersLettersSquaredVs(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_SQUARED_VS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_A')]
    public static function numbersLettersNegativeSquaredLatinCapitalLetterA(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_A;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_B')]
    public static function numbersLettersNegativeSquaredLatinCapitalLetterB(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_B;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_NEGATIVE_SQUARED_AB')]
    public static function numbersLettersNegativeSquaredAb(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_NEGATIVE_SQUARED_AB;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_O')]
    public static function numbersLettersNegativeSquaredLatinCapitalLetterO(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_O;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_COPYRIGHT_SIGN')]
    public static function numbersLettersCopyrightSign(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_COPYRIGHT_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_REGISTERED_SIGN')]
    public static function numbersLettersRegisteredSign(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_REGISTERED_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_HUNDRED_POINTS_SYMBOL')]
    public static function numbersLettersHundredPointsSymbol(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_HUNDRED_POINTS_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_TRADE_MARK_SIGN')]
    public static function numbersLettersTradeMarkSign(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_TRADE_MARK_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_INPUT_SYMBOL_FOR_LATIN_CAPITAL_LETTERS')]
    public static function numbersLettersInputSymbolForLatinCapitalLetters(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_INPUT_SYMBOL_FOR_LATIN_CAPITAL_LETTERS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_AUTOMATED_TELLER_MACHINE')]
    public static function numbersLettersAutomatedTellerMachine(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_AUTOMATED_TELLER_MACHINE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_DOUBLE_EXCLAMATION_MARK')]
    public static function numbersLettersDoubleExclamationMark(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_DOUBLE_EXCLAMATION_MARK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_EXCLAMATION_QUESTION_MARK')]
    public static function numbersLettersExclamationQuestionMark(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_EXCLAMATION_QUESTION_MARK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_HEAVY_EXCLAMATION_MARK_SYMBOL')]
    public static function numbersLettersHeavyExclamationMarkSymbol(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_HEAVY_EXCLAMATION_MARK_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_BLACK_QUESTION_MARK_ORNAMENT')]
    public static function numbersLettersBlackQuestionMarkOrnament(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_BLACK_QUESTION_MARK_ORNAMENT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_WHITE_EXCLAMATION_MARK_ORNAMENT')]
    public static function numbersLettersWhiteExclamationMarkOrnament(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_WHITE_EXCLAMATION_MARK_ORNAMENT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::NUMBERS_LETTERS_WHITE_QUESTION_MARK_ORNAMENT')]
    public static function numbersLettersWhiteQuestionMarkOrnament(): Emojis
    {
        return Emojis::NUMBERS_LETTERS_WHITE_QUESTION_MARK_ORNAMENT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_THUMBS_UP_SIGN')]
    public static function handSignsArrowsThumbsUpSign(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_THUMBS_UP_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_THUMBS_DOWN_SIGN')]
    public static function handSignsArrowsThumbsDownSign(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_THUMBS_DOWN_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_OK_HAND_SIGN')]
    public static function handSignsArrowsOkHandSign(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_OK_HAND_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_FISTED_HAND_SIGN')]
    public static function handSignsArrowsFistedHandSign(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_FISTED_HAND_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_RAISED_FIST')]
    public static function handSignsArrowsRaisedFist(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_RAISED_FIST;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_VICTORY_HAND')]
    public static function handSignsArrowsVictoryHand(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_VICTORY_HAND;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_WAVING_HAND_SIGN')]
    public static function handSignsArrowsWavingHandSign(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_WAVING_HAND_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_RAISED_HAND')]
    public static function handSignsArrowsRaisedHand(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_RAISED_HAND;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_OPEN_HANDS_SIGN')]
    public static function handSignsArrowsOpenHandsSign(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_OPEN_HANDS_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_WHITE_UP_POINTING_BACKHAND_INDEX')]
    public static function handSignsArrowsWhiteUpPointingBackhandIndex(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_WHITE_UP_POINTING_BACKHAND_INDEX;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_WHITE_DOWN_POINTING_BACKHAND_INDEX')]
    public static function handSignsArrowsWhiteDownPointingBackhandIndex(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_WHITE_DOWN_POINTING_BACKHAND_INDEX;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_WHITE_RIGHT_POINTING_BACKHAND_INDEX')]
    public static function handSignsArrowsWhiteRightPointingBackhandIndex(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_WHITE_RIGHT_POINTING_BACKHAND_INDEX;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_WHITE_LEFT_POINTING_BACKHAND_INDEX')]
    public static function handSignsArrowsWhiteLeftPointingBackhandIndex(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_WHITE_LEFT_POINTING_BACKHAND_INDEX;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_PERSON_RAISING_BOTH_HANDS_IN_CELEBRATION')]
    public static function handSignsArrowsPersonRaisingBothHandsInCelebration(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_PERSON_RAISING_BOTH_HANDS_IN_CELEBRATION;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_PERSON_WITH_FOLDED_HANDS')]
    public static function handSignsArrowsPersonWithFoldedHands(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_PERSON_WITH_FOLDED_HANDS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_WHITE_UP_POINTING_INDEX')]
    public static function handSignsArrowsWhiteUpPointingIndex(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_WHITE_UP_POINTING_INDEX;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_CLAPPING_HANDS_SIGN')]
    public static function handSignsArrowsClappingHandsSign(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_CLAPPING_HANDS_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_FLEXED_BICEPS')]
    public static function handSignsArrowsFlexedBiceps(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_FLEXED_BICEPS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_NAIL_POLISH')]
    public static function handSignsArrowsNailPolish(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_NAIL_POLISH;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_DOWNWARDS_BLACK_ARROW')]
    public static function handSignsArrowsDownwardsBlackArrow(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_DOWNWARDS_BLACK_ARROW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_LEFTWARDS_BLACK_ARROW')]
    public static function handSignsArrowsLeftwardsBlackArrow(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_LEFTWARDS_BLACK_ARROW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_BLACK_RIGHTWARDS_ARROW')]
    public static function handSignsArrowsBlackRightwardsArrow(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_BLACK_RIGHTWARDS_ARROW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_NORTH_EAST_ARROW')]
    public static function handSignsArrowsNorthEastArrow(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_NORTH_EAST_ARROW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_NORTH_WEST_ARROW')]
    public static function handSignsArrowsNorthWestArrow(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_NORTH_WEST_ARROW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_SOUTH_EAST_ARROW')]
    public static function handSignsArrowsSouthEastArrow(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_SOUTH_EAST_ARROW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_SOUTH_WEST_ARROW')]
    public static function handSignsArrowsSouthWestArrow(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_SOUTH_WEST_ARROW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_LEFT_RIGHT_ARROW')]
    public static function handSignsArrowsLeftRightArrow(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_LEFT_RIGHT_ARROW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_UP_DOWN_ARROW')]
    public static function handSignsArrowsUpDownArrow(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_UP_DOWN_ARROW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_ANTICLOCKWISE_DOWNWARDS_AND_UPWARDS_OPEN_CIRCLE_ARROWS')]
    public static function handSignsArrowsAnticlockwiseDownwardsAndUpwardsOpenCircleArrows(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_ANTICLOCKWISE_DOWNWARDS_AND_UPWARDS_OPEN_CIRCLE_ARROWS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_BLACK_LEFT_POINTING_TRIANGLE')]
    public static function handSignsArrowsBlackLeftPointingTriangle(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_BLACK_LEFT_POINTING_TRIANGLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_BLACK_RIGHT_POINTING_TRIANGLE')]
    public static function handSignsArrowsBlackRightPointingTriangle(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_BLACK_RIGHT_POINTING_TRIANGLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_UP_POINTING_SMALL_RED_TRIANGLE')]
    public static function handSignsArrowsUpPointingSmallRedTriangle(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_UP_POINTING_SMALL_RED_TRIANGLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_DOWN_POINTING_SMALL_RED_TRIANGLE')]
    public static function handSignsArrowsDownPointingSmallRedTriangle(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_DOWN_POINTING_SMALL_RED_TRIANGLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_LEFTWARDS_ARROW_WITH_HOOK')]
    public static function handSignsArrowsLeftwardsArrowWithHook(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_LEFTWARDS_ARROW_WITH_HOOK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_RIGHTWARDS_ARROW_WITH_HOOK')]
    public static function handSignsArrowsRightwardsArrowWithHook(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_RIGHTWARDS_ARROW_WITH_HOOK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_BLACK_LEFT_POINTING_DOUBLE_TRIANGLE')]
    public static function handSignsArrowsBlackLeftPointingDoubleTriangle(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_BLACK_LEFT_POINTING_DOUBLE_TRIANGLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_BLACK_RIGHT_POINTING_DOUBLE_TRIANGLE')]
    public static function handSignsArrowsBlackRightPointingDoubleTriangle(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_BLACK_RIGHT_POINTING_DOUBLE_TRIANGLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_BLACK_UP_POINTING_DOUBLE_TRIANGLE')]
    public static function handSignsArrowsBlackUpPointingDoubleTriangle(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_BLACK_UP_POINTING_DOUBLE_TRIANGLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_BLACK_DOWN_POINTING_DOUBLE_TRIANGLE')]
    public static function handSignsArrowsBlackDownPointingDoubleTriangle(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_BLACK_DOWN_POINTING_DOUBLE_TRIANGLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_ARROW_POINTING_RIGHTWARDS_THEN_CURVING_DOWNWARDS')]
    public static function handSignsArrowsArrowPointingRightwardsThenCurvingDownwards(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_ARROW_POINTING_RIGHTWARDS_THEN_CURVING_DOWNWARDS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_ARROW_POINTING_RIGHTWARDS_THEN_CURVING_UPWARDS')]
    public static function handSignsArrowsArrowPointingRightwardsThenCurvingUpwards(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_ARROW_POINTING_RIGHTWARDS_THEN_CURVING_UPWARDS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_TWISTED_RIGHTWARDS_ARROWS')]
    public static function handSignsArrowsTwistedRightwardsArrows(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_TWISTED_RIGHTWARDS_ARROWS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_CLOCKWISE_RIGHTWARDS_AND_LEFTWARDS_OPEN_CIRCLE_ARROWS')]
    public static function handSignsArrowsClockwiseRightwardsAndLeftwardsOpenCircleArrows(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_CLOCKWISE_RIGHTWARDS_AND_LEFTWARDS_OPEN_CIRCLE_ARROWS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_CLOCKWISE_RIGHTWARDS_AND_LEFTWARDS_OPEN_CIRCLE_ARROWS_WITH_CIRCLED_ONE_OVERLAY')]
    public static function handSignsArrowsClockwiseRightwardsAndLeftwardsOpenCircleArrowsWithCircledOneOverlay(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_CLOCKWISE_RIGHTWARDS_AND_LEFTWARDS_OPEN_CIRCLE_ARROWS_WITH_CIRCLED_ONE_OVERLAY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_TOP_WITH_UPWARDS_ARROW_ABOVE')]
    public static function handSignsArrowsTopWithUpwardsArrowAbove(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_TOP_WITH_UPWARDS_ARROW_ABOVE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_END_WITH_LEFTWARDS_ARROW_ABOVE')]
    public static function handSignsArrowsEndWithLeftwardsArrowAbove(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_END_WITH_LEFTWARDS_ARROW_ABOVE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_BACK_WITH_LEFTWARDS_ARROW_ABOVE')]
    public static function handSignsArrowsBackWithLeftwardsArrowAbove(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_BACK_WITH_LEFTWARDS_ARROW_ABOVE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_ON_WITH_EXCLAMATION_MARK_WITH_LEFT_RIGHT_ARROW_ABOVE')]
    public static function handSignsArrowsOnWithExclamationMarkWithLeftRightArrowAbove(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_ON_WITH_EXCLAMATION_MARK_WITH_LEFT_RIGHT_ARROW_ABOVE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_SOON_WITH_RIGHTWARDS_ARROW_ABOVE')]
    public static function handSignsArrowsSoonWithRightwardsArrowAbove(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_SOON_WITH_RIGHTWARDS_ARROW_ABOVE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_CLOCKWISE_DOWNWARDS_AND_UPWARDS_OPEN_CIRCLE_ARROWS')]
    public static function handSignsArrowsClockwiseDownwardsAndUpwardsOpenCircleArrows(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_CLOCKWISE_DOWNWARDS_AND_UPWARDS_OPEN_CIRCLE_ARROWS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_UP_POINTING_RED_TRIANGLE')]
    public static function handSignsArrowsUpPointingRedTriangle(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_UP_POINTING_RED_TRIANGLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_DOWN_POINTING_RED_TRIANGLE')]
    public static function handSignsArrowsDownPointingRedTriangle(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_DOWN_POINTING_RED_TRIANGLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::HAND_SIGNS_ARROWS_UPWARDS_BLACK_ARROW')]
    public static function handSignsArrowsUpwardsBlackArrow(): Emojis
    {
        return Emojis::HAND_SIGNS_ARROWS_UPWARDS_BLACK_ARROW;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_RESTROOM')]
    public static function symbolsRestroom(): Emojis
    {
        return Emojis::SYMBOLS_RESTROOM;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_MENS_SYMBOL')]
    public static function symbolsMensSymbol(): Emojis
    {
        return Emojis::SYMBOLS_MENS_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_WOMENS_SYMBOL')]
    public static function symbolsWomensSymbol(): Emojis
    {
        return Emojis::SYMBOLS_WOMENS_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_BABY_SYMBOL')]
    public static function symbolsBabySymbol(): Emojis
    {
        return Emojis::SYMBOLS_BABY_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_WATER_CLOSET')]
    public static function symbolsWaterCloset(): Emojis
    {
        return Emojis::SYMBOLS_WATER_CLOSET;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_POTABLE_WATER_SYMBOL')]
    public static function symbolsPotableWaterSymbol(): Emojis
    {
        return Emojis::SYMBOLS_POTABLE_WATER_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_PUT_LITTER_IN_ITS_PLACE_SYMBOL')]
    public static function symbolsPutLitterInItsPlaceSymbol(): Emojis
    {
        return Emojis::SYMBOLS_PUT_LITTER_IN_ITS_PLACE_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_WHEELCHAIR_SYMBOL')]
    public static function symbolsWheelchairSymbol(): Emojis
    {
        return Emojis::SYMBOLS_WHEELCHAIR_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_NO_SMOKING_SYMBOL')]
    public static function symbolsNoSmokingSymbol(): Emojis
    {
        return Emojis::SYMBOLS_NO_SMOKING_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_PASSPORT_CONTROL')]
    public static function symbolsPassportControl(): Emojis
    {
        return Emojis::SYMBOLS_PASSPORT_CONTROL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_BAGGAGE_CLAIM')]
    public static function symbolsBaggageClaim(): Emojis
    {
        return Emojis::SYMBOLS_BAGGAGE_CLAIM;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_LEFT_LUGGAGE')]
    public static function symbolsLeftLuggage(): Emojis
    {
        return Emojis::SYMBOLS_LEFT_LUGGAGE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_CUSTOMS')]
    public static function symbolsCustoms(): Emojis
    {
        return Emojis::SYMBOLS_CUSTOMS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_NO_ENTRY_SIGN')]
    public static function symbolsNoEntrySign(): Emojis
    {
        return Emojis::SYMBOLS_NO_ENTRY_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_NO_ONE_UNDER_EIGHTEEN_SYMBOL')]
    public static function symbolsNoOneUnderEighteenSymbol(): Emojis
    {
        return Emojis::SYMBOLS_NO_ONE_UNDER_EIGHTEEN_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_NO_MOBILE_PHONES')]
    public static function symbolsNoMobilePhones(): Emojis
    {
        return Emojis::SYMBOLS_NO_MOBILE_PHONES;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_DO_NOT_LITTER_SYMBOL')]
    public static function symbolsDoNotLitterSymbol(): Emojis
    {
        return Emojis::SYMBOLS_DO_NOT_LITTER_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_NON_POTABLE_WATER_SYMBOL')]
    public static function symbolsNonPotableWaterSymbol(): Emojis
    {
        return Emojis::SYMBOLS_NON_POTABLE_WATER_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_NO_BICYCLES')]
    public static function symbolsNoBicycles(): Emojis
    {
        return Emojis::SYMBOLS_NO_BICYCLES;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_NO_PEDESTRIANS')]
    public static function symbolsNoPedestrians(): Emojis
    {
        return Emojis::SYMBOLS_NO_PEDESTRIANS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_CHILDREN_CROSSING')]
    public static function symbolsChildrenCrossing(): Emojis
    {
        return Emojis::SYMBOLS_CHILDREN_CROSSING;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_NO_ENTRY')]
    public static function symbolsNoEntry(): Emojis
    {
        return Emojis::SYMBOLS_NO_ENTRY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_BLACK_UNIVERSAL_RECYCLING_SYMBOL')]
    public static function symbolsBlackUniversalRecyclingSymbol(): Emojis
    {
        return Emojis::SYMBOLS_BLACK_UNIVERSAL_RECYCLING_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::SYMBOLS_DIAMOND_SHAPE_WITH_ADOT_INSIDE')]
    public static function symbolsDiamondShapeWithADotInside(): Emojis
    {
        return Emojis::SYMBOLS_DIAMOND_SHAPE_WITH_ADOT_INSIDE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_PINE_DECORATION')]
    public static function otherPineDecoration(): Emojis
    {
        return Emojis::OTHER_PINE_DECORATION;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_JAPANESE_DOLLS')]
    public static function otherJapaneseDolls(): Emojis
    {
        return Emojis::OTHER_JAPANESE_DOLLS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SCHOOL_SATCHEL')]
    public static function otherSchoolSatchel(): Emojis
    {
        return Emojis::OTHER_SCHOOL_SATCHEL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_GRADUATION_CAP')]
    public static function otherGraduationCap(): Emojis
    {
        return Emojis::OTHER_GRADUATION_CAP;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CARP_STREAMER')]
    public static function otherCarpStreamer(): Emojis
    {
        return Emojis::OTHER_CARP_STREAMER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_FIREWORKS')]
    public static function otherFireworks(): Emojis
    {
        return Emojis::OTHER_FIREWORKS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_FIREWORK_SPARKLER')]
    public static function otherFireworkSparkler(): Emojis
    {
        return Emojis::OTHER_FIREWORK_SPARKLER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_WIND_CHIME')]
    public static function otherWindChime(): Emojis
    {
        return Emojis::OTHER_WIND_CHIME;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_MOON_VIEWING_CEREMONY')]
    public static function otherMoonViewingCeremony(): Emojis
    {
        return Emojis::OTHER_MOON_VIEWING_CEREMONY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_JACK_OLANTERN')]
    public static function otherJackOLantern(): Emojis
    {
        return Emojis::OTHER_JACK_OLANTERN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_GHOST')]
    public static function otherGhost(): Emojis
    {
        return Emojis::OTHER_GHOST;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_FATHER_CHRISTMAS')]
    public static function otherFatherChristmas(): Emojis
    {
        return Emojis::OTHER_FATHER_CHRISTMAS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CHRISTMAS_TREE')]
    public static function otherChristmasTree(): Emojis
    {
        return Emojis::OTHER_CHRISTMAS_TREE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_WRAPPED_PRESENT')]
    public static function otherWrappedPresent(): Emojis
    {
        return Emojis::OTHER_WRAPPED_PRESENT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_TANABATA_TREE')]
    public static function otherTanabataTree(): Emojis
    {
        return Emojis::OTHER_TANABATA_TREE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_PARTY_POPPER')]
    public static function otherPartyPopper(): Emojis
    {
        return Emojis::OTHER_PARTY_POPPER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CONFETTI_BALL')]
    public static function otherConfettiBall(): Emojis
    {
        return Emojis::OTHER_CONFETTI_BALL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BALLOON')]
    public static function otherBalloon(): Emojis
    {
        return Emojis::OTHER_BALLOON;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CROSSED_FLAGS')]
    public static function otherCrossedFlags(): Emojis
    {
        return Emojis::OTHER_CROSSED_FLAGS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CRYSTAL_BALL')]
    public static function otherCrystalBall(): Emojis
    {
        return Emojis::OTHER_CRYSTAL_BALL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_HIGH_BRIGHTNESS_SYMBOL')]
    public static function otherHighBrightnessSymbol(): Emojis
    {
        return Emojis::OTHER_HIGH_BRIGHTNESS_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_LOW_BRIGHTNESS_SYMBOL')]
    public static function otherLowBrightnessSymbol(): Emojis
    {
        return Emojis::OTHER_LOW_BRIGHTNESS_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BATHTUB')]
    public static function otherBathtub(): Emojis
    {
        return Emojis::OTHER_BATHTUB;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BATH')]
    public static function otherBath(): Emojis
    {
        return Emojis::OTHER_BATH;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SHOWER')]
    public static function otherShower(): Emojis
    {
        return Emojis::OTHER_SHOWER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_TOILET')]
    public static function otherToilet(): Emojis
    {
        return Emojis::OTHER_TOILET;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_DOOR')]
    public static function otherDoor(): Emojis
    {
        return Emojis::OTHER_DOOR;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SMOKING_SYMBOL')]
    public static function otherSmokingSymbol(): Emojis
    {
        return Emojis::OTHER_SMOKING_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BOMB')]
    public static function otherBomb(): Emojis
    {
        return Emojis::OTHER_BOMB;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_PISTOL')]
    public static function otherPistol(): Emojis
    {
        return Emojis::OTHER_PISTOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_HOCHO')]
    public static function otherHocho(): Emojis
    {
        return Emojis::OTHER_HOCHO;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_PILL')]
    public static function otherPill(): Emojis
    {
        return Emojis::OTHER_PILL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SYRINGE')]
    public static function otherSyringe(): Emojis
    {
        return Emojis::OTHER_SYRINGE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_FIRE')]
    public static function otherFire(): Emojis
    {
        return Emojis::OTHER_FIRE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SPARKLES')]
    public static function otherSparkles(): Emojis
    {
        return Emojis::OTHER_SPARKLES;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_GLOWING_STAR')]
    public static function otherGlowingStar(): Emojis
    {
        return Emojis::OTHER_GLOWING_STAR;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_DIZZY_SYMBOL')]
    public static function otherDizzySymbol(): Emojis
    {
        return Emojis::OTHER_DIZZY_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_COLLISION_SYMBOL')]
    public static function otherCollisionSymbol(): Emojis
    {
        return Emojis::OTHER_COLLISION_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_ANGER_SYMBOL')]
    public static function otherAngerSymbol(): Emojis
    {
        return Emojis::OTHER_ANGER_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SPLASHING_SWEAT_SYMBOL')]
    public static function otherSplashingSweatSymbol(): Emojis
    {
        return Emojis::OTHER_SPLASHING_SWEAT_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_DROPLET')]
    public static function otherDroplet(): Emojis
    {
        return Emojis::OTHER_DROPLET;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SLEEPING_SYMBOL')]
    public static function otherSleepingSymbol(): Emojis
    {
        return Emojis::OTHER_SLEEPING_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_DASH_SYMBOL')]
    public static function otherDashSymbol(): Emojis
    {
        return Emojis::OTHER_DASH_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_EAR')]
    public static function otherEar(): Emojis
    {
        return Emojis::OTHER_EAR;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_EYES')]
    public static function otherEyes(): Emojis
    {
        return Emojis::OTHER_EYES;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_NOSE')]
    public static function otherNose(): Emojis
    {
        return Emojis::OTHER_NOSE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_TONGUE')]
    public static function otherTongue(): Emojis
    {
        return Emojis::OTHER_TONGUE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_MOUTH')]
    public static function otherMouth(): Emojis
    {
        return Emojis::OTHER_MOUTH;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_PEDESTRIAN')]
    public static function otherPedestrian(): Emojis
    {
        return Emojis::OTHER_PEDESTRIAN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_RUNNER')]
    public static function otherRunner(): Emojis
    {
        return Emojis::OTHER_RUNNER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_DANCER')]
    public static function otherDancer(): Emojis
    {
        return Emojis::OTHER_DANCER;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_WOMAN_WITH_BUNNY_EARS')]
    public static function otherWomanWithBunnyEars(): Emojis
    {
        return Emojis::OTHER_WOMAN_WITH_BUNNY_EARS;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_FACE_WITH_OK_GESTURE')]
    public static function otherFaceWithOkGesture(): Emojis
    {
        return Emojis::OTHER_FACE_WITH_OK_GESTURE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_FACE_WITH_NO_GOOD_GESTURE')]
    public static function otherFaceWithNoGoodGesture(): Emojis
    {
        return Emojis::OTHER_FACE_WITH_NO_GOOD_GESTURE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_INFORMATION_DESK_PERSON')]
    public static function otherInformationDeskPerson(): Emojis
    {
        return Emojis::OTHER_INFORMATION_DESK_PERSON;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_HAPPY_PERSON_RAISING_ONE_HAND')]
    public static function otherHappyPersonRaisingOneHand(): Emojis
    {
        return Emojis::OTHER_HAPPY_PERSON_RAISING_ONE_HAND;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_FACE_MASSAGE')]
    public static function otherFaceMassage(): Emojis
    {
        return Emojis::OTHER_FACE_MASSAGE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_HAIRCUT')]
    public static function otherHaircut(): Emojis
    {
        return Emojis::OTHER_HAIRCUT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BRIDE_WITH_VEIL')]
    public static function otherBrideWithVeil(): Emojis
    {
        return Emojis::OTHER_BRIDE_WITH_VEIL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_PERSON_WITH_POUTING_FACE')]
    public static function otherPersonWithPoutingFace(): Emojis
    {
        return Emojis::OTHER_PERSON_WITH_POUTING_FACE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_PERSON_FROWNING')]
    public static function otherPersonFrowning(): Emojis
    {
        return Emojis::OTHER_PERSON_FROWNING;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_PERSON_BOWING_DEEPLY')]
    public static function otherPersonBowingDeeply(): Emojis
    {
        return Emojis::OTHER_PERSON_BOWING_DEEPLY;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SIX_POINTED_STAR_WITH_MIDDLE_DOT')]
    public static function otherSixPointedStarWithMiddleDot(): Emojis
    {
        return Emojis::OTHER_SIX_POINTED_STAR_WITH_MIDDLE_DOT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CHART_WITH_UPWARDS_TREND_AND_YEN_SIGN')]
    public static function otherChartWithUpwardsTrendAndYenSign(): Emojis
    {
        return Emojis::OTHER_CHART_WITH_UPWARDS_TREND_AND_YEN_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_HEAVY_DOLLAR_SIGN')]
    public static function otherHeavyDollarSign(): Emojis
    {
        return Emojis::OTHER_HEAVY_DOLLAR_SIGN;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CURRENCY_EXCHANGE')]
    public static function otherCurrencyExchange(): Emojis
    {
        return Emojis::OTHER_CURRENCY_EXCHANGE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CROSS_MARK')]
    public static function otherCrossMark(): Emojis
    {
        return Emojis::OTHER_CROSS_MARK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_HEAVY_LARGE_CIRCLE')]
    public static function otherHeavyLargeCircle(): Emojis
    {
        return Emojis::OTHER_HEAVY_LARGE_CIRCLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_HEAVY_MULTIPLICATION_X')]
    public static function otherHeavyMultiplicationX(): Emojis
    {
        return Emojis::OTHER_HEAVY_MULTIPLICATION_X;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BLACK_SPADE_SUIT')]
    public static function otherBlackSpadeSuit(): Emojis
    {
        return Emojis::OTHER_BLACK_SPADE_SUIT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BLACK_HEART_SUIT')]
    public static function otherBlackHeartSuit(): Emojis
    {
        return Emojis::OTHER_BLACK_HEART_SUIT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BLACK_CLUB_SUIT')]
    public static function otherBlackClubSuit(): Emojis
    {
        return Emojis::OTHER_BLACK_CLUB_SUIT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BLACK_DIAMOND_SUIT')]
    public static function otherBlackDiamondSuit(): Emojis
    {
        return Emojis::OTHER_BLACK_DIAMOND_SUIT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_HEAVY_CHECK_MARK')]
    public static function otherHeavyCheckMark(): Emojis
    {
        return Emojis::OTHER_HEAVY_CHECK_MARK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BALLOT_BOX_WITH_CHECK')]
    public static function otherBallotBoxWithCheck(): Emojis
    {
        return Emojis::OTHER_BALLOT_BOX_WITH_CHECK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_RADIO_BUTTON')]
    public static function otherRadioButton(): Emojis
    {
        return Emojis::OTHER_RADIO_BUTTON;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_LINK_SYMBOL')]
    public static function otherLinkSymbol(): Emojis
    {
        return Emojis::OTHER_LINK_SYMBOL;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_WAVY_DASH')]
    public static function otherWavyDash(): Emojis
    {
        return Emojis::OTHER_WAVY_DASH;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_PART_ALTERNATION_MARK')]
    public static function otherPartAlternationMark(): Emojis
    {
        return Emojis::OTHER_PART_ALTERNATION_MARK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_TRIDENT_EMBLEM')]
    public static function otherTridentEmblem(): Emojis
    {
        return Emojis::OTHER_TRIDENT_EMBLEM;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BLACK_MEDIUM_SQUARE')]
    public static function otherBlackMediumSquare(): Emojis
    {
        return Emojis::OTHER_BLACK_MEDIUM_SQUARE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_WHITE_MEDIUM_SQUARE')]
    public static function otherWhiteMediumSquare(): Emojis
    {
        return Emojis::OTHER_WHITE_MEDIUM_SQUARE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BLACK_MEDIUM_SMALL_SQUARE')]
    public static function otherBlackMediumSmallSquare(): Emojis
    {
        return Emojis::OTHER_BLACK_MEDIUM_SMALL_SQUARE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_WHITE_MEDIUM_SMALL_SQUARE')]
    public static function otherWhiteMediumSmallSquare(): Emojis
    {
        return Emojis::OTHER_WHITE_MEDIUM_SMALL_SQUARE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BLACK_SMALL_SQUARE')]
    public static function otherBlackSmallSquare(): Emojis
    {
        return Emojis::OTHER_BLACK_SMALL_SQUARE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_WHITE_SMALL_SQUARE')]
    public static function otherWhiteSmallSquare(): Emojis
    {
        return Emojis::OTHER_WHITE_SMALL_SQUARE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BLACK_SQUARE_BUTTON')]
    public static function otherBlackSquareButton(): Emojis
    {
        return Emojis::OTHER_BLACK_SQUARE_BUTTON;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_WHITE_SQUARE_BUTTON')]
    public static function otherWhiteSquareButton(): Emojis
    {
        return Emojis::OTHER_WHITE_SQUARE_BUTTON;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_MEDIUM_BLACK_CIRCLE')]
    public static function otherMediumBlackCircle(): Emojis
    {
        return Emojis::OTHER_MEDIUM_BLACK_CIRCLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_MEDIUM_WHITE_CIRCLE')]
    public static function otherMediumWhiteCircle(): Emojis
    {
        return Emojis::OTHER_MEDIUM_WHITE_CIRCLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_LARGE_RED_CIRCLE')]
    public static function otherLargeRedCircle(): Emojis
    {
        return Emojis::OTHER_LARGE_RED_CIRCLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_LARGE_BLUE_CIRCLE')]
    public static function otherLargeBlueCircle(): Emojis
    {
        return Emojis::OTHER_LARGE_BLUE_CIRCLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_WHITE_LARGE_SQUARE')]
    public static function otherWhiteLargeSquare(): Emojis
    {
        return Emojis::OTHER_WHITE_LARGE_SQUARE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_BLACK_LARGE_SQUARE')]
    public static function otherBlackLargeSquare(): Emojis
    {
        return Emojis::OTHER_BLACK_LARGE_SQUARE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_LARGE_ORANGE_DIAMOND')]
    public static function otherLargeOrangeDiamond(): Emojis
    {
        return Emojis::OTHER_LARGE_ORANGE_DIAMOND;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_LARGE_BLUE_DIAMOND')]
    public static function otherLargeBlueDiamond(): Emojis
    {
        return Emojis::OTHER_LARGE_BLUE_DIAMOND;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SMALL_ORANGE_DIAMOND')]
    public static function otherSmallOrangeDiamond(): Emojis
    {
        return Emojis::OTHER_SMALL_ORANGE_DIAMOND;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SMALL_BLUE_DIAMOND')]
    public static function otherSmallBlueDiamond(): Emojis
    {
        return Emojis::OTHER_SMALL_BLUE_DIAMOND;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_KATAKANA_KOKO')]
    public static function otherSquaredKatakanaKoko(): Emojis
    {
        return Emojis::OTHER_SQUARED_KATAKANA_KOKO;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_630')]
    public static function otherSquaredCjkUnifiedIdeograph630(): Emojis
    {
        return Emojis::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_630;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7_A_7_A')]
    public static function otherSquaredCjkUnifiedIdeograph7a7a(): Emojis
    {
        return Emojis::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7_A_7_A;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_6_E_80')]
    public static function otherSquaredCjkUnifiedIdeograph6e80(): Emojis
    {
        return Emojis::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_6_E_80;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_5408')]
    public static function otherSquaredCjkUnifiedIdeograph5408(): Emojis
    {
        return Emojis::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_5408;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7981')]
    public static function otherSquaredCjkUnifiedIdeograph7981(): Emojis
    {
        return Emojis::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7981;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CIRCLED_IDEOGRAPH_ADVANTAGE')]
    public static function otherCircledIdeographAdvantage(): Emojis
    {
        return Emojis::OTHER_CIRCLED_IDEOGRAPH_ADVANTAGE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_5272')]
    public static function otherSquaredCjkUnifiedIdeograph5272(): Emojis
    {
        return Emojis::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_5272;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_55_B_6')]
    public static function otherSquaredCjkUnifiedIdeograph55b6(): Emojis
    {
        return Emojis::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_55_B_6;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_6709')]
    public static function otherSquaredCjkUnifiedIdeograph6709(): Emojis
    {
        return Emojis::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_6709;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7121')]
    public static function otherSquaredCjkUnifiedIdeograph7121(): Emojis
    {
        return Emojis::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7121;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_6708')]
    public static function otherSquaredCjkUnifiedIdeograph6708(): Emojis
    {
        return Emojis::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_6708;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7533')]
    public static function otherSquaredCjkUnifiedIdeograph7533(): Emojis
    {
        return Emojis::OTHER_SQUARED_CJK_UNIFIED_IDEOGRAPH_7533;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SQUARED_KATAKANA_SA')]
    public static function otherSquaredKatakanaSa(): Emojis
    {
        return Emojis::OTHER_SQUARED_KATAKANA_SA;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CIRCLED_IDEOGRAPH_ACCEPT')]
    public static function otherCircledIdeographAccept(): Emojis
    {
        return Emojis::OTHER_CIRCLED_IDEOGRAPH_ACCEPT;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CIRCLED_IDEOGRAPH_SECRET')]
    public static function otherCircledIdeographSecret(): Emojis
    {
        return Emojis::OTHER_CIRCLED_IDEOGRAPH_SECRET;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_CIRCLED_IDEOGRAPH_CONGRATULATION')]
    public static function otherCircledIdeographCongratulation(): Emojis
    {
        return Emojis::OTHER_CIRCLED_IDEOGRAPH_CONGRATULATION;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_EIGHT_SPOKED_ASTERISK')]
    public static function otherEightSpokedAsterisk(): Emojis
    {
        return Emojis::OTHER_EIGHT_SPOKED_ASTERISK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_SPARKLE')]
    public static function otherSparkle(): Emojis
    {
        return Emojis::OTHER_SPARKLE;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_EIGHT_POINTED_BLACK_STAR')]
    public static function otherEightPointedBlackStar(): Emojis
    {
        return Emojis::OTHER_EIGHT_POINTED_BLACK_STAR;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_NEGATIVE_SQUARED_CROSS_MARK')]
    public static function otherNegativeSquaredCrossMark(): Emojis
    {
        return Emojis::OTHER_NEGATIVE_SQUARED_CROSS_MARK;
    }

    #[Deprecated('Since 0.15.0 use the enum variant', '%class%::OTHER_WHITE_HEAVY_CHECK_MARK')]
    public static function otherWhiteHeavyCheckMark(): Emojis
    {
        return Emojis::OTHER_WHITE_HEAVY_CHECK_MARK;
    }

    /**
     * @return string
     */
    public static function customEmoji(string $name, string $id)
    {
        return sprintf(':%s:%s', $name, $id);
    }

    /**
     * @return PartialEmoji
     */
    public function toPartialEmoji()
    {
        $static = new PartialEmoji();
        $static->setName($this->value);
        return $static;
    }
}
