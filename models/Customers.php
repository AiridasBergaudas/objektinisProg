<?php

namespace models;

use helper\DB;
use PDO;

class Customers
{

    private ?int $id;
    private ?string $surname;
    private ?string $phone;
    private ?string $email;
    private ?string $address;
    private ?string $position;
    private ?int $company_id;

    /**
     * @param string|null $surname
     * @param string|null $phone
     * @param string|null $email
     * @param string|null $address
     * @param string|null $position
     * @param int|null $company_id
     * @param int|null $id
     */
    public function __construct(?string $surname, ?string $phone, ?string $email, ?string $address, ?string $position, ?int $company_id, ?int $id = null)
    {
        $this->id = $id;
        $this->surname = $surname;
        $this->address = $address;
        $this->position = $position;
        $this->company_id = $company_id;
        $this->phone = $phone;
        $this->email = $email;
    }
    /** Paimamos visos kategorijos ir sugražinamas jų masyvas
     * @return array Customers
     */
    public static function all($categoryId = null): array
    {
        $pdo = DB::getDB();
        if ($categoryId == null) {
            $stm = $pdo->prepare("SELECT * FROM customers ORDER BY surname ");
            $stm->execute([]);
        } else {
            $stm = $pdo->prepare("SELECT * FROM customers WHERE company_id=? ORDER BY surname");
            $stm->execute([$categoryId]);
        }
        $rezult = [];

        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $customers) {
            $rezult[] = new Customers($customers['surname'], $customers['phone'], $customers['email'], $customers['address'], $customers['position'], $customers['company_id'], $customers['id']);
        }
        return $rezult;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * @param string|null $position
     */
    public function setPosition(?string $position): void
    {
        $this->position = $position;
    }

    /**
     * @return int|null
     */
    public function getCompanyId(): ?int
    {
        return $this->company_id;
    }

    /**
     * @param int|null $company_id
     */
    public function setCompanyId(?int $company_id): void
    {
        $this->company_id = $company_id;
    }

    public static function get($id = null): array
    {
        $pdo = DB::getDB();
       
            $stm = $pdo->prepare("SELECT * FROM customers WHERE id=? ORDER BY surname");
            $stm->execute([$id]);

        $customers=$stm->fetch(PDO::FETCH_ASSOC);
        return new Customers($customers['surname'], $customers['phone'], $customers['email'], $customers['address'], $customers['position'], $customers['company_id'], $customers['id']);
       
    }
}