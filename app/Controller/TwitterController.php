<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');
//App::uses('JsHelper', 'View/Helper');


/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class TwitterController extends AppController
{
    /**
     * Url search box twitter
     *
     * @var array
     */
    const SEARCH_BOX = "https://twitter.com/i/search/typeahead.json?count=10&experiments=&filters=true&q=__keyword__&result_type=topics%2Cusers&src=SEARCH_BOX";


    /**
     * Index a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *    or MissingViewException in debug mode.
     */
    public function index()
    {

    }

    /**
     * Index a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *    or MissingViewException in debug mode.
     */
    public function searchBox()
    {
        if ($this->request->isAjax()){
            $this->layout = null;
            $this->view = 'view_ajax';
        }
        if($this->request->is('post')){
            $keyword = $this->request->data["keyword"];

            $url = 'https://api.twitter.com/1.1/search/tweets.json';
            $getfield = '?count=40&q=' . urlencode( $keyword );
            $requestMethod = 'GET';

            $twitter = $this->Twitter;
            $response = $twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest();
            die($response);
        }
    }
    public function test(){
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?count=40&q=' .urlencode("khoa hoc");
        $requestMethod = 'GET';

        $twitter = $this->Twitter;
        $response = $twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest();

        echo "<pre>";print_r(json_decode($response)); die();

    }
}
