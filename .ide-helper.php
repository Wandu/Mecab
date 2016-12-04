<?php
/* @todo
 * mecab_dictionary_info
 * 
 * mecab_get_all_morphs
 * mecab_get_lattice_level
 * mecab_get_partial
 * mecab_get_theta
 *
 * mecab_set_all_morphs
 * mecab_set_lattice_level
 * mecab_set_partial
 * mecab_set_theta
 *
 * mecab_nbest_init
 * mecab_nbest_next_tonode
 * mecab_nbest_next_tostr
 * mecab_nbest_sparse_tostr
 *
 * mecab_node_lpath
 * mecab_node_rpath
 * 
 * mecab_path_cost
 * mecab_path_lnext
 * mecab_path_lnode
 * mecab_path_prob
 * mecab_path_rnext
 * mecab_path_rnode
 */

namespace {
    /**
     * @return string
     */
    function mecab_version() {}

    /**
     * @param string $text
     * @return string[]
     */
    function mecab_split($text) {}

    /**
     * @param array $config
     * @return resource
     */
    function mecab_new($config = null) {}

    /**
     * @param resource $handler
     */
    function mecab_destroy(resource $handler) {}

    /**
     * @param resource $handler
     * @param string $text
     * @return string
     */
    function mecab_sparse_tostr(resource $handler, $text) {}

    /**
     * @param resource $handler
     * @param string $text
     * @return resource
     */
    function mecab_sparse_tonode(resource $handler, $text) {}

    /**
     * @param resource $handler
     * @param resource $node
     * @return string
     */
    function mecab_format_node(resource $handler, resource $node) {}

    /**
     * @param resource $node
     * @return resource
     */
    function mecab_node_prev(resource $node) {}

    /**
     * @param resource $node
     * @return resource
     */
    function mecab_node_next(resource $node) {}

    /**
     * Begin of Node
     * @param resource $node
     * @return resource
     */
    function mecab_node_bnext(resource $node) {}

    /**
     * End of Node
     * @param resource $node
     * @return resource
     */
    function mecab_node_enext(resource $node) {}

    /**
     * @param resource $node
     * @return array
     */
    function mecab_node_toarray(resource $node) {}

    /**
     * @param resource $node
     * @param int
     */
    function mecab_node_id(resource $node) {}

    /**
     * @param resource $node
     * @param mixed
     */
    function mecab_node_alpha(resource $node) {}

    /**
     * @param resource $node
     * @param mixed
     */
    function mecab_node_beta(resource $node) {}

    /**
     * @param resource $node
     * @param boolean
     */
    function mecab_node_isbest(resource $node) {}

    /**
     * @param resource $node
     * @param string
     */
    function mecab_node_tostring(resource $node) {}

    /**
     * @param resource $node
     * @return string
     */
    function mecab_node_surface(resource $node) {}

    /**
     * @param resource $node
     * @return string
     */
    function mecab_node_feature(resource $node) {}

    /**
     * @param resource $node
     * @return int
     */
    function mecab_node_length(resource $node) {}

    /**
     * @param resource $node
     * @return int
     */
    function mecab_node_rlength(resource $node) {}

    /**
     * @param resource $node
     * @return int
     */
    function mecab_node_rcattr(resource $node) {}

    /**
     * @param resource $node
     * @return int
     */
    function mecab_node_posid(resource $node) {}

    /**
     * @param resource $node
     * @return int
     */
    function mecab_node_lcattr(resource $node) {}

    /**
     * @param resource $node
     * @return int
     */
    function mecab_node_char_type(resource $node) {}

    /**
     * @param resource $node
     * @return int
     */
    function mecab_node_stat(resource $node) {}

    /**
     * @param resource $node
     * @return int
     */
    function mecab_node_cost(resource $node) {}

    /**
     * @param resource $node
     * @return double
     */
    function mecab_node_prob(resource $node) {}

    /**
     * @param resource $node
     * @return int
     */
    function mecab_node_wcost(resource $node) {}   
}

namespace mecab
{
    /**
     * @return string
     */
    function version() {}

    /**
     * @param string $text
     * @return string[]
     */
    function split($text) {}
}

namespace MeCab
{
    class Tagger
    {
        public function __construct($argv) {}

        public function getPartial() {}

        public function setPartial() {}

        public function getTheta() {}

        public function setTheta() {}

        public function getLatticeLevel() {}

        public function setLatticeLevel() {}

        public function getAllMorphs() {}

        public function setAllMorphs() {}

        public function parse() {}

        /**
         * @param string $text
         * @return string
         */
        public function parseToString($text) {}

        /**
         * @param string $text
         * @return \MeCab\Node
         */
        public function parseToNode($text) {}

        public function parseNBest() {}

        public function parseNBestInit() {}

        public function next() {}

        public function nextNode() {}

        public function formatNode() {}

        public function dictionaryInfo() {}
    }

    class Node
    {
        public function __construct() {}
        
        public function __get() {}
        
        public function __isset() {}
        
        public function getIterator() {}
        
        public function setTraverse() {}
        
        public function toArray() {}
        
        public function toString() {}
        
        public function __toString() {}

        /**
         * @return \MeCab\Node
         */
        public function getPrev() {}

        /**
         * @return \MeCab\Node
         */
        public function getNext() {}
        
        public function getENext() {}
        
        public function getBNext() {}
        
        public function getRPath() {}
        
        public function getLPath() {}
        
        public function getSurface() {}
        
        public function getFeature() {}
        
        public function getId() {}
        
        public function getLength() {}
        
        public function getRLength() {}
        
        public function getRcAttr() {}
        
        public function getLcAttr() {}
        
        public function getPosId() {}
        
        public function getCharType() {}
        
        public function getStat() {}
        
        public function isBest() {}
        
        public function getAlpha() {}
        
        public function getBeta() {}
        
        public function getProb() {}
        
        public function getWCost() {}
        
        public function getCost() {}
    }
}
