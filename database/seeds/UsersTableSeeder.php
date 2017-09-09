<?php

use Illuminate\Database\Seeder;
use App\ArtistPillar;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $types = ArtistPillar::all()->modelKeys();
        $users = [
            [
                "name" => "Asteria Damian",
                "description" => "I'm a female singer and actress, known for her exceptionally powerful and unique voice which always creates hype in all of concerts where she performs. She started to sing at a very young age and for so long she has participated in different religious concerts. She has been invited to different events on national leadership to represent other youth. She participated in events like WomenScreemingFestival 2015. Asteria’s dream is to connect to different souls as she entertains all of her fans through her beautiful and content saturated music,",
                "pillar_id" => 1,
            ],
            [
                "name" => "Catheryn Thomas Massamu",
                "description" => "I'm a graduate from the Muhimbili University of health and Science (MUHAS). Her career as a doctor is driven by community problems associated with child and maternal mortality. Catherine believes that good health brings about good thinking as well, she is also a singer, song writer, a music director of an arts group known as Ocean Art Community (OAC), praise and worship lead singer at her church (The Ocean Church) also a music teacher at Shujaa Group. She also plays different musical instruments like a guitar, she has also been able to record a few songs and she is now finalizing her album. She performs on open mic events, music concerts, in weddings and big events. Her musical voice has been defined to have a mixture of jazz and blues. Her passion of music led her to be a TV and radio presenter of a show that was aired around East Africa; Kenya, Uganda and Tanzania.",
                "pillar_id" => 1,
            ],
            [
                "name" => "Geofrey Semunyu Mduma",
                "description" => "Soul Musician to the core, has titled his music ‘Music na Nafsi’. His heart bleeds for social changes in the community and his musical objective is to bring about revolution in all aspect of societal life. He started singing at age 7 and his greatest aspiration for music has been from his grandmother who was a tenor choir singer. In his spare time, Geoffrey is a music teacher, transmitting his passion for the arts into as many people as his voice can reach. His growing fame has been as a result of his appearance in a number of songs with great Tanzanian musicians as well as several mind blowing music shows and events. He is known for the relationship he shares with his red guitar and his ability to combine his voice, strums and amazing chord progressions has often left his audience awe stuck at the genius inside his mind.",
                "pillar_id" => 1,
            ],
            [
                "name" => "Beston Shaaban Mwasankuju",
                "description" => "Beston Mwasankuju also known as \"Bitz\" was born in Mbeya,Tanzania. He graduated at Salma Kikwete Sec school and later on got certified in IT at Kampala International University. Bitz started his dance journey when he was 17 that is when he immediately fell in love with the art form and got engaged in it. In 2013 he joined a band of dancers to form \"House Of Kinetix\" dance crew which he is a part of to this day. Bitz is skilled in different kind of dance styles like Animation, Robotics, Hip hop,Popping, Afro-pop. Through his creativity he mostly does and specializes in Robotic Animation and he pushes his style to new heights everyday as he has developed a unique identity in his movement. He performs as a solo dancer and with his crew in different events and he also makes and posts captivating dance videos on Social networks. Bitz likes to interact with different successful people and learn more from them in order to get the knowledge that may help him push his dance career further. His goal is to have a promising career in dance and to be internationally recognized as a professional dancer and ensure the dance industry in TZ grows to high standards. He dreams to start a major dance event that will be widely popular and prestigious to most dancers.",
                "pillar_id" => 5,
            ],
            [
                "name" => "Amani Hamisi Kigoni",
                "description" => "Amani hamisi is the name that he got from his parents, but people call him \"Moon Wockie\" as his stage name. Being humble, creative, passionate, hard working and always trying to do things big and differently makes him one of the best dancers in Tanzania. He started dancing when he was little, in 2013 he joined a dance crew known as House Of Kinetic which has elite dancers who never fail to amaze. Apart from being a dancer he is an amazing choreographer. Dance is what he loves and what makes him happy. As a street dancer he delivers a very unique dance flavor by creating a fusion of different dance styles like popping, animation, hip hop and Afro pop. Having experience of performing on many events and as a way to gain more exposure he makes outstanding dance videos on YouTube and has appeared in some commercial advert. Always dreaming to be an accomplished dancer and choreographer international wise. Moon believes that through dance he can change people's lives one way or another in a positive manner. He wants to contribute fully in the growth of the dance industry as now people don't take it seriously he aims on first changing people's mindset, and that starts with himself. \"Confidence, faith, passion, dedication, hard work, understanding is what can make anyone's dream become a reality\" he said.",
                "pillar_id" => 5,
            ],
            [
                "name" => "Edgar Lushaju",
                "description" => "Is predominantly a multifaceted artist. He has been involved in a various forms of art from a tender age to present, ranging from; illustrations for a book cover, pavement graffiti, label designing, dance and performances theatre acting, comics and public speaking. Edgar serves as the acting manager and member of a Christian rap crew ‘Luminous Maximus’.Edgar is the host (MC) of an open mike event at Nyumbani Lounge under ‘La Poetista’ initiative. Edgar also does standup comedy. Of recent he has become a board member of the Goethe institute open stage team. Edgar has worked for Clouds media group, as creative personnel, and producer/presenter of a night show ‘The late night show’, he has also worked/interned for UNISERVE - an NGO that assists students to get into universities in the UK, as intern manager. He is currently a student at Ardhi University, pursuing his bachelor of Architecture General. Edgar’s life motto is “rhythm has no vowel”, where rhythm stands for the entire things one can do/achieve in life, having no vowel stands for how you are not limited by norms and restrictions to all that you can achieve.",
                "pillar_id" => 9,
            ],
            [
                "name" => "Ebenezer Masiwe",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab amet dolore eos fuga itaque minima repellat suscipit, ullam. Assumenda consectetur harum hic, ipsum iure placeat quia ratione repellendus sint voluptatum.",
                "pillar_id" => 8,
            ]
        ];


        for ($i=1; $i <= count($users); $i++) {
            $u = $users[$i - 1];

            $user = [
                'name' => $u['name'],
                'description' => $u['description'],
                'pillar_id' => $u['pillar_id'],
                'email' => $faker->unique()->email(),
                'avatar' => "$i.png",
                'art_quote' => $faker->realText(90),
                'simple_description' => $faker->sentence(2),
                'facebook_link' => 'facebook.com/'.$faker->word(),
                'instagram_link' => 'instagram.com/'.$faker->word(),
                'youtube_link' => 'youtube.com/'.$faker->word(),
                'twitter_link' => 'twitter.com/'.$faker->word(),
            ];
            User::create($user);
        }
    }
}
