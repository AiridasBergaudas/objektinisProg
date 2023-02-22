<?php

namespace models;

use helper\DB;

class Companys
{
        private ?int $id;
        private ?string $name;
        private ?string $address;
        private ?int $vat_code;
        private ?string $company_name;
        private ?string $phone;
        private ?string $email;

    /**
     * @param string|null $name
     * @param string|null $address
     * @param int|null $vat_code
     * @param string|null $company_name
     * @param string|null $phone
     * @param string|null $email
     * @param int|null $id
     */

        public function __construct(?string $name, ?string $address, ?int $vat_code, ?string $company_name, ?string $phone, ?string $email, ?int $id=null)
        {
            $this->id = $id;
            $this->name = $name;
            $this->address = $address;
            $this->vat_code = $vat_code;
            $this->company_name = $company_name;
            $this->phone = $phone;
            $this->email = $email;
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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
     * @return int|null
     */
    public function getVatCode(): ?int
    {
        return $this->vat_code;
    }

    /**
     * @param int|null $vat_code
     */
    public function setVatCode(?int $vat_code): void
    {
        $this->vat_code = $vat_code;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    /**
     * @param string|null $company_name
     */
    public function setCompanyName(?string $company_name): void
    {
        $this->company_name = $company_name;
    }

    /**
     * @return int|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param int|null $phone
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
     * @return void
     */
        public function save():void{
            $pdo=DB::getDB();
            if ($this->id===null){
                $stm=$pdo->prepare("INSERT INTO companys(name, address, vat_code, company_name, phone, email) VALUES (?, ?, ?, ?, ?, ?)");
                $stm->execute([$this->name, $this->address, $this->vat_code, $this->company_name, $this->phone, $this->email]);
                $this->id=$pdo->lastInsertId();
            }else{
                $stm=$pdo->prepare("UPDATE companys SET name=?, address=?, vat_code=?, company_name=?, phone=?, email=? WHERE id=?");
                $stm->execute($this->name, $this->address, $this->vat_code, $this->company_name, $this->phone, $this->email, $this->id);
            }
        }

    /**
     * @param int $id
     * @return Companys
     */
        public static function get(int $id):Companys{
            $pdo=DB::getDB();
            $stm=$pdo->prepare("SELECT * FROM companys WHERE id=?");
            $stm->execute([$id]);
            $companys=$stm->fetch(\PDO::FETCH_ASSOC);
            return new Companys($companys['name'], $companys['address'],$companys['vat_code'],$companys['company_name'],$companys['phone'],$companys['email'],$companys['id']);
        }

    /**
     * Paimamos visos kategorijos ir sugražinamas jų masyvas
     * @return Companys array
     */
        public static function all():array{
            $pdo=DB::getDB();
            $stm=$pdo->prepare("SELECT * FROM companys ORDER BY name");
            $stm->execute([]);
            $rezult=[];
            foreach ($stm->fetchAll(\PDO::FETCH_ASSOC) as $companys){
                $rezult[]=new Companys($companys['name'], $companys['address'],$companys['vat_code'],$companys['company_name'],$companys['phone'],$companys['email'],$companys['id']);
            }
            return $rezult;
        }

    /**
     * @return void
     */
        public function delete(){
            $pdo=DB::getDB();
            $stm=$pdo->prepare("DELETE FROM customers WHERE company_id=?");
            $stm->execute([$this->id]);

            $stm=$pdo->prepare("DELETE FROM companys WHERE id=?");
            $stm->execute([$this->id]);
        }

    /**
     * @return Customers[]
     */
        public function getCustomers(){
            return Customers::all($this->id);
        }


}







