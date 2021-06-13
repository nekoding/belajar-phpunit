<?php

namespace Nekoding\App;


class Naruto
{

    protected $narutoJutsu = ['rasengan', 'kagebunshin', 'rasenshuriken'];
    protected $friends = [];

    public function getMainCharacter()
    {
        return ['naruto', 'sasuke', 'sakura'];
    }

    public function getSenseiName()
    {
        return ['kakashi', 'yamato'];
    }

    public function narutoTransform($tail = 0)
    {
        return $tail;
    }

    public function narutoJutsu($jutsu = null)
    {
        if (is_null($jutsu)) {
            throw new \InvalidArgumentException("Naruto need jutsu");
        }

        if (!in_array($jutsu, $this->narutoJutsu)) {
            throw new \Exception("Naruto can't using that jutsu");
        }

        return $this->narutoJutsu;
    }

    public function getNarutoHairColor()
    {
        echo 'yellow';
    }

    public function makeFriendWith(string $name)
    {
        $this->friends[] = $name;
    }

    public function getFriendList()
    {
        return $this->friends;
    }

    public function getNarutoBestFriendName()
    {
        return 'killer be';
    }
}