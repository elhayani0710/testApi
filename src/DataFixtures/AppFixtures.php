<?php

namespace App\DataFixtures;

use App\Entity\Stock;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Gift;
use App\Entity\Receiver;
use App\Entity\User;


class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $arr_stocks_list = array();

        for($i=1; $i<3; $i++) {
            $stock = new Stock();
            $stock->setName('stock.' . $i);
            $manager->persist($stock);
            $arr_stocks_list[] = $stock;
        }

        for($i=1; $i<8; $i++) {
            $gift = new Gift();
            $gift->setGiftUuid('uid.' . $i);
            $gift->setGiftCode('code.' . $i);
            $gift->setGiftDescription('desc.' . $i);
            $gift->setGiftPrice(10 * $i);
            $stock = $arr_stocks_list[array_rand ($arr_stocks_list, 1)];
            $gift->setStock($stock);
            $manager->persist($gift);
            $arr_gifts_list[] = $gift;
        }

        for($i=1; $i<8; $i++) {
            $receiver = new Receiver();
            $receiver->setReceiverUuid('uid.' . $i);
            $receiver->setReceiverFirstname('fname.' . $i);
            $receiver->setReceiverLastname('lname.' . $i);
            $receiver->setReceiverCountryCode('country.' . $i);
            $manager->persist($receiver);
            $arr_gifts_list[] = $receiver;
        }

        $user1 = new User("reader");
        $user1->setPassword($this->encoder->encodePassword($user1, "reader"));
        $user1->setRoles(json_encode(array("ROLE_USER")));
        $manager->persist($user1);

        $user2 = new User("admin");
        $user2->setPassword($this->encoder->encodePassword($user2, "admin"));
        $user2->setRoles(json_encode(array("ROLE_ADMIN")));
        $manager->persist($user2);

        $manager->flush();
    }
}