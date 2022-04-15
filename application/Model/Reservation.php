<?php

namespace Mini\Model;

use Mini\Core\Model;

class Reservation extends Model
{
    private $_table = "reservations";

    /**
     * Get a reservation from database
     * @param integer $reservation_id
     */
    public function get($reservation_id)
    {
        $table = $this->_table;
        $sql = "SELECT * FROM $table WHERE id = :reservation_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':reservation_id' => $reservation_id);

        $query->execute($parameters);
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Get all reservations from database
     */
    public function getAll()
    {
        $table = $this->_table;
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getLastRecord(){
        $table = $this->_table;
        $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute();

        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Add a reservation to database
     * @param array $data reservation data (name, phone, adults, children, time_onboard, date
     */
    public function store($data)
    {
        $table = $this->_table;
        $sql = "INSERT INTO $table (name, phone, yacht, adults, children, time_onboard, date)
                VALUES (:name, :phone, :yacht, :adults, :children, :time_onboard, :date)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':name' => $data['name-guest'],
            ':phone' => $data['phone'],
            ':yacht' => $data['yacht'],
            ':adults' => $data['adults'],
            ':children' => $data['children'],
            ':time_onboard' => $data['time-onboard'],
            ':date' => $data['date'],
        );

        return $query->execute($parameters);
    }

    /**
     * Update a reservation in database
     * @param array $data Data
     */
    public function update($data)
    {
        $table = $this->_table;
        $sql = "UPDATE $table SET name=:name, phone=:phone, yacht=:yacht, adults=:adults, 
                children=:children, time_onboard=:time_onboard, date=:date 
                WHERE id = :reservation_id";
        $query = $this->db->prepare($sql);

        $parameters = array(
            ':name' => $data['name-guest'],
            ':phone' => $data['phone'],
            ':yacht' => $data['yacht'],
            ':adults' => $data['adults'],
            ':children' => $data['children'],
            ':time_onboard' => $data['time-onboard'],
            ':date' => $data['date'],
            ':reservation_id' => $data['id'],
        );

        return $query->execute($parameters);
    }

    /**
     * Delete a reservation in the database
     * reservations/delete/ stuff!
     * @param int $reservation_id Id of shelter
     */
    public function destroy($reservation_id)
    {
        $table = $this->_table;
        $sql = "DELETE FROM $table WHERE id = :reservation_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':reservation_id' => $reservation_id);

        return $query->execute($parameters);
    }
}
