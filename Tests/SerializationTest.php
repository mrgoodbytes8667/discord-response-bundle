<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Enums\ChannelTypes;
use Bytes\DiscordResponseBundle\Enums\Emojis;
use Bytes\DiscordResponseBundle\Enums\JsonErrorCodes;
use Bytes\DiscordResponseBundle\Enums\OAuthPrompts;
use Bytes\DiscordResponseBundle\Enums\OAuthScopes;
use Bytes\DiscordResponseBundle\Enums\Permissions;

class SerializationTest extends TestSerializationCase
{
    public function testChannelTypesSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
                     'guildText' => 0,
                     'dm' => 1,
                     'guildVoice' => 2,
                     'groupDm' => 3,
                     'guildCategory' => 4,
                     'guildNews' => 5,
                     'guildStore' => 6,
                 ] as $label => $value) {
            $output = $serializer->serialize(new ChannelTypes($label), 'json');

            $this->assertEquals($this->buildFixtureResponseIntValue($value, $label), $output);
        }

        $this->assertTrue(ChannelTypes::isValid('guildText'));
        $this->assertFalse(ChannelTypes::isValid('abc123'));
    }

    public function testChannelTypesSerializationBadKey()
    {
        $this->expectException(\BadMethodCallException::class);
        new ChannelTypes('abc123');
    }

    public function testEmojisSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
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
                 ] as $label => $value) {
            $output = $serializer->serialize(new Emojis($label), 'json');

            $this->assertEquals($this->buildFixtureResponse($value, $label), $output);
        }

        $this->assertTrue(Emojis::isValid('weatherTimeFullMoonWithFace'));
        $this->assertFalse(Emojis::isValid('abc123'));
    }

    public function testEmojisSerializationBadKey()
    {
        $this->expectException(\BadMethodCallException::class);
        new Emojis('abc123');
    }

    /**
     * @dataProvider provideJsonErrorCodes
     * @param $label
     * @param $value
     */
    public function testJsonErrorCodesSerialization($label, $value)
    {
        $serializer = $this->createSerializer();
        $output = $serializer->serialize(JsonErrorCodes::from($label), 'json');
        $this->assertEquals($this->buildFixtureResponseIntValue($value, $label), $output);
    }

    public function provideJsonErrorCodes()
    {
        yield ['label' => 'generalError', 'value' => 0];
        yield ['label' => 'unknownAccount', 'value' => 10001];
        yield ['label' => 'unknownApplication', 'value' => 10002];
        yield ['label' => 'unknownChannel', 'value' => 10003];
        yield ['label' => 'unknownGuild', 'value' => 10004];
        yield ['label' => 'unknownIntegration', 'value' => 10005];
        yield ['label' => 'unknownInvite', 'value' => 10006];
        yield ['label' => 'unknownMember', 'value' => 10007];
        yield ['label' => 'unknownMessage', 'value' => 10008];
        yield ['label' => 'unknownPermissionOverwrite', 'value' => 10009];
        yield ['label' => 'unknownProvider', 'value' => 10010];
        yield ['label' => 'unknownRole', 'value' => 10011];
        yield ['label' => 'unknownToken', 'value' => 10012];
        yield ['label' => 'unknownUser', 'value' => 10013];
        yield ['label' => 'unknownEmoji', 'value' => 10014];
        yield ['label' => 'unknownWebhook', 'value' => 10015];
        yield ['label' => 'unknownWebhookService', 'value' => 10016];
        yield ['label' => 'unknownSession', 'value' => 10020];
        yield ['label' => 'unknownBan', 'value' => 10026];
        yield ['label' => 'unknownSku', 'value' => 10027];
        yield ['label' => 'unknownStoreListing', 'value' => 10028];
        yield ['label' => 'unknownEntitlement', 'value' => 10029];
        yield ['label' => 'unknownBuild', 'value' => 10030];
        yield ['label' => 'unknownLobby', 'value' => 10031];
        yield ['label' => 'unknownBranch', 'value' => 10032];
        yield ['label' => 'unknownStoreDirectoryLayout', 'value' => 10033];
        yield ['label' => 'unknownRedistributable', 'value' => 10036];
        yield ['label' => 'unknownGiftCode', 'value' => 10038];
        yield ['label' => 'unknownStream', 'value' => 10049];
        yield ['label' => 'unknownPremiumServerSubscribeCooldown', 'value' => 10050];
        yield ['label' => 'unknownGuildTemplate', 'value' => 10057];
        yield ['label' => 'unknownDiscoverableServerCategory', 'value' => 10059];
        yield ['label' => 'unknownSticker', 'value' => 10060];
        yield ['label' => 'unknownInteraction', 'value' => 10062];
        yield ['label' => 'unknownApplicationCommand', 'value' => 10063];
        yield ['label' => 'unknownApplicationCommandPermissions', 'value' => 10066];
        yield ['label' => 'unknownStageInstance', 'value' => 10067];
        yield ['label' => 'unknownGuildMemberVerificationForm', 'value' => 10068];
        yield ['label' => 'unknownGuildWelcomeScreen', 'value' => 10069];
        yield ['label' => 'unknownGuildScheduledEvent', 'value' => 10070];
        yield ['label' => 'unknownGuildScheduledEventUser', 'value' => 10071];
        yield ['label' => 'botsCannotUseThisEndpoint', 'value' => 20001];
        yield ['label' => 'onlyBotsCanUseThisEndpoint', 'value' => 20002];
        yield ['label' => 'explicitContentCannotBeSentToTheDesiredRecipients', 'value' => 20009];
        yield ['label' => 'youAreNotAuthorizedToPerformThisActionOnThisApplication', 'value' => 20012];
        yield ['label' => 'thisActionCannotBePerformedDueToSlowmodeRateLimit', 'value' => 20016];
        yield ['label' => 'onlyTheOwnerOfThisAccountCanPerformThisAction', 'value' => 20018];
        yield ['label' => 'thisMessageCannotBeEditedDueToAnnouncementRateLimits', 'value' => 20022];
        yield ['label' => 'theChannelYouAreWritingHasHitTheWriteRateLimit', 'value' => 20028];
        yield ['label' => 'yourStageTopicServerNameServerDescriptionOrChannelNamesContainWordsThatAreNotAllowed', 'value' => 20031];
        yield ['label' => 'guildPremiumSubscriptionLevelTooLow', 'value' => 20035];
        yield ['label' => 'maximumNumberOfGuildsReached', 'value' => 30001];
        yield ['label' => 'maximumNumberOfFriendsReached', 'value' => 30002];
        yield ['label' => 'maximumNumberOfPinsReachedForTheChannel', 'value' => 30003];
        yield ['label' => 'maximumNumberOfRecipientsReached', 'value' => 30004];
        yield ['label' => 'maximumNumberOfGuildRolesReached', 'value' => 30005];
        yield ['label' => 'maximumNumberOfWebhooksReached', 'value' => 30007];
        yield ['label' => 'maximumNumberOfEmojisReached', 'value' => 30008];
        yield ['label' => 'maximumNumberOfReactionsReached', 'value' => 30010];
        yield ['label' => 'maximumNumberOfGuildChannelsReached', 'value' => 30013];
        yield ['label' => 'maximumNumberOfAttachmentsInAMessageReached', 'value' => 30015];
        yield ['label' => 'maximumNumberOfInvitesReached', 'value' => 30016];
        yield ['label' => 'maximumNumberOfAnimatedEmojisReached', 'value' => 30018];
        yield ['label' => 'maximumNumberOfServerMembersReached', 'value' => 30019];
        yield ['label' => 'maximumNumberOfServerCategoriesHasBeenReached', 'value' => 30030];
        yield ['label' => 'guildAlreadyHasATemplate', 'value' => 30031];
        yield ['label' => 'maxNumberOfThreadParticipantsHasBeenReached', 'value' => 30033];
        yield ['label' => 'maximumNumberOfBansForNonGuildMembersHaveBeenExceeded', 'value' => 30035];
        yield ['label' => 'maximumNumberOfBansFetchesHasBeenReached', 'value' => 30037];
        yield ['label' => 'maximumNumberOfStickersReached', 'value' => 30039];
        yield ['label' => 'unauthorizedProvideAValidTokenAndTryAgain', 'value' => 40001];
        yield ['label' => 'youNeedToVerifyYourAccountInOrderToPerformThisAction', 'value' => 40002];
        yield ['label' => 'youAreOpeningDirectMessagesTooFast', 'value' => 40003];
        yield ['label' => 'requestEntityTooLarge', 'value' => 40005];
        yield ['label' => 'thisFeatureHasBeenTemporarilyDisabledServerSide', 'value' => 40006];
        yield ['label' => 'theUserIsBannedFromThisGuild', 'value' => 40007];
        yield ['label' => 'targetUserIsNotConnectedToVoice', 'value' => 40032];
        yield ['label' => 'thisMessageHasAlreadyBeenCrossposted', 'value' => 40033];
        yield ['label' => 'anApplicationCommandWithThatNameAlreadyExists', 'value' => 40041];
        yield ['label' => 'missingAccess', 'value' => 50001];
        yield ['label' => 'invalidAccountType', 'value' => 50002];
        yield ['label' => 'cannotExecuteActionOnAdmChannel', 'value' => 50003];
        yield ['label' => 'guildWidgetDisabled', 'value' => 50004];
        yield ['label' => 'cannotEditAMessageAuthoredByAnotherUser', 'value' => 50005];
        yield ['label' => 'cannotSendAnEmptyMessage', 'value' => 50006];
        yield ['label' => 'cannotSendMessagesToThisUser', 'value' => 50007];
        yield ['label' => 'cannotSendMessagesInAVoiceChannel', 'value' => 50008];
        yield ['label' => 'channelVerificationLevelIsTooHighForYouToGainAccess', 'value' => 50009];
        yield ['label' => 'oAuth2ApplicationDoesNotHaveABot', 'value' => 50010];
        yield ['label' => 'oAuth2ApplicationLimitReached', 'value' => 50011];
        yield ['label' => 'invalidOAuth2State', 'value' => 50012];
        yield ['label' => 'youLackPermissionsToPerformThatAction', 'value' => 50013];
        yield ['label' => 'invalidAuthenticationTokenProvided', 'value' => 50014];
        yield ['label' => 'noteWasTooLong', 'value' => 50015];
        yield ['label' => 'providedTooFewOrTooManyMessagesToDelete', 'value' => 50016];
        yield ['label' => 'aMessageCanOnlyBePinnedToTheChannelItWasSentIn', 'value' => 50019];
        yield ['label' => 'inviteCodeWasEitherInvalidOrTaken', 'value' => 50020];
        yield ['label' => 'cannotExecuteActionOnASystemMessage', 'value' => 50021];
        yield ['label' => 'cannotExecuteActionOnThisChannelType', 'value' => 50024];
        yield ['label' => 'invalidOAuth2AccessTokenProvided', 'value' => 50025];
        yield ['label' => 'missingRequiredOAuth2Scope', 'value' => 50026];
        yield ['label' => 'invalidWebhookTokenProvided', 'value' => 50027];
        yield ['label' => 'invalidRole', 'value' => 50028];
        yield ['label' => 'invalidRecipientS', 'value' => 50033];
        yield ['label' => 'aMessageProvidedWasTooOldToBulkDelete', 'value' => 50034];
        yield ['label' => 'invalidFormBody', 'value' => 50035];
        yield ['label' => 'anInviteWasAcceptedToAGuildTheApplicationSBotIsNotIn', 'value' => 50036];
        yield ['label' => 'invalidApiVersionProvided', 'value' => 50041];
        yield ['label' => 'fileUploadedExceedsTheMaximumSize', 'value' => 50045];
        yield ['label' => 'invalidFileUploaded', 'value' => 50046];
        yield ['label' => 'cannotSelfRedeemThisGift', 'value' => 50054];
        yield ['label' => 'paymentSourceRequiredToRedeemGift', 'value' => 50070];
        yield ['label' => 'cannotDeleteAChannelRequiredForCommunityGuilds', 'value' => 50074];
        yield ['label' => 'invalidStickerSent', 'value' => 50081];
        yield ['label' => 'triedToPerformAnOperationOnAnArchivedThreadSuchAsEditingAMessageOrAddingAUserToTheThread', 'value' => 50083];
        yield ['label' => 'invalidThreadNotificationSettings', 'value' => 50084];
        yield ['label' => 'beforeValueIsEarlierThanTheThreadCreationDate', 'value' => 50085];
        yield ['label' => 'thisServerIsNotAvailableInYourLocation', 'value' => 50095];
        yield ['label' => 'thisServerNeedsMonetizationEnabledInOrderToPerformThisAction', 'value' => 50097];
        yield ['label' => 'twoFactorIsRequiredForThisOperation', 'value' => 60003];
        yield ['label' => 'noUsersWithDiscordTagExist', 'value' => 80004];
        yield ['label' => 'reactionWasBlocked', 'value' => 90001];
        yield ['label' => 'apiResourceIsCurrentlyOverloaded', 'value' => 130000];
        yield ['label' => 'theStageIsAlreadyOpen', 'value' => 150006];
        yield ['label' => 'aThreadHasAlreadyBeenCreatedForThisMessage', 'value' => 160004];
        yield ['label' => 'threadIsLocked', 'value' => 160005];
        yield ['label' => 'maximumNumberOfActiveThreadsReached', 'value' => 160006];
        yield ['label' => 'maximumNumberOfActiveAnnouncementThreadsReached', 'value' => 160007];
        yield ['label' => 'invalidJsonForUploadedLottieFile', 'value' => 170001];
        yield ['label' => 'uploadedLottiesCannotContainRasterizedImagesSuchAsPngOrJpeg', 'value' => 170002];
        yield ['label' => 'stickerMaximumFramerateExceeded', 'value' => 170003];
        yield ['label' => 'stickerFrameCountExceedsMaximumOf1000Frames', 'value' => 170004];
        yield ['label' => 'lottieAnimationMaximumDimensionsExceeded', 'value' => 170005];
        yield ['label' => 'stickerFrameRateIsEitherTooSmallOrTooLarge', 'value' => 170006];
        yield ['label' => 'stickerAnimationDurationExceedsMaximumOf5Seconds', 'value' => 170007];
    }

    public function testJsonErrorCodesSerializationBadKey()
    {
        $this->expectException(\BadMethodCallException::class);
        JsonErrorCodes::from('abc123');
    }

    public function testOAuthPromptsSerialization()
    {
        $serializer = $this->createSerializer();

        $output = $serializer->serialize(OAuthPrompts::consent(), 'json');

        $this->assertEquals($this->buildFixtureResponse('consent'), $output);

        $output = $serializer->serialize(OAuthPrompts::none(), 'json');

        $this->assertEquals($this->buildFixtureResponse('none'), $output);

        $this->assertTrue(OAuthPrompts::isValid('consent'));
        $this->assertFalse(OAuthPrompts::isValid('abc123'));
    }

    public function testOAuthPromptsSerializationBadKey()
    {
        $this->expectException(\BadMethodCallException::class);
        new OAuthPrompts('abc123');
    }

    public function testOAuthScopesSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
                     'BOT' => 'bot',
                     'CONNECTIONS' => 'connections',
                     'EMAIL' => 'email',
                     'IDENTIFY' => 'identify',
                     'GUILDS' => 'guilds',
                     'GUILDS_JOIN' => 'guilds.join',
                     'GDM_JOIN' => 'gdm.join',
                     'MESSAGES_READ' => 'messages.read',
                     'RPC' => 'rpc',
                     'RPC_API' => 'rpc.api',
                     'RPC_NOTIFICATIONS_READ' => 'rpc.notifications.read',
                     'WEBHOOK_INCOMING' => 'webhook.incoming',
                     'APPLICATIONS_BUILDS_UPLOAD' => 'applications.builds.upload',
                     'APPLICATIONS_BUILDS_READ' => 'applications.builds.read',
                     'APPLICATIONS_STORE_UPDATE' => 'applications.store.update',
                     'APPLICATIONS_ENTITLEMENTS' => 'applications.entitlements',
                     'RELATIONSHIPS_READ' => 'relationships.read',
                     'ACTIVITIES_READ' => 'activities.read',
                     'ACTIVITIES_WRITE' => 'activities.write',
                 ] as $label => $value) {
            $output = $serializer->serialize(new OAuthScopes($label), 'json');

            $this->assertEquals($this->buildFixtureResponse($value, $label), $output);
        }

        $this->assertTrue(OAuthScopes::isValid('CONNECTIONS'));
        $this->assertFalse(OAuthScopes::isValid('abc123'));
    }

    public function testOAuthScopesSerializationBadKey()
    {
        $this->expectException(\BadMethodCallException::class);
        new OAuthScopes('abc123');
    }

    public function testPermissionsSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
                     'CREATE_INSTANT_INVITE' => 0x00000001,
                     'KICK_MEMBERS' => 0x00000002,
                     'BAN_MEMBERS' => 0x00000004,
                     'ADMINISTRATOR' => 0x00000008,
                     'MANAGE_CHANNELS' => 0x00000010,
                     'MANAGE_GUILD' => 0x00000020,
                     'ADD_REACTIONS' => 0x00000040,
                     'VIEW_AUDIT_LOG' => 0x00000080,
                     'PRIORITY_SPEAKER' => 0x00000100,
                     'STREAM' => 0x00000200,
                     'VIEW_CHANNEL' => 0x00000400,
                     'SEND_MESSAGES' => 0x00000800,
                     'SEND_TTS_MESSAGES' => 0x00001000,
                     'MANAGE_MESSAGES' => 0x00002000,
                     'EMBED_LINKS' => 0x00004000,
                     'ATTACH_FILES' => 0x00008000,
                     'READ_MESSAGE_HISTORY' => 0x00010000,
                     'MENTION_EVERYONE' => 0x00020000,
                     'USE_EXTERNAL_EMOJIS' => 0x00040000,
                     'VIEW_GUILD_INSIGHTS' => 0x00080000,
                     'CONNECT' => 0x00100000,
                     'SPEAK' => 0x00200000,
                     'MUTE_MEMBERS' => 0x00400000,
                     'DEAFEN_MEMBERS' => 0x00800000,
                     'MOVE_MEMBERS' => 0x01000000,
                     'USE_VAD' => 0x02000000,
                     'CHANGE_NICKNAME' => 0x04000000,
                     'MANAGE_NICKNAMES' => 0x08000000,
                     'MANAGE_ROLES' => 0x10000000,
                     'MANAGE_WEBHOOKS' => 0x20000000,
                     'MANAGE_EMOJIS' => 0x40000000,
                 ] as $label => $value) {
            $output = $serializer->serialize(new Permissions($label), 'json');

            $this->assertEquals($this->buildFixtureResponseIntValue($value, $label), $output);
        }

        $this->assertTrue(Permissions::isValid('EMBED_LINKS'));
        $this->assertFalse(Permissions::isValid('abc123'));
    }

    public function testPermissionsSerializationBadKey()
    {
        $this->expectException(\BadMethodCallException::class);
        new Permissions('abc123');
    }
}