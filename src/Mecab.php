<?php
namespace Wandu\Mecab;

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
        return mecab_version();
    }

    /** @var resource */
    protected $mecab;

    /**
     * @param string $dictPath
     */
    public function __construct($dictPath = null)
    {
        if ($dictPath) {
            ini_set('mecab.default_dicdir', $dictPath);
        }
        $this->mecab = mecab_new([
            '--bos-format' => "BOS\n",
            '--eos-format' => "EOS\n",
            '--node-format' => "NOD (%H): %m\n",
            '--unk-format' => "UNK (%H): %m\n",
        ]);
    }
    
    public function __destruct()
    {
        mecab_destroy($this->mecab);
    }

    /**
     * @param string $text
     * @return string
     */
    public function parseToString($text)
    {
        return mecab_sparse_tostr($this->mecab, $text);
    }

    /**
     * @param string $text
     * @return \Generator|\Wandu\Mecab\Node[]
     */
    public function parse($text)
    {
        $node = mecab_sparse_tonode($this->mecab, $text);
        while ($node) {
             yield [
                 new Node(mecab_node_toarray($node)),
             ];
            $node = mecab_node_next($node);
        }
    }

    /**
     * @param string $text
     * @return string[]
     */
    public function split($text)
    {
        return mecab_split($text);
    }
}
