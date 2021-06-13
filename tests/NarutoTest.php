<?php


use Nekoding\App\Naruto;
use PHPUnit\Framework\TestCase;

class NarutoTest extends TestCase
{

    protected Naruto $naruto;

    public function test_true_is_true()
    {
        $this->assertTrue(true);
    }

    /**
     * setup fixture
     */
    public function setUp(): void
    {
        $this->naruto = new Naruto();
    }

    /**
     * assertion test
     */
    public function test_can_get_main_character()
    {
        $this->assertIsArray($this->naruto->getMainCharacter());
    }

    /**
     * assertion test
     */
    public function test_can_get_sensei_name()
    {
        $this->assertEquals(
            ['kakashi', 'yamato'],
            $this->naruto->getSenseiName()
        );
    }

    /**
     * assertion test
     */
    public function test_get_naruto_bersfriend()
    {
        $this->assertEquals('killer be', $this->naruto->getNarutoBestFriendName());
    }

    /**
     * assertion test using data provider
     *
     * @param $tail
     * @dataProvider narutoTransformToKyubiProvider
     */
    public function test_naruto_can_transform_into_kyubi($tail)
    {
        $this->assertEquals($tail, $this->naruto->narutoTransform($tail));
    }

    /**
     * data provider for test
     */
    public function narutoTransformToKyubiProvider(): array
    {
        return [
            [1, 1],
            [2, 2],
            [3, 3],
            [4, 4]
        ];
    }

    /**
     * assertion test
     * @throws Exception
     */
    public function test_naruto_can_use_jutsu()
    {
        $this->assertContains('rasengan', $this->naruto->narutoJutsu('rasengan'));
    }

    /**
     * exception test
     */
    public function test_naruto_use_sharingan()
    {
        $this->expectException(Exception::class);
        $this->naruto->narutoJutsu('sharingan');
    }

    /**
     * exception test
     * @throws Exception
     */
    public function test_naruto_use_null_jutsu()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->naruto->narutoJutsu();
    }

    /**
     * Output test
     */
    public function test_get_naruto_hair_color()
    {
        $this->expectOutputString('yellow');
        $this->naruto->getNarutoHairColor();
    }

    /**
     * Chain unit test
     * @return array
     */
    public function test_naruto_make_friend_with_sasuke(): array
    {
        $this->naruto->makeFriendWith('sasuke');

        $narutoFriendList = $this->naruto->getFriendList();
        $this->assertContains('sasuke', $narutoFriendList);

        return $narutoFriendList;
    }

    /**
     * @depends test_naruto_make_friend_with_sasuke
     * @param array $friendList
     * @return array
     */
    public function test_sasuke_betrayed_naruto(array $friendList): array
    {
        array_pop($friendList);
        $this->assertNotContains('sasuke', $friendList);

        return $friendList;
    }

    /**
     * @depends test_sasuke_betrayed_naruto
     * @param array $friendList
     */
    public function test_sasuke_make_friend_again_with_naruto_after_war(array $friendList)
    {
        array_push($friendList, 'sasuke');
        $this->assertContains('sasuke', $friendList);
    }

    /**
     * Incomplete test case
     */
    public function test_naruto_series_is_over()
    {
        $this->assertTrue(true, 'Yeay, Naruto series finally over');
        $this->markTestIncomplete('Nope, the series now rebrand as boruto');
    }

    /**
     * Ignore test case
     */
    public function test_naruto_join_akatsuki()
    {
        $this->assertTrue(true, 'Naruto join akatsuki');
        $this->markTestSkipped();
    }

    /**
     * Mockup test case
     */
    public function test_get_naruto_best_friend()
    {
        $stub = $this->createStub(Naruto::class);

        $stub->method('getNarutoBestFriendName')->willReturn('shikamaru');

        $this->assertEquals('shikamaru', $stub->getNarutoBestFriendName());
    }

}
