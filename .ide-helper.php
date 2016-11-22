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
 * mecab_node_bnext
 * mecab_node_enext         
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
