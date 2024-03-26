class Product {
    public$name;
    public$price;
    public$description;
    public$brand;

    public __construct($_name, $_price, $_description, $_brand) {
        $this->name = $_name;
        $this->price = $_price;
        $this->description = $_description;
        $this->brand = $_brand;
    }

    public function getProduct() {
        return "Name: {$this->name}; Price: {$this->price}; Description: {$this->description}; Brand: {$this->brand}";
    }
}

class Phone extends Product {
    public$cpu;
    public$ram;
    public$countSim;
    public$hdd;
    public$hdd;

    public __construct($_name, $_description, $_brand, $_cpu, $_ram, $_countSim, $_hdd, $_os) {
        parent::__construct($_name, 0, $_description, $_brand); 
        $this->cpu = $_cpu;
        $this->ram = $_ram;
        $this->countSim = $_countSim;
        $this->hdd = $_hdd;
        $this->os = $_os;
    }

    public function getProduct() {
        return parent::getProduct() . "; CPU: {$this->cpu}; RAM: {$this->ram}; Count SIM: {$this->countSim}; HDD: {$this->hdd}; OS: {$this->os}";
    }
}

class Monitor extends Product {
    public$diagonal;
    public$frequency;
    public$ports;

    public __construct($_name, $_description, $_brand, $_diagonal, $_frequency, $_ports) {
        parent::__construct($_name, 0, $_description, $_brand); 
        $this->diagonal = $_diagonal;
        $this->frequency = $_frequency;
        $this->ports = $_ports;
    }

    public function getProduct() {
        return parent::getProduct() . "; Diagonal: {$this->diagonal}; Frequency: {$this->frequency}; Ports: {$this->ports}";
    }
}

$products = [];

$phone1 = new Phone("Phone A", "Description A", "Brand A", "CPU A", "2GB", 2, "64GB", "Android");
$phone2 = new Phone("Phone B", "Description B", "Brand B", "CPU B", "4GB", 1, "128GB", "iOS");
$phone3 = new Phone("Phone C", "Description C", "Brand C", "CPU C", "3GB", 2, "256GB", "Android");

$monitor1 = new Monitor("Monitor A", "Description A", "Brand A", "24 inches", "60Hz", "HDMI, VGA");
$monitor2 = new Monitor("Monitor B", "Description B", "Brand B", "27 inches", "144Hz", "HDMI, DisplayPort");

$products = [$phone1, $phone2, $phone3, $monitor1, $monitor2];

foreach ($products as $product) {
    echo $product->getProduct() . "<br>";
}