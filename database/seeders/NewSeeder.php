<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert(
            [
                [
                    'id' => 1,
                    'news_image' => "https://i.ytimg.com/vi/kqA0chH5BT4/maxresdefault.jpg",
                    'title' => "PacMan should be banned?",
                    'summary' => "Pac-Man, the classic arcade game, is beloved by millions around the world for its simple gameplay and cute characters. However, many people don't realize the dangers that come with playing this seemingly harmless game.
                    In the early days of Pac-Man, players could easily spend hours playing without realizing how much time had passed. This led to a phenomenon known as 'Pac-Man fever,' where people became so obsessed with the game that they neglected other important aspects of their lives, such as work and personal relationships.
                    As time went on, Pac-Man became even more dangerous. The game's addictive nature combined with the rise of high scores and competitive play led to a new form of gaming addiction. Players would spend countless hours practicing and perfecting their skills, often at the expense of their physical and mental health.
                    The dangers of Pac-Man even extended beyond the players themselves. The game's popularity led to a flood of unlicensed clones and knock-offs, some of which contained malware or other harmful software. These clones could infect computers and cause serious damage to both personal and corporate systems.
                    Despite its dangers, Pac-Man remains a beloved classic of the video game world. However, it's important for players to recognize the potential risks associated with playing the game and to enjoy it in moderation. Like any form of entertainment, Pac-Man can be enjoyed safely and responsibly, as long as players are aware of its potential hazards.",
                    'game_id' => 5,
                ],
                [
                    'id' => 2,
                    'news_image' => "https://pbs.twimg.com/media/C3iZKFTWcAAk-D1?format=jpg&name=large",
                    'title' => "Doom in a Calculator",
                    'summary' => "In the early 2000s, a group of high school students in a small town discovered a way to play the classic first-person shooter game Doom on their calculators. It started as a simple experiment in programming, but soon became an obsession among the students.

                    The group of friends spent countless hours tinkering with their calculators, trying to find the perfect combination of software and hardware to make Doom run smoothly. They scoured online forums and message boards, looking for tips and tricks to optimize their setups.
                    
                    Eventually, they succeeded. They were able to load a stripped-down version of Doom onto their calculators, complete with graphics, sound effects, and even multiplayer functionality. It wasn't as smooth or as visually impressive as the original game, but it was Doom nonetheless, and they were thrilled.
                    
                    The students began to play Doom on their calculators during class, surreptitiously passing their devices back and forth under the desks. They formed alliances and waged virtual battles against each other, all while their teachers were oblivious to their secret gaming sessions.
                    
                    Word of the students' achievement eventually spread beyond their small town, and soon other teenagers around the world were attempting to replicate their success. The calculator Doom phenomenon became a global sensation, with videos and tutorials popping up all over the internet.
                    
                    For a brief moment in time, the humble calculator had become a gaming powerhouse, and a group of enterprising students had proven that with enough determination and ingenuity, anything is possible.",
                    'game_id' => 8,
                ],
                [
                    'id' => 3,
                    'news_image' => "https://los40es00.epimg.net/los40/imagenes/los40classic/2015/01/pang.jpg",
                    'title' => "Pang, What More Do You Need",
                    'summary' => "In the early 90s, a game called Pang took the arcade scene by storm. It was a simple game with a deceptively challenging premise. The player controlled a character armed with a harpoon gun that could shoot upwards, trying to destroy bouncing balls that were steadily shrinking. The balls would break into smaller balls until they were finally destroyed.

                    Despite its simple gameplay, Pang quickly became a sensation, drawing players of all ages into its addictive world. The game's charm was in its simplicity - it was easy to pick up and play, but difficult to master.
                    
                    As players progressed through the game's levels, they encountered a variety of different ball types, each with its own unique behavior. Some balls would bounce erratically, making them hard to hit, while others would split into even more balls when hit, making it hard to keep up.
                    
                    But despite the game's popularity, few knew the real story behind its creation. It turns out that Pang was the brainchild of a small team of developers who had worked tirelessly to bring their vision to life. They had spent countless hours perfecting the game's mechanics and testing it in arcade after arcade, all in the hopes of creating something truly special.
                    
                    And they had succeeded. Pang was a game that captured the hearts of players around the world, drawing them into its colorful world and keeping them hooked for hours on end. And even today, the game is remembered as a classic of the arcade scene, a testament to the power of simple, addictive gameplay.",
                    'game_id' => 76,
                ],
                [
                    'id' => 4,
                    'news_image' => "https://play-lh.googleusercontent.com/YhznsCtEUSAJugbF-O3bjKRTMCsJrrR6PvCzvlnA1G0IiW29nGKbycMhN102oOUkvEY=w1052-h592-rw",
                    'title' => "Road Rash is a Racing Game Apparently",
                    'summary' => "In the early 90s, a motorcycle racing game called Road Rash took the gaming world by storm. Players were immediately drawn to its fast-paced gameplay, brutal combat, and thrilling sense of speed.

                    In Road Rash, players took on the role of a motorcycle racer, competing in illegal street races across a range of exotic locations. But this wasn't your typical racing game - Road Rash was all about taking down your opponents by any means necessary. Players could punch, kick, and even use weapons like chains and clubs to knock their rivals off their bikes and gain an advantage.
                    
                    The game's combat system was both visceral and satisfying, with each blow landing with a satisfying thud and sending opponents tumbling off their bikes in a cloud of dust. And with each race bringing new challenges and opponents, players were constantly kept on their toes.
                    
                    But Road Rash wasn't just a great racing game - it was also a reflection of the rebellious spirit of the times. With its focus on illegal street racing and biker culture, Road Rash tapped into a sense of rebellion and danger that resonated with players around the world.
                    
                    And even after all these years, Road Rash continues to be remembered as a classic of the racing game genre. Its impact can be seen in the countless racing games that have followed in its wake, each one attempting to capture the sense of speed, excitement, and danger that made Road Rash such a beloved game.",
                    'game_id' => 55,
                ],
                [
                    'id' => 5,
                    'news_image' => "http://www.juicygamereviews.com/uploads/3/0/5/0/30501048/2433114_orig.jpg?731",
                    'title' => "Street Fighter 2 Best Fighting Game in History",
                    'summary' => "In the early 90s, the gaming world was introduced to a phenomenon that would revolutionize the fighting game genre: Street Fighter II. It quickly became a cultural phenomenon, captivating players with its colorful characters, addictive gameplay, and unforgettable soundtrack.

                    Street Fighter II set the standard for all fighting games to come, with its deep and rewarding gameplay mechanics that allowed for a near-infinite variety of strategies and playstyles. Players could choose from a diverse cast of fighters, each with their own unique moves and fighting styles, and engage in fierce battles across a range of exotic locations.
                    
                    But what truly set Street Fighter II apart from its peers was the sense of community and competition that it fostered. Players around the world would gather in arcades and gaming centers, eager to test their skills against the best of the best. The game's competitive scene grew rapidly, with tournaments and leagues popping up all over the world, and players becoming celebrities in their own right.
                    
                    And even after all these years, Street Fighter II continues to be revered as one of the greatest fighting games of all time. Its legacy can be seen in the countless fighting games that have followed in its wake, each one attempting to capture the magic that made Street Fighter II such a classic.
                    
                    Whether you're a seasoned fighting game veteran or a newcomer to the genre, there's no denying the impact that Street Fighter II has had on the world of gaming. It will forever be remembered as a true masterpiece, and a shining example of what can be achieved when game developers strive for greatness.",
                    'game_id' => 40,
                ],
                [
                    'id' => 6,
                    'news_image' => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi9Z-9oMVdPCz-7hUGEwRr-Pm8MiDcQkmWzKKBEJ4y_LNUVa31RaR1zBMh_CfqOKcghYGR-UBeAGGuBDJRLrNougDaVPzuSIWpT9UzWl1YE93aQGuDRBkMGLZbaTyoiJcGuRQsVa1Mt022F-6usnNV-oOF_SzipRfjv3iiUP8zh8BGad1VmB02RxR1G8w/s2500/diablo%201.jpg",
                    'title' => "Diablo I Better than Diablo III",
                    'summary' => "Once upon a time, in a land of magic and darkness, there existed a legendary game series known as Diablo. It began in the late 1990s with Diablo I, a groundbreaking game that combined fast-paced action with immersive storytelling and an atmospheric world filled with danger and adventure.

                    Over a decade later, Diablo III arrived on the scene, promising bigger graphics, more advanced gameplay mechanics, and an even more immersive experience. But to some fans of the series, it fell short of its predecessor, Diablo I.
                    
                    While Diablo III certainly had its strengths, some felt that it lacked the raw intensity and sense of danger that made Diablo I such a classic. The atmosphere of the original game was darker and more ominous, with a true feeling of horror and suspense that kept players on edge throughout the entire experience.
                    
                    Additionally, the simplicity of Diablo I's gameplay was seen as a strength by some fans. The mechanics were straightforward and easy to learn, but with enough depth to keep players engaged and challenged. Diablo III, on the other hand, was seen by some as being overly complex, with too many bells and whistles that detracted from the core experience.
                    
                    Despite the criticisms of Diablo III, the series continues to be beloved by millions of gamers around the world. And while opinions may differ on which game is better, one thing is for certain - the world of Diablo will always hold a special place in the hearts of those who have journeyed through its dark and dangerous realms.",
                    'game_id' => 14,
                ]
            ]
        );
    }
}
