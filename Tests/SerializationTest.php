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

    public function testJsonErrorCodesSerialization()
    {
        $serializer = $this->createSerializer();

        foreach ([
                     'GENERAL_ERROR' => 0,
                     'UNKNOWN_ACCOUNT' => 10001,
                     'UNKNOWN_APPLICATION' => 10002,
                     'UNKNOWN_CHANNEL' => 10003,
                     'UNKNOWN_GUILD' => 10004,
                     'UNKNOWN_INTEGRATION' => 10005,
                     'UNKNOWN_INVITE' => 10006,
                     'UNKNOWN_MEMBER' => 10007,
                     'UNKNOWN_MESSAGE' => 10008,
                     'UNKNOWN_PERMISSION_OVERWRITE' => 10009,
                     'UNKNOWN_PROVIDER' => 10010,
                     'UNKNOWN_ROLE' => 10011,
                     'UNKNOWN_TOKEN' => 10012,
                     'UNKNOWN_USER' => 10013,
                     'UNKNOWN_EMOJI' => 10014,
                     'UNKNOWN_WEBHOOK' => 10015,
                     'UNKNOWN_BAN' => 10026,
                     'UNKNOWN_SKU' => 10027,
                     'UNKNOWN_STORE_LISTING' => 10028,
                     'UNKNOWN_ENTITLEMENT' => 10029,
                     'UNKNOWN_BUILD' => 10030,
                     'UNKNOWN_LOBBY' => 10031,
                     'UNKNOWN_BRANCH' => 10032,
                     'UNKNOWN_REDISTRIBUTABLE' => 10036,
                     'BOTS_CANNOT_USE_THIS_ENDPOINT' => 20001,
                     'ONLY_BOTS_CAN_USE_THIS_ENDPOINT' => 20002,
                     'MAXIMUM_NUMBER_OF_GUILDS_REACHED' => 30001,
                     'MAXIMUM_NUMBER_OF_FRIENDS_REACHED' => 30002,
                     'MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL' => 30003,
                     'MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED' => 30005,
                     'MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED' => 30007,
                     'MAXIMUM_NUMBER_OF_REACTIONS_REACHED' => 30010,
                     'MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED' => 30013,
                     'MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_A_MESSAGE_REACHED' => 30015,
                     'MAXIMUM_NUMBER_OF_INVITES_REACHED' => 30016,
                     'UNAUTHORIZED' => 40001,
                     'YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION' => 40002,
                     'REQUEST_ENTITY_TOO_LARGE' => 40005,
                     'THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE' => 40006,
                     'THE_USER_IS_BANNED_FROM_THIS_GUILD' => 40007,
                     'MISSING_ACCESS' => 50001,
                     'INVALID_ACCOUNT_TYPE' => 50002,
                     'CANNOT_EXECUTE_ACTION_ON_A_DM_CHANNEL' => 50003,
                     'GUILD_WIDGET_DISABLED' => 50004,
                     'CANNOT_EDIT_A_MESSAGE_AUTHORED_BY_ANOTHER_USER' => 50005,
                     'CANNOT_SEND_AN_EMPTY_MESSAGE' => 50006,
                     'CANNOT_SEND_MESSAGES_TO_THIS_USER' => 50007,
                     'CANNOT_SEND_MESSAGES_IN_A_VOICE_CHANNEL' => 50008,
                     'CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS' => 50009,
                     'OAUTH2_APPLICATION_DOES_NOT_HAVE_A_BOT' => 50010,
                     'OAUTH2_APPLICATION_LIMIT_REACHED' => 50011,
                     'INVALID_OAUTH2_STATE' => 50012,
                     'YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION' => 50013,
                     'INVALID_AUTHENTICATION_TOKEN_PROVIDED' => 50014,
                     'NOTE_WAS_TOO_LONG' => 50015,
                     'PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE' => 50016,
                     'A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN' => 50019,
                     'INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN' => 50020,
                     'CANNOT_EXECUTE_ACTION_ON_A_SYSTEM_MESSAGE' => 50021,
                     'INVALID_OAUTH2_ACCESS_TOKEN_PROVIDED' => 50025,
                     'A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE' => 50034,
                     'INVALID_FORM_BODY' => 50035,
                     'AN_INVITE_WAS_ACCEPTED_TO_A_GUILD_THE_APPLICATIONS_BOT_IS_NOT_IN' => 50036,
                     'INVALID_API_VERSION_PROVIDED' => 50041,
                     'REACTION_WAS_BLOCKED' => 90001,
                     'API_RESOURCE_IS_CURRENTLY_OVERLOADED' => 130000,
                 ] as $label => $value) {
            $output = $serializer->serialize(new JsonErrorCodes($label), 'json');

            $this->assertEquals($this->buildFixtureResponseIntValue($value, $label), $output);
        }

        $this->assertTrue(JsonErrorCodes::isValid('GENERAL_ERROR'));
        $this->assertFalse(JsonErrorCodes::isValid('abc123'));
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