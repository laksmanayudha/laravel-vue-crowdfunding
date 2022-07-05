<?php 

abstract class Hewan{
    
    use Fight;
    public $name;
    public $healthPoint = 50;
    public $numberOfFeet;
    public $skill;
    
    public function atraksi(){
        echo "<br />" . $this->name . " sedang " . $this->skill;
    }

    abstract public function getInfoHewan();
}

trait Fight{

    public $attackPower;
    public $defencePower;

    public function serang(Hewan $hewan){
        echo "<br /> $this->name sedang menyerang $hewan->name";
        $hewan->diserang($this);
    }

    public function diserang(Hewan $hewanPenyerang){
        echo "<br/> $this->name sedang diserang $hewanPenyerang->name";
        $this->healthPoint = $this->healthPoint - $hewanPenyerang->attackPower / $this->defencePower;
    }
}

class Harimau extends Hewan{
    
    public function __construct($name){
        $this->name = $name;
        $this->numberOfFeet = 4;
        $this->skill = "lari cepat";
        $this->attackPower = 7;
        $this->defencePower = 8;
    }

   public function getInfoHewan()
   {
    echo "<pre> 
        Nama hewan: $this->name
        Jenis hewan: Harimau
        Jumlah kaki: $this->numberOfFeet
        Keahlian: $this->skill
        Darah: $this->healthPoint
        Attack Power: $this->attackPower
        Defence Power: $this->defencePower
    </pre>";
   }
}

class Elang extends Hewan{

    public function __construct($name){
        $this->name = $name;
        $this->numberOfFeet = 2;
        $this->skill = "terbang tinggi";
        $this->attackPower = 10;
        $this->defencePower = 5;
    }

    public function getInfoHewan()
    {
    echo "<pre> 
        Nama hewan: $this->name
        Jenis hewan: Elang
        Jumlah kaki: $this->numberOfFeet
        Keahlian: $this->skill
        Darah: $this->healthPoint
        Attack Power: $this->attackPower
        Defence Power: $this->defencePower
    </pre>";
    }
}

$elang = new Elang("elang_1");
$harimau = new Harimau("harimau_1");

$elang->getInfoHewan();
$harimau->getInfoHewan();

$elang->atraksi();
$harimau->atraksi();

$elang->serang($harimau);
$harimau->getInfoHewan();

$elang->serang($harimau);
$elang->serang($harimau);
$harimau->getInfoHewan();

$harimau->serang($elang);
$harimau->serang($elang);
$harimau->serang($elang);
$harimau->serang($elang);
$harimau->serang($elang);
$harimau->serang($elang);
$elang->getInfoHewan();

?>