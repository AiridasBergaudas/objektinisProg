// CIA I INDEX.PHP SUDETI,KAD RODYTU CORDINACIU NAMU DARBUS

<?php
require_once "Point.php";

$firstPoint = new Point(1, 3);
$secondPoint = new Point(9, 9);

echo "(" . $firstPoint->getX() . "; " . $firstPoint->getY() . ")<br>";
echo $firstPoint->distanceFromOrigin(). "<br>";
$firstPoint->translate(3, 6);

echo "(" . $firstPoint->getY() . "; " . $firstPoint->getY() . ")<br>";
echo $firstPoint . "<br>";

echo $firstPoint->doubleDistance($secondPoint). "<br>";
echo $secondPoint->setLocation(10, 10);

echo $firstPoint->doubleDistance($secondPoint). "<br>";
?> // php uzbaigimo index faile neturetu buti
//---------------------------------------------------
// O CIA PRASIDEDA Point class codas


<?php
class Point {
    /**
     * @var $x - tasko x kordinates
     * @var $y - tasko y kordinates
     */
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /** pas Samanta mixed vietoj x
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /** pas Samanta mixed $x vietoj void
     * @return void
     */
    public function setX(int $x)
    {
        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /** pas Samanta mixed $x vietoj void
     * @return void
     */
    public function setY(int $y)
    {
        $this->y = $y;
    }

    /** grazina atstuma nuo kordinaciu (0,0) iki  tasko
     * @return float
     */
    public function distanceFromOrigin()
    {
        return sqrt(pow($this->x, 2) + pow($this->y, 2));
    }

    /** perstumai taska per dx ir dy vienetus
     * @param int $dx  norimas perstumimas x asimi
     * @param int $dy  norimas perstumimas y asimi
     * @return void
     */
    public function translate(int $dx, int $dy): void
    {
        $this->x += $dx;
        $this->y += $dy;
    }

    /** atvaizduoja tasko vieta formatu [x;y]
     * @return string
     */
    public function __toString(): string
    {
        return "[$this->x; $this->y]";
    }

    /** grazina atstuma iki tasko p nuo esamo tasko
     * @param Point $p - naujas taskas
     * @return float
     */
    public function doubleDistance(Point $p): float
    {
        return sqrt(pow($p->x - $this->x, 2) + pow($p->y - $this->y, 2));
    }

    /** pakeicia esamo tasko kordinates
     * @param int $x  nauja tasko x kordinates
     * @param int $y
     * @return void
     */
    public function setLocation(int $x, int $y): void
    {
        $this->x = $x;
        $this->y = $y;
    }

}
?>