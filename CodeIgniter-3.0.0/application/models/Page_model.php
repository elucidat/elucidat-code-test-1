<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Gets and manages page data - this is a fake model to simulate a database connection
 *
 * @todo the function getTree may become private and will create new functions that take
 *      and parse/change it in order to be consumed by external libraries (e.g. javascript
 *      libraries).
 * 
 * @package     Elucidat
 * @author      Ian Budden (http://ianbudden.com)
 * @author      Ricardo Valfreixo <ricardo.freixo@elucidat.com>
 * @version     2.0.0
 */
class Page_model extends CI_Model
{

    function __construct()
    {
    }

    /**
     * getTree()
     * 
     * return an array of arrays containing all items organized by parent/children. alternatively
     * it may return a json representation of the same structure to be consumed by libraries that create
     * tree structures or flow charts
     * 
     * TEMP: for now this function outputs json (or PHP) and the visualization will be handled in the frontend
     * by javascript library
     * 
     * @param bool $json 
     * @return type
     */
    public function get_tree($json = false)
    {
        /**
         * Holds the original json object stream
         * @var array
         */
        $initial_elements = $this->get_pages();

        /**
        * sanitize input array to be easily searchable later. all page_code becomes keys and name and the
        * current name is moved to page_name. This is to facilitate usage of D3 library that uses the "name"
        * property as key for relation from a node to the parent
        */
        foreach($initial_elements as $key => $item)
        {
            $initial_elements[$item['page_code']] = $item;
            $initial_elements[$item['page_code']]['page_name'] = $item['name'];
            $initial_elements[$item['page_code']]['name'] = $item['page_code'];
            $initial_elements[$item['page_code']]['parent'] = 0;
            unset($initial_elements[$key]);
        }

        /**
         * put a parentId list on each element to be referenced later
         */
        foreach($initial_elements as $key => $item)
        {
            if(count($item['children']) > 0)
            {
                foreach ($item['children'] as $ckey) {
                    if( empty($ckey) ) continue; // avoid empty references
                    
                    if($initial_elements[$ckey]['parent'] != 0)
                    {
                        $initial_elements[$ckey]['parent'][] = $item['name'];
                    }
                    else
                    {
                        $initial_elements[$ckey]['parent'] = [];
                        $initial_elements[$ckey]['parent'][] = $item['name'];
                    }
                }
            }
        }


        // choose if return json or php object. Might need this for later
        if($json)
        {
            return json_encode($initial_elements);
        }
        return $initial_elements;

    }

    /**
     * Return all pages within a course. This is a mock function that mimick the behaviour of an actual course
     * info.
     * 
     * @return  array
     */
    public function get_pages () 
    {
        return array(
                array(
                    'name' => 'Fraud protection',
                    'page_code' => '54e76dd06520a',
                    'children' => array('54e76dd073e04'),
                    'other_links' => array(''),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => '',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__splash_page.png'
                ),
                array(
                    'name' => 'Before we get started...',
                    'page_code' => '54e76dd073e04',
                    'children' => array('54e76dd06ce79'),
                    'other_links' => array(''),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'Continue',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_right.png'
                ),
                array(
                    'name' => 'Choose your scenario',
                    'page_code' => '54e76dd06ce79',
                    'children' => array('54e76dd0643d6','54e76dd067f52'),
                    'other_links' => array(''),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => '',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_menu__image_boxes.png'
                ),
                array(
                    'name' => 'Meet Max',
                    'page_code' => '54e76dd0643d6',
                    'children' => array('54e76dd069d56'),
                    'other_links' => array(''),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'Continue',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_right.png'
                ),
                array(
                    'name' => '005',
                    'page_code' => '54e76dd069d56',
                    'children' => array('54e76dd05f519','54e76dd061475'),
                    'other_links' => array(''),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => '',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_menu__text_buttons.png'
                ),
                array(
                    'name' => '006',
                    'page_code' => '54e76dd05f519',
                    'children' => array('54e76dd066164','54e76dd062857'),
                    'other_links' => array('54e76dd069d56'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => '',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_menu__image_explorer.png'
                ),
                array(
                    'name' => '007',
                    'page_code' => '54e76dd066164',
                    'children' => array('54e76dd0605af','54e76dd0637ec'),
                    'other_links' => array('54e76dd05f519'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'poll',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_menu__text_buttons.png'
                ),
                array(
                    'name' => '008 - Well done!',
                    'page_code' => '54e76dd0605af',
                    'children' => array('54e76dd061475'),
                    'other_links' => array('54e76dd06ce79','54e76dd066164'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'gold',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_left.png'
                ),
                array(
                    'name' => '009 - Outstanding!',
                    'page_code' => '54e76dd061475',
                    'children' => array('54e76dd062857'),
                    'other_links' => array('54e76dd06ce79','54e76dd069d56'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'superstar',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_left.png'
                ),
                array(
                    'name' => '009b - Well done!',
                    'page_code' => '54e76dd062857',
                    'children' => array('54e76dd0637ec'),
                    'other_links' => array('54e76dd066164','54e76dd06ce79'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'gold',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_left.png'
                ),
                array(
                    'name' => '010 - Oh no!',
                    'page_code' => '54e76dd0637ec',
                    'children' => array('54e76dd066fdd'),
                    'other_links' => array('54e76dd066164'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'Virus2',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_left.png'
                ),
                array(
                    'name' => 'Don\'t worry!',
                    'page_code' => '54e76dd066fdd',
                    'children' => array('54e76dd067f52'),
                    'other_links' => array('54e76dd0637ec'),
                    'only_show_page_if' => '{"condition":"AND","rules":[{"id":"score","field":"score","type":"integer","input":"text","operator":"greater","value":"54"}]}',
                    'page_awards_badge' => '',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_left.png'
                ),
                array(
                    'name' => 'Meet Aisha',
                    'page_code' => '54e76dd067f52',
                    'children' => array('54e76dd068e78'),
                    'other_links' => array(''),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => '',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_sequence__buildup.png'
                ),
                array(
                    'name' => '024',
                    'page_code' => '54e76dd068e78',
                    'children' => array('54e76dd06ac2c','54e76dd06f435','54e76dd072ce1'),
                    'other_links' => array(''),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => '',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_menu__text_buttons.png'
                ),
                array(
                    'name' => '025',
                    'page_code' => '54e76dd06ac2c',
                    'children' => array('54e76dd06bc49','54e76dd06e031'),
                    'other_links' => array('54e76dd068e78'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'Strike31',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_menu__text_buttons.png'
                ),
                array(
                    'name' => '026 - Oh dear!',
                    'page_code' => '54e76dd06bc49',
                    'children' => array('54e76dd06e031'),
                    'other_links' => array('54e76dd068e78'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'sleuth2',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_left.png'
                ),
                array(
                    'name' => '027 - Oh dear!',
                    'page_code' => '54e76dd06e031',
                    'children' => array('54e76dd06f435'),
                    'other_links' => array('54e76dd068e78'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'deadend',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_right.png'
                ),
                array(
                    'name' => '028',
                    'page_code' => '54e76dd06f435',
                    'children' => array('54e76dd07078e','54e76dd071afc'),
                    'other_links' => array('54e76dd068e78'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'Strike32',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_menu__text_buttons.png'
                ),
                array(
                    'name' => '029 - Oh dear!',
                    'page_code' => '54e76dd07078e',
                    'children' => array('54e76dd071afc'),
                    'other_links' => array('54e76dd068e78'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'Databreach',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_left.png'
                ),
                array(
                    'name' => '030 - Oh dear!',
                    'page_code' => '54e76dd071afc',
                    'children' => array('54e76dd072ce1'),
                    'other_links' => array('54e76dd068e78'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'vigilante',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_right.png'
                ),
                array(
                    'name' => '31 - Excellent!',
                    'page_code' => '54e76dd072ce1',
                    'children' => array(''),
                    'other_links' => array('54e76dd06ce79','54e76dd068e78'),
                    'only_show_page_if' => '[]',
                    'page_awards_badge' => 'mega',
                    'grab' => 'https://625621aac04f19ed1a54-078d139490598a4fe778648eda3bc29b.ssl.cf3.rackcdn.com/547c4b99ec2aa_text_and_images__image_left.png'
                )
            );
    }

    
}