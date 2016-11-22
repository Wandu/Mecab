PHP Mecab
=========

[![Latest Stable Version](https://poser.pugx.org/wandu/mecab/v/stable.svg)](https://packagist.org/packages/wandu/mecab)
[![Latest Unstable Version](https://poser.pugx.org/wandu/mecab/v/unstable.svg)](https://packagist.org/packages/wandu/mecab)
[![Total Downloads](https://poser.pugx.org/wandu/mecab/downloads.svg)](https://packagist.org/packages/wandu/mecab)
[![License](https://poser.pugx.org/wandu/mecab/license.svg)](https://packagist.org/packages/wandu/mecab)

OOP Mecab Wrapper.

## Installation

```bash
composer require wandu/mecab
```

## How to use

**Example** 분석하기 `parse`, `parseToString`, `parseToGenerator`

```php
<?php
use Wandu\Mecab\Mecab;

$mecab = new Mecab('/usr/local/lib/mecab/dic/mecab-ko-dic');

$mecab->parseToString('동해물과 백두산이 마르고 닳도록 하느님이 보우하사'); // return string
```

**Result**

```
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
```

**Example** 품사태그로 필터링하기

`KoreaEunjeon`의 태그는 [여기](https://docs.google.com/spreadsheets/d/1-9blXKjtjeKZqsf4NzHeYJCrr49-nXeRF6D80udfcwY/edit#gid=0)에
잘 정리되어있습니다.
 
```php
<?php
use Wandu\Mecab\Mecab;
use Wandu\Mecab\Node;
use Wandu\Mecab\Tag\KoreaEunjeon;

$mecab = new Mecab('/usr/local/lib/mecab/dic/mecab-ko-dic');

$nodes = array_filter($mecab->parse('동해물과 백두산이 마르고 닳도록 하느님이 보우하사'), function (Node $node) {
    return
        $node->hasTag(KoreaEunjeon::TAG_NNP) ||
        $node->hasTag(KoreaEunjeon::TAG_NNB) ||
        $node->hasTag(KoreaEunjeon::TAG_NNG);
});

```
**Example** 형태소로 분리하기 `split`

```php
<?php
use Wandu\Mecab\Mecab;

$mecab = new Mecab('/usr/local/lib/mecab/dic/mecab-ko-dic');
$mecab->split('동해물과 백두산이 마르고 닳도록 하느님이 보우하사'); // return array
```

**Result**

```
[
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
]
```

## Reference

- [은전한닢 프로젝트](http://eunjeon.blogspot.kr/)
