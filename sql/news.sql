-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 08:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`) VALUES
(1, 'Josh', 'Santiago-Francia'),
(2, 'Andrew', 'Gallagher'),
(3, 'Thomas', 'McCarthy'),
(4, 'Connor', 'Moloney'),
(5, 'Braedon', 'Turner'),
(6, 'Benjamin', 'Macdowall'),
(7, 'Valerie', 'Sanchez'),
(8, 'Jing', 'Gao'),
(9, 'Christine', 'Montcheu'),
(10, 'Matthew', 'Seymour'),
(11, 'Kate', 'Temple'),
(12, 'Eduards', 'Oss'),
(13, 'Kieron', 'Tekumu');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'News'),
(2, 'Reviews'),
(3, 'Features'),
(4, 'Releases'),
(5, 'Interview'),
(6, 'Podcasts');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'Antrim'),
(2, 'Cavan'),
(3, 'Clare'),
(4, 'Cork'),
(5, 'Donegal'),
(6, 'Dublin'),
(7, 'Galway'),
(8, 'Kerry'),
(9, 'Kildare'),
(10, 'Wexford'),
(11, 'Wicklow');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `subarticle` text NOT NULL,
  `article` longtext NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `headline`, `subarticle`, `article`, `img_url`, `author_id`, `category_id`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 'Taylor Swift Unveils Tracklist for The Tortured Poets Department', 'Guest on the Midnights follow-up include Post Malone and Florence and the Machine', '\'<p>Taylor Swift has unveiled the tracklist for her new album, The Tortured Poets Department. The new LP includes 16 songs and one bonus track, “The Manuscript.” There are just two guest features this time: Post Malone and Florence and the Machine. See the full tracklist below.</p><p>During her Grammys acceptance speech for Best Pop Vocal Album last night, Swift unexpectedly announced that her next album was called The Tortured Poets Department and it would come out on April 19. Later, she uploaded a handwritten note to her social media accounts that was signed by “The Chairman of The Tortured Poets Department.”</p><p>Swift’s album Midnights picked up the win for Best Pop Vocal Album at the 2024 Grammys before then also scooping up Album of the Year. With her second victory of the night, Swift broke a tie she’d previously held with Frank Sinatra, Paul Simon, and Stevie Wonder, going on to hold the title for most Album of the Year wins, with four total.</p><p>Meanwhile, Swift’s Ice Spice collaboration “Karma” got a nod in the Best Pop Duo/Group Performance category and “Anti-Hero” was nominated for Record of the Year, Song of the Year, and Best Pop Solo Performance, but Swift didn’t take home any of those awards.</p>', 'images/1.png', 1, 1, 1, '2024-03-04 19:04:51', '2024-03-04 19:04:51'),
(2, 'Governors Ball 2024 Lineup Announced: SZA, Post Malone, the Killers, and More', '<p>Rauw Alejandro, Peso Pluma, 21 Savage, Carly Rae Jepsen, Victoria Monét, and Sexyy Red are also set to perform at the New York festival</p>', '<p>Governors Ball Music Festival 2024 is taking place from June 7-9 at Flushing Meadows Corona Park in Queens, New York. Today, the lineup has been announced. SZA, Post Malone, and the Killers are slated to headline, while the rest of the lineup includes Carly Rae Jepsen, Rauw Alejandro, Peso Pluma, 21 Savage, Victoria Monét, Sexyy Red, Labrinth, Don Toliver, Reneé Rapp, Alex G, Kevin Abstract, and Faye Webster, among others. Check out the full lineup in the poster below.</p><p>The inaugural Governors Ball Music Festival happened back in 2011 on Governors Island. The next year, the event relocated to Randalls Island and placed roots there for its future editions. The 2020 edition was supposed to take place at Randall’s Island Park once again, but was canceled due to the pandemic and then relocated to Citi Field in Queens for the ensuing two festivals. This 2024 edition is the second time Governors Ball will take place at Flushing Meadows Corona Park, following last year’s big move.</p>', 'images/2.png', 3, 1, 3, '2024-03-01 19:08:18', '2024-03-02 19:08:18'),
(3, 'Father John Misty - Chloe & The Next 20th Century', '<p>Josh Tillman is back with a new album. The slippery singer-songwriter remains bewitching, as sprightly brass-tinged arrangements deepen his songs’ darkness and brighten their romance. The ‘God’s Favourite Customer’ follow-up gives a different side to Tillman’s music.</p>', '<p>Two things recur with peculiar frequency around Father John Misty: films and dreams. You’ve heard his wife Emma is a filmmaker; or you might recall that wild story he made up about the time Lou Reed appeared to him in a dream; or you’ll remember his songs, the way the Warner Bros. logo looms over “Leaving LA.” Like David Lynch, Josh Tillman dreams in absurdity, a glamorously mundane world populated by seedy characters hidden beneath the surface. This is the Misty land, the dreamscape, and everyone who encounters his work crosses into it, consciously or not. He’s the folk singer for these times because the aura of unreality follows him around like a stench.</p><p>Anyway, here we have Chloë and the Next 20th Century, from the mind of an auteur who specializes in oneiric theory and mid-century film scores. His latest album is another collection of story-song vignettes arrayed in loose opposition to the pointless absurdity of modern society; or it’s an elaborate study in the life of a sad sack helplessly ensnared in doomed romances with a whole series of women, starting with Chloë, an unfeeling socialite whose previous boyfriend met a mysterious end in the first of, by my count, six tragic deaths in 51 minutes; or it was a dream all along.</p><p>What Chloë looks like, though, is a film. The old-timey opening credits roll for five minutes in the “Q4” video, but the action never begins. There are uncredited cameos: You can read “Funny Girl” like a blind item about Drew Barrymore from the perspective of a delusional fan, and in my mind the umlaut hovers over the image of another generationally famous Chloë, Sevigny. From the first sour trumpet, Misty is working overtime to entertain, tapping into a strain of golden age Hollywood jazz and swing that feels at first like a ludicrous posture for a folk-rock star. Few in our present era of obsessively nostalgic pop have dug all the way back to mid-century big band orchestration and jazz crooners like Johnny Mathis and Chet Baker. Misty looks here because it represents the period when movies were the most advanced and important popular multimedia form—easier than writing for the metaverse, in any case, and just as transportive.</p><p>Still, it’s a record, so you’ll have to watch in the dim theater of your own mind. The new album shares a number of themes with 2017’s Pure Comedy, Misty’s last great throwing-up-of-hands, but instead of manifestos and literalism, Chloë has the amnesiac effect of a film without phones or calendars. It feels designed to age well because it sounds a bit ageless, trimming back the earlier album’s instrumental interludes and replacing its curdled, Trump-scented atmosphere with melodies and stories of no era in particular. From this point, things get slippery: There’s no clear narrative, and the stories are riddled with innuendo and unanswered questions. In place of Pure Comedy’s logorrhea, Chloë suggests the framework of an ambitious novel: Perhaps the story begins with the wedding band of wooly closer “The Next 20th Century,” and ends, 11 songs earlier, as poor Chloë leaps off a balcony.</p><p>But Chloë is ultimately a background character, more like a concept, a sometime foil and frequent obsession for our determinedly dislikeable leading man. The narrator never gives a name, though he shares a few habits with someone we’ve met before, such as a tendency to save the big reveal for the final stanza, or to express some genuinely affecting sentiment like, “Love’s much less a mystery/Than who you give it to,” and subsequently make a pass at a celebrity. In “Funny Girl,” he falls for a comedian: She’s barely over five feet tall, a vivacious interviewee who once “charmed the pants off Letterman.” Convinced she returns his affections, he asks her to meet and arrives at the appointed time, but she’s nowhere to be found; it’s not clear she ever knew he existed.</p><p>Most songs share a similar tenor: pompous and sordid and really terrifically campy. If you subscribe to the narrator’s continuity, you’ll also have to accept that the guy who’s filching Chloë’s pills and stalking talk show guests is the same one singing “Kiss Me (I Loved You)” and cradling his dying cat in “Goodbye Mr. Blue,” easily the saddest death of them all. The pleasure of making his acquaintance is a sensation between schadenfreude and pity, and Misty knows it, because he writes the “Glory Days” scene right in, on a bitter dive bar weeper called “Buddy’s Rendezvous,” as in, “I’m at Buddy\'s Rendezvous/Telling the losers and old timers/How good I did with you/They almost believe me, too.”</p><p>Look closer: Nothing about the Chloë story adds up. The album is full of unfinished arcs, open questions that could turn the ship in an entirely new direction if only someone were steering. On “Olvidado (Otro Momento),” when Misty starts singing bossa nova in Spanish and not Portuguese—where are we? The unhappy couple killed en route to a one-night stand on “We Could Be Strangers”—who were they? And what did he say happened to Chloë’s last boyfriend—were we ever sure? Give the record half an ear and the stories are a little too clever and intricate to register; devote full attention and their meanings start to evaporate because there’s nothing solid there either. This isn’t the structure of a script but the logic of a dream.</p><p>Except for “Q4,” when we briefly wake up to reality, maybe. It’s the album’s most self-contained episode, the only one you couldn’t call a love song: a scandalous story of an author who steals the life story of her late sister as fodder for her own new “semi-memoir.” If the peacocking instrumental is a little over the top, it’s befitting of these characters’ preening attitudes. “It was just the thing for their Q4/‘Deeply funny’ was the rave refrain,” Misty crows, a fictional plagiarized bestseller standing in for a whole history of tension between art and commerce. “What’s ‘deeply funny’ mean anyhow?” he asks the next time the chorus comes around, and then, later, tosses out another of those lines that threaten to give up the whole charade: “The film adaptation was a total mess.”</p><p>It can feel like Misty is in danger of spinning out, but for most of the album, what’s so impressive is the subtlety of his control. The band—including frequent collaborators Drew Erickson and Jonathan Wilson, plus a string quartet and eleven orchestra members—play with silvery poise and high drama. The characters may be odious and dissolute, but the way Misty sings about them is delightful, from the debonair delivery of “Chloë” to the little retro-microphone vibrato that creeps into “Kiss Me.” “Only a Fool” plays like an aspiring songbook standard, its timeless romantic premise flirting with the sly, overeducated Tillman setup: “The wisdom of the ages/From Gita to Abraham/Was written by smitten, lonely sages/Too wise to ever take a chance.” He’s no longer the oldest man in folk rock but the youngest lounge singer in 1950s California.</p><p>But like a big Hollywood production, what’s sparkle and pizazz on camera is pain and doubt behind the scenes. The playfulness dissolves with album closer “The Next 20th Century,” a moody, hallucinatory dirge that slinks through the shadow of Leonard Cohen’s “Death of a Ladies’ Man” with the gimlet eye of Howard Hughes in an empty theater. We’ve finally reached the perspective of the viewer and it’s not looking good: Oppression looms like original sin and love pays “for like a thousand different wars.” “And now things keep getting worse while staying so eerily the same,” Misty croons, spinning a karmic wheel and landing on the creeping suspicion that the next 20th century is this one. He’s come, jeembles and all, to ask if entertainment is the best sustenance we have left, and for the first time, he says yes. “I’ll take the love songs/And give you the future in exchange,” he offers, not too generously. It’s a familiar idea from Misty’s past songs, that in the last analysis we have only each other, and perhaps music, but it feels more hopeless somehow, here at the end of this modern relic of an album with no happy love songs at all. The past is irretrievable, the present wasted, the future doesn’t exist: onward to the dreamland.</p>', 'images/3.png', 1, 2, 1, '2024-03-03 19:09:34', '2024-03-04 19:09:34'),
(4, 'Mitski: how the US songwriter scored the year’s quietest global chart smash', '<p>An outlier amid pop stars and club bangers, My Love Mine All Mine is getting millions of streams a day. Its singer is reaching new fans – and repairing her relationship with old ones</p>', '<p>An outlier amid pop stars and club bangers, My Love Mine All Mine is getting millions of streams a day. Its singer is reaching new fans – and repairing her relationship with old ones</p><p>On Wednesday night at London’s Union Chapel, the only giveaway that we were in the presence of one of the biggest hits in the world was the sudden glow of phones recording from the pin drop-silent pews. As Mitski sang the gentle country ballad My Love Mine All Mine, the Japanese American songwriter swayed softly, held her heart and gazed at the church’s high carved ceiling as she asked the moon to preserve her earthly love and shine it down long after she’s gone. But the screams that followed were an unmistakable sign of the near religious devotion the 33-year-old commands, even before she climbed up to the pulpit for her encore.</p><p>That song, from Mitski Miyawaki’s acclaimed seventh album, The Land Is Inhospitable and So Are We, is now being played around 4m times a day on Spotify and is at No 12 in their global daily Top 50. It will probably hold fast for a second week at No 15 in the UK singles chart and is vaulting up the US Hot 100. Today (13 October), this strange, lunar ballad joins the likes of Olivia Rodrigo, Travis Scott and various high-speed club bangers on the BBC Radio 1 playlist.</p><p>My Love Mine All Mine is an unlikely success story: keeping company with big-ticket pop stars, it feels of a piece with breakout ballads such as Lana Del Rey’s Video Games or Rodrigo’s Drivers License. “This generation of listeners care less about which genre they align themselves with,” says the Icelandic jazz-pop star Laufey, 24, who shared a TikTok video of herself being overwhelmed by the song. “They focus on lyricism, community and how music makes them feel. It’s very encouraging to see a song like this soar.” Its prominence is also a surprise given Mitski’s antipathy towards the spotlight, a stance fostered by her initial experience of virality.</p><p>The rise of My Love Mine All Mine was fuelled by TikTok, where it is currently the platform’s most popular song. It isn’t her first hit on the site: in 2020, her kaleidoscopic pop song Nobody, then two years old, became a meme, soundtracking goofy clips of young people sprinting away from their problems. It broke her beyond an indie listenership enrapt by her “way of finding words for emotions you didn’t even know you had”, says Laufey. It changed the tenor of her fanbase, expanding to a younger faction who often characterised her as a “sad girl” thanks to her bleakly poetic lyrics and ratcheted the level of screaming at her gigs to quasi-Beatlemania levels. Rifts emerged between new and old fans and between Mitski and her obsessive admirers: she reported being grabbed at gigs and feeling exploited by the way her music was consumed, describing herself as a “black hole” for people to dump their feelings into.</p><p>Her 2022 album Laurel Hell was the last on her contract for US indie label Dead Oceans, and with its grim songs about her contract with the public – not to mention uneasy flirtations with a pop sound – was widely perceived as a retirement salvo. “That made the music hard to listen to,” says Pitchfork associate editor Cat Zhang, “because it felt like by supporting her, you were contributing to her suffering.” Soon after its release, Mitski asked people not to film her performances, which prompted a backlash from some fans who said their mental health circumstances necessitated filming as a memory aid. The request was deleted from her social media, which was run by her management after Mitski had quit posting in 2019 to protect her private life. At the end of the tour, she disappeared from view. So it was a surprise on many levels when she popped up on TikTok in July with the simple announcement that she was releasing a new album this autumn.</p><p>The spooked country sound of The Land Is Inhospitable … received widespread acclaim, with Guardian critic Alexis Petridis praising Mitski’s ability to “slip between the heartfelt and the sardonic without ever losing [her] grip on the listener” in a five-star review. But Mitski’s own promotion for the album has barely extended beyond brief TikTok videos about a few songs, one radio interview and a video about My Love Mine All Mine for the lyric-explainer website Genius. (“This is the first record where I absolutely stopped caring what people think,” she said in the clip. “Ironically, maybe that’s what people are the most attracted to.”) Jon Coombs is vice-president of A&R at Secretly Group, the parent company of Mitski’s label, Dead Oceans. “It was important for her for the focus to be on the music and on the songs,” he says. “She’s really proud of it.”</p><p>The album was led by the single Bug Like an Angel, a choir-buoyed strum about the uneasy comfort of alcohol. My Love Mine All Mine was the second single but an immediate favourite at the label, says Coombs. Mitski frequently sings about loneliness and insufficiency; when she sings about falling in love, she might liken it to falling “as fast as a body from the balcony”. My Love Mine All Mine, about wanting one’s love to live on for eternity, “is relatively straightforward and uncommon for her catalogue”, says Coombs. “Of course, it’s not paint-by-numbers. Mitski flips it on her head – it’s a love song about her own love.”</p><p>Mitski’s message of one’s love being the only thing anyone truly owns is resonant in an extractive consumer culture, says Zhang. “She’s showing us the value of giving ourselves freely in a world that conditions us to demand more, more, more.” And her singing to the moon raises the stakes: “She is asking us to reckon with the relative insignificance of our daily struggle and to invest in the only thing that can lend our existence a kind of cosmic meaning.”</p><p>With Mitski all but absent from the public eye, the growing ubiquity of My Love Mine All Mine has become a meta embodiment of the song’s desire for her love to exist outside of her, a stand-in for the boundary-conscious songwriter – who once toured wearing kneepads, underscoring the limits to which she would flay herself for an audience. Its streaming stats are growing daily, says Coombs, and connecting “in places that are uncommon for us to see a ton of engagement, like the Philippines, south-east Asia, Mexico”. There has been no single flashpoint propelling the song beyond the Mitski hardcore. “What’s so exciting is that we can’t point to one particular opportunity or country or partner,” says Coombs. “We’re just seeing this groundswell of people connecting with it across the board, regardless of how they’re first hearing it. I wish I had something to point to because then it would be easier to repeat.”</p><p>Hers is a singular success among complex female songwriters, too. Mitski has joked that her new album’s wordy title is indebted to Fiona Apple’s ornate way with a name; in the 90s, the prodigious US songwriter reached No 21 on the Hot 100 with Criminal, her lone singles chart placing. That decade Tori Amos and Björk often troubled the UK Top 40, but adventurous indie musicians haven’t thrived in the charts in the streaming era: comparable musicians such as St Vincent, Sharon Van Etten and Angel Olsen have never had a conventional hit; Phoebe Bridgers, the breakout indie star of recent years, has only dented the US singles chart as a guest on songs by superstars Taylor Swift and SZA. Why Mitski? “I keep going back to the strength of the song,” says Coombs. “She’s always had a very engaged fanbase that is pretty singular. I think it has to do with how her writing really strikes to the heart of her fans.”</p><p>Unlike some viral songs, where a single’s success doesn’t translate across the rest of the album, Mitski’s whole catalogue has been uplifted: before the release of The Land Is Inhospitable …, her monthly Spotify listening figures were around 10m, says Coombs. A month later, they stand at 18.9m. Her current tour of intimate venues sold out so quickly that Mitski implored fans not to buy vastly inflated resale tickets, with some listed for more than £300 on the secondary market. (One tell of her popularity: the bootleg merch sellers hawking terrible T-shirts outside Union Chapel, not something you often see at indie shows). On previous album cycles, Mitski broke from her own dates to support major pop stars Lorde and Harry Styles on their headline tours. As for Mitski’s coming year, “that’s not something that’s on my radar at the moment,” says Coombs. “The overwhelming majority of the shows on this upcoming run are going to be seated theatres. It makes for a listening experience where you can really listen and absorb the songs.”</p><p>It speaks to Mitski’s desire to reset the terms of engagement with her fans, a challenge that many musicians attempt and fail (Doja Cat is currently leading an offensive against hers), and a feat that may seem unlikely as her profile is higher than ever. But Mitski’s seem to be listening. At the US shows before this UK run, says Coombs, the screaming had stopped and the audience was silent. And the most-watched TikTok interactions with My Love … are noticeably different from her many previous viral songs. Rather than subverting it, many listeners are taking it as a prompt to share their emotional responses and experiences of love.</p><p>The song probably went viral because of its relative simplicity compared with the other songs on an open-ended and existential record, says Zhang. But it’s also consoling young people “who feel romantically lost and confused”, she says. “The sentiment is: even if someone didn’t value the love you gave them, that doesn’t mean that it was a waste. She’s lending dignity to the act of devotion, when we are taught that it is shameful to expend so much energy on others.”</p><p>Appreciating the dignity in devotion might also apply to Mitski’s renewed fondness for her fans. She told NPR that she never intended to quit music altogether after Laurel Hell, but questioned whether she should continue working in the public eye. “But, eventually, I kind of looked around and realised just how lucky I was to get to create the music I want to make and have my music reach other people,” she said. “And I just realised: you know what? I need to buckle up in a sense, and just take all of the good that comes with the bad.”</p><p>Outside Union Chapel on Wednesday afternoon, Ogulcan (17), Abbie (16), Rosa (22) and Shenel (17) are sheltering under umbrellas and blankets at the front of the queue for the unreserved seating, having arrived at 6am. Rosa, who travelled from Madrid, mentions an infamous incident in the Mitski fandom. “At a show seven years ago somebody yelled at her, ‘I love you!’ and she said, ‘You don’t know me.’ But two days ago in Manchester, she was like, ‘I really do love you, I think it’s possible even though we don’t know each other.’ That was really nice.”</p><p>Watching from the balcony, I spot the four in their well-earned front-centre spot, as Mitski performs a spellbinding acoustic set with two musicians playing acoustic guitar and double bass. They do the entire new album in order to a transfixed, utterly silent audience, who cheer ecstatically in polite bursts after each song. Mitski says very little, pacing the stage in all black, other than to thank the crowd and joke about how much she’d like to haunt the chapel. “OK,” she says after that, “let’s get back into character,” lightly mocking her own preference for distance.</p><p>After The Land Is Inhospitable … closer I Love Me After You, she introduces an encore of some of her greatest hits. “Feel free to sing along if you’d like,” she says. “It is a church after all, it’ll be nice to hear a lot of voices singing, if you don’t mind.” And she and the congregation sing in perfect harmony.</p>', 'images/4.png', 2, 3, 2, '2024-03-01 19:09:34', '2024-03-01 07:09:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `location_id` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `stories_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `stories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `stories_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
