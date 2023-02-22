<?php

namespace models;

use helper\DB;

class Contact_info
{
    private ?int $id;
    private ?string $customer_id;
    private ?string $date;
    private ?int $conversation;

    /**
     * @param string|null $customer_id
     * @param string|null $date
     * @param int|null $conversation
     * @param int|null $id
     */
    public function __construct(?string $customer_id, ?string $date, ?int $conversation, ?int $id=null)
    {
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->date = $date;
        $this->conversation = $conversation;
    }

    /**
     * @return void
     */
    public function save():void{
        $pdo=DB::getDB();
        if ($this->id===null){
            $stm=$pdo->prepare("INSERT INTO contact_info(customer_id, date, conversation ) VALUES (?, ?, ?)");
            $stm->execute($this->customer_id, $this->date, $this->conversation);
            $this->id=$pdo->lastInsertId();
        }else{
            $stm=$pdo->prepare("UPDATE contact_info SET customer_id=?, date=?, conversation=? WHERE id=?");
            $stm->execute($this->customer_id, $this->date, $this->conversation, $this->id);
        }
    }

    /**
     * @param int $id
     * @return Contact_info
     */
    public static function get(int $id):Contact_info{
        $pdo=DB::getDB();
        $stm=$pdo->prepare("SELECT * FROM contact_info WHERE id=?");
        $stm->execute([$id]);
        $contact_info=$stm->fetch(PDO::FETCH_ASSOC);
        return new Contact_info($contact_info['customer_id'], $contact_info['date'],$contact_info['convesationr'], $contact_info['id']);
    }

    /**
     * @return Contact_info array
     */
    public static function all():array{
        $pdo=DB::getDB();
        $stm=$pdo->prepare("SELECT * FROM contact_info ORDER BY customer_id");
        $stm->execute([]);
        $rezult=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $contact_info){
            $rezult[]=new Contact_info($contact_info['customer_id'], $contact_info['date'],$contact_info['conversation'],$contact_info['id']);
        }
        return $rezult;
    }

    /**
     * @return void
     */
    public function delete(){
        $pdo=DB::getDB();
        $stm=$pdo->prepare("DELETE FROM contact_info WHERE id=?");
        $stm->execute([$this->id]);
    }
//    public function getCustomers(){
//        return Customers::all($this->id);
//    }
}