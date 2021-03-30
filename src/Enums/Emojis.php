<?php


namespace Bytes\DiscordResponseBundle\Enums;

use Bytes\EnumSerializerBundle\Enums\Enum;
use Illuminate\Support\Arr;

/**
 * Class Emojis
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self weatherTimeGlobeWithMeridians() 🌐
 * @method static self weatherTimeSunWithFace() 🌞
 * @method static self weatherTimeFullMoonWithFace() 🌝
 * @method static self weatherTimeNewMoonWithFace() 🌚
 * @method static self weatherTimeNewMoonSymbol() 🌑
 * @method static self weatherTimeWaxingCrescentMoonSymbol() 🌒
 * @method static self weatherTimeFirstQuarterMoonSymbol() 🌓
 * @method static self weatherTimeWaxingGibbousMoonSymbol() 🌔
 * @method static self weatherTimeFullMoonSymbol() 🌕
 * @method static self weatherTimeWaningGibbousMoonSymbol() 🌖
 * @method static self weatherTimeLastQuarterMoonSymbol() 🌗
 * @method static self weatherTimeWaningCrescentMoonSymbol() 🌘
 * @method static self weatherTimeLastQuarterMoonWithFace() 🌜
 * @method static self weatherTimeFirstQuarterMoonWithFace() 🌛
 * @method static self weatherTimeCrescentMoon() 🌙
 * @method static self weatherTimeEarthGlobeEuropeAfrica() 🌍
 * @method static self weatherTimeEarthGlobeAmericas() 🌎
 * @method static self weatherTimeEarthGlobeAsiaAustralia() 🌏
 * @method static self weatherTimeVolcano() 🌋
 * @method static self weatherTimeMilkyWay() 🌌
 * @method static self weatherTimeShootingStar() 🌠
 * @method static self weatherTimeWhiteMediumStar() ⭐
 * @method static self weatherTimeBlackSunWithRays() ☀
 * @method static self weatherTimeSunBehindCloud() ⛅
 * @method static self weatherTimeCloud() ☁
 * @method static self weatherTimeHighVoltageSign() ⚡
 * @method static self weatherTimeUmbrellaWithRainDrops() ☔
 * @method static self weatherTimeSnowflake() ❄
 * @method static self weatherTimeSnowmanWithoutSnow() ⛄
 * @method static self weatherTimeCyclone() 🌀
 * @method static self weatherTimeFoggy() 🌁
 * @method static self weatherTimeRainbow() 🌈
 * @method static self weatherTimeWaterWave() 🌊
 * @method static self weatherTimeClockFaceTwelveOClock() 🕛
 * @method static self weatherTimeClockFaceTwelveThirty() 🕧
 * @method static self weatherTimeClockFaceOneOClock() 🕐
 * @method static self weatherTimeClockFaceOneThirty() 🕜
 * @method static self weatherTimeClockFaceTwoOClock() 🕑
 * @method static self weatherTimeClockFaceTwoThirty() 🕝
 * @method static self weatherTimeClockFaceThreeOClock() 🕒
 * @method static self weatherTimeClockFaceThreeThirty() 🕞
 * @method static self weatherTimeClockFaceFourOClock() 🕓
 * @method static self weatherTimeClockFaceFourThirty() 🕟
 * @method static self weatherTimeClockFaceFiveOClock() 🕔
 * @method static self weatherTimeClockFaceFiveThirty() 🕠
 * @method static self weatherTimeClockFaceSixOClock() 🕕
 * @method static self weatherTimeClockFaceSevenOClock() 🕖
 * @method static self weatherTimeClockFaceEightOClock() 🕗
 * @method static self weatherTimeClockFaceNineOClock() 🕘
 * @method static self weatherTimeClockFaceTenOClock() 🕙
 * @method static self weatherTimeClockFaceElevenOClock() 🕚
 * @method static self weatherTimeClockFaceSixThirty() 🕡
 * @method static self weatherTimeClockFaceSevenThirty() 🕢
 * @method static self weatherTimeClockFaceEightThirty() 🕣
 * @method static self weatherTimeClockFaceNineThirty() 🕤
 * @method static self weatherTimeClockFaceTenThirty() 🕥
 * @method static self weatherTimeClockFaceElevenThirty() 🕦
 * @method static self sportsGamesHobbiesArtistPalette() 🎨
 * @method static self sportsGamesHobbiesClapperBoard() 🎬
 * @method static self sportsGamesHobbiesMicrophone() 🎤
 * @method static self sportsGamesHobbiesHeadphone() 🎧
 * @method static self sportsGamesHobbiesMusicalScore() 🎼
 * @method static self sportsGamesHobbiesMusicalNote() 🎵
 * @method static self sportsGamesHobbiesMultipleMusicalNotes() 🎶
 * @method static self sportsGamesHobbiesMusicalKeyboard() 🎹
 * @method static self sportsGamesHobbiesViolin() 🎻
 * @method static self sportsGamesHobbiesTrumpet() 🎺
 * @method static self sportsGamesHobbiesSaxophone() 🎷
 * @method static self sportsGamesHobbiesGuitar() 🎸
 * @method static self sportsGamesHobbiesAlienMonster() 👾
 * @method static self sportsGamesHobbiesVideoGame() 🎮
 * @method static self sportsGamesHobbiesPlayingCardBlackJoker() 🃏
 * @method static self sportsGamesHobbiesFlowerPlayingCards() 🎴
 * @method static self sportsGamesHobbiesMahjongTileRedDragon() 🀄
 * @method static self sportsGamesHobbiesGameDie() 🎲
 * @method static self sportsGamesHobbiesDirectHit() 🎯
 * @method static self sportsGamesHobbiesAmericanFootball() 🏈
 * @method static self sportsGamesHobbiesBasketballAndHoop() 🏀
 * @method static self sportsGamesHobbiesSoccerBall() ⚽
 * @method static self sportsGamesHobbiesTennisRacquetAndBall() 🎾
 * @method static self sportsGamesHobbiesBilliards() 🎱
 * @method static self sportsGamesHobbiesRugbyFootball() 🏉
 * @method static self sportsGamesHobbiesBowling() 🎳
 * @method static self sportsGamesHobbiesFlagInHole() ⛳
 * @method static self sportsGamesHobbiesMountainBicyclist() 🚵
 * @method static self sportsGamesHobbiesBicyclist() 🚴
 * @method static self sportsGamesHobbiesChequeredFlag() 🏁
 * @method static self sportsGamesHobbiesHorseRacing() 🏇
 * @method static self sportsGamesHobbiesTrophy() 🏆
 * @method static self sportsGamesHobbiesSkiAndSkiBoot() 🎿
 * @method static self sportsGamesHobbiesSnowboarder() 🏂
 * @method static self sportsGamesHobbiesSwimmer() 🏊
 * @method static self sportsGamesHobbiesSurfer() 🏄
 * @method static self sportsGamesHobbiesFishingPoleAndFish() 🎣
 * @method static self technologyMovieCamera() 🎥
 * @method static self technologyCamera() 📷
 * @method static self technologyVideoCamera() 📹
 * @method static self technologyVideocassette() 📼
 * @method static self technologyOpticalDisc() 💿
 * @method static self technologyDvd() 📀
 * @method static self technologyMinidisc() 💽
 * @method static self technologyFloppyDisk() 💾
 * @method static self technologyPersonalComputer() 💻
 * @method static self technologyMobilePhone() 📱
 * @method static self technologyBlackTelephone() ☎
 * @method static self technologyTelephoneReceiver() 📞
 * @method static self technologyPager() 📟
 * @method static self technologyFaxMachine() 📠
 * @method static self technologySatelliteAntenna() 📡
 * @method static self technologyTelevision() 📺
 * @method static self technologyRadio() 📻
 * @method static self technologySpeakerWithThreeSoundWaves() 🔊
 * @method static self technologySpeakerWithOneSoundWave() 🔉
 * @method static self technologySpeaker() 🔈
 * @method static self technologySpeakerWithCancellationStroke() 🔇
 * @method static self technologyBell() 🔔
 * @method static self technologyBellWithCancellationStroke() 🔕
 * @method static self technologyPublicAddressLoudspeaker() 📢
 * @method static self technologyCheeringMegaphone() 📣
 * @method static self technologyHourglassWithFlowingSand() ⏳
 * @method static self technologyHourglass() ⌛
 * @method static self technologyAlarmClock() ⏰
 * @method static self technologyWatch() ⌚
 * @method static self technologyOpenLock() 🔓
 * @method static self technologyLock() 🔒
 * @method static self technologyLockWithInkPen() 🔏
 * @method static self technologyClosedLockWithKey() 🔐
 * @method static self technologyKey() 🔑
 * @method static self technologyLeftPointingMagnifyingGlass() 🔎
 * @method static self technologyElectricLightBulb() 💡
 * @method static self technologyElectricTorch() 🔦
 * @method static self technologyElectricPlug() 🔌
 * @method static self technologyBattery() 🔋
 * @method static self technologyRightPointingMagnifyingGlass() 🔍
 * @method static self technologyWrench() 🔧
 * @method static self technologyNutAndBolt() 🔩
 * @method static self technologyHammer() 🔨
 * @method static self technologyMobilePhoneWithRightwardsArrowAtLeft() 📲
 * @method static self technologyAntennaWithBars() 📶
 * @method static self technologyCinema() 🎦
 * @method static self technologyVibrationMode() 📳
 * @method static self technologyMobilePhoneOff() 📴
 * @method static self numbersLettersKeycapDigitOne() 1⃣
 * @method static self numbersLettersKeycapDigitTwo() 2⃣
 * @method static self numbersLettersKeycapDigitThree() 3⃣
 * @method static self numbersLettersKeycapDigitFour() 4⃣
 * @method static self numbersLettersKeycapDigitFive() 5⃣
 * @method static self numbersLettersKeycapDigitSix() 6⃣
 * @method static self numbersLettersKeycapDigitSeven() 7⃣
 * @method static self numbersLettersKeycapDigitEight() 8⃣
 * @method static self numbersLettersKeycapDigitNine() 9⃣
 * @method static self numbersLettersKeycapDigitZero() 0⃣
 * @method static self numbersLettersKeycapTen() 🔟
 * @method static self numbersLettersInputSymbolForNumbers() 🔢
 * @method static self numbersLettersKeycapNumberSign() #⃣
 * @method static self numbersLettersInputSymbolForLatinSmallLetters() 🔡
 * @method static self numbersLettersInputSymbolForLatinLetters() 🔤
 * @method static self numbersLettersInformationSource() ℹ
 * @method static self numbersLettersSquaredOk() 🆗
 * @method static self numbersLettersSquaredNew() 🆕
 * @method static self numbersLettersSquaredUpWithExclamationMark() 🆙
 * @method static self numbersLettersSquaredCool() 🆒
 * @method static self numbersLettersSquaredFree() 🆓
 * @method static self numbersLettersSquaredNg() 🆖
 * @method static self numbersLettersNegativeSquaredLatinCapitalLetterP() 🅿
 * @method static self numbersLettersCircledLatinCapitalLetterM() Ⓜ
 * @method static self numbersLettersSquaredCl() 🆑
 * @method static self numbersLettersSquaredSos() 🆘
 * @method static self numbersLettersSquaredId() 🆔
 * @method static self numbersLettersSquaredVs() 🆚
 * @method static self numbersLettersNegativeSquaredLatinCapitalLetterA() 🅰
 * @method static self numbersLettersNegativeSquaredLatinCapitalLetterB() 🅱
 * @method static self numbersLettersNegativeSquaredAb() 🆎
 * @method static self numbersLettersNegativeSquaredLatinCapitalLetterO() 🅾
 * @method static self numbersLettersCopyrightSign() ©
 * @method static self numbersLettersRegisteredSign() ®
 * @method static self numbersLettersHundredPointsSymbol() 💯
 * @method static self numbersLettersTradeMarkSign() ™
 * @method static self numbersLettersInputSymbolForLatinCapitalLetters() 🔠
 * @method static self numbersLettersAutomatedTellerMachine() 🏧
 * @method static self numbersLettersDoubleExclamationMark() ‼
 * @method static self numbersLettersExclamationQuestionMark() ⁉
 * @method static self numbersLettersHeavyExclamationMarkSymbol() ❗
 * @method static self numbersLettersBlackQuestionMarkOrnament() ❓
 * @method static self numbersLettersWhiteExclamationMarkOrnament() ❕
 * @method static self numbersLettersWhiteQuestionMarkOrnament() ❔
 * @method static self handSignsArrowsThumbsUpSign() 👍
 * @method static self handSignsArrowsThumbsDownSign() 👎
 * @method static self handSignsArrowsOkHandSign() 👌
 * @method static self handSignsArrowsFistedHandSign() 👊
 * @method static self handSignsArrowsRaisedFist() ✊
 * @method static self handSignsArrowsVictoryHand() ✌
 * @method static self handSignsArrowsWavingHandSign() 👋
 * @method static self handSignsArrowsRaisedHand() ✋
 * @method static self handSignsArrowsOpenHandsSign() 👐
 * @method static self handSignsArrowsWhiteUpPointingBackhandIndex() 👆
 * @method static self handSignsArrowsWhiteDownPointingBackhandIndex() 👇
 * @method static self handSignsArrowsWhiteRightPointingBackhandIndex() 👉
 * @method static self handSignsArrowsWhiteLeftPointingBackhandIndex() 👈
 * @method static self handSignsArrowsPersonRaisingBothHandsInCelebration() 🙌
 * @method static self handSignsArrowsPersonWithFoldedHands() 🙏
 * @method static self handSignsArrowsWhiteUpPointingIndex() ☝
 * @method static self handSignsArrowsClappingHandsSign() 👏
 * @method static self handSignsArrowsFlexedBiceps() 💪
 * @method static self handSignsArrowsNailPolish() 💅
 * @method static self handSignsArrowsDownwardsBlackArrow() ⬇
 * @method static self handSignsArrowsLeftwardsBlackArrow() ⬅
 * @method static self handSignsArrowsBlackRightwardsArrow() ➡
 * @method static self handSignsArrowsNorthEastArrow() ↗
 * @method static self handSignsArrowsNorthWestArrow() ↖
 * @method static self handSignsArrowsSouthEastArrow() ↘
 * @method static self handSignsArrowsSouthWestArrow() ↙
 * @method static self handSignsArrowsLeftRightArrow() ↔
 * @method static self handSignsArrowsUpDownArrow() ↕
 * @method static self handSignsArrowsAnticlockwiseDownwardsAndUpwardsOpenCircleArrows() 🔄
 * @method static self handSignsArrowsBlackLeftPointingTriangle() ◀
 * @method static self handSignsArrowsBlackRightPointingTriangle() ▶
 * @method static self handSignsArrowsUpPointingSmallRedTriangle() 🔼
 * @method static self handSignsArrowsDownPointingSmallRedTriangle() 🔽
 * @method static self handSignsArrowsLeftwardsArrowWithHook() ↩
 * @method static self handSignsArrowsRightwardsArrowWithHook() ↪
 * @method static self handSignsArrowsBlackLeftPointingDoubleTriangle() ⏪
 * @method static self handSignsArrowsBlackRightPointingDoubleTriangle() ⏩
 * @method static self handSignsArrowsBlackUpPointingDoubleTriangle() ⏫
 * @method static self handSignsArrowsBlackDownPointingDoubleTriangle() ⏬
 * @method static self handSignsArrowsArrowPointingRightwardsThenCurvingDownwards() ⤵
 * @method static self handSignsArrowsArrowPointingRightwardsThenCurvingUpwards() ⤴
 * @method static self handSignsArrowsTwistedRightwardsArrows() 🔀
 * @method static self handSignsArrowsClockwiseRightwardsAndLeftwardsOpenCircleArrows() 🔁
 * @method static self handSignsArrowsClockwiseRightwardsAndLeftwardsOpenCircleArrowsWithCircledOneOverlay() 🔂
 * @method static self handSignsArrowsTopWithUpwardsArrowAbove() 🔝
 * @method static self handSignsArrowsEndWithLeftwardsArrowAbove() 🔚
 * @method static self handSignsArrowsBackWithLeftwardsArrowAbove() 🔙
 * @method static self handSignsArrowsOnWithExclamationMarkWithLeftRightArrowAbove() 🔛
 * @method static self handSignsArrowsSoonWithRightwardsArrowAbove() 🔜
 * @method static self handSignsArrowsClockwiseDownwardsAndUpwardsOpenCircleArrows() 🔃
 * @method static self handSignsArrowsUpPointingRedTriangle() 🔺
 * @method static self handSignsArrowsDownPointingRedTriangle() 🔻
 * @method static self handSignsArrowsUpwardsBlackArrow() ⬆
 * @method static self symbolsRestroom() 🚻
 * @method static self symbolsMensSymbol() 🚹
 * @method static self symbolsWomensSymbol() 🚺
 * @method static self symbolsBabySymbol() 🚼
 * @method static self symbolsWaterCloset() 🚾
 * @method static self symbolsPotableWaterSymbol() 🚰
 * @method static self symbolsPutLitterInItsPlaceSymbol() 🚮
 * @method static self symbolsWheelchairSymbol() ♿
 * @method static self symbolsNoSmokingSymbol() 🚭
 * @method static self symbolsPassportControl() 🛂
 * @method static self symbolsBaggageClaim() 🛄
 * @method static self symbolsLeftLuggage() 🛅
 * @method static self symbolsCustoms() 🛃
 * @method static self symbolsNoEntrySign() 🚫
 * @method static self symbolsNoOneUnderEighteenSymbol() 🔞
 * @method static self symbolsNoMobilePhones() 📵
 * @method static self symbolsDoNotLitterSymbol() 🚯
 * @method static self symbolsNonPotableWaterSymbol() 🚱
 * @method static self symbolsNoBicycles() 🚳
 * @method static self symbolsNoPedestrians() 🚷
 * @method static self symbolsChildrenCrossing() 🚸
 * @method static self symbolsNoEntry() ⛔
 * @method static self symbolsBlackUniversalRecyclingSymbol() ♻
 * @method static self symbolsDiamondShapeWithADotInside() 💠
 * @method static self otherPineDecoration() 🎍
 * @method static self otherJapaneseDolls() 🎎
 * @method static self otherSchoolSatchel() 🎒
 * @method static self otherGraduationCap() 🎓
 * @method static self otherCarpStreamer() 🎏
 * @method static self otherFireworks() 🎆
 * @method static self otherFireworkSparkler() 🎇
 * @method static self otherWindChime() 🎐
 * @method static self otherMoonViewingCeremony() 🎑
 * @method static self otherJackOLantern() 🎃
 * @method static self otherGhost() 👻
 * @method static self otherFatherChristmas() 🎅
 * @method static self otherChristmasTree() 🎄
 * @method static self otherWrappedPresent() 🎁
 * @method static self otherTanabataTree() 🎋
 * @method static self otherPartyPopper() 🎉
 * @method static self otherConfettiBall() 🎊
 * @method static self otherBalloon() 🎈
 * @method static self otherCrossedFlags() 🎌
 * @method static self otherCrystalBall() 🔮
 * @method static self otherHighBrightnessSymbol() 🔆
 * @method static self otherLowBrightnessSymbol() 🔅
 * @method static self otherBathtub() 🛁
 * @method static self otherBath() 🛀
 * @method static self otherShower() 🚿
 * @method static self otherToilet() 🚽
 * @method static self otherDoor() 🚪
 * @method static self otherSmokingSymbol() 🚬
 * @method static self otherBomb() 💣
 * @method static self otherPistol() 🔫
 * @method static self otherHocho() 🔪
 * @method static self otherPill() 💊
 * @method static self otherSyringe() 💉
 * @method static self otherFire() 🔥
 * @method static self otherSparkles() ✨
 * @method static self otherGlowingStar() 🌟
 * @method static self otherDizzySymbol() 💫
 * @method static self otherCollisionSymbol() 💥
 * @method static self otherAngerSymbol() 💢
 * @method static self otherSplashingSweatSymbol() 💦
 * @method static self otherDroplet() 💧
 * @method static self otherSleepingSymbol() 💤
 * @method static self otherDashSymbol() 💨
 * @method static self otherEar() 👂
 * @method static self otherEyes() 👀
 * @method static self otherNose() 👃
 * @method static self otherTongue() 👅
 * @method static self otherMouth() 👄
 * @method static self otherPedestrian() 🚶
 * @method static self otherRunner() 🏃
 * @method static self otherDancer() 💃
 * @method static self otherWomanWithBunnyEars() 👯
 * @method static self otherFaceWithOkGesture() 🙆
 * @method static self otherFaceWithNoGoodGesture() 🙅
 * @method static self otherInformationDeskPerson() 💁
 * @method static self otherHappyPersonRaisingOneHand() 🙋
 * @method static self otherFaceMassage() 💆
 * @method static self otherHaircut() 💇
 * @method static self otherBrideWithVeil() 👰
 * @method static self otherPersonWithPoutingFace() 🙎
 * @method static self otherPersonFrowning() 🙍
 * @method static self otherPersonBowingDeeply() 🙇
 * @method static self otherSixPointedStarWithMiddleDot() 🔯
 * @method static self otherChartWithUpwardsTrendAndYenSign() 💹
 * @method static self otherHeavyDollarSign() 💲
 * @method static self otherCurrencyExchange() 💱
 * @method static self otherCrossMark() ❌
 * @method static self otherHeavyLargeCircle() ⭕
 * @method static self otherHeavyMultiplicationX() ✖
 * @method static self otherBlackSpadeSuit() ♠
 * @method static self otherBlackHeartSuit() ♥
 * @method static self otherBlackClubSuit() ♣
 * @method static self otherBlackDiamondSuit() ♦
 * @method static self otherHeavyCheckMark() ✔
 * @method static self otherBallotBoxWithCheck() ☑
 * @method static self otherRadioButton() 🔘
 * @method static self otherLinkSymbol() 🔗
 * @method static self otherWavyDash() 〰
 * @method static self otherPartAlternationMark() 〽
 * @method static self otherTridentEmblem() 🔱
 * @method static self otherBlackMediumSquare() ◼
 * @method static self otherWhiteMediumSquare() ◻
 * @method static self otherBlackMediumSmallSquare() ◾
 * @method static self otherWhiteMediumSmallSquare() ◽
 * @method static self otherBlackSmallSquare() ▪
 * @method static self otherWhiteSmallSquare() ▫
 * @method static self otherBlackSquareButton() 🔲
 * @method static self otherWhiteSquareButton() 🔳
 * @method static self otherMediumBlackCircle() ⚫
 * @method static self otherMediumWhiteCircle() ⚪
 * @method static self otherLargeRedCircle() 🔴
 * @method static self otherLargeBlueCircle() 🔵
 * @method static self otherWhiteLargeSquare() ⬜
 * @method static self otherBlackLargeSquare() ⬛
 * @method static self otherLargeOrangeDiamond() 🔶
 * @method static self otherLargeBlueDiamond() 🔷
 * @method static self otherSmallOrangeDiamond() 🔸
 * @method static self otherSmallBlueDiamond() 🔹
 * @method static self otherSquaredKatakanaKoko() 🈁
 * @method static self otherSquaredCjkUnifiedIdeograph630() 🈯
 * @method static self otherSquaredCjkUnifiedIdeograph7a7a() 🈳
 * @method static self otherSquaredCjkUnifiedIdeograph6e80() 🈵
 * @method static self otherSquaredCjkUnifiedIdeograph5408() 🈴
 * @method static self otherSquaredCjkUnifiedIdeograph7981() 🈲
 * @method static self otherCircledIdeographAdvantage() 🉐
 * @method static self otherSquaredCjkUnifiedIdeograph5272() 🈹
 * @method static self otherSquaredCjkUnifiedIdeograph55b6() 🈺
 * @method static self otherSquaredCjkUnifiedIdeograph6709() 🈶
 * @method static self otherSquaredCjkUnifiedIdeograph7121() 🈚
 * @method static self otherSquaredCjkUnifiedIdeograph6708() 🈷
 * @method static self otherSquaredCjkUnifiedIdeograph7533() 🈸
 * @method static self otherSquaredKatakanaSa() 🈂
 * @method static self otherCircledIdeographAccept() 🉑
 * @method static self otherCircledIdeographSecret() ㊙
 * @method static self otherCircledIdeographCongratulation() ㊗
 * @method static self otherEightSpokedAsterisk() ✳
 * @method static self otherSparkle() ❇
 * @method static self otherEightPointedBlackStar() ✴
 * @method static self otherNegativeSquaredCrossMark() ❎
 * @method static self otherWhiteHeavyCheckMark() ✅
 */
class Emojis extends Enum
{
    /**
     * @return string[]
     */
    protected static function values(): array
    {
        return [
            'weatherTimeGlobeWithMeridians' => '🌐',
            'weatherTimeSunWithFace' => '🌞',
            'weatherTimeFullMoonWithFace' => '🌝',
            'weatherTimeNewMoonWithFace' => '🌚',
            'weatherTimeNewMoonSymbol' => '🌑',
            'weatherTimeWaxingCrescentMoonSymbol' => '🌒',
            'weatherTimeFirstQuarterMoonSymbol' => '🌓',
            'weatherTimeWaxingGibbousMoonSymbol' => '🌔',
            'weatherTimeFullMoonSymbol' => '🌕',
            'weatherTimeWaningGibbousMoonSymbol' => '🌖',
            'weatherTimeLastQuarterMoonSymbol' => '🌗',
            'weatherTimeWaningCrescentMoonSymbol' => '🌘',
            'weatherTimeLastQuarterMoonWithFace' => '🌜',
            'weatherTimeFirstQuarterMoonWithFace' => '🌛',
            'weatherTimeCrescentMoon' => '🌙',
            'weatherTimeEarthGlobeEuropeAfrica' => '🌍',
            'weatherTimeEarthGlobeAmericas' => '🌎',
            'weatherTimeEarthGlobeAsiaAustralia' => '🌏',
            'weatherTimeVolcano' => '🌋',
            'weatherTimeMilkyWay' => '🌌',
            'weatherTimeShootingStar' => '🌠',
            'weatherTimeWhiteMediumStar' => '⭐',
            'weatherTimeBlackSunWithRays' => '☀',
            'weatherTimeSunBehindCloud' => '⛅',
            'weatherTimeCloud' => '☁',
            'weatherTimeHighVoltageSign' => '⚡',
            'weatherTimeUmbrellaWithRainDrops' => '☔',
            'weatherTimeSnowflake' => '❄',
            'weatherTimeSnowmanWithoutSnow' => '⛄',
            'weatherTimeCyclone' => '🌀',
            'weatherTimeFoggy' => '🌁',
            'weatherTimeRainbow' => '🌈',
            'weatherTimeWaterWave' => '🌊',
            'weatherTimeClockFaceTwelveOClock' => '🕛',
            'weatherTimeClockFaceTwelveThirty' => '🕧',
            'weatherTimeClockFaceOneOClock' => '🕐',
            'weatherTimeClockFaceOneThirty' => '🕜',
            'weatherTimeClockFaceTwoOClock' => '🕑',
            'weatherTimeClockFaceTwoThirty' => '🕝',
            'weatherTimeClockFaceThreeOClock' => '🕒',
            'weatherTimeClockFaceThreeThirty' => '🕞',
            'weatherTimeClockFaceFourOClock' => '🕓',
            'weatherTimeClockFaceFourThirty' => '🕟',
            'weatherTimeClockFaceFiveOClock' => '🕔',
            'weatherTimeClockFaceFiveThirty' => '🕠',
            'weatherTimeClockFaceSixOClock' => '🕕',
            'weatherTimeClockFaceSevenOClock' => '🕖',
            'weatherTimeClockFaceEightOClock' => '🕗',
            'weatherTimeClockFaceNineOClock' => '🕘',
            'weatherTimeClockFaceTenOClock' => '🕙',
            'weatherTimeClockFaceElevenOClock' => '🕚',
            'weatherTimeClockFaceSixThirty' => '🕡',
            'weatherTimeClockFaceSevenThirty' => '🕢',
            'weatherTimeClockFaceEightThirty' => '🕣',
            'weatherTimeClockFaceNineThirty' => '🕤',
            'weatherTimeClockFaceTenThirty' => '🕥',
            'weatherTimeClockFaceElevenThirty' => '🕦',
            'sportsGamesHobbiesArtistPalette' => '🎨',
            'sportsGamesHobbiesClapperBoard' => '🎬',
            'sportsGamesHobbiesMicrophone' => '🎤',
            'sportsGamesHobbiesHeadphone' => '🎧',
            'sportsGamesHobbiesMusicalScore' => '🎼',
            'sportsGamesHobbiesMusicalNote' => '🎵',
            'sportsGamesHobbiesMultipleMusicalNotes' => '🎶',
            'sportsGamesHobbiesMusicalKeyboard' => '🎹',
            'sportsGamesHobbiesViolin' => '🎻',
            'sportsGamesHobbiesTrumpet' => '🎺',
            'sportsGamesHobbiesSaxophone' => '🎷',
            'sportsGamesHobbiesGuitar' => '🎸',
            'sportsGamesHobbiesAlienMonster' => '👾',
            'sportsGamesHobbiesVideoGame' => '🎮',
            'sportsGamesHobbiesPlayingCardBlackJoker' => '🃏',
            'sportsGamesHobbiesFlowerPlayingCards' => '🎴',
            'sportsGamesHobbiesMahjongTileRedDragon' => '🀄',
            'sportsGamesHobbiesGameDie' => '🎲',
            'sportsGamesHobbiesDirectHit' => '🎯',
            'sportsGamesHobbiesAmericanFootball' => '🏈',
            'sportsGamesHobbiesBasketballAndHoop' => '🏀',
            'sportsGamesHobbiesSoccerBall' => '⚽',
            'sportsGamesHobbiesTennisRacquetAndBall' => '🎾',
            'sportsGamesHobbiesBilliards' => '🎱',
            'sportsGamesHobbiesRugbyFootball' => '🏉',
            'sportsGamesHobbiesBowling' => '🎳',
            'sportsGamesHobbiesFlagInHole' => '⛳',
            'sportsGamesHobbiesMountainBicyclist' => '🚵',
            'sportsGamesHobbiesBicyclist' => '🚴',
            'sportsGamesHobbiesChequeredFlag' => '🏁',
            'sportsGamesHobbiesHorseRacing' => '🏇',
            'sportsGamesHobbiesTrophy' => '🏆',
            'sportsGamesHobbiesSkiAndSkiBoot' => '🎿',
            'sportsGamesHobbiesSnowboarder' => '🏂',
            'sportsGamesHobbiesSwimmer' => '🏊',
            'sportsGamesHobbiesSurfer' => '🏄',
            'sportsGamesHobbiesFishingPoleAndFish' => '🎣',
            'technologyMovieCamera' => '🎥',
            'technologyCamera' => '📷',
            'technologyVideoCamera' => '📹',
            'technologyVideocassette' => '📼',
            'technologyOpticalDisc' => '💿',
            'technologyDvd' => '📀',
            'technologyMinidisc' => '💽',
            'technologyFloppyDisk' => '💾',
            'technologyPersonalComputer' => '💻',
            'technologyMobilePhone' => '📱',
            'technologyBlackTelephone' => '☎',
            'technologyTelephoneReceiver' => '📞',
            'technologyPager' => '📟',
            'technologyFaxMachine' => '📠',
            'technologySatelliteAntenna' => '📡',
            'technologyTelevision' => '📺',
            'technologyRadio' => '📻',
            'technologySpeakerWithThreeSoundWaves' => '🔊',
            'technologySpeakerWithOneSoundWave' => '🔉',
            'technologySpeaker' => '🔈',
            'technologySpeakerWithCancellationStroke' => '🔇',
            'technologyBell' => '🔔',
            'technologyBellWithCancellationStroke' => '🔕',
            'technologyPublicAddressLoudspeaker' => '📢',
            'technologyCheeringMegaphone' => '📣',
            'technologyHourglassWithFlowingSand' => '⏳',
            'technologyHourglass' => '⌛',
            'technologyAlarmClock' => '⏰',
            'technologyWatch' => '⌚',
            'technologyOpenLock' => '🔓',
            'technologyLock' => '🔒',
            'technologyLockWithInkPen' => '🔏',
            'technologyClosedLockWithKey' => '🔐',
            'technologyKey' => '🔑',
            'technologyLeftPointingMagnifyingGlass' => '🔎',
            'technologyElectricLightBulb' => '💡',
            'technologyElectricTorch' => '🔦',
            'technologyElectricPlug' => '🔌',
            'technologyBattery' => '🔋',
            'technologyRightPointingMagnifyingGlass' => '🔍',
            'technologyWrench' => '🔧',
            'technologyNutAndBolt' => '🔩',
            'technologyHammer' => '🔨',
            'technologyMobilePhoneWithRightwardsArrowAtLeft' => '📲',
            'technologyAntennaWithBars' => '📶',
            'technologyCinema' => '🎦',
            'technologyVibrationMode' => '📳',
            'technologyMobilePhoneOff' => '📴',
            'numbersLettersKeycapDigitOne' => '1⃣',
            'numbersLettersKeycapDigitTwo' => '2⃣',
            'numbersLettersKeycapDigitThree' => '3⃣',
            'numbersLettersKeycapDigitFour' => '4⃣',
            'numbersLettersKeycapDigitFive' => '5⃣',
            'numbersLettersKeycapDigitSix' => '6⃣',
            'numbersLettersKeycapDigitSeven' => '7⃣',
            'numbersLettersKeycapDigitEight' => '8⃣',
            'numbersLettersKeycapDigitNine' => '9⃣',
            'numbersLettersKeycapDigitZero' => '0⃣',
            'numbersLettersKeycapTen' => '🔟',
            'numbersLettersInputSymbolForNumbers' => '🔢',
            'numbersLettersKeycapNumberSign' => '#⃣',
            'numbersLettersInputSymbolForLatinSmallLetters' => '🔡',
            'numbersLettersInputSymbolForLatinLetters' => '🔤',
            'numbersLettersInformationSource' => 'ℹ',
            'numbersLettersSquaredOk' => '🆗',
            'numbersLettersSquaredNew' => '🆕',
            'numbersLettersSquaredUpWithExclamationMark' => '🆙',
            'numbersLettersSquaredCool' => '🆒',
            'numbersLettersSquaredFree' => '🆓',
            'numbersLettersSquaredNg' => '🆖',
            'numbersLettersNegativeSquaredLatinCapitalLetterP' => '🅿',
            'numbersLettersCircledLatinCapitalLetterM' => 'Ⓜ',
            'numbersLettersSquaredCl' => '🆑',
            'numbersLettersSquaredSos' => '🆘',
            'numbersLettersSquaredId' => '🆔',
            'numbersLettersSquaredVs' => '🆚',
            'numbersLettersNegativeSquaredLatinCapitalLetterA' => '🅰',
            'numbersLettersNegativeSquaredLatinCapitalLetterB' => '🅱',
            'numbersLettersNegativeSquaredAb' => '🆎',
            'numbersLettersNegativeSquaredLatinCapitalLetterO' => '🅾',
            'numbersLettersCopyrightSign' => '©',
            'numbersLettersRegisteredSign' => '®',
            'numbersLettersHundredPointsSymbol' => '💯',
            'numbersLettersTradeMarkSign' => '™',
            'numbersLettersInputSymbolForLatinCapitalLetters' => '🔠',
            'numbersLettersAutomatedTellerMachine' => '🏧',
            'numbersLettersDoubleExclamationMark' => '‼',
            'numbersLettersExclamationQuestionMark' => '⁉',
            'numbersLettersHeavyExclamationMarkSymbol' => '❗',
            'numbersLettersBlackQuestionMarkOrnament' => '❓',
            'numbersLettersWhiteExclamationMarkOrnament' => '❕',
            'numbersLettersWhiteQuestionMarkOrnament' => '❔',
            'handSignsArrowsThumbsUpSign' => '👍',
            'handSignsArrowsThumbsDownSign' => '👎',
            'handSignsArrowsOkHandSign' => '👌',
            'handSignsArrowsFistedHandSign' => '👊',
            'handSignsArrowsRaisedFist' => '✊',
            'handSignsArrowsVictoryHand' => '✌',
            'handSignsArrowsWavingHandSign' => '👋',
            'handSignsArrowsRaisedHand' => '✋',
            'handSignsArrowsOpenHandsSign' => '👐',
            'handSignsArrowsWhiteUpPointingBackhandIndex' => '👆',
            'handSignsArrowsWhiteDownPointingBackhandIndex' => '👇',
            'handSignsArrowsWhiteRightPointingBackhandIndex' => '👉',
            'handSignsArrowsWhiteLeftPointingBackhandIndex' => '👈',
            'handSignsArrowsPersonRaisingBothHandsInCelebration' => '🙌',
            'handSignsArrowsPersonWithFoldedHands' => '🙏',
            'handSignsArrowsWhiteUpPointingIndex' => '☝',
            'handSignsArrowsClappingHandsSign' => '👏',
            'handSignsArrowsFlexedBiceps' => '💪',
            'handSignsArrowsNailPolish' => '💅',
            'handSignsArrowsDownwardsBlackArrow' => '⬇',
            'handSignsArrowsLeftwardsBlackArrow' => '⬅',
            'handSignsArrowsBlackRightwardsArrow' => '➡',
            'handSignsArrowsNorthEastArrow' => '↗',
            'handSignsArrowsNorthWestArrow' => '↖',
            'handSignsArrowsSouthEastArrow' => '↘',
            'handSignsArrowsSouthWestArrow' => '↙',
            'handSignsArrowsLeftRightArrow' => '↔',
            'handSignsArrowsUpDownArrow' => '↕',
            'handSignsArrowsAnticlockwiseDownwardsAndUpwardsOpenCircleArrows' => '🔄',
            'handSignsArrowsBlackLeftPointingTriangle' => '◀',
            'handSignsArrowsBlackRightPointingTriangle' => '▶',
            'handSignsArrowsUpPointingSmallRedTriangle' => '🔼',
            'handSignsArrowsDownPointingSmallRedTriangle' => '🔽',
            'handSignsArrowsLeftwardsArrowWithHook' => '↩',
            'handSignsArrowsRightwardsArrowWithHook' => '↪',
            'handSignsArrowsBlackLeftPointingDoubleTriangle' => '⏪',
            'handSignsArrowsBlackRightPointingDoubleTriangle' => '⏩',
            'handSignsArrowsBlackUpPointingDoubleTriangle' => '⏫',
            'handSignsArrowsBlackDownPointingDoubleTriangle' => '⏬',
            'handSignsArrowsArrowPointingRightwardsThenCurvingDownwards' => '⤵',
            'handSignsArrowsArrowPointingRightwardsThenCurvingUpwards' => '⤴',
            'handSignsArrowsTwistedRightwardsArrows' => '🔀',
            'handSignsArrowsClockwiseRightwardsAndLeftwardsOpenCircleArrows' => '🔁',
            'handSignsArrowsClockwiseRightwardsAndLeftwardsOpenCircleArrowsWithCircledOneOverlay' => '🔂',
            'handSignsArrowsTopWithUpwardsArrowAbove' => '🔝',
            'handSignsArrowsEndWithLeftwardsArrowAbove' => '🔚',
            'handSignsArrowsBackWithLeftwardsArrowAbove' => '🔙',
            'handSignsArrowsOnWithExclamationMarkWithLeftRightArrowAbove' => '🔛',
            'handSignsArrowsSoonWithRightwardsArrowAbove' => '🔜',
            'handSignsArrowsClockwiseDownwardsAndUpwardsOpenCircleArrows' => '🔃',
            'handSignsArrowsUpPointingRedTriangle' => '🔺',
            'handSignsArrowsDownPointingRedTriangle' => '🔻',
            'handSignsArrowsUpwardsBlackArrow' => '⬆',
            'symbolsRestroom' => '🚻',
            'symbolsMensSymbol' => '🚹',
            'symbolsWomensSymbol' => '🚺',
            'symbolsBabySymbol' => '🚼',
            'symbolsWaterCloset' => '🚾',
            'symbolsPotableWaterSymbol' => '🚰',
            'symbolsPutLitterInItsPlaceSymbol' => '🚮',
            'symbolsWheelchairSymbol' => '♿',
            'symbolsNoSmokingSymbol' => '🚭',
            'symbolsPassportControl' => '🛂',
            'symbolsBaggageClaim' => '🛄',
            'symbolsLeftLuggage' => '🛅',
            'symbolsCustoms' => '🛃',
            'symbolsNoEntrySign' => '🚫',
            'symbolsNoOneUnderEighteenSymbol' => '🔞',
            'symbolsNoMobilePhones' => '📵',
            'symbolsDoNotLitterSymbol' => '🚯',
            'symbolsNonPotableWaterSymbol' => '🚱',
            'symbolsNoBicycles' => '🚳',
            'symbolsNoPedestrians' => '🚷',
            'symbolsChildrenCrossing' => '🚸',
            'symbolsNoEntry' => '⛔',
            'symbolsBlackUniversalRecyclingSymbol' => '♻',
            'symbolsDiamondShapeWithADotInside' => '💠',
            'otherPineDecoration' => '🎍',
            'otherJapaneseDolls' => '🎎',
            'otherSchoolSatchel' => '🎒',
            'otherGraduationCap' => '🎓',
            'otherCarpStreamer' => '🎏',
            'otherFireworks' => '🎆',
            'otherFireworkSparkler' => '🎇',
            'otherWindChime' => '🎐',
            'otherMoonViewingCeremony' => '🎑',
            'otherJackOLantern' => '🎃',
            'otherGhost' => '👻',
            'otherFatherChristmas' => '🎅',
            'otherChristmasTree' => '🎄',
            'otherWrappedPresent' => '🎁',
            'otherTanabataTree' => '🎋',
            'otherPartyPopper' => '🎉',
            'otherConfettiBall' => '🎊',
            'otherBalloon' => '🎈',
            'otherCrossedFlags' => '🎌',
            'otherCrystalBall' => '🔮',
            'otherHighBrightnessSymbol' => '🔆',
            'otherLowBrightnessSymbol' => '🔅',
            'otherBathtub' => '🛁',
            'otherBath' => '🛀',
            'otherShower' => '🚿',
            'otherToilet' => '🚽',
            'otherDoor' => '🚪',
            'otherSmokingSymbol' => '🚬',
            'otherBomb' => '💣',
            'otherPistol' => '🔫',
            'otherHocho' => '🔪',
            'otherPill' => '💊',
            'otherSyringe' => '💉',
            'otherFire' => '🔥',
            'otherSparkles' => '✨',
            'otherGlowingStar' => '🌟',
            'otherDizzySymbol' => '💫',
            'otherCollisionSymbol' => '💥',
            'otherAngerSymbol' => '💢',
            'otherSplashingSweatSymbol' => '💦',
            'otherDroplet' => '💧',
            'otherSleepingSymbol' => '💤',
            'otherDashSymbol' => '💨',
            'otherEar' => '👂',
            'otherEyes' => '👀',
            'otherNose' => '👃',
            'otherTongue' => '👅',
            'otherMouth' => '👄',
            'otherPedestrian' => '🚶',
            'otherRunner' => '🏃',
            'otherDancer' => '💃',
            'otherWomanWithBunnyEars' => '👯',
            'otherFaceWithOkGesture' => '🙆',
            'otherFaceWithNoGoodGesture' => '🙅',
            'otherInformationDeskPerson' => '💁',
            'otherHappyPersonRaisingOneHand' => '🙋',
            'otherFaceMassage' => '💆',
            'otherHaircut' => '💇',
            'otherBrideWithVeil' => '👰',
            'otherPersonWithPoutingFace' => '🙎',
            'otherPersonFrowning' => '🙍',
            'otherPersonBowingDeeply' => '🙇',
            'otherSixPointedStarWithMiddleDot' => '🔯',
            'otherChartWithUpwardsTrendAndYenSign' => '💹',
            'otherHeavyDollarSign' => '💲',
            'otherCurrencyExchange' => '💱',
            'otherCrossMark' => '❌',
            'otherHeavyLargeCircle' => '⭕',
            'otherHeavyMultiplicationX' => '✖',
            'otherBlackSpadeSuit' => '♠',
            'otherBlackHeartSuit' => '♥',
            'otherBlackClubSuit' => '♣',
            'otherBlackDiamondSuit' => '♦',
            'otherHeavyCheckMark' => '✔',
            'otherBallotBoxWithCheck' => '☑',
            'otherRadioButton' => '🔘',
            'otherLinkSymbol' => '🔗',
            'otherWavyDash' => '〰',
            'otherPartAlternationMark' => '〽',
            'otherTridentEmblem' => '🔱',
            'otherBlackMediumSquare' => '◼',
            'otherWhiteMediumSquare' => '◻',
            'otherBlackMediumSmallSquare' => '◾',
            'otherWhiteMediumSmallSquare' => '◽',
            'otherBlackSmallSquare' => '▪',
            'otherWhiteSmallSquare' => '▫',
            'otherBlackSquareButton' => '🔲',
            'otherWhiteSquareButton' => '🔳',
            'otherMediumBlackCircle' => '⚫',
            'otherMediumWhiteCircle' => '⚪',
            'otherLargeRedCircle' => '🔴',
            'otherLargeBlueCircle' => '🔵',
            'otherWhiteLargeSquare' => '⬜',
            'otherBlackLargeSquare' => '⬛',
            'otherLargeOrangeDiamond' => '🔶',
            'otherLargeBlueDiamond' => '🔷',
            'otherSmallOrangeDiamond' => '🔸',
            'otherSmallBlueDiamond' => '🔹',
            'otherSquaredKatakanaKoko' => '🈁',
            'otherSquaredCjkUnifiedIdeograph630' => '🈯',
            'otherSquaredCjkUnifiedIdeograph7a7a' => '🈳',
            'otherSquaredCjkUnifiedIdeograph6e80' => '🈵',
            'otherSquaredCjkUnifiedIdeograph5408' => '🈴',
            'otherSquaredCjkUnifiedIdeograph7981' => '🈲',
            'otherCircledIdeographAdvantage' => '🉐',
            'otherSquaredCjkUnifiedIdeograph5272' => '🈹',
            'otherSquaredCjkUnifiedIdeograph55b6' => '🈺',
            'otherSquaredCjkUnifiedIdeograph6709' => '🈶',
            'otherSquaredCjkUnifiedIdeograph7121' => '🈚',
            'otherSquaredCjkUnifiedIdeograph6708' => '🈷',
            'otherSquaredCjkUnifiedIdeograph7533' => '🈸',
            'otherSquaredKatakanaSa' => '🈂',
            'otherCircledIdeographAccept' => '🉑',
            'otherCircledIdeographSecret' => '㊙',
            'otherCircledIdeographCongratulation' => '㊗',
            'otherEightSpokedAsterisk' => '✳',
            'otherSparkle' => '❇',
            'otherEightPointedBlackStar' => '✴',
            'otherNegativeSquaredCrossMark' => '❎',
            'otherWhiteHeavyCheckMark' => '✅',
        ];
    }

    /**
     * Return a random emoji
     * @return static
     */
    public static function random()
    {
        return new static(Arr::random(static::toValues()));
    }

    /**
     * @return string
     */
    public static function customEmoji(string $name, string $id)
    {
        return sprintf(':%s:%s', $name, $id);
    }
}