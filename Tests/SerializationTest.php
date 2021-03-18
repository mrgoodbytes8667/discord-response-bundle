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
        $output = $serializer->serialize(new JsonErrorCodes($label), 'json');
        $this->assertEquals($this->buildFixtureResponseIntValue($value, $label), $output);
    }

    public function provideJsonErrorCodes()
    {
        yield ['label' => 'GENERAL_ERROR' , 'value' =>  0];
        yield ['label' => 'UNKNOWN_ACCOUNT' , 'value' =>  10001];
        yield ['label' => 'UNKNOWN_APPLICATION' , 'value' =>  10002];
        yield ['label' => 'UNKNOWN_CHANNEL' , 'value' =>  10003];
        yield ['label' => 'UNKNOWN_GUILD' , 'value' =>  10004];
        yield ['label' => 'UNKNOWN_INTEGRATION' , 'value' =>  10005];
        yield ['label' => 'UNKNOWN_INVITE' , 'value' =>  10006];
        yield ['label' => 'UNKNOWN_MEMBER' , 'value' =>  10007];
        yield ['label' => 'UNKNOWN_MESSAGE' , 'value' =>  10008];
        yield ['label' => 'UNKNOWN_PERMISSION_OVERWRITE' , 'value' =>  10009];
        yield ['label' => 'UNKNOWN_PROVIDER' , 'value' =>  10010];
        yield ['label' => 'UNKNOWN_ROLE' , 'value' =>  10011];
        yield ['label' => 'UNKNOWN_TOKEN' , 'value' =>  10012];
        yield ['label' => 'UNKNOWN_USER' , 'value' =>  10013];
        yield ['label' => 'UNKNOWN_EMOJI' , 'value' =>  10014];
        yield ['label' => 'UNKNOWN_WEBHOOK' , 'value' =>  10015];
        yield ['label' => 'UNKNOWN_BAN' , 'value' =>  10026];
        yield ['label' => 'UNKNOWN_SKU' , 'value' =>  10027];
        yield ['label' => 'UNKNOWN_STORE_LISTING' , 'value' =>  10028];
        yield ['label' => 'UNKNOWN_ENTITLEMENT' , 'value' =>  10029];
        yield ['label' => 'UNKNOWN_BUILD' , 'value' =>  10030];
        yield ['label' => 'UNKNOWN_LOBBY' , 'value' =>  10031];
        yield ['label' => 'UNKNOWN_BRANCH' , 'value' =>  10032];
        yield ['label' => 'UNKNOWN_REDISTRIBUTABLE' , 'value' =>  10036];
        yield ['label' => 'BOTS_CANNOT_USE_THIS_ENDPOINT' , 'value' =>  20001];
        yield ['label' => 'ONLY_BOTS_CAN_USE_THIS_ENDPOINT' , 'value' =>  20002];
        yield ['label' => 'MAXIMUM_NUMBER_OF_GUILDS_REACHED' , 'value' =>  30001];
        yield ['label' => 'MAXIMUM_NUMBER_OF_FRIENDS_REACHED' , 'value' =>  30002];
        yield ['label' => 'MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL' , 'value' =>  30003];
        yield ['label' => 'MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED' , 'value' =>  30005];
        yield ['label' => 'MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED' , 'value' =>  30007];
        yield ['label' => 'MAXIMUM_NUMBER_OF_REACTIONS_REACHED' , 'value' =>  30010];
        yield ['label' => 'MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED' , 'value' =>  30013];
        yield ['label' => 'MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_A_MESSAGE_REACHED' , 'value' =>  30015];
        yield ['label' => 'MAXIMUM_NUMBER_OF_INVITES_REACHED' , 'value' =>  30016];
        yield ['label' => 'UNAUTHORIZED' , 'value' =>  40001];
        yield ['label' => 'YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION' , 'value' =>  40002];
        yield ['label' => 'REQUEST_ENTITY_TOO_LARGE' , 'value' =>  40005];
        yield ['label' => 'THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE' , 'value' =>  40006];
        yield ['label' => 'THE_USER_IS_BANNED_FROM_THIS_GUILD' , 'value' =>  40007];
        yield ['label' => 'MISSING_ACCESS' , 'value' =>  50001];
        yield ['label' => 'INVALID_ACCOUNT_TYPE' , 'value' =>  50002];
        yield ['label' => 'CANNOT_EXECUTE_ACTION_ON_A_DM_CHANNEL' , 'value' =>  50003];
        yield ['label' => 'GUILD_WIDGET_DISABLED' , 'value' =>  50004];
        yield ['label' => 'CANNOT_EDIT_A_MESSAGE_AUTHORED_BY_ANOTHER_USER' , 'value' =>  50005];
        yield ['label' => 'CANNOT_SEND_AN_EMPTY_MESSAGE' , 'value' =>  50006];
        yield ['label' => 'CANNOT_SEND_MESSAGES_TO_THIS_USER' , 'value' =>  50007];
        yield ['label' => 'CANNOT_SEND_MESSAGES_IN_A_VOICE_CHANNEL' , 'value' =>  50008];
        yield ['label' => 'CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS' , 'value' =>  50009];
        yield ['label' => 'OAUTH2_APPLICATION_DOES_NOT_HAVE_A_BOT' , 'value' =>  50010];
        yield ['label' => 'OAUTH2_APPLICATION_LIMIT_REACHED' , 'value' =>  50011];
        yield ['label' => 'INVALID_OAUTH2_STATE' , 'value' =>  50012];
        yield ['label' => 'YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION' , 'value' =>  50013];
        yield ['label' => 'INVALID_AUTHENTICATION_TOKEN_PROVIDED' , 'value' =>  50014];
        yield ['label' => 'NOTE_WAS_TOO_LONG' , 'value' =>  50015];
        yield ['label' => 'PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE' , 'value' =>  50016];
        yield ['label' => 'A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN' , 'value' =>  50019];
        yield ['label' => 'INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN' , 'value' =>  50020];
        yield ['label' => 'CANNOT_EXECUTE_ACTION_ON_A_SYSTEM_MESSAGE' , 'value' =>  50021];
        yield ['label' => 'INVALID_OAUTH2_ACCESS_TOKEN_PROVIDED' , 'value' =>  50025];
        yield ['label' => 'A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE' , 'value' =>  50034];
        yield ['label' => 'INVALID_FORM_BODY' , 'value' =>  50035];
        yield ['label' => 'AN_INVITE_WAS_ACCEPTED_TO_A_GUILD_THE_APPLICATIONS_BOT_IS_NOT_IN' , 'value' =>  50036];
        yield ['label' => 'INVALID_API_VERSION_PROVIDED' , 'value' =>  50041];
        yield ['label' => 'REACTION_WAS_BLOCKED' , 'value' =>  90001];
        yield ['label' => 'API_RESOURCE_IS_CURRENTLY_OVERLOADED' , 'value' =>  130000];
    }

    public function testJsonErrorCodesSerializationBadKey()
    {
        $this->expectException(\BadMethodCallException::class);
        new JsonErrorCodes('abc123');
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