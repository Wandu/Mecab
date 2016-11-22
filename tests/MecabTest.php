<?php
namespace Wandu\Mecab;

use Generator;
use PHPUnit_Framework_TestCase;
use Wandu\Mecab\Tag\KoreaEunjeon;

class MecabTest extends PHPUnit_Framework_TestCase
{
    public function testVersion()
    {
        static::assertEquals('0.996', Mecab::version());
    }
    
    public function testMecab()
    {
        $mecab = new Mecab('/usr/local/lib/mecab/dic/mecab-ko-dic');

        $expected = <<<TEXT
BOS
NOD (NNP,지명,F,동해,*,*,*,*): 동해
NOD (NNG,*,T,물,*,*,*,*): 물
NOD (JC,*,F,과,*,*,*,*): 과
NOD (NNP,지명,T,백두산,Compound,*,*,백두/NNG/*+산/NNG/*): 백두산
NOD (JKS,*,F,이,*,*,*,*): 이
NOD (VV,*,F,마르,*,*,*,*): 마르
NOD (EC,*,F,고,*,*,*,*): 고
NOD (VV,*,T,닳,*,*,*,*): 닳
NOD (EC,*,T,도록,*,*,*,*): 도록
NOD (NNG,*,T,하느님,Compound,*,*,하느/NNG/*+님/NNG/*): 하느님
NOD (JKS,*,F,이,*,*,*,*): 이
NOD (NNG,*,F,보우,*,*,*,*): 보우
NOD (NNG,*,F,하사,*,*,*,*): 하사
EOS

TEXT;
        static::assertEquals($expected, $mecab->parseToString('동해물과 백두산이 마르고 닳도록 하느님이 보우하사'));
    }

    public function testSplit()
    {
        $mecab = new Mecab('/usr/local/lib/mecab/dic/mecab-ko-dic');
        static::assertEquals([
            '동해',
            '물',
            '과',
            '백두산',
            '이',
            '마르',
            '고',
            '닳',
            '도록',
            '하느님',
            '이',
            '보우',
            '하사',
        ], $mecab->split('동해물과 백두산이 마르고 닳도록 하느님이 보우하사'));
    }

    public function testParseFetch()
    {
        $mecab = new Mecab('/usr/local/lib/mecab/dic/mecab-ko-dic');

        $generator = $mecab->parseToGenerator('동해물과 백두산이 마르고 닳도록 하느님이 보우하사');
        static::assertInstanceOf(Generator::class, $generator);
        foreach ($generator as $node) {
            static::assertInstanceOf(Node::class, $node);
        }
    }
    
    public function test()
    {
        $mecab = new Mecab('/usr/local/lib/mecab/dic/mecab-ko-dic');

        // 명사 추출
        $nodes = array_filter($mecab->parse('동해물과 백두산이 마르고 닳도록 하느님이 보우하사'), function (Node $node) {
            return
                $node->hasTag(KoreaEunjeon::TAG_NNP) ||
                $node->hasTag(KoreaEunjeon::TAG_NNB) ||
                $node->hasTag(KoreaEunjeon::TAG_NNG);
        });
        
        $expected = <<<TEXT
동해
물
백두산
하느님
보우
하사

TEXT;

        $actual = '';
        foreach ($nodes as $node) {
            $actual .= $node->getSurface() . "\n";
        }
        static::assertEquals($expected, $actual);
    }
}
