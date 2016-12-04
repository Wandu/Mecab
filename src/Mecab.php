<?php
namespace Wandu\Mecab;

use MeCab\Tagger;
use RuntimeException;
use function mecab\version;

class Mecab
{
    const STATUS_NODE = 0;
    const STATUS_UNKNOWN = 1;
    const STATUS_BOS = 2; // beginning of sentence
    const STATUS_EOS = 3; // end of sentence

    /**
     * @return string
     */
    public static function version()
    {
        if (function_exists("mecab\\version")) {
            return version();
        } elseif (function_exists('mecab_version')) {
            return mecab_version();
        }
        return 'unknown';
    }

    /** @var resource|\MeCab\Tagger */
    protected $mecab;
    
    /** @var boolean */
    protected $isMecabResource;

    /**
     * @param string $dictPath
     */
    public function __construct($dictPath = null)
    {
        if ($dictPath) {
            ini_set('mecab.default_dicdir', $dictPath);
        }
        $args = [
            '--bos-format' => "BOS\n",
            '--eos-format' => "EOS\n",
            '--node-format' => "NOD (%H): %m\n",
            '--unk-format' => "UNK (%H): %m\n",
        ];
        if (class_exists(Tagger::class)) {
            $this->mecab = new Tagger($args);
            $this->isMecabResource = false;
        } elseif (function_exists('mecab_new')) {
            $this->mecab = mecab_new($args);
            $this->isMecabResource = true;
        } else {
            throw new RuntimeException('cannot use mecab.');
        }
    }
    
    public function __destruct()
    {
        if ($this->isMecabResource) {
            mecab_destroy($this->mecab);
        }
    }

    /**
     * @param string $text
     * @return string
     */
    public function parseToString($text)
    {
        if ($this->isMecabResource) {
            return mecab_sparse_tostr($this->mecab, $text);
        } else {
            return $this->mecab->parseToString($text);
        }
    }

    /**
     * @param string $text
     * @return \Generator|\Wandu\Mecab\Node[]
     */
    public function parseToGenerator($text)
    {
        if ($this->isMecabResource) {
            $node = mecab_sparse_tonode($this->mecab, $text);
            while ($node) {
                yield new Node(mecab_node_toarray($node));
                $node = mecab_node_next($node);
            }
        } else {
            $node = $this->mecab->parseToNode($text);
            while ($node) {
                yield new Node($node->toArray());
                $node = $node->getNext();
            }
        }
    }

    /**
     * @param string $text
     * @return array|\Wandu\Mecab\Node[]
     */
    public function parse($text)
    {
        return iterator_to_array($this->parseToGenerator($text));
    }

    /**
     * @param string $text
     * @return string[]
     */
    public function split($text)
    {
        if (function_exists("mecab\\split")) {
            return \mecab\split($text);
        } elseif (function_exists('mecab_split')) {
            return mecab_split($text);
        }
    }
}
