<?php 

namespace App\Controllers;

use App\Core\Controller;

class NotFoundController extends Controller {

    public function index() {
        $this->loadView('not-found');
    }

}
