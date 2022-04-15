<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;
use Mini\Libs\Helper;
use Mini\Model\Reservation;
use stdClass;


class ReservationsController
{
    public $_reservation;

    public function __construct(){
        $this->_reservation = new Reservation();
    }

    public function index()
    {
        $title = "Reservations";
        $active_page = "home";
        $reservations = $this->_reservation->getAll();

        require APP . 'view/_templates/header.php';
        require APP . 'view/reservations/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function create()
    {
        $title = "New Reservation";
        $active_page = "home";

        require APP . 'view/_templates/header.php';
        require APP . 'view/reservations/create.php';
        require APP . 'view/_templates/footer.php';
    }

    public function edit($id)
    {
        $title = "Edit Reservation";
        $active_page = "home";

        $reservation = $this->_reservation->get($id);

        require APP . 'view/_templates/header.php';
        require APP . 'view/reservations/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function store(){
        $result = new \stdClass();
        $result->response = false;

        if (isset($_POST["data_reservation"])) {
            $params = array();
            parse_str($_POST["data_reservation"], $params);

            $result->response = $this->_reservation->store($params);
            $newReservation = $this->_reservation->getLastRecord();
        }

        echo json_encode($result);
    }

    public function update()
    {
        $result = new \stdClass();
        $result->response = false;

        if (isset($_POST["data_reservation"]) AND isset($_POST["reservation_id"])) {
            $params = array();
            parse_str($_POST["data_reservation"], $params);

            $Reservation = new Reservation();
            $params['id'] = $_POST["reservation_id"];
            $result->response = $Reservation->update($params);
        }

        echo json_encode($result);
    }

    public function delete(){

        $result = new \stdClass();
        $result->response = false;

        if (isset($_POST["reservation_id"])) {
            $Reservation = new Reservation();
            $result->response = $Reservation->destroy($_POST["reservation_id"]);
        }

        echo json_encode($result);
    }

}
